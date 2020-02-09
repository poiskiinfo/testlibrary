<?php define( '_CEXEC', 1 );
if ( file_exists( __DIR__ . '/defines.php' ) ) {
    include_once __DIR__ . '/defines.php';
}
if ( !defined( 'CPATH_BASE' ) ) {
    define( 'CPATH_BASE','../');
    require_once CPATH_BASE . '/includes/defines.php';
}
 require_once CPATH_BASE . '/includes/framework.php';


$config1= new CConfig;






// создание таблицы пустой с данными из моего фреймфорка
$bd=new Cms\MysqliBd;
$bd->getDbo();


$Query="SELECT * FROM `#__users` ORDER BY id ASC";

$bd->setQuery("$Query");

$dannie=$bd->loadObjectList();

$count=count($dannie);






$name_XL_list=$config1->name_XL_list;



require_once __DIR__ . '/vendor/autoload.php';

// Путь к файлу ключа сервисного аккаунта
$googleAccountKeyFilePath = __DIR__ . '/sage-ripple-267507-1207ebe6a073.json'; // заменить на свой файл доступа полученный из гугл сервиса и которому разрешено редактировать данные в таблице иначе вылезет ошибка доступа и ничего непроизойдет
putenv( 'GOOGLE_APPLICATION_CREDENTIALS=' . $googleAccountKeyFilePath );

// Документация https://developers.google.com/sheets/api/
$client = new Google_Client();
$client->useApplicationDefaultCredentials();
https://docs.google.com/spreadsheets/d/1hF4fuj07Sl1fiuqu5FHIgAfZDxLIG020YEVSVuFKFXk/edit?usp=sharing
// Области, к которым будет доступ
// https://developers.google.com/identity/protocols/googlescopes
$client->addScope( 'https://www.googleapis.com/auth/spreadsheets' );

$service = new Google_Service_Sheets( $client );

// ID таблицы
$spreadsheetId =$config1->id_ggoletable;


$response = $service->spreadsheets->get($spreadsheetId);

// Свойства таблицы
$spreadsheetProperties = $response->getProperties();
$spreadsheetProperties->title; // Название таблицы

$response = $service->spreadsheets->get($spreadsheetId);

$response = $service->spreadsheets->get($spreadsheetId);

/*

// Свойства таблицы
$spreadsheetProperties = $response->getProperties();
$spreadsheetProperties->title; // Название таблицы

foreach ($response->getSheets() as $sheet) {

    // Свойства листа
    $sheetProperties = $sheet->getProperties();
    $sheetProperties->title; // Название листа

echo'<pre>';
var_dump($sheetProperties);
echo'</pre>';
    $gridProperties = $sheetProperties->getGridProperties();
    $gridProperties->columnCount; // Количество колонок
    $gridProperties->rowCount; // Количество строк

echo'<pre>';
var_dump($gridProperties);
echo'</pre>';




}*/


function changeCell($service, $spreadsheetId, $cell_num, $cel_val){
    $values = array(
    array(
    // Cell values ...
        $cel_val
    ),
    // Additional rows ...
    );
    $body = new Google_Service_Sheets_ValueRange(array(
    'values' => $values
    ));
    $params = array(
    'valueInputOption' => 'RAW',
    //'valueInputOption' => 'USER_ENTERED',  // Значения будут проанализированы так, как если бы пользователь ввел их в пользовательский интерфейс. Числа останутся как числа, но строки могут быть преобразованы в числа, даты и т. Д., Следуя тем же правилам, которые применяются при вводе текста в ячейку через пользовательский интерфейс Google Таблиц.
    );
    $range=$cell_num;
    $result = $service->spreadsheets_values->update($spreadsheetId, $range,
    $body, $params);
}


$cell_num=$name_XL_list.'!A1';//название редактируемого листа должно совпадать иначе тупо ошибка записи в гугл таблицы
$cel_val='Список добавленных вчера';
changeCell($service, $spreadsheetId, $cell_num, $cel_val);


$cell_num=$name_XL_list.'!B1';
$cel_val='Список удаленных вчера';
changeCell($service, $spreadsheetId, $cell_num, $cel_val);
$cell_num=$name_XL_list.'!C1';
$cel_val='время запуска парсера';
changeCell($service, $spreadsheetId, $cell_num, $cel_val);


$date=date('Y.m.d H:i:s');
/* добавляет в конец данные как в тз*/
$range = "$name_XL_list";       //Название листа в гугл таблице у меня он поумолчанию идет Лист1 у вас он может отличаться чтобы ошибка невылетала


$date2 = new DateTime();

$date2->modify( '-1 day' );
$date_start1=(string)$date2->format("Ymd"); //20080723
$date_start=$date_start1.'000000';

$date_end1=(string)$date2->format("Ymd").'240000';
$date_end=$date_end1.'240000';
$Query="SELECT * FROM `#__users` WHERE adddate>='$date_start' and adddate<='$date_end'";

$bd->setQuery("$Query");

$dannie2=$bd->loadObjectList();
$a=count($dannie2);

$Query="SELECT * FROM `#__deluser` WHERE deldate>='$date_start' and deldate<='$date_end'";


$bd->setQuery("$Query");

$dannie3=$bd->loadObjectList();
$b=count($dannie3);



$valueRange= new Google_Service_Sheets_ValueRange();
$valueRange->setValues(["values" => ["$a", "$b", "$date"]]);
$conf = ["valueInputOption" => "RAW"];
$service->spreadsheets_values->append($spreadsheetId, $range, $valueRange, $conf);







/*
$valueRange = new Google_Service_Sheets_ValueRange();

$valueRange->setValues([['John', 'Doe'],['Jane', 'Doe']]);

$range = 'Лист1!A1:A';
$conf = ["valueInputOption" => "USER_ENTERED"];
$service->spreadsheets_values->append($spreadsheetId, $range, $valueRange, $conf);

*/







/* добавление данных в нужную ячейку и сколько колонок будет добавлено и рядов
$values = [
    ["2016-02-12", "5453 543543", "=C2+C3"],
    ["2017-02-12", "5453 543543", "=C2+C3"],
    ["2018-02-12", "5453 543543", "=C2+C3"],
];
$body    = new Google_Service_Sheets_ValueRange( [ 'values' => $values ] );

// valueInputOption - определяет способ интерпретации входных данных
// https://developers.google.com/sheets/api/reference/rest/v4/ValueInputOption
// RAW | USER_ENTERED
$options = array( 'valueInputOption' => 'RAW' );

$service->spreadsheets_values->update( $spreadsheetId, 'Лист1!A13', $body, $options );
*/

?>