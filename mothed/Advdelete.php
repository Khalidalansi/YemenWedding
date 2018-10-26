<?php
require_once('../db/db.php');
require_once('../db/advantages.php');
if($_SESSION['user_info']==false)
		 {
			  header('Location:../index.php');
		 }
if(isset($_POST['adv_id']))
{
    if(!empty($_POST['adv_id']))
    {
        $advid=  strip_tags(trim($_POST['adv_id']));
    $r=dyw_adv_delete($advid);
        if($r){echo "تمت العملية بنجاح";}
        else{echo "فشلت العملية";}
    }
}




