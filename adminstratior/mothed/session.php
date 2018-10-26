<?php
   session_start();
    if(!isset($_SESSION['user_admin']))
    {
        $_SESSION['user_admin']= false;
    }
?>