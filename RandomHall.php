
<?php 
require_once './db/db.php';
require_once './db/HallAPI.php';
$ru= dyw_hall_get_staute();
if($ru){
    $j=array();
     $count=count($ru);
    foreach ($ru as $value) {
        $j[@count($j)]=$value->hall_id;
    }
     $random_keys=array_rand($j,3);
     
?>
<div class="container mb-20">
    <section class="row">
    <div class="page-header">
        <h1>قاعات الأفراح</h1>
    </div>
    </section>
    <section class="row">
    <div class="thumbnails">
        <?php for($i=0;$i<count($random_keys);$i++){            
        $e=  dyw_hall_get_buy_id($j[$random_keys[$i]]);
       
        ?>
         <div class="span3">
            <article class="thumbnail thumb">
                <a href="showhall.php?id=<?=$e->hall_id;?>"> <img src="<?=str_replace('../','',$e->hall_image);?>" alt="image"/></a>                           
                <h3><?=$e->hall_name;?></h3>
                <a href="showhall.php?id=<?=$e->hall_id;?>" class="btn btn-link">عرض <i class="icon icon-chevron-left"></i> </a>
            </article>
        </div>
        
<?php }}else die('not found hall');?>
        <div class="span3">
            <article class="thumbnail thumb">
                <a href="hallview.php">
                    <div class="nu">
                        <div class="cont-hall">
                            <h4>قاعات الافراح</h4>
                            <span class="mt-10 text-center"><?=$count;?> </span>
                            <br>
                            <div class="btn- btn-info btn-large btn-null mt-10 text-center">عرض الكل<i class="icon-white icon-chevron-left"></i></div>
                        </div>
                    </div>
                </a>                           

            </article>
        </div>
    </div>        
</section>
</div>