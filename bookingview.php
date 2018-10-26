<?php
require_once('db/db.php');
require_once('mothed/myfunction.php');
require_once('db/HallAPI.php');
require_once('db/bookingAPI.php');
if(isset($_GET['hall_id']))
{
	$hall_id=$_GET['hall_id'];
}
$m=1;
$booking=dyw_booking_get_buy_id_hall($hall_id);
$count=@count($booking);
$booking_date=get_date_myDB($booking);
$years=getyear();
$counts=@count($years);

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
             <td><h4 class="font-new2 advname"><?= $years[$b];?></h4></td> 
      </tr>
                <?php $m=$m+1;}}?>
  </tbody>
  
</table>