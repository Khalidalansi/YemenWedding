<?php
require_once('mothed/session.php');
 if($_SESSION['user_admin']!=false)
   $_SESSION['user_admin']= false;
   header('Location:index.php');
?>