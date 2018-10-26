<?php
require_once('session.php');
 if($_SESSION['user_info']!=false)
   $_SESSION['user_info']= false;
   header('Location:../index.php');
?>