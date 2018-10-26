
<div class="thumbnails">
        <?php   
        $ru= dyw_hall_get_buy_limt($start, $end,$hall_name,$hall_zone,$city);
        if($ru){
        foreach ($ru as $result) {          
        ?>
        <div class="span3">
            <article class="thumbnail thumb">
                <a href='showhall.php?id=<?=$result->hall_id;?>'> <img src="<?=str_replace('../','',$result->hall_image);?>" alt=""/></a>                           
                <h3><?=$result->hall_name;?></h3>
                <a href="showhall.php?id=<?=$result->hall_id;?>" class="btn">عرض <i class="icon icon-chevron-left"></i> </a>
            </article>
        </div>
        <?php }}
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