<?php
require_once('../mothed/session.php');
if($_SESSION['user_info']==false)
 {
          header('Location:index.php');
 }
 if(!empty($_SESSION['user_info']))
    {
        $id_clinte=$_SESSION['user_info']->clinte_id;
    }

require_once('../db/db.php');
require_once('../db/clinteapi.php');

 if(isset($_POST['name_acc'])){
        if(!empty($_POST['name_acc'])){
           $clinet_name=$_POST['name_acc']; 
        }       
    }
    else{$clinet_name=NULL;} 
    
if(isset($_POST['phone_acc'])){
    if(!empty($_POST['phone_acc'])){
       $clinet_phone=$_POST['phone_acc']; 
    }       
}
else{$clinet_phone=NULL;}  

if(isset($_POST['email_acc'])){
    if(!empty($_POST['email_acc'])){
       $clinet_email=$_POST['email_acc']; 
    }       
}
else{$clinet_email=NULL;}  

if(isset($_POST['user_acc'])){
    if(!empty($_POST['user_acc'])){
       $clinet_user=$_POST['user_acc']; 
    }       
}
else{$clinet_user=NULL;}  

if(isset($_POST['password_acc'])){
    if(!empty($_POST['password_acc'])){
       $clinet_password=$_POST['password_acc']; 
    }       
}
else{$clinet_password=NULL;}
    
 $ru= dyw_clinte_update($id_clinte, $clinet_name, $clinet_phone, $clinet_email, $clinet_user, $clinet_password);
 if($ru){
     dyw_db_close();
     echo "تمت العملية بنجاح";
 }else{
      dyw_db_close();
      echo "<span class=\"alert alert-error\">يوجد خطاء في ادخال البيانات</span>";
 }
                 
                 