<?php
require_once './session.php';
if($_SESSION['user_admin']==false)
 {
          header('Location:index.php');
 }
 if(!empty($_SESSION['user_admin']))
    {
        $id_clinte=$_SESSION['user_admin']->admin_id;
    }
require_once '../../db/db.php';
require_once '../../db/hallANDpic.php';

if(isset($_POST['hid'])){
    $hall_id=  strip_tags(trim(intval($_POST['hid'])));
//    if(empty($hall_id))
//	{
//		die('not font page');
//	}
}
if(isset($_POST['stuate'])){
    $stuate=  strip_tags(trim(intval($_POST['stuate'])));
    if($stuate==1){
        $stuate=2;
//        echo $stuate;
    }elseif($stuate==2){
        $stuate=1;
        
    }
  
//    if(empty($stuate))
//	{
//		die('not font page2');
//	}
}
//   echo $stuate;
$ru= update_hall_AND_pictures($hall_id,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$stuate,$id_clinte,NULL,NULL);
if($ru){
    dyw_db_close();
    echo 'تمت العملية بنجاح';
}else{
    dyw_db_close();
    echo 'لم تنجح العملية ';
}