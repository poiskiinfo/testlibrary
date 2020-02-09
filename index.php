<?php define( '_CEXEC', 1 );
if ( file_exists( __DIR__ . '/defines.php' ) ) {
    include_once __DIR__ . '/defines.php';
}
if ( !defined( 'CPATH_BASE' ) ) {
    define( 'CPATH_BASE',__DIR__);
    require_once CPATH_BASE . '/includes/defines.php';
}
 require_once CPATH_BASE . '/includes/framework.php';

// создание таблицы пустой с данными из моего фреймфорка
$bd=new Cms\MysqliBd;
$bd->getDbo();

$Query="CREATE TABLE IF NOT EXISTS `#__users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passworduser`varchar(255) DEFAULT NULL,
  `groupac` varchar(255) DEFAULT NULL,
  `adddate` varchar(14),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11";

$bd->setQuery("$Query");

$Query="CREATE TABLE IF NOT EXISTS `#__deluser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddelet` varchar(255) DEFAULT NULL,
  `deldate` varchar(14),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11";




$bd->setQuery("$Query");


$maket=$_GET['maket'];


if(empty($maket)or $$maket==NULL){

include 'list.php';

}
/*elseif($$maket=='adduser'){

    include 'adduser.php';
}
elseif($$maket=='delluser'){

    include 'delluser.php';

}*/




?>





