<?php
   require_once '../db/ClinteAPI.php';
    $ru= dyw_clinte_get(); 
    $m=1;
?>
<section class="row">
    <span class="12 mt-10">
      <table class="table  table-hover" id="mytable">                                         
      <thead>
          <th>#</th>     
          <th>اسم العميل</th>
          <th>رقم التلفون</th>
          <th>الايميل</th>
          <th>الحاله </th>
      </thead> 
      <tbody>
          <?php if($ru){
            foreach ($ru as $value) {?>
               <tr>
                
                <td><?=$m;?><input type="hidden" id="clinet_id" value="<?=$value->clinte_id;?>"/></td>                      
                <td><h4 class="font-new2"><?=$value->clinte_name;?></h4></td>  
                <td><h4 class="font-new2"><?=$value->clinte_phone;?></h4></td>                 
                <td><h4 class="font-new2"><?=$value->clinte_email;?></h4></td>
                <td class="enable_clinet"><h4 class="font-new2">
                         <input type="hidden" id="clinet_staute" value="<?=$value->clinte_staute;?>" />
                        <?php if($value->clinte_staute==1){
                            echo '<a href="#"><i class="icon-white icon-remove icon-remove-r"></i></a>';
                        }else{
                             echo '<a href="#"><i class="icon-white icon-ok icon-remove-v"></i></a>';
                        }?>
                    </h4>
                </td> 
                 
              </tr>
              
          <?php $m+=1;}}?>
          
      </tbody>
    </table>
     </span>
   
</section>