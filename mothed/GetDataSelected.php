<?php
  require_once 'myfunction.php';
if(isset($_POST['city'])){
    $city= strip_tags(trim($_POST['city']));?>
    <?php if($city!=NULL){
                       foreach ($Allcity[$city] as $value=>$key) {
                   ?>
                     <option value="<?=$key;?>"><?=$value;?></option>                   
    <?php }}}?>