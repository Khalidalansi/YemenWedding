<?php
require_once('db/db.php');
require_once('db/HallAPI.php');
require_once('db/pictureAPI.php');
require_once('db/bookingAPI.php');
require_once('db/db.php');
require_once('db/HallAPI.php');
require_once('db/pictureAPI.php');
require_once('db/bookingAPI.php');
if(isset($_GET['info']))
{	
	$array = explode('||', $_GET['info']);
	$count=@count($array);
	$a=array();
	
	/*for($i=0;$i<$count;$i++)
	{
		if(!(empty($array[$i])))
		{
		$r=dyw_hall_get_buy_id_search($array[$i]);
		
		}
	}*/
}

?>
<?php 
for($i=0;$i<$count;$i++)
{
if(!(empty($array[$i])))
{
if(!in_array($array[$i],$a))
{			
$r=dyw_hall_get_buy_id($array[$i]);
$a[@count($a)]=$array[$i];
if($r)
{
    $hall_id=$r->hall_id;;
$hall_name=$r->hall_name;
$path_imag=str_replace('../','',$r->hall_image);
$hall_city=$r->hall_city;
$hall_address=$r->hall_address;
?>
 <div class="thumbnails">
        <div class="span3">
            <article class="thumbnail thumb">
                <a href='showhall.php?id=<?=$hall_id;?>'> <img src="<?=str_replace('../','',$path_imag);?>" alt=""/></a>                           
                <h3><?=$hall_name;?></h3>
                <a href="showhall.php?id=<?=$hall_id;?>" class="btn">عرض <i class="icon icon-chevron-left"></i> </a>
            </article>
        </div>
<?php }}}}
         $next=$page+1;
        $prev=$page-1;        
        ?>      
    </div>  
     
<ul class="pager">
   <?php  if($prev>0){echo ' <li class="previous"><a href="hallview.php?page='.$prev.'">'."&rarr; السابق ".'</a></li>';}?>
       <?php for($i=1;$i<=$page_count;$i++){?>
              <li class="<?php if($page==$i){echo "active";}?>"><a href="hallview.php?page=<?=$i;?>"><?=$i?></a></li>
       <?php }?>
    <?php  if($next<=$page_count){echo ' <li class="next"><a href="hallview.php?page='.$next.'">'." التالي &larr;".'</a></li>';}?>
    </ul>
