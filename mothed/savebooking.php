<?php
require_once('../mothed/session.php');
require_once('../db/db.php');
require_once('../db/bookingAPI.php');
if($_SESSION['user_info']==false)
		 {
			  header('Location:../index.php');
		 }
if(!isset($_POST['period_hall']) && (!isset($_POST['bk_date'])) && (!isset($_POST['hall_id'])))
{
	die('Error Insetr Data');
}
$ru=  dyw_booking_get_buy_id_hall_date($_POST['hall_id'],$_POST['bk_date']);
if(!$ru){
        $save_booking=dyw_booking_add($_POST['bk_date'],$_POST['period_hall'],$_POST['hall_id']);
            if($save_booking)
            {
                echo "<div class=\"alert alert-success\">تمت العملية بنجاح </div>";	
            }
            else
            {
                    echo "<div class=\"alert alert-error\">خطاء  لم تتم العملية بنجاح </div>";
            }
}else{
     echo "<div class=\"alert alert-error\">موجود الحجز مسبقاً</div>";
}
?>