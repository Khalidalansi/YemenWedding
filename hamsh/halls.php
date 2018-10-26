<?php 
require_once '../db/hallapi.php';
    $ru=  dyw_hall_get(); 
    $m=1;
?>
<section class="row">
    <span class="span12">
    <table class="table table-striped table-hover" id="mytable">                                         
      <thead>
          <th>#</th>     
          <th>اسم القاعة</th>
          <th>عنوانها</th>
          <th>حجمها</th>
          <th>رقم التلفون</th>
          <th>المحافظة</th>
          <th>المنطقة</th>
            <th>google map</th>
              <th>نوعها</th>
                <th>سعرها</th>
                 <th>تفاصيل</th>
                 <th>الحالة</th>
      </thead> 
      <tbody>
   
          <?php if($ru){
            foreach ($ru as $value) {?>
               <tr>
                   <td><?=$m;?> <input type="hidden" id="hall_id" value="<?=$value->hall_id;?>"/></td>                      
                <td><h4 class="font-new2"><?=$value->hall_name;?></h4></td>  
                <td><h4 class="font-new2"><?=$value->hall_address;?></h4></td>                 
                <td><h4 class="font-new2"><?=$value->hall_size;?></h4></td>
                <td><h4 class="font-new2"><?=$value->hall_phone;?></h4></td> 
                 <td><h4 class="font-new2"><?=$value->hall_city;?></h4></td>   
                   <td><h4 class="font-new2"><?=$value->hall_zone;?></h4></td>  
                 <td><h4 class="font-new2"><?=$value->hall_map;?></h4></td>  
                   <td><h4 class="font-new2"><?=$value->hall_type;?></h4></td>
                     <td><h4 class="font-new2"><?=$value->hall_price;?></h4></td>                     
                         <td><h4 class="font-new2"><?=$value->hall_details;?></h4></td> 
                         <td class="enable_hall"><h4 class="font-new2">
                                 <input type="hidden" id="hall_staute" value="<?=$value->hall_staute;?>" />
                             <?php if($value->hall_staute==1)
                                 {echo '<a href="#"><i class="icon-white icon-remove icon-remove-r"></i></a>';        
                             }else{
                                 echo '<a href="#"><i class="icon-white icon-ok icon-remove-v"></i></a>';};?></h4>
                         </td> 
              </tr>
          <?php $m+=1;}}?>
      </tbody>

    </table>
        </span>
   
</section>