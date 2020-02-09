<?php
class CConfig {

   public $error_reporting = 'none'; /*'none'   'development' смотри includes/framework.php показ ошибок php да нет может быть и так далее */
   public $host = 'localhost';       /*хост подключение к бд msqli*/
   public $user = 'root';            /*user подключение к бд msqli*/
   public $password = '';            /*user подключение к бд msqli на openserver пароль у меня пустой так что все норм*/
   public $db = 'code1lc';           /* название бд к которой идет подключение*/
   public $dbprefix = 'aop_';        /* прификс таблиц которые будут создаваться в будущем, незная структуры лучше не меняйте */
   public $namber_pagination = '5';  /*число статей для показа пагинации на странице тестовой можно регулировать от 1- большого числа и значение должно быть целым */
   public $name_XL_list = 'Лист1';  /* имя листа с которым работаем в гугл документе по умолчанию для рус региона он стоит Лист1 если сменили имя то и тут придется менять  */
   public $id_ggoletable='1hF4fuj07Sl1fiuqu5FHIgAfZDxLIG020YEVSVuFKFXk'; /* читай readme.php чтоб понять где его взять а то небудет работать скрипт добавления в таблицы гугла по крону*/

}