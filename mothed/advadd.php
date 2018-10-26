<?php
require_once('../db/db.php');
require_once('../db/advantages.php');
if(isset($_POST['hall_id']))
{
    $hallid=$_POST['hall_id'];
    if(isset($_POST['adv_title']))
    {
        $title=$_POST['adv_title'];
    }else(die('يوجد خطاء في ادخال البيانات'));
    if(isset($_POST['adv']))
    {
        $adv=$_POST['adv'];
    }else(die('يوجد خطاء في ادخال البيانات'));
     
   $re= dyw_adv_add($title, $adv, $hallid);
       if($re)
    {
         dyw_db_close();
        echo "تمت العملية بنجاح";
    }
    else
    {
         dyw_db_close();
        echo "فشلت العملية";
    }
}else(die('يوجد خطاء في ادخال البيانات'));