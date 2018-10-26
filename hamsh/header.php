<?php 
require_once('mothed/session.php');
require_once('db/db.php');
require_once('db/HallAPI.php');
require_once('db/pictureAPI.php');

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title><?= $pageTitle;?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link href="style/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="style/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" media="screen"/>
     <link href="style/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="style/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
        <link href="style/slidshow/slidshow.css" rel="stylesheet" type="text/css"/><!--link slidshow-->
        <link href="style/style.css" rel="stylesheet" type="text/css"/>           
        <link href="style/font.css" rel="stylesheet" type="text/css"/>  
        

    </head>
    <body>
        <header>
            <nav class="navbar navbar-static-top">
                <div class="navbar-inner">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                         <span class="icon-list"></span>
                    </a>
<!--                    <h3 class="pull-left">
                        <a href="index.html">
                            <img src="image/logo.png" >
                        </a>
                    </h3>-->
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="<?php if($page=='HOME'){echo'active';}?>"><a href="index.php">الصفحه الرئيسية</a></li>
                            <li class='dropdown'><a  href='#' class='dropdown-toggle' data-toggle='dropdown'>قاعات الافراح <span class='caret'></span></a>
                                    <ul class='dropdown-menu'>
                                            <li><a href='#'>قاعات اجتماعات</a></li>
                                            <li><a href='#'>قاعات رجالية</a></li>
                                            <li><a href='#'>قاعات نسائية </a></li>
                                    </ul>                                                
                            </li>
                         
                            <li><a href="Aboutus.php">من نحن </a></li>                            
                        </ul>                          
                    </div>   
                    <div class="pull-left">       
                        <section class="row tip">
                            <div class="span2 offset1">
                                 <?php                              
                                     if($_SESSION['user_info']==false)
                                     {
                                        echo "<a class=\"btn-login\" href=\"#rules\" data-toggle=\"modal\">تسجيل دخول الشركات </a>";
                                     }else
                                     {
                                        echo "<div class='dropdown btn-login'>
                                                <a  href='#' class='dropdown-toggle' data-toggle='dropdown'>الأعدادت <span class='caret'></span></a>
                                                <ul class='dropdown-menu'>
                                                        <li><a href='settings.php?tab=account'>إعدادات الحساب</a></li>
                                                         <li><a href='settings.php?tab=halls'> إدارة قاعات الافراح</a></li>
                                                           <li><a href='settings.php?tab=booking'>إدرة الحجوزات</a></li>
                                                        <li><a href='mothed/logout.php'>تسجيل الخروج</a></li>
                                                </ul>
                                                </div>";                                            
                                     }?>
                            </div>
                            <div id="rules" class="modal hide fade" aria-hidden="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                    <h4 id="loram">تسجيل الدخول</h4>                        
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="" id="login">
                                        <div class="row">
                                            <label class="span1">الاسم </label>
                                            <input class="span4" type="text" name="name" placeholder="username" id="username">
                                        </div>
                                        <div class="row">
                                            <label class="span1">كلمة المرور</label>
                                            <input class="span4" type="password" name="password" placeholder="password" id="password">
                                        </div>
                                        <div class="row pull-left">
<!--                                            <div class="span3"></div>-->
                                                <button class="span2 btn btn-info" style="margin-left: 90px;" type="submit">دخول<i class="icon-white icon-ok-sign"></i></button>
<!--                                            <div class="span2"></div>-->
                                        </div>
                                        <div class="row">
                                            <label class="span5"><a href="#">نسيت كلمة المرور</a></label>
                                        </div>
                                         <div class="row">
                                             <label class="span5"><a href="#" id="reg_new">سجل الان!</a></label>
                                        </div>
                                    </form>                                     
                                    <div class="row">
                                        <label class="span5 bk-massgs" style="display:none"></label>
                                    </div>
                                </div>
                                <div class="modal-footer">
<!--                                    <a href="#" class="btn btn-info" data-dismiss="modal" aria-hidden="true">اغلاق</a>-->
                                </div>
                            </div>
                        </section><!--login-->
                    </div>
                                     
                </div>
            </nav>
        </header>
         <div class="container top">
               