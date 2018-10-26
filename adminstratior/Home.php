<?php
include './mothed/session.php';
if($_SESSION['user_admin']==false){
      header("Location:index.php");
 }
 if (isset($_GET['tab']))
        {
            $tab=$_GET['tab'];         
        }
        else{
            $tab="null";
        }
    include 'inc/header.php';
    require_once '../db/db.php';     
?>
<?php  
if($tab=="account" || $tab=="null") {
    include 'page/account.php';
    }elseif($tab=='halls'){ 
                 include 'page/halls.php';}
             elseif($tab='myaccount')
        {
                 include 'page/myaccount.php';}
  ?>

<?php include 'inc/footer.php'; ?>