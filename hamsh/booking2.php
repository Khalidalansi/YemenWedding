<?php 
require_once('db/db.php');
require_once('db/ClinteAPI.php');
require_once('db/HallAPI.php');
require_once('db/bookingAPI.php');
 if($_SESSION['user_info']==false)
		 {
			  header('Location:index.php');
		 }
$hall=dyw_hall_get_buy_clinte_id($_SESSION['user_info']->clinte_id);
$count=@count($hall);
$m=1;
?>
<div class="page-header"><h4>إدراة الحجوزات  </h4> </div>
<table class="table table-striped table-hover" id="mytable">                                         
  <thead>
      <th>#</th>
      <th>عنوان الحجز</th>
      <th>تاريخ الحجز</th>
      <th>الفترة</th>
  </thead> 
  <tbody>
      <?php for($i=0;$i<$count;$i++){
                  $booking=dyw_booking_get_buy_id_hall($hall[$i]->hall_id);
                $cou=@count($booking);
                 for($p=0;$p<$cou;$p++){
            ?>      
      <tr>
            <td><?=$m;?></td>         
          <td><h4 class="font-new2 advname"><?=$hall[$i]->hall_name?></h4></td>
          <td><h4 class="font-new2 advname"><?=$booking[$p]->booking_date;?></h4></td> 
            <td><h4 class="font-new2 advname"><?=$booking[$p]->booking_period;?></h4></td>   
           <td class="span1"><h4 class="font-new pull-right"><a>تعديل</a></h4>
          <td class="span1"><h4 class="font-new pull-right"><a >حذف</a></h4></td>
      </tr>
      <?php $m=$m+1; }}?>
  </tbody>
 
</table>
 <ul class="pager">
   <li class="previous"><a href="">&rarr; السابق </a></li>
     
              <li class="active"><a href="">1</a></li>
              <li class="active"><a href="hallview.php?page=">2</a></li>
     
    <li class="next"><a href=""> التالي &larr;</a></li>
    </ul>
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
                    <option value="<?=$hall[$j]->hall_id?>"><?=$hall[$j]->hall_name?></option>                    
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
 