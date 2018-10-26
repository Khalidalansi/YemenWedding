<?php 
require_once('../mothed/session.php');
require_once('../db/db.php');
require_once('../db/HallAPI.php');
$page;
$records_at_page=2;

$records_count;
$page_count=(int)  ceil($records_count/$records_at_page);
$start=($page-1)*$records_at_page;
$end=$records_at_page;

function getdata($start,$end)
    {
        if($records_count != 0){
            
        }
    }
?>