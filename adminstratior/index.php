 <?php  
 require_once 'mothed/session.php';
 if($_SESSION['user_admin']==false){
     require_once  'login.php';
//      header("Location:login.php");
 }else{
      header('Location:home.php');;
 }   
     ?>