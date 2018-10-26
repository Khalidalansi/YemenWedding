<?php 
require_once('mothed/session.php');
require_once('db/db.php');
require_once('db/HallAPI.php');

$ru=  dyw_hall_get();
if($ru){
    $j=array();
    foreach ($ru as $value) {
        $j[@count($j)]=$value->hall_id;
    }
     $random_keys=array_rand($j,3);
     for($i=0;$i<count($random_keys);$i++){
         $e=  dyw_hall_get_buy_id($j[$random_keys[$i]]);
        
       
         echo $e->hall_name;
         echo "<br>";
         echo $e->hall_id;
         
        
     }
    
//     foreach ($random_keys as $value=>  $key) {
//         echo $key."<br>";
//     }
   
//    echo $j[$random_keys[0]]."<br>";
//    echo $j[$random_keys[1]]."<br>";
//    echo $j[$random_keys[2]];
}