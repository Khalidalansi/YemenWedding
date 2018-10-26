<?php
require_once('db/db.php');
require_once('mothed/myfunction.php');
require_once('db/HallAPI.php');
require_once('db/bookingAPI.php');

if(isset($_GET['page'])){
   $page=(int)$_GET['page']; 
}else{
    $page=1;
}

$records_at_page=7;
$q=  dyw_booking_get_buy_clinet_id(7);
if($q){
    $records_count=@count($q);
    $page_count=(int)  ceil($records_count/$records_at_page);
    if(($page>$page_count) || ($page<=0)){
        dyw_db_close();
        die('not font page');
    }
    $start=($page-1)*$records_at_page;
    $end=$records_at_page;

    $ru=  dyw_booking_get_buy_clinet_id(7,$start, $end,TRUE);
    if($ru){
        foreach ($ru as $value) {
            echo $value->booking_date."<br>";
        }
        $next=$page+1;
        $prev=$page-1;
        
       
        if($prev>0){
            echo '<a href="data.php?page='.$prev.'">'."prev ".'</a>';
        }
         if(($next<=$page_count) && ($prev>0)){
            echo " ";
        }
        
        for($i=1;$i<=$page_count;$i++){
            if($page==$i){
                echo $page;
            }
            else{
                echo '<a href="data.php?page='.$i.'">'.$i.'</a>';
            }
            if($i!=$page_count){
                echo " - ";
            }
        }
        
        if($next<=$page_count){
              echo '<a href="data.php?page='.$next.'">'." next".'</a>';
        }

    }
    dyw_db_close();
}