<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Control panal YemenWedding</title>
        <link href="../style/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../style/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="style/styledmin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-static-top">
                <div class="navbar-inner">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                         <span class="icon-list"></span>
                    </a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li><a href="">الصفحه الرئيسية</a></li>  
                             <li class='<?php if($tab=="account" || $tab=="null"){echo "active";}?>'><a href="?tab=account">العملاء</a></li>
                              <li class='<?php if($tab=="halls"){echo "active";}?>'><a href="?tab=halls">القاعات </a></li>                                
                            
                               <li class='<?php if($tab=="myaccount"){echo "active";}?>'><a href="?tab=myaccount">الحساب</a></li>                              
                        </ul>                          
                    </div>    
                    <div class="pull-left">
                        <a href=""><h4>مرحباً بك  محمد </h4></a>
                         <a href="loginout.php"><h4>خروج</h4></a>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container top">
           
     
    