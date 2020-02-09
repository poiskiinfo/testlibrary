<?php define( '_CEXEC', 1 );
if ( file_exists( __DIR__ . '/defines.php' ) ) {
    include_once __DIR__ . '/defines.php';
}
if ( !defined( 'CPATH_BASE' ) ) {
    define( 'CPATH_BASE',__DIR__);
    require_once CPATH_BASE . '/includes/defines.php';
}
 require_once CPATH_BASE . '/includes/framework.php';


$bd=new Cms\MysqliBd;
$bd->getDbo();

$save=$_GET['SaveAdd'];
$delete=$_GET['delete'];

if($save==1 and $delete==1){
    die('Роботам тут не место');
}

/* начало if($save=='1'){*/

if($save=='1'){

   $cform=$_POST['cform'];



   $email = $cform['email']; //входящая строка, в которой может быть все, что угодно, а должна быть почта
    if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)){
       //все ОК, email правильный
      $v_email=1;
    }
    else{

       $v_email=0;
       //проверка email на правильность НЕ пройдена
    }


    $login=htmlspecialchars($cform['login'] , ENT_QUOTES);                 //  в тз небыло проверки на символы каието именно латиница или рус
    $password=htmlspecialchars($cform['password'] , ENT_QUOTES);        //  в тз небыло проверки на символы каието именно латиница или рус
    $group=htmlspecialchars($cform['frontediting'] , ENT_QUOTES);
    $adddate=date("YmdHis");



    if($v_email=='1' and !empty($login) and !empty($password)    ){

     //проверка на совпадение есть ли уже такой логин или email если есть то недобавляем юзера в бд и все
    $bd->setQuery("SELECT * FROM `#__users` ");
    $dannie2=$bd->loadObjectList();

         $isinsert='no';

        foreach($dannie2 as $v_k=>$v_val){


            if($email==$v_val->email and $login==$v_val->login){

               $isinsert='yes';
          break;

            }

        }


       if($isinsert=='no'){

        $eardr=$bd->setQuery("INSERT INTO `#__users` (`login`,`email`,`passworduser`,`groupac`,`adddate`) VALUES ('".$login."','".$email."','".$password."','".$group."','".$adddate."')" );


         if($eardr=='1'){

           header("location: ./index.php");

         }
         else{
            header("location: ./index.php?error=$eardr"); // ошибка в записи бд че очень редко бывает
         }


       }


       if($isinsert=='yes'){

          header("location: ./index.php?error=такой юзер уже есть в системе");
       }







    }



}



/* конец if($save=='1'){*/








if($delete==1){


    $checks=$_POST['checks'];

    if(is_array($checks)){


      foreach($checks as $v_k=>$v_val){

        if(is_numeric($v_val)){
            $query ="DELETE FROM `#__users` WHERE id = '$v_val'";
            $eardr=$bd->setQuery("$query");

             $query="INSERT INTO  `#__deluser` (`iddelet`,`deldate`) VALUES ('".$v_val."','".date("YmdHis")."')" ;
             $eardr2=$bd->setQuery("$query");


        }

      }

        header("location: ./index.php");

    }
    else{
          // ведем лог ошибок или левых заходов
        header("location: ./index.php");


    }


}











?>

