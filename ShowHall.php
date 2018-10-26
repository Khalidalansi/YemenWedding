<?php
    $pageTitle="YemenWedding";
    $page="HOME";
    include 'inc/header.php';
    require_once('db/advantages.php');
    require_once('mothed/myfunction.php');
    
  
   if(isset($_GET['id']))
	{
		$id=  strip_tags(trim(intval($_GET['id'])));
	}
        else{
             header('Location:index.php');
        }
        if(!empty($id))
         {
              $s=array();
        
            $halls=dyw_hall_get_buy_id($id);
            if(!$halls)
                {
                    die('page Error');
                }
            $s[@count($s)]=$halls->hall_image;
            $pictures=dyw_picture_get_buy_id_hall($id);
            $ucountPic=@count($pictures);
            $adv= dyw_adv_get_buy_id_hall($id);          
            $ucountAdv=@count($adv);
         }
          
            for($p=0;$p<$ucountPic;$p++)
                {
                    $pictuer=$pictures[$p]->picture_path;
                    $s[@count($s)]=$pictuer;
                }
                
       
//          foreach ($a as $key) 
//              {
//                  echo $key."<br>";
//              }
   

?>
<section class="container page-show">
    <div class="page-header">
        <h4><?=$halls->hall_name;?></h4>
    </div>
<div class='row'>
    <div class="span6">
          <h3 class="page-header color-b">تفاصيل الخدمة </h3>  
           <div class="row">
              <ul class="inline">
                  <li class="span2"><label>المحافظة</label><?php echo Get_city_ar($halls->hall_city); ?></li>
                  <li class="span2"><label>المنطقة /المديرية</label><?php echo Get_zone_ar($halls->hall_city, $halls->hall_zone); ?></li>
                  <li class="span2"><label>العنوان </label> <?=$halls->hall_address; ?></li>
                  <li class="span2"><label>الجوال</label><?=$halls->hall_phone;?></li>
                  <li class="span2"><label>السعة</label><?=$halls->hall_size;?></li>
                  <li class="span2"><label>فئة القاعة </label><?=$halls->hall_type; ?>  </li>
                  <li class="span2"><label>الخريطة</label><a href="<?=$halls->hall_map;?>">إضغط هنا</a></li>
                  
              </ul>
          </div>         
              <h3   class="page-header color-b">الملحقات والمزياء</h3>
               <div class="row">
                  <ul class="inline">
                      <?php
                      for($ad=0;$ad<$ucountAdv;$ad++){ 
                          $advname=$adv[$ad]->adv_name;
                          $advother=$adv[$ad]->adv_other;?>
                               <li class="span2"><label><?=$advname;?></label><?=$advother;?></li>
                        <?php }?>                      
                  </ul>
               </div>                
              <h3   class="page-header color-b">مزيد من المعلومات</h3>
              <label><?=$halls->hall_details;?></label>
              <a href="#myModal" role="button" class="btn btn-info mb-5 mt-5" data-toggle="modal"> الايام غير المحجوزه<i class="icon icon-list-alt"></i></a>
            
    </div>
    <div class="span6">      
        <div id="photo_container"> 
              <ul id="thumbnail">
                  <?php        foreach ($s as $slide) {?>
                  <li><a href="<?php echo  str_replace('../','',$slide); ?>"><img src="<?php echo  str_replace('../','',$slide); ?>" alt="photo1"></a></li>
                <?php }?>                     
              </ul>
              <div id="main_photo">
                <div class="img_nav">
                  <btn id="next"></btn>
                  <btn id="prev"></btn>
                </div>
                <div class="ctr_btn">
                  <btn id="play_btn">Play</btn>
                  <btn id="stop_btn">Stop</btn>
                </div>
          </div>  
        </div>
    </div>
    
</div>
</section>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">الايام الخالية للحجز</h3>
  </div>
  <div class="modal-body">          
      <form class="form-search" id="search-booking" method="post" action="">
             <input type="hidden" value=<?=$halls->hall_id; ?> id="id" style="display: none;" name="hall_id" />
                  <input type="text" class="input-medium search-query showdate" name="b_date1">
                  <span>الى</span>
                  <input type="text" class="input-medium search-query showdate" name="b_date2">
                  <button type="submit" class="btn">بحث</button>
            </form>
    
      <div class="row">
          <div class="span5" id="massge">
                           <?php
                    $hall_id=$halls->hall_id;
                    include 'bookingview.php';
                    ?>
              </div>
      </div>
      
   
    </div>    
   <div class="modal-footer">
       
  </div>
</div>
          
<?php include 'inc/footer.php'; ?>
