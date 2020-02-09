<?php
namespace Cms;
class MysqliBd {

static private $mysqli='';
static private $Query='';


 public static function getDbo($p=FALSE){

    $config = new \CConfig;
    $host=$config->host;
    $username=$config->user;
    $password=$config->password;
    $database_name=$config->db;
    unset($config);


 	if($p==FALSE){


    // $mysqli =  mysqli_connect('host','username','password','database_name');

           $mysqli =  mysqli_connect("$host","$username","$password","$database_name");
    }
    else{


     //$mysqli = new mysqli('host','username','password','database_name');
       $mysqli = new \mysqli("$host","$username","$password","$database_name");

    }

    if ($mysqli->connect_error) {
      // делать лог сообщений чтрбы точно знать на какой странице ошибка вылезла и че за ошибка а то хрен когда ее найдешь
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

  self::$mysqli=$mysqli;


 }

 public static function setQuery($Query){


      $Query=self::zamena($Query);

     $query11=self::$mysqli->query("$Query");

     if(!$query11){

          return self::$mysqli->error;
     }
     else{
        self::$Query=$query11;
        return '1';

     }


 }

  public static function loadObjectList($selectpole=''){

           $rows=array();
         while($row = self::$Query->fetch_object()) {
          if($selectpole!='' and $selectpole!=NULL){
            $rows[$row->$selectpole]=$row;

          }
          else{

             $rows[]=$row;

          }

         }




       return $rows;
 }

  public static function zamena($Query){


    $config = new \CConfig;
    $nachto=$config->dbprefix;
   $Query=str_replace('#__',"$nachto",$Query);
   unset($config);


   return $Query;
 }



}

?>