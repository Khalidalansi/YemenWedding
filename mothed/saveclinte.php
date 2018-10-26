<?php
if(isset($_POST['username']))
{
    echo $_POST['username'];
}
if(!isset($_POST['username']) || (!isset($_POST['phone'])) || (!isset($_POST['email'])) || (!isset($_POST['user'])) || (!isset($_POST['password'])) )
{
  die('Empyt Data');	
}
require_once('../db/db.php');
require_once('../db/ClinteAPI.php');
$re=  dyw_clinte_get_buy_name($_POST['username']);
if($re){
    dyw_db_close();
    die('<span class="alert alert-error">هذا الاسم غير متاح</span>');
}
$chem=  dyw_clinte_get_buy_email($_POST['email']);
if($chem){
    dyw_db_close();
     die('<span class="alert alert-error">لقد تم التسجيل بهذا الايميل من قبل </span>');
}
$result=dyw_clinte_add($_POST['username'],$_POST['phone'],$_POST['email'],$_POST['password'],$_POST['user']);
if(!$result)
	{
		dyw_db_close();
		echo "<span class=\"alert alert-error\"> يوجد خطاء في ادخال البيانات  </span>";
	}
	else
	{
		dyw_db_close();
		echo "<span class=\"alert alert-error\"> مرحباً بك في موقعنا ,, سيتم ابلاغك قريباً بتفعيل اشتركك لدينا <br> وسوف يتم ارسال رساله إلى بريدكم الالكتروني تحتوي على بيانات الدخول فور تفعيل الاشتراك   </span>";
	}
?>