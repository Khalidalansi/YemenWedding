<?php
require_once('session.php');
require_once('myfunction.php');
require_once('../db/db.php');
require_once('../db/bookingAPI.php');
require_once('../db/hallAPI.php');
$m=1;
if(isset($_POST['hall_id']))
{
	$hall_id=$_POST['hall_id'];
}
if(isset($_POST['b_date1']))
{
	$date1=$_POST['b_date1'];
}
if(isset($_POST['b_date2']))
{
	$date2=$_POST['b_date2'];
}
if(empty($hall_id) || (empty($date1)) || (empty($date2))){
    die('<span class="alert alert-error">يوجد خطاء في ادخال البيانات</span>');
}else{
    $ru= dyw_booking_get_buy_between_date_Hall_name($date1, $date2, $hall_id);  
            if($ru){
               $years=  date_range($date1,$date2);
              $counts=@count($years);
            $booking_date=get_date_myDB($ru);
            ?>              
              
            <table class="table table-striped table-hover" id="mytable">                                         
                  <thead>
                      <th>#</th>     
                      <th>اليوم</th>
                      <th>التاريخ</th>
                  </thead> 
                  <tbody>
                      <?php for($b=0;$b<$counts;$b++){                        
                              if(!in_array($years[$b],$booking_date))
                                   {?>                                                    
                          <tr>
                                <td><?=$m;?></td>                      
                                <td><h4 class="font-new2 advname"><?=getday($years[$b]);?></h4></td>  
                                 <td><h4 class="font-new2 advname"><?= $years[$b];?></h4></h4></td> 
                          </tr>
                      <?php $m=$m+1;}}?>
                  </tbody>
                </table>
                      <?php }else{
              echo '<span class="alert alert-error">خطاء في الاستعلام</span>';   
            }
             
}?>