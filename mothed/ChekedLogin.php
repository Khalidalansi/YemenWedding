<?php
if(!isset($_POST['username']) || (!isset($_POST['password'])))
{
    die('Bad Access');
}
if((empty($_POST['username'])) || (empty($_POST['password'])))
{
    die('<div class=\"alert alert-error\">Empyt Info</span>');
}
require_once('session.php');
require_once('../db/db.php');
require_once('../db/ClinteAPI.php');
$clintes=dyw_clinte_get_buy_name($_POST['username']);
if(!$clintes)
{
	die('<div class="alert alert-error">Error in user</div');
	
}
$pss=@md5(mysql_real_escape_string(strip_tags($_POST['password']),$dyw_handle));
dyw_db_close();
if(strcmp($pss,$clintes->clinte_password) != 0)
{
        die('<div class="alert alert-error">Error in user</div>');
}
$clintes->clinte_password=0;
if($clintes->clinte_staute==1){

     die('<div class="alert alert-warning">لم يتم تفعيل حسابك يرجى مرسلتنا للتفعيل او الانتظار حتى يتم التفعيل</div>');
}


$_SESSION['user_info']=$clintes;

echo "<div class=\"alert alert-success\"> تم تسجيل الدخول بنجاح  <br> مرحبا بك :".$clintes->clinte_name."</div>";

/*header('Location:../index.php');*/

?>