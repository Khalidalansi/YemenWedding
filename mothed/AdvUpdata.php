<?php
require_once('../db/db.php');
require_once('../db/advantages.php');
if($_SESSION['user_info']==false)
		 {
			  header('Location:index.php');
		 }
if(isset($_POST['adv_id']))
{
	$advid=strip_tags(trim($_POST['adv_id']));
	if(empty($advid))
	{
		die('not font page');
	}
if(isset($_POST['adv_title']))
    {
        if(!empty($_POST['adv_title']))
        {
           $adv_title=strip_tags(trim($_POST['adv_title'])); 
        }       
    }  
else{$adv_title=NULL;}        
if(isset($_POST['adv']))
    {
        if(!empty($_POST['adv']))
        {
           $adv=strip_tags(trim($_POST['adv'])); 
        }       
    }  
else{$adv=NULL;}
$re=dyw_adv_update($advid, $adv_title, $adv);
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
}