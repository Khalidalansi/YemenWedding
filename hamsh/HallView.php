<?php
    $pageTitle="YemenWedding";
    $page="HOME";
    include 'inc/header.php';
    $halls=dyw_hall_get();
      $ucount=@count($halls);
      if($ucount == 0){die('Is not halls');}
     
      for($i=0;$i<$ucount;$i++)
        {
            $hall=$halls[$i];
            $hall_name=$hall->hall_name;
            $path_imag=str_replace('../','',$hall->hall_image);
            $hall_city=$hall->hall_city;
            $hall_address=$hall->hall_address;
           
        }
 ?>
<div class="container">
    <div class="page-header">
        <h4>قاعات الافراح </h4>
        <h3>خيارات أفخم قاعات اليمن بين يديك الأن ، وكل ماعليك هو اختيار القاعة التي تناسبك والضغط على زر عرض لتحصل كل التفاصيل والأسعار ! </h3>
      
            <select class="js-example-basic-single"  data-allow-clear="true" id="select-city">
                    <option value="AL">صنعاء</option>

                      <option value="WY">ذمار</option>
            </select>
            
         
             <select class="js-example-data-array-selected" id="select-zone">

            </select>
          
    </div> 

 <section class="row">
    <div class="thumbnails">
        <?php         foreach ($halls as $result) {?>
        <div class="span3">
            <article class="thumbnail thumb">
                <a href='showhall.php?id=<?=$result->hall_id;?>'> <img src="<?=str_replace('../','',$result->hall_image);?>" alt=""/></a>                           
                <h3><?=$result->hall_name;?></h3>
                <a href="showhall.php?id=<?=$result->hall_id;?>" class="btn">عرض <i class="icon icon-chevron-left"></i> </a>
            </article>
        </div>
         <?php }?>      
    </div>  
     
   <ul class="pager">
      <li class="previous">
        <a href="#">&rarr; السابق</a>
      </li>
      <li><a href="#">۱</a></li>
        <li><a href="#">۲</a></li>
        <li><a href="#">۳</a></li>
        <li><a href="#">۴</a></li>
      <li class="next">
        <a href="#">التالي &larr;</a>
      </li>
    </ul>
</section>
</div> 
<?php include 'inc/footer.php'; ?>