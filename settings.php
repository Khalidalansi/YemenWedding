<?php
require_once './mothed/session.php';
    $pageTitle="YemenWedding";
    $page="HOME";
    if($_SESSION['user_info']==false){       
			 header('Location:index.php');                          
		 }
    include 'inc/header.php';
    
?>
<?php 
    if (isset($_GET['tab']))
        {
            $tab=$_GET['tab'];         
        }
        else{
            $tab="null";
        }
if(isset($_GET['page'])){
$p=(int)$_GET['page']; 
}else{
    $p=1;
}
if(isset($_GET['page_count'])){
   $pcount=(int)$_GET['page_count']; 
}else{
    $pcount=1;
}
       
?>
  <div class="row">
        <nav class="span3  mt-5  sp-l" id="myScrollspy">           
          <ul class="nav nav-pills nav-stacked">
              <li class='<?php if($tab=="account" || $tab=="null"){echo "active";}?>'><a href="settings.php?tab=account"><h4 class="font-new">إعدادات الحساب</h4></a></li>
              <li class='<?php if($tab=="halls"){echo "active";}?>'><a href="settings.php?tab=halls"><h4 class="font-new">إدارة قاعات الافراح</h4></a></li>
               <li class='<?php if($tab=="booking"){echo "active";}?>'><a href="settings.php?tab=booking"><h4 class="font-new">إدرة الحجوزات</h4></a></li>
              
            
          </ul>
        </nav>     
        <div class="span8 con">
            <?php  
            
            if($tab=="account" || $tab=="null"){include 'settings/account.php';}
             elseif($tab=='halls'){ include 'settings/halls.php';}
             elseif($tab=='booking'){
                 $page=$p;
                 $page_count=$pcount;
                 include 'settings/booking.php';
                 
             }
             ?>
          
         
        </div>

 </div>


<?php include 'inc/footer.php'; ?>
