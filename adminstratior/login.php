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
        <title>YemenWedding panal</title>
        <link href="../style/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../style/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="style/styledmin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="body_login">
        <header>
            <nav class="navbar navbar-static-top">
                  <div class="navbar-inner">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                         <span class="icon-list"></span>
                    </a>
                    <div class="nav-collapse">
                        
                                         
                    </div>                                                       
                </div>
            </nav>
        </header>
        <div class="container top">
            <div class="row">
            <div class="span3"></div>
            <div class="span6 login_admin">
                <div class="page-header"><h3 class="text-center">تسجيل دخول لوحة التحكم </h3></div>
                <form method="POST" action="mothed/checkLogin.php" id="login_admin" >
                    <div class="row">
                        <label class="span1">الاسم </label>
                        <input class="span4" type="text" name="name" placeholder="username" id="username">
                    </div>
                    <div class="row">
                        <label class="span1">كلمة المرور</label>
                        <input class="span4" type="password" name="password" placeholder="password" id="password">
                    </div>
                     <div class="row">
                        <label class="span5"><a href="#">نسيت كلمة المرور</a></label>
                    </div>
                    <div class="row mb-5"> 
            <!--                                            <div class="span3"></div>-->
                            <button class="span2 btn btn-info btn-large" style="margin-right: 300px;" type="submit">دخول<i class="icon-white icon-ok-sign"></i></button>
            <!--                                            <div class="span2"></div>-->
                    </div>
                   
                </form> 
            </div>
            <div class="span3"></div>
        </div>
            
            
        </div>
        <script src="../style/jquery-1.12.1.min.js" type="text/javascript"></script>
<script src="../style/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
