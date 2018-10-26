<div class="page-header"><h4>إدراة الحجوزات  </h4> </div>
<?php 
require_once('db/db.php');
require_once('db/ClinteAPI.php');
require_once('db/HallAPI.php');
require_once('db/bookingAPI.php');
 if($_SESSION['user_info']==false)
		 {
			  header('Location:index.php');
		 }
 if(isset($_GET['page'])){
   $page=(int)$_GET['page']; 
}else{
    $page=1;
}
if(isset($_GET['page_count'])){
   $pcount=(int)$_GET['page_count']; 
}else{
    $pcount=1;
}
 $records_at_page=7;   
 $myhall=  dyw_hall_get_buy_clinte_id($_SESSION['user_info']->clinte_id);
 if($myhall){
     $count=@count($myhall);
 }
   $m=$pcount;
$hall=dyw_booking_get_buy_clinet_id($_SESSION['user_info']->clinte_id);

if($hall){
    $records_count=@count($hall);
    $page_count=(int)  ceil($records_count/$records_at_page);
    if(($page>$page_count) || ($page<=0)){
        dyw_db_close();
        die('not font page');
    }
    $start=($page-1)*$records_at_page;
    $end=$records_at_page;


?>

<table class="table table-striped table-hover" id="mytable">                                         
  <thead>
      <th>#</th>
      <th>عنوان الحجز</th>
      <th>تاريخ الحجز</th>
      <th>الفترة</th>
  </thead> 
  <tbody>
      <?php 
      $ru=  dyw_booking_get_buy_clinet_id(intval($_SESSION['user_info']->clinte_id),intval($start), intval($end),TRUE);
    if($ru){
        dyw_db_close();
        foreach ($ru as $value) {?>      
      <tr>
          <td><?= $m;?><input type="hidden" id="bk-id" value="<?=$value->booking_id;?>" /></td>         
          <td><h4 class="font-new2 advname"><?=$value->hall_name;?></h4></td>
          <td><h4 class="font-new2 advname"><?=$value->booking_date;?></h4></td> 
            <td><h4 class="font-new2 advname"><?=$value->booking_period;?></h4></td>   
            <input type="hidden" id="bk-hid" value="<?=$value->hall_id;?>" /></td> 

            <td class="span1 del-booking"><h4 class="font-new pull-right"><a href="#">حذف</a></h4></td>
      </tr>
      <?php  $m= $m+1; $next=$page+1;
      $pcountn=$pcount+7;
        $prev=$page-1; $pcountp=$pcount-7;if($pcountp==7){$pcountp=1;}}}?>
     
  </tbody>
</table>
 <ul class="pager">
   <?php  if($prev>0){echo ' <li class="previous"><a href="settings.php?tab=booking&page='.$prev.'.&page_count='.$pcountp.'">'."&rarr; السابق ".'</a></li>';}?>
       <?php for($i=1;$i<=$page_count;$i++){?>
              <li class="<?php if($page==$i){echo "active";}?>"><a href="settings.php?tab=booking&page=<?=$i;?>&page_count=<?php if($i==1){echo $pcount=$i;}else{ echo $pcount=$i*7;}?>"><?=$i?></a></li>
       <?php }?>
    <?php  if($next<=$page_count){echo ' <li class="next"><a href="settings.php?tab=booking&page='.$next.'.&page_count='.$pcountn.'">'." التالي &larr;".'</a></li>';}?>
    </ul>
<?php }else{dyw_db_close(); echo ('لا يوجد اي حجوزات ');}?>
 <a href="#myModal" role="button" class="btn btn-large pull-left mb-5 mt-5" data-toggle="modal">أضــافــة حجز<i class="icon icon-plus"></i></a>                          
 <!-- Modal -->
<form class="form-horizontal" method="POST" action="" id="addbooking">     
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">أضافه  حجز جديد</h3>
  </div>
  <div class="modal-body">          
       <div class="control-group">
          <label class="control-label" for="bk_name_hall">القاعة</label>
          <div class="controls">                 
           <select class="js-example-basic-single"  data-allow-clear="true" name="hall_id" id="input_hall">
               <?php for($j=0;$j<$count;$j++){?>
                    <option value="<?=$myhall[$j]->hall_id?>"><?=$myhall[$j]->hall_name?></option>                    
               <?php }?>
            </select>
            <span class="help-inline"></span>
          </div>
     </div>
        <div class="control-group">
          <label class="control-label" for="bk_name_hall">التاريخ</label>
          <div class="controls">             
              <input  class="showdate" type="text" name="bk_date" id="input_date" />                  
                    </span>                        
            <span class="help-inline"></span>
          </div>
     </div>  
          <div class="control-group">
          <label class="control-label" for="bk_name_hall">الفترة</label>
          <div class="controls">                 
           <select class="js-example-basic-single"  data-allow-clear="true" name="period_hall" id="input_period">
                    <option value="اليوم كاملاً">اليوم كاملاً</option>
                    <option value="صباحاً">صباحاً </option>
                    <option value="ليلاً">ليلاً</option>                    
            </select>
            <span class="help-inline"></span>
          </div>
     </div>   
    <span id="message"></span>
</div>    
   <div class="modal-footer">
       <button class="btn" data-dismiss="modal" aria-hidden="true">إغلاق</button>
    <button type="submit" class="btn btn-primary">حفظ</button>
  </div>
</div>
 </form> 
 