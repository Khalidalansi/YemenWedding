<?php
if(!isset($_POST['name']) || (!isset($_POST['password'])))
{
    die('Bad Access');
}else{
    $user=strip_tags(trim($_POST['name']));
    $pass=strip_tags(trim($_POST['password']));
    if((empty($user)) || (empty($pass))){
        die('<div class=\"alert alert-error\">Empyt Info</span>'); 
    }
}
require_once '../../db/db.php';
require_once '../../db/admin.php';
require_once './session.php';
$clintes=  dyw_admin_get_buy_name($user);
if(!$clintes)
{
	die('<div class=\"alert alert-error\">Error in user</div');
	
}
$pss=@md5(mysql_real_escape_string($pass,$dyw_handle));
dyw_db_close();
if(strcmp($pss,$clintes->password) != 0)
{
        die('<div class=\"alert alert-error\">Error in user</div>');
}
$_SESSION['user_admin']=$clintes;

echo "<div class=\"alert alert-success\"> تم تسجيل الدخول بنجاح  <br> مرحبا بك :".$clintes->admin_name."</div>";
header("Location:../index.php");
