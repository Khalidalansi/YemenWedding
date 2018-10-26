<?php

if($_SESSION['user_info']==false)
		 {
			 header('Location:../index.php');
                         exit();
		 }
require_once('db/db.php');
require_once('db/ClinteAPI.php');
require_once('db/HallAPI.php');
require_once('db/pictureAPI.php');
  require_once 'mothed/myfunction.php';

 
$hall=dyw_hall_get_buy_clinte_id($_SESSION['user_info']->clinte_id);
$count=@count($hall);
?>
<div class="page-header">
    <h4>إدراة القاعات  </h4> 
    <h4 class="font-new">من هناء يمكنك حذف او تعديل او اضافة قاعة </h4>
</div>
<div id="con-media">
    <?php
for($i=0;$i<$count;$i++){
$halls=$hall[$i];?>
<div class="media media-hall mb-5">
      <a class="pull-right" href="#">
          <img class="media-object" src="<?=str_replace('../','',$halls->hall_image); ?>"  data-src="style/js/holder.js/64x64">
      </a>
      <div class="media-body">
        <h4 class="media-heading mt-5"><?=$halls->hall_name ?></h4>
      <h4 class="font-new"><?=$halls->hall_price ?>ريال  </h4>      
      <div class="btns">
        
        <a href="#" onclick="getajax('hall/updatahall.php?hall_id=<?=$halls->hall_id ?>','#con-media');" class="btn btn-info">تعديل <i class="icon icon-pencil"></i> </a>
        <a href="#" onclick="getajax('mothed/DeleteHall.php?hall_id=<?=$halls->hall_id ?>','#con-media');"class="btn btn-danger">حذف <i class="icon icon-trash"></i> </a> 
         <a href="showhall.php?id=<?=$halls->hall_id;?>" class="btn">عرض <i class="icon icon-chevron-left"></i> </a>
      </div>                   
      </div>
    </div>
    <?php }?>
<a href="#" class="btn btn-large pull-left mb-5 mt-5" onclick="getajax('hall/addhall.php','#con-media');" >أضــافــة قـاعـة <i class="icon icon-plus"></i></a>
</div>


