<?php
    $pageTitle="YemenWedding";
    $page="HOME";
    include 'inc/header.php';
    
if(isset($_GET['page'])){
$page=(int)$_GET['page']; 
}else{
    $page=1;
}
$records_at_page=3;
$q=  dyw_hall_get();
  if($q){
    $records_count=@count($q);
    $page_count=(int)  ceil($records_count/$records_at_page);
    if(($page>$page_count) || ($page<=0)){
        dyw_db_close();
        die('not font page');
    }
    $start=($page-1)*$records_at_page;
    $end=$records_at_page;
  }
        
 ?>
<div class="container">
    <div class="page-header">
        <h4>قاعات الافراح </h4>
        <h3>خيارات أفخم قاعات اليمن بين يديك الأن ، وكل ماعليك هو اختيار القاعة التي تناسبك والضغط على زر عرض لتحصل كل التفاصيل والأسعار ! </h3>
        <div class="row">
               <div class="span3">
                <select class="js-example-basic-single"  data-allow-clear="true" id="select-city">
                    <option value="AL">جميع المحافظات</option>
                        <option value="AL">صنعاء</option>

                          <option value="WY">ذمار</option>
                </select>  
               </div>
               <div class="span3">
                     <select class="js-example-data-array-selected" id="select-zone" onchange="javascript:location.href = 'hallview.php?view='+this.value">

                    </select>                          
               </div>
            <div class="span3">
         <form class="form-search" id="search-hall-name" method="post" action="">            
             <input type="text" class="input-medium search-query" name="hall_name" placeholder="بحث بالاسم">               
                  <button type="submit" class="btn">بحث</button>
            </form>
            </div>
        </div>
    </div> 

 <section class="row">
    <div class="thumbnails">
        <?php   
        $ru=  dyw_hall_get_buy_limt($start, $end);
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
</section>
</div> 
<?php include 'inc/footer.php'; ?>