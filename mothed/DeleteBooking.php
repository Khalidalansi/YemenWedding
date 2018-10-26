<?php require_once('session.php');
require_once('../db/db.php');
require_once('../db/bookingAPI.php');
if($_SESSION['user_info']==false)
		 {
			  header('Location:index.php');
		 }
if(isset($_POST['bk_id']))
{
	if(!empty($_POST['bk_id']))
	{
	$bk_id=$_POST['bk_id'];
	}
}
else{header('Location:../index.php');}
if(isset($_POST['hall_id']))
{
	if(!empty($_POST['hall_id']))
	{
	$hall_id=$_POST['hall_id'];
	}
}
else{header('Location:../index.php');}
$ru= dyw_booking_delete($bk_id,$hall_id);
if($ru){
    dyw_db_close();
      echo 'تمت العملية بنجاح';
}else{
    dyw_db_close ();
      echo 'لم تنجح العملية ';
}