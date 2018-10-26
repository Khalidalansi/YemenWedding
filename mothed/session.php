<?php
   session_start();
    if(!isset($_SESSION['user_info']))
    {
        $_SESSION['user_info']= false;
    }
?>