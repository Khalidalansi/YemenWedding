<?php
require_once('session.php');
require_once('../db/db.php');
require_once('../db/HallAPI.php');
require_once('../db/pictureAPI.php');
if($_SESSION['user_info']==false)
		 {
			  header('Location:index.php');
		 }
if(isset($_GET['hall_id']))
{
	if(!empty($_GET['hall_id']))
	{
	$hall_id=$_GET['hall_id'];
	}
}
else
	{
		header('Location:../index.php');
	}
$re=delete_hall($hall_id);
echo $re;
function delete_hall($uid)
{
	
$ruslt=dyw_hall_delete($uid);
$massge_hall='';
if($ruslt)
{
	$massge_hall="تم الحذف بنجاح  ";
}
else
{
	$massge_hall="حدث خطاء ";
}
$pic=dyw_picture_get_buy_id_hall($uid);
$count=@count($pic);
$massge='';
$count_pic=0;
$count_pic_error=0;
for($i=0;$i<$count;$i++)
{
	
	$pics=$pic[$i];
	$path_pic=$pics->picture_path;
	$result_pic=dyw_picture_delete($pics->picture_id);
	if($result_pic)
	{
		if(file_exists($path_pic))
		{
			unlink($path_pic);
		}
		$count_pic=$count_pic+1;
	}
	else
	{
		$count_pic_error=$count_pic_error+1;
	}
}
return "حالة القاعة  :".$massge_hall."<br>العمليات الناجحة : ".$count_pic."<br>العمليات الفاشله :  ".$count_pic_error;
}
?>