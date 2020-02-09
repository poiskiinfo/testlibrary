<?php 
namespace Cms;
/**
* Log вызывать ток тогда код может выйти в ошибку для ведения логов 
*
*/
class Log {


/**error
* 
*
* @string $code 500,404,messege_yellow,messege_green,messege_red
*
*/

public static function error($code='',$error='') {


    if(defined("CLOG")){
            
      if(CLOG=='1'){

        if(is_dir(CPATH_ROOT.'/log')){}
        else{
           mkdir(CPATH_ROOT.'/log', 0755);
        }
          $dir_log=CPATH_ROOT.'/log';
          $dates=new Cdate();
          $filename=$dates->format('Ymd');
          $fullfilename=$dir_log.'/'.$filename.'.log';

        if (!file_exists($fullfilename)){
               
              $fp = fopen($fullfilename, 'w');
              fwrite($fp,"$error");
              fclose($fp);
        }
        else{
               $fp = fopen($fullfilename, 'a');
              fwrite($fp,"\n"."$error");
              fclose($fp);

        }
             
 
      }

      



         
    }

	}







}
 ?>