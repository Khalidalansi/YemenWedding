<?php
    $pageTitle="YemenWedding";
    $page="HOME";
    include 'inc/header.php';
    require_once 'mothed/myfunction.php';
    
if(isset($_GET['page'])){
$page=(int)$_GET['page']; 
}else{
    $page=1;
}
$records_at_page=8;
//$e=  dyw_hall_get_staute();
//if($e)
//{
//print_r($e);
//}
$q= dyw_hall_get_staute();
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
  if(isset($_GET['city'])){
    $city=strip_tags(trim($_GET['city']));
    if($city=='all'){
        $city=NULL;
    }
    
}else{$city=NULL;}
if(isset($_GET['hall_name']))
{
	$hall_name=strip_tags(trim($_GET['hall_name']));
}else{$hall_name=NULL;}
if(isset($_GET['zone']))
{
	$hall_zone=strip_tags(trim($_GET['zone']));
    if($hall_zone=='ALL'){
        $hall_zone=NULL;
    }
}else{$hall_zone=NULL;}      
 ?>
<div class="container">
    <div class="page-header">
        <h4>قاعات الافراح </h4>
        <h3>خيارات أفخم قاعات اليمن بين يديك الأن ، وكل ماعليك هو اختيار القاعة التي تناسبك والضغط على زر عرض لتحصل كل التفاصيل والأسعار ! </h3>
        <div class="row">
               <div class="span3">
                <select class="js-example-basic-single city"  data-allow-clear="true" id="select-city" >
                   <option value="all">كل المحافظات</option>
                        <option value="sana" <?php if($city=='sana'){ echo "selected=\"selected\"";}?>>صنعاء</option>
                          <option value="adan" <?php if($city=='adan'){ echo "selected=\"selected\"";}?>>عدن</option>
                </select>  
               </div>
            <div class="span1"><?php echo "<br>";?></div>
               <div class="span3">                     
                 <select class='js-example-data-array-selected zone' id='select-zone'>
                       <option value="ALL">جميع المناطق</option> 
                     <?php if($city!=NULL){
                       foreach ($Allcity[$city] as $value=>$key) {
                       if($hall_zone==$key){
                           $selcet="selected=\"selected\"";
                       }else{$selcet=NULL;}                           
                   ?>                       
                     <option value="<?=$key;?>" <?=$selcet?> ><?=$value;?></option>                   
                     <?php }}?>
                    </select>                          
               </div>        
            
        </div>
    </div> 

 <section class="row">
    <?php include 'Searchhall.php'; ?>
</section>
</div> 
<?php include 'inc/footer.php'; ?>