<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="./media/choosen/chosen.jquery.js"></script>
<link rel="stylesheet" type="text/css" href="./media/choosen/chosen.css" media="screen" />


<?php





$bd=new Cms\MysqliBd;
$bd->getDbo();

$Query="SELECT * FROM `#__users` ORDER BY id ASC";

$bd->setQuery("$Query");

$dannie=$bd->loadObjectList();

$count=count($dannie);


?>







<style>

body {font-family: Arial, Helvetica, sans-serif;}

#myBtn {
  color: #fff;
  padding: 0px 0px;
  font-size: 18px;
  font-weight: bold;
  border: none;
  cursor: pointer;
  min-width: 40px;
}


.modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}


.modal-content {
    position: relative;
    background-color: #fff;
    margin: auto;
    padding: 0;
    border: 0px solid #7B1FA2;
    width: 50%;
    max-width: 300px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}


@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}


.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    margin:0px 0px 10px 0px;
    padding: 2px 16px;
        background-color: #1b1c1f;
    color: white;
}

.modal-header h2{
   margin: 5px;
    font-size: 22px;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #9C27B0;
    color: white;
}

.adduser1 {width: 100%;}

.adduser1 td{
height: 30px;
margin: 0 0 14px;
vertical-align: top;

}
.innvs{width: 100%;
height: 31px;
    margin: 0 0 0px;
    padding: 0px 5px 0px 5px;

        font-family: Arial;
    font-size: 14px;
    color: #a1a1a1;
    font-weight: 300;
    text-decoration: none;
    line-height: 35px;
    border-radius: 0;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;
}


.adduser1 .label{font-weight: 600;}
.knopka{margin:0px 0px 20px 10px; display: inline-block;}





.some-form__line {
  display: block;
  position: relative;
  margin-bottom: 10px;
}
.some-form__line-required input[type="text"],
.some-form__line-required input[type="password"],
.some-form__line-required input[type="email"] {
  border-color: #f45a57;
}
.some-form__line-required .some-form__hint {
  opacity: 1;
  z-index: auto;
}
.some-form__hint {
  z-index: -1;
  opacity: 0;
  position: absolute;
  top: 45%;
  left: 0;
  margin-top: -6px;
  padding: 0 12px;
  width: 90%;
  background: #f45a57;
  color: #fff;
  font-size: 12px;
  line-height: 1.333333;
  -webkit-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
}


.otpravit{
background-color: #1b1c1f;
position: relative;
    cursor: pointer;
    text-align: center;
    margin: 0;
    padding: 8px 18px;
    border: none;
color: #fff;
 width: 100%;
margin:10px 0px 0px 0px;

    font-family: Arial;
    font-size: 14px;
    color: #fff;
    font-weight: 400;
    line-height: normal;
}


.chosen-container-single .chosen-single{border-radius: 0px!important; min-height: 31px !important; line-height: 31px !important;}
.chosen-container-single .chosen-single div{

top: 2px !important;
}
.spisokusers{

min-width: 100%;

}
.spisokusers tr:nth-child(odd) {
  background: white;
}
.spisokusers tr:nth-child(even) {
  background: #E8E6D1;
}
.spisokusers td {
    padding: 10px;
}
.spisokusers th {
    padding: 10px;
}

.spisokusers th a.activsort{
 text-decoration: none;
color:#e14938;
}
.spisokusers th a{
color: blue;
text-decoration: none;
}

.spisokusers th a:hover{
color: black;
text-decoration: none;
}


.spisokusers .lefttable{text-align: left;}
.spisokusers .group{text-align: center;}
.delete{display: none;}

.rightdeystviya{

text-align: right;

width:100%;
}
.knopochka2{
display: inline-block;
width: 40px;
height: 40px;
background: url(./image/deluser.png);
}

.knopochka2:hover{
display: inline-block;
width: 40px;
height: 40px;
background: url(./image/deluser_hover.png);
}

.knopochka1{

display: inline-block;
width: 40px;
height: 40px;
background: url(./image/adduser.png);

}
.knopochka1:hover{

display: inline-block;
width: 40px;
height: 40px;
background: url(./image/adduser_hover.png);

}



.navigation span.postranichnayanavigacia,.navigation a{
    min-width: 32px;
    min-height: 32px;
    padding: 8px 12px;
    border: 0px solid #ccc;
    color: #000;
    background: #f3f3f3;
    border-radius: 0 !important;
    height: 32px;
    vertical-align: top;
        margin: 0 8px;
        line-height: 1.42857143;
        font-size: 13px;
        text-decoration: none;
}
.navigation a:hover{

   background: #e14938;
    color: #fff;

        min-width: 32px;
    min-height: 32px;
    padding: 8px 12px;
    border: 0px solid #ccc;
    border-radius: 0 !important;
    height: 32px;
    vertical-align: top;
        margin: 0 8px;
        line-height: 1.42857143;
        font-size: 13px;
        text-decoration: none;

}
.navigation span.postranichnayanavigacia{
       background: #e14938;
    color: #fff;

        min-width: 32px;
    min-height: 32px;
    padding: 8px 12px;
    border: 0px solid #ccc;
    border-radius: 0 !important;
    height: 32px;
    vertical-align: top;
        margin: 0 8px;
        line-height: 1.42857143;
        font-size: 13px;
        text-decoration: none;

}





</style>
<div class="rightdeystviya">
<div class="knopka">
<button id="myBtn" class="knopochka1" alt="Добавить нового пользователя" title="Добавить нового пользователя"></button>
</div>




<a class="knopochka2" href="#" onclick="document.getElementById('delete').click();" title="Удалить выделенных юзеров(а)"></a>

</tr>

</div>



<div id="myModal" class="modal">


  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Введите данные</h2>
    </div>
    <div class="modal-body">
    <form action="./controller.php?SaveAdd=1" method="post" class="form js-form-validate">
      <table class="adduser1">
 <tr>
<td> <div class="some-form__line"><input type="text" name="cform[login]" minlength="3" class="innvs" value="" placeholder="Логин" data-validate>
    <span class="some-form__hint">Обязательно для заполнения</span>
    </div></td>
</tr>

 <tr>

<td><div class="some-form__line">
    <input type="email" name="cform[email]" class="innvs" value="" maxlength="255" placeholder="Email" data-validate>
    <span class="some-form__hint">Обязательно для заполнения</span>
</td>
</tr>

 <tr>

<td><div class="some-form__line">
    <input type="password" name="cform[password]" class="innvs" maxlength="40" value="" placeholder="Пароль" data-validate>
    <span class="some-form__hint">Обязательно для заполнения</span></td>
</tr>





 <tr>
<td>
    <select name="cform[frontediting]">

       <option value="0">Незарегистрированный</option>
       <option value="1">Зарегистрирован</option>
    </select>
<script>
jQuery('select[name="cform[frontediting]"]').chosen({width: "100%",disable_search_threshold: 2});
</script>
</td>
</tr>


 <tr>
<td >
<input type="submit" class="button button_submit button_wide otpravit" value="Отправить">
</td>
</tr>


</table>
</form>
    </div>
   <?php
   /* <div class="modal-footer">
      <h3>Футер модального окна</h3>
    </div>*/
    ?>
  </div>

</div>

<script>

var modal = document.getElementById('myModal');


var btn = document.getElementById("myBtn");


var span = document.getElementsByClassName("close")[0];


btn.onclick = function() {
    modal.style.display = "block";
}


span.onclick = function() {
    modal.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}







$(document).ready(function(){

  $('.js-form-validate').submit(function () {
    var form = $(this);
    var field = [];
    form.find('input[data-validate]').each(function () {
      field.push('input[data-validate]');
      var value = $(this).val(),
          line = $(this).closest('.some-form__line');
      for(var i=0;i<field.length;i++) {
        if( !value ) {
          line.addClass('some-form__line-required');
          setTimeout(function() {
            line.removeClass('some-form__line-required')
          }.bind(this),2000);
          event.preventDefault();
        }
      }
    });
  });
});
</script>

<div class="spisokuserov">

<?php
        if($count=='0'){ ?>

 В настоящий момент у нас 0 пользователей


   <?php }
        else{


//var_dump($parametr);

$config1= new CConfig;


$per_page=$config1->namber_pagination;

if(is_numeric($per_page)){}
else{$per_page='12';}


// получаем номер страницы
if (isset($_GET['page'])){
  $page=($_GET['page']);
  if(!is_numeric($page)){$page=1;}
} else{ $page=1;}
// вычисляем первый оператор для LIMIT
//$start=abs($page*$per_page);
$start = $page * $per_page - $per_page;

$bd->setQuery("SELECT count(*) as vsego FROM `#__users`");
$total_rows =$bd->loadObjectList();
$total_rows=$total_rows['0'];

$num_pages=ceil($total_rows->vsego/$per_page);





            ?>



<form action="./controller.php?delete=1" method="post" >
   <table class="spisokusers">
<?php


$sort=trim(htmlentities($_GET['sort'], ENT_QUOTES));
if(empty($sort)){
$ORDERby='ORDER By id DESC';
$sort='id_DESC';
}
elseif($sort=='id_ASC'){

$ORDERby='ORDER By id ASC';

}
elseif($sort=='id_DESC'){

$ORDERby='ORDER By id DESC';

}
elseif($sort=='date_DESC'){

$ORDERby='ORDER By adddate DESC';

}
elseif($sort=='date_ASC'){

$ORDERby='ORDER By adddate ASC';

}

elseif($sort=='email_DESC'){

$ORDERby='ORDER By email DESC';

}
elseif($sort=='email_ASC'){

$ORDERby='ORDER By email ASC';

}

elseif($sort=='login_DESC'){

$ORDERby='ORDER By login DESC';

}
elseif($sort=='login_ASC'){

$ORDERby='ORDER By login ASC';

}




?>

 <tr>
<th><label><input type="checkbox" id="check_all"></label></th>
<th>№</th>
<th class="lefttable">
    <a class="<?php if($sort=='login_DESC'){echo 'activsort';}elseif($sort=='login_ASC'){echo 'activsort';}?>"
        href="./index.php?sort=<?php if($sort=='login_DESC'){echo 'login_ASC';}else{echo 'login_DESC';}?>">Логин</a>
</th>
<th class="lefttable">
    <a class="<?php if($sort=='email_DESC'){echo 'activsort';}elseif($sort=='email_ASC'){echo 'activsort';}?>"
    href="./index.php?sort=<?php if($sort=='email_DESC'){echo 'email_ASC';}else{echo 'email_DESC';}?>">Email</a>
</th>
<th>Группа</th>
<th class="lefttable">
    <a class="<?php if($sort=='date_DESC'){echo 'activsort';}elseif($sort=='date_ASC'){echo 'activsort';}?>"
        href="./index.php?sort=<?php if($sort=='date_DESC'){echo 'date_ASC';}else{echo 'date_DESC';}?>">Дата</a>
</th>
<th class="lefttable">
    <a class="<?php if($sort=='id_DESC'){echo 'activsort';}elseif($sort=='id_ASC'){echo 'activsort';}if(empty($sort)){echo 'activsort';}?>"
        href="./index.php?sort=<?php if($sort=='id_DESC'){echo 'id_ASC';}else{echo 'id_DESC';}?>">Id</a>
</th>
</tr>
<?php




$bd->setQuery("SELECT * FROM `#__users` $ORDERby LIMIT $start,$per_page");
$dannie2=$bd->loadObjectList();
$i='1';
    foreach($dannie2 as $v_k=>$v_val){?>
 <tr>
    <td class="group"><input type="checkbox" name="checks[]" class="checkbox_mc" value="<?php echo $v_val->id;?>"></td>
    <td class="group"><?php echo $i;?></td>
<td class="lefttable" style="min-width: 130px;"><?php echo $v_val->login;?></td>
<td class="lefttable" style="min-width: 130px;"><?php echo $v_val->email;?></td>
<td class="group" style=" padding: 5px 2px 5px 2px;"><?php echo $v_val->groupac;?></td>
<td class="lefttable"><?php

$year=substr($v_val->adddate, 0, 4);
$month=substr($v_val->adddate, 4, 2);
$day=substr($v_val->adddate, 6, 2);

$hour=substr($v_val->adddate, 8, 2);
$minutes=substr($v_val->adddate, 10, 2);
$sekundes=substr($v_val->adddate, 12, 2);
echo  $day.'.'.$month.'.'.$year.' '. $hour.':'.$minutes.':'.$sekundes;


?></td>
<td class="lefttable"><?php echo $v_val->id;?></td>
</tr>

    <?php $i++;
    }


?>



<input type="submit" id="delete" class="delete" value="удалить выделенные">

</table>
</form>
<script>

$(document).ready(function() {

    $("#check_all").click(function() {
        var checked_status = this.checked;
        $(".checkbox_mc").each(function() {
            this.checked = checked_status;
        });
    });





});
</script>



  <?php } ?>


<?php

$url='./index.php?sort='.$sort;

//$tota = ceil(ceil(($num_pages-1) / $per_page)+1);

$tota=$num_pages;


// Проверяем нужны ли стрелки назад
if ($page != 1){$pervpage = '<a href="'.$url.'&page=1" class="postranichnayanavigacia">«</a> ';}
// Проверяем нужны ли стрелки вперед
if($page>=1 and $page<$tota ){$nextpage = '<a href="'.$url.'&page='.$tota.'" class="postranichnayanavigacia">»</a>';}
// Находим 5 ближайшие станицы с обоих краев, если они есть
if($page - 5 > 0) $page5left = '<a href="'.$url.'&page='.($page - 5) .'" class="postranichnayanavigacia">'. ($page - 5) .'</a> ';
if($page - 4 > 0) $page4left = '<a href="'.$url.'&page='.($page - 4) .'" class="postranichnayanavigacia">'. ($page - 4) .'</a> ';
if($page - 3 > 0) $page3left = '<a href="'.$url.'&page='.($page - 3) .'" class="postranichnayanavigacia">'. ($page - 3) .'</a> ';
if($page - 2 > 0) $page2left = '<a href="'.$url.'&page='.($page - 2) .'" class="postranichnayanavigacia">'. ($page - 2) .'</a> ';
if($page - 1 > 0) $page1left = '<a href="'.$url.'&page='.($page - 1) .'" class="postranichnayanavigacia">'. ($page - 1) .'</a> ';
if($page + 5 <= $tota) $page5right = '<a href="'.$url.'&page='.($page + 5) .'" class="postranichnayanavigacia"> '. ($page + 5) .'</a> ';
if($page + 4 <= $tota) $page4right = '<a href="'.$url.'&page='.($page + 4).'" class="postranichnayanavigacia"> '. ($page + 4) .'</a> ';
if($page + 3 <= $tota) $page3right = '<a href="'.$url.'&page='.($page + 3) .'" class="postranichnayanavigacia"> '.($page + 3) .'</a> ';
if($page + 2 <= $tota) $page2right = '<a href="'.$url.'&page='.($page + 2) .'" class="postranichnayanavigacia"> '. ($page + 2) .'</a> ';
if($page + 1 <= $tota) $page1right = '<a href="'.$url.'&page='.($page + 1) .'" class="postranichnayanavigacia">'. ($page + 1) .'</a> ';



if($tota=='1'){}
else{
if ($page >='1' and $num_pages > $per_page) $pages =" <span class='postranichnayanavigacia'>".$page."</span> ";
elseif ($num_pages < $per_page) $pages =" <span class='postranichnayanavigacia'>".$page."</span> ";;
 echo '<br><div class="navigation" align="center">'.$pervpage.$page4left. $page3left. $page2left. $page1left. $pages. $page1right.$page2right.$page3right.$page4right.$nextpage."<br/><br/></div>";/*конец топ навигации*/

}

?>


</div>
