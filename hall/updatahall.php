<?php 
require_once('../db/hallandpic.php');
 require_once('../db/advantages.php');

if(isset($_GET['hall_id']))
	{
		$id=$_GET['hall_id'];
	}
 else {
     die('bad Access');
 }
$h=get_hall_pictures($id);
$ucountPic=@count($h);
$r=$h[0];
$adv= dyw_adv_get_buy_id_hall($id);          
            $ucountAdv=@count($adv);
            $type=$r->hall_type;
?>
            <table class="table table-striped table-hover">
                 <tbody>
                     <tr>
                 <input type="hidden" value=<?=$r->hall_id; ?> id="id" style="display: none;" />
                         <td class="span2"><h4 class="font-new2">اسم القاعة</h4></td>
                         <td class="span5 name-updata"><h4 class="font-new3"><?=$r->hall_name;?></h4>
                             <input type="text" id="name_hall" placeholder="اسم القاعة" name="name_hall" class="input-xlarge" style="display: none;">
                             <span class="alert" style="display: none;"></span>
                         </td>
                          <td class="span1 btn-updata"><h4 class="font-new pull-right"><a>تعديل</a></h4></td>
                     </tr>
                     <tr>
                         <td class="span2"><h4 class="font-new2">المحافظة</h4></td>
                         <td class="span5 name-updata"><h4 class="font-new3"><?=$r->hall_city;?></h4></td>
                         <td class="span1 btn-updata"><h4 class="font-new pull-right"><a>تعديل</a></h4></td>
                          <span class="alert" style="display: none;"></span>
                     </tr>
                     <tr>
                         <td class="span2"><h4 class="font-new2">المنطقة</h4></td>
                         <td class="span5 name-updata"><h4 class="font-new3"><?=$r->hall_zone?></h4>
                          <input type="text" id="zone_hall" placeholder="المنطقة"  name="zone_hall" class="input-xlarge" style="display: none;">
                          <span class="alert" style="display: none;"></span>
                         </td>
                          <td class="span1 btn-updata"><h4 class="font-new pull-right"><a >تعديل</a></h4></td>
                     </tr>
                     <tr>
                         <td class="span2"><h4 class="font-new2">عنوانها</h4></td>
                         <td class="span5 name-updata"><h4 class="font-new3"><?=$r->hall_address?></h4>
                          <input type="text" id="address_hall" placeholder="عنوانها" name="address_hall" class="input-xlarge" style="display: none;">
                           <span class="alert" style="display: none;"></span>
                         </td>
                          <td class="span1 btn-updata"><h4 class="font-new pull-right"><a>تعديل</a></h4></td>
                     </tr>
                     <tr>
                         <td class="span2"><h4 class="font-new2">رقم التلفون</h4></td>
                         <td class="span5 name-updata"><h4 class="font-new3"><?= $r->hall_phone?></h4>
                             <input type="text" id="phone_hall" placeholder="0x-xxxxxx"  name="phone_hall" class="input-xlarge" style="display: none;">
                          <span class="alert" style="display: none;"></span>
                         </td>
                          <td class="span1 btn-updata"><h4 class="font-new pull-right"><a>تعديل</a></h4></td>
                     </tr>
                      <tr>
                         <td class="span2"><h4 class="font-new2">الفئه</h4></td>
                         <td class="span5 name-updata"><h4 class="font-new3">
                             <label class="radio">                                 
                                 <input type="radio" name="type_hall" id="optionsRadios1" value="عامه" <?php if($type=='عامه') echo "checked";?> disabled >
                                  عامه
                                </label>
                                <label class="radio">
                                  <input type="radio" name="type_hall" id="optionsRadios2" value="رجالي" <?php if($type=='رجالي') echo "checked";?> disabled >
                                  رجالي
                                </label> 
                             <label class="radio">
                                  <input type="radio" name="type_hall" id="optionsRadios3" value="نسائي" <?php if($type=='نسائي') echo "checked";?> disabled >
                                  نسائي
                                </label>
                                  <span class="alert" style="display: none;"></span>
                         </td>
                          <td class="span1 btn-updata-radio"><h4 class="font-new pull-right"><a>تعديل</a></h4></td>
                     </tr>
                     <tr>
                         <td class="span2"><h4 class="font-new2">موقعها Google map</h4></td>
                         <td class="span5 name-updata"><h4 class="font-new3"><?=$r->hall_map?></h4>
                             <input type="text" id="map_hall" placeholder="link"  name="map_hall" class="input-xlarge" style="display: none;">
                              <span class="alert" style="display: none;"></span>
                         </td>
                          <td class="span1 btn-updata"><h4 class="font-new pull-right"><a>تعديل</a></h4></td>
                     </tr>
                     <tr>
                         <td class="span2"><h4 class="font-new2">سعتها</h4></td>
                         <td class="span5 name-updata"><h4 class="font-new3"><?=$r->hall_size?></h4>
                                 <input type="text" id="size_hall" placeholder="99999"  name="size_hall" class="input-xlarge" style="display: none;">
                                 <span class="alert" style="display: none;"></span>
                         </td>
                          <td class="span1 btn-updata"><h4 class="font-new pull-right"><a>تعديل</a></h4></td>
                     </tr>
                      <tr>
                         <td class="span2"><h4 class="font-new2">سعرها</h4></td>
                         <td class="span5 name-updata"><h4 class="font-new3"><?=$r->hall_price?></h4>
                                 <input type="text" id="price_hall" placeholder="سعرها"  name="price_hall" class="input-large" style="display: none;"> 
                              <span class="alert" style="display: none;"></span>
                         </td>
                           <td class="span1 btn-updata"><h4 class="font-new pull-right"><a>تعديل</a></h4></td>
                     </tr>
                     <tr>
                         <td class="span2"><h4 class="font-new2">المزاياء</h4></td>
                         <td class="span5"><h4 class="font-new3">                            
                              <div  id="adv">
                                  
                                  <div>
                                      <table class="table table-striped table-hover" id="mytable">                                         
                                          <thead>
                                              <th>#</th>
                                              <th>اسم المزايا</th>
                                              <th>التفاصيل</th>
                                          </thead> 
                                          <tbody>
                                              <?php 
                                                  for($ad=0;$ad<$ucountAdv;$ad++){ 
                                                  $advname=$adv[$ad]->adv_name;
                                                  $advid=$adv[$ad]->adv_id;
                                                  $advother=$adv[$ad]->adv_other;?>
                                              <tr>
                                                  <input type="hidden" value=<?=$advid; ?> id="advid" style="display: none;" />
                                                  <td><h4 class="font-new2"><?=$ad+1?></h4></td>
                                                  <td><h4 class="font-new2 advname"><?=$advname;?></h4>
                                                   <input type="text" id="advantages1" placeholder="اسم المزيا"  name="adv_title" class="input-large text"  style="display: none;">
                                                  </td>
                                                  <td><h4 class="font-new2 advother"><?=$advother;?></h4>
                                                      <textarea id="advantages1" placeholder=" تفاصيل"  name="adv" rows="3" class="input-large text"  style="display: none;"></textarea>
                                                       <span class="alert" style="display: none;"></span></td>
                                                  </td>
                                                  <td class="span1 btn-updata-adv" onclick="btn_updat(this);"><h4 class="font-new pull-right"><a>تعديل</a></h4>                                                      
                                                    <td class="span1" onclick="btn_delete(this);"><h4 class="font-new pull-right"><a >حذف</a></h4></td>
                                              </tr>
                                                <?php }?>      
                                          </tbody>                                          
                                      </table> 
                                      </div>                                                            
                              </div>
                             <button type="button" class="btn mb-5 mt-5" id="adv-plus">اضافة<i class="icon icon-plus"></i></button>     
                         </td>
                          <td class="span1"><h4 class="font-new pull-right"><a href="#"></a></h4></td>
                     </tr>
                      <tr>
                         <td class="span2"><h4 class="font-new2">الصور</h4></td>
                         <td class="span5"><h4 class="font-new3">
                             <div class="span6 upload-image">
                                 <span class="text-info">يمكنك الضغط على أي صورة لجعلها رئيسية</span>
                                <div class="imag">
                                    <ul id="upload-file-info">
                                         <li class="mainAdImg">
                                            <span class="orangeCorner"></span>
                                            <a href="#" >
                                                <span class="btn btn-success">اضافة صوره<i class="icon-white icon-plus"></i></span>
                                                <img class="imgToUpload" src="<?=str_replace('../','',$r->hall_image);?>"/>
                                            </a>
                                            <span class="file_upload-wrapper_Main">
                                                <input type="file" name="image_array[]"  class="file_upload" id="my-file-selector" style="display: none;">

                                            </span>
                                            <span class="remove full"><i class="icon icon-trash"></i></span>
                                        </li>
                                        <?php for($p=0;$p<$ucountPic;$p++){  
                                            $pic=$h[$p]; 
                                           $pic_number=$pic->picture_number;
                                            $pic_id=$pic->picture_id;?>
                                        <li>
                                            <span class="orangeCorner"></span>
                                            <a href="#" >
                                                <span class="btn btn-success">اضافة صوره<i class="icon-white icon-plus"></i></span>
                                                <img class="imgToUpload" src="<?=str_replace('../','',$pic->picture_path);?>" data-id="<?=$pic_id;?>" />
                                            </a>
                                            <span class="file_upload-wrapper_Main">
                                                <input type="file" name="file_array[]" value="<?=$pic_number;?>" class="file_upload" id="my-file-selector" style="display: none;">

                                            </span>
                                            <span class="remove full"><i class="icon icon-trash"></i></span>
                                        </li>
                                        <?php } ?>                                          
                                    </ul>                          
                                   </div>                              
                                </div>                               
                                    <a href="#myModal" role="button" class="btn btn-success" data-toggle="modal">أضافة مزيد من الصور<i class="icon icon-ok"></i></a>                                                               
                                
                         </td>
                          <td class="span1"><h4 class="font-new pull-right"><a></a></h4></td>
                     </tr>
                       <tr>
                         <td class="span2"><h4 class="font-new2">تفاصيل</h4></td>
                         <td class="span5 name-updata"><h4 class="font-new3"><?=$r->hall_details?></h4>
                             <textarea id="details_hall"  placeholder="اكتب شرح قصير تحكي تفاصيل القاعة " name="details_hall" rows="4" class="input-xxlarge" style="display: none;"></textarea>
                            <span class="alert" style="display: none;"></span>
                         </td>
                           <td class="span1 btn-updata"><h4 class="font-new pull-right"><a>تعديل</a></h4></td>
                     </tr>
                 </tbody>
            </table>    
   <!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">أضافه صور جديدة</h3>
  </div>
  <div class="modal-body">
   <form class="cont" method="POST" action="" id="addpicture"  enctype="multipart/form-data" >
        <input type="hidden" value=<?=$r->hall_id; ?> id="id" name="hall_id" style="display: none;" />
       <div class="control-group">
<!--          <label class="control-label" for="many_hall">الصور</label>-->
          <div class="controls">     
                 <div class="span5 upload-image cont">                   
                    <div class="imag">
                            <ul id="upload-file">
                                <li>
                                    <span class="orangeCorner"></span>
                                    <a href="#" >
                                        <span class="btn btn-success">اضافة صوره<i class="icon-white icon-plus"></i></span></a>
                                    <span class="file_upload-wrapper_Main">
                                        <input type="file" name="file_array[]" class="file_upload" id="my-file-selector" >                                        
                                    </span>
                                </li>                                  
                            </ul>                          
                        </div>   
                      
               </div>
            
          </div>
     </div>    
    <div class="control-group mt-10">
        <div class="controls">                     
          <button type="submit" class="btn">حفظ</button>
        </div>
      </div>
</form>
  </div>
 
</div>
<span id="massge"></span>
 <script type="text/javascript">
     var res={
    loader:$('<div />',{class:'loader'}),
    contanier:$('.cont')
};
     $(".js-example-basic-single").select2({
          placeholder: "اختار المحافظة",
           dir:"rtl",
            allowClear: true
     });
    
$('body').on('change', '#my-file-selector', function() {
//    $('#upload-file-info').html($(this).val());
    if (this.files && this.files[0]) {
      
    var $input = $(this);
     var $ps1=$input.parent().parent();
     $input.attr('name','file_array[]');
    var inputFiles = this.files;
    if(inputFiles == undefined || inputFiles.length == 0) return;
    var inputFile = inputFiles[0];

    var reader = new FileReader();
    reader.onload = function(event) {
        $ps1.append('<span class="remove full">').click(function(){
          $( "#upload-file li.mainAdImg" ).removeClass('mainAdImg');          
        $("#upload-file li").find('.file_upload-wrapper_Main').children().attr('name','file_array[]');                  
        });
    $ps1.children('.remove').append('<i class="icon icon-trash"></i></span>').click(function(){
      $(this).parent().remove();
     });
   
       
        $ps1.children('a').append('<img  class=\'imgToUpload\' src='+event.target.result+'>');       
        $('#upload-file').append('<li><span class="orangeCorner"></span><a href="#" ><span class="btn btn-success">اضافة صوره<i class="icon-white icon-plus"></i></span></a><span class="file_upload-wrapper_Main"><input type="file" name="file_array[]" class="file_upload" id="my-file-selector" ></span></li>');
    }
   $(this).hide();
    reader.readAsDataURL(inputFile);         
}});//end code upload image    
    
$("#addpicture").on('submit',(function(e) {
            e.preventDefault();
            $("#message").empty();
            $.ajax({
            url: "mothed/addpicture.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
                        beforeSend: function(xhr) {
                        res.contanier.append(res.loader);    
                        },
            success: function(data)   // A function to be called if request succeeds
            {                
                 res.contanier.html(data);
                res.contanier.find(res.loader).remove();       
               
                
            }
            });
}));
$('.remove').click(function(){
    var i=$(this).parent().parent().children().index();
    if(i>=2){
var f= confirm("هل متاكد تريد الحذف");   
if(f){
    var p=$(this).parent();
  
      p.find('.imgToUpload').each(function(){
           var hall_id=$('#id').attr('value');
//          var imagepath=$(this).attr('src');
          var idimage=$(this).data('id');          
            var sendData="hall_id="+hall_id+"&idimage="+idimage;           
            $.post('mothed/picturedelete.php',sendData,function(data){              
              if(data=='تمت العملية بنجاح'){  
                   alert(data);//    
                   p.remove();
                    
              }                              
              });
         
      });                       
    }}else{
     alert('لايمكن حذف جميع الصور')
        }
    return false;
})
  
$('#adv-plus').click(function(){
    $('#adv').append(' <div><label> اسم المزيا<span class="btn btn-danger pull-left" id="delet-adv"><i class="icon icon-trash"></i></span></label><input type="text" id="advantages1" placeholder="اسم المزيا" name="adv_title" class="input-large"> <label>التفاصيل</label><textarea id="advantages2" placeholder="تفاصيل" name="adv" rows="2"></textarea><br><span class="alert" style="display: none;"></span></td><br><span class="btn mt-10" onclick="btn_add(this);">حفظ<i class="icon icon-ok"></i></span></div>');
    });
function btn_add(element){
     var p=$(element).parent();
     var text='';
    var name='';
    var textplus='';
    var count=0;
      p.find(':input').each(function(){
          if(!$(this).val()){            
              $(element).parent().find('.alert').addClass('alert-error').text('يرجى ادخال البيانات ').fadeIn('slow').delay(1000).fadeOut('slow');
          }else{   
              text=$(this).val();
               name=$(this).attr('name');              
                textplus=textplus+"&"+name+"="+text;                             
              count=count+1;
         }
       }); 
         if(count==2){
              var adv_id=$('#id').attr('value');
      var sendData="hall_id="+adv_id+textplus;
            $.post('mothed/advadd.php',sendData,function(data){ 
               
                 $(element).parent().find('.alert').removeClass('alert-error').addClass('alert-success').html(data).show('slow').delay(2000).hide('slow');
                 p.delay(3000).fadeOut('slow');
                  
            });
         }
   
}//--------------------------------end btn_add

 $('body').on('click', '#delet-adv', function() {
          $(this).parent().parent().remove();
     });
$('#upload-file-info>li').click(function(){
            $( "#upload-file-info li.mainAdImg" ).removeClass('mainAdImg');
           $(this).addClass('mainAdImg');
        $("#upload-file-info li").find('.file_upload-wrapper_Main').children().attr('name','file_array[]');
          
           $(this).children('.file_upload-wrapper_Main').children().attr('name','image_array[]');
    });
    
//-----------------------btn updata-------------------------------//
$('.btn-updata').click(function(){
     var my=$(this).children().children().text();
    var p=$(this).parent();
    var input= p.find(':input');
    var text='';
    var name='';
    
    if(my=='تعديل'){
      $(this).children().children().text('حفظ');
    p.find(':input').each(function(){$(this).show('slow');});
    }else if(my=="حفظ"){
      p.find(':input').each(function(){           
               text=$(this).val();
                name=$(this).attr('name');        
        });
          if(!(text)){ 
              p.find('.alert').addClass('alert-error').text('يرجاء ادخال البيانات').fadeIn('slow').delay(1000).fadeOut('slow');
          }else{
                $(this).children().children().text('تعديل');
               var hall_id=$('#id').attr('value');
                var sendData="hall_id="+hall_id+"&"+name+"="+text;	
                $.post('mothed/EditValueHall.php',sendData,function(data){ 
                    p.find(':input').each(function(){$(this).val('');});
                      p.find('.alert').removeClass('alert-error').addClass('alert-success').text(data).fadeIn('slow').delay(1000).fadeOut('slow');                      
                    input.fadeOut('slow');
                      p.find('.name-updata>h4').text(text);
                });
          }
        
    }
});
    
$('.btn-updata-radio').click(function(){
      var my=$(this).children().children().text();
       var p=$(this).parent();       
        var texterror=p.children('.name-updata').children().children('.alert');                
        if(my=="تعديل"){
             $(this).children().children().text('حفظ');
             $('.name-updata :radio:disabled').each(function(){                 
                   $(this).attr("disabled",false);
                });
              } 
             else if(my=='حفظ'){
                   $(this).children().children().text('تعديل');
                 $('.name-updata :radio').each(function(){                 
                   $(this).attr("disabled",true);
                });
                var text='';
                var name='';
                 var hall_id=$('#id').attr('value');
                $('.name-updata :radio:checked').each(function(){                 
                   text=$(this).val();
                    name=$(this).attr('name');
                });
                
                var sendData="hall_id="+hall_id+"&"+name+"="+text;
               $.post('mothed/EditValueHall.php',sendData,function(data){                                        
                 texterror.removeClass('alert-error').addClass('alert-success').html(data).show('slow').delay(2000).hide('slow');  
                   
                });              
              }                                        
    });
function btn_updat(element){
    var p=$(element).parent();
    var my=$(element).children().children().text();  
     var text='';
    var name='';
    var textplus='';
    var count=0;
 if(my=="تعديل"){
     p.children().find(':input').each(function(){$(this).fadeIn('slow');}); 
       $(element).children().children().text('حفظ');
 }    
 else if(my=='حفظ'){     
      p.children().find(':input').each(function(){
          if(!$(this).val()){            
              $(element).parent().find('.alert').addClass('alert-error').text('يرجى ادخال البيانات ').fadeIn('slow').delay(1000).fadeOut('slow');
          }else{   
              text=$(this).val();
               name=$(this).attr('name');              
                textplus=textplus+"&"+name+"="+text;                             
              count=count+1;
         }
      });
      if(count==2){
             
           $(element).children().children().text('تعديل');
      var adv_id=$(element).parent().find('#advid').attr('value');
      var sendData="adv_id="+adv_id+textplus;
     
         $.post('mothed/AdvUpdata.php',sendData,function(data){ 
            if(data=='تمت العملية بنجاح')
            {
                var n=1;
                 p.children().find(':input').each(function(){
                     var textother=$(this).val();
                     if(n==1){
                         p.children().find('.advname').each(function(){
                         $(this).text(textother);
                     });}                    
                     else{                         
                        p.children().find('.advother').each(function(){
                         $(this).text(textother);
                      });
                    }
                  n=n+1;
                 });
             
             $(element).parent().find('.alert').removeClass('alert-error').addClass('alert-success').html(data).show('slow').delay(2000).hide('slow');                  
            }
             else
             {
          $(element).parent().find('.alert').removeClass('alert-success').addClass('alert-error').html(data).show('slow').delay(2000).hide('slow');
             }
        });
           
               p.children().find(':input').each(function(){$(this).fadeOut('slow');}); 
    }
 }       
}
   

// btn delete advantages 
function btn_delete(element){   
   var f= confirm("هل متاكد تريد الحذف");   
   if(f)
   {
        var adv_id=$(element).parent().find('#advid').attr('value');
        var sendData="adv_id="+adv_id;
        $.post('mothed/Advdelete.php',sendData,function(data){ 
            if(data=='تمت العملية بنجاح'){
            alert(data);
             $(element).parent().remove();
         }else
         {
             alert(data);
         }
           });
     
   }
      
}

    </script>