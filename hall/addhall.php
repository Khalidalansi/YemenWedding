
<form class="form-horizontal" method="POST" action="" id="addclient" >
    <div class="control-group">
        <label class="control-label" for="name_hall">اسم القاعة</label>
        <div class="controls">
            <input type="text" id="name_hall" placeholder="اسم القاعة" name="name_hall" class="input-xlarge">
            <span class="help-inline"></span>
        </div>
    </div>
   <div class="control-group">
        <label class="control-label" for="county_hall">المحافظة</label>
        <div class="controls">
            
            <select class="js-example-basic-single city"  data-allow-clear="true" name="county_hall">
                    <option value="sana">صنعاء</option>
                    <option value="adan">عدن</option>                    
            </select>
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="zone_hall">المنطقة</label>
        <div class="controls">
           <select class="js-example-basic-single zone"  data-allow-clear="true" name="zone_hall">
                   <option value="sanaold">منطقة صنعاء القديمة </option>  
                   <option value="azal">منطقة آزال</option>    
                   <option value="safa">منظقة الصافية</option>    
                   <option value="sban1">منطقة السبعين الأولى</option>    
                   <option value="sban2">منطقة السبعين الثانية</option>    
                    <option value="ohde">منطقة الوحدة</option>    
                 <option value="thrar">منطقة التحرير</option>    
                   <option value="moan">منطقة معين</option> 
                       <option value="shaob">منطقة شعوب</option> 
                       <option value="althorh">منطقة الثورة</option> 
                       <option value="btnharth">منطقة بني الحارثة</option> 
            </select>
            <span class="help-inline"></span>
        </div>
    </div>  
    <div class="control-group">
        <label class="control-label" for="address_hall">عنوانها </label>
        <div class="controls">
            <input type="text" id="address_hall" placeholder="العنوان" name="address_hall" class="input-xlarge">
            <span class="help-inline"></span>
        </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="phone_hall">رقم التلفون</label>
        <div class="controls">
            <input type="text" id="phone_hall" placeholder="0x-xxxxxx" name="phone_hall" class="input-xlarge">
            <span class="help-inline"></span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="type_hall">الفئه</label>
        <div class="controls">
             <label class="radio">
                  <input type="radio" name="type_hall" id="optionsRadios1" value="عامه" checked>
                  عامه
                </label>
                <label class="radio">
                  <input type="radio" name="type_hall" id="optionsRadios2" value="رجالي">
                  رجالي
                </label> 
             <label class="radio">
                  <input type="radio" name="type_hall" id="optionsRadios3" value="نسائي">
                  نسائي
                </label> 
            <span class="help-inline"></span>
        </div>
      </div>
    <div class="control-group">
        <label class="control-label" for="map_hall">موقعها Google map</label>
        <div class="controls">
          <input type="text" id="map_hall" placeholder="link" name="map_hall" class="input-xlarge">
          <span class="help-inline"></span>
        </div>
      </div>    
      <div class="control-group">
        <label class="control-label" for="size_hall">سعتها</label>
        <div class="controls">
          <input type="text" id="size_hall" placeholder="99999" name="size_hall" class="input-xlarge">
          <span class="help-inline"></span>
        </div>
      </div>
     <div class="control-group">
        <label class="control-label" for="price_hall">سعرها</label>
        <div class="controls">
            <div class="input-append">
                <input type="text" id="price_hall" placeholder="سعرها" name="price_hall" class="input-large"><span class="add-on">﷼</span>
                <span class="help-inline"></span>
            </div>          
        </div>
      </div>
    <div class="control-group">
        <label class="control-label" for="advantages">المزايا</label>
        <div class="controls">
            <div class="span6" >
                      <legend>ضيف جميع المزايا التي لديك</legend>
                      <div  id="adv">
                          <div>
                          <label> اسم المزيا<span class="btn btn-danger pull-left" id="delet-adv"><i class="icon icon-trash"></i></span></label>
                      <input type="text" id="advantages1" placeholder="اسم المزيا" name="adv_title[]" class="input-large">
                      <label>التفاصيل</label>
                     <textarea id="advantages2" placeholder="تفاصيل" name="adv[]" rows="2"></textarea>
                    
                     <br>
                      </div>
                      </div>
                     <button type="button" class="btn mb-5 mt-5" id="adv-plus">المزيد<i class="icon icon-plus"></i></button>          
        </div>
      </div>
    </div>
     <div class="control-group">
          <label class="control-label" for="many_hall">الصور</label>
          <div class="controls">     
                 <div class="span6 upload-image">
                     <span class="text-info">يمكنك الضغط على أي صورة لجعلها رئيسية</span>
                    <div class="imag">
                            <ul id="upload-file-info">
                                <li class="mainAdImg">
                                    <span class="orangeCorner"></span>
                                    <a href="#" >
                                        <span class="btn btn-success">اضافة صوره<i class="icon-white icon-plus"></i></span></a>
                                    <span class="file_upload-wrapper_Main">
                                        <input type="file" name="image_array[]" class="file_upload" id="my-file-selector" >
                                        
                                    </span>
                                </li>
                                  
                            </ul>
                          
                        </div> 
                   
                   
                </div>
          </div>
     </div>
        <div class="control-group">
        <label class="control-label" for="details_hall">تفاصيل</label>
        <div class="controls">
        <textarea id="details_hall" placeholder="اكتب شرح قصير للقاعه " name="details_hall" rows="4" class="input-xxlarge"></textarea>
            <span class="help-inline"></span>
        </div>
      </div>
  <div class="control-group">
    <div class="controls">                     
      <button type="submit" class="btn">حفظ</button>
    </div>
  </div>
</form>   
 <span id="message"></span>
<script type="text/javascript">
     $(".js-example-basic-single").select2({
          placeholder: "اختار المحافظة",
           dir:"rtl",
            allowClear: true
     });
     $('.city').change(function(){
         var city=$(this).val();      
         var sendData="city="+city;	     
	$.post('mothed/GetDataSelected.php',sendData,function(data){
		$('.zone').html(data);		
	});
    return false;
     });
    $('body').on('change', '#my-file-selector', function() {
//    $('#upload-file-info').html($(this).val());
    if (this.files && this.files[0]) {
      
    var $input = $(this);
     var $ps1=$input.parent().parent();

    var inputFiles = this.files;
    if(inputFiles == undefined || inputFiles.length == 0) return;
    var inputFile = inputFiles[0];

    var reader = new FileReader();
    reader.onload = function(event) {
        $ps1.append('<span class="remove full">').click(function(){
          $( "#upload-file-info li.mainAdImg" ).removeClass('mainAdImg');
           $ps1.addClass('mainAdImg');
        $("#upload-file-info li").find('.file_upload-wrapper_Main').children().attr('name','file_array[]');
          
           $(this).children('.file_upload-wrapper_Main').children().attr('name','image_array[]');
        });
    $ps1.children('.remove').append('<i class="icon icon-trash"></i></span>').click(function(){
      $(this).parent().remove();
     });
   
       
        $ps1.children('a').append('<img  class=\'imgToUpload\' src='+event.target.result+'>');       
        $('#upload-file-info').append('<li><span class="orangeCorner"></span><a href="#" ><span class="btn btn-success">اضافة صوره<i class="icon-white icon-plus"></i></span></a><span class="file_upload-wrapper_Main"><input type="file" name="file_array[]" class="file_upload" id="my-file-selector" ></span></li>');
    }
   $(this).hide();
    reader.readAsDataURL(inputFile);         
    }});//end code upload image
    
    $("#addclient").on('submit',(function(e) {
            e.preventDefault();
            $("#message").empty();
            $.ajax({
            url: "mothed/savehall.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
                        beforeSend: function(xhr) {
                        $('#message').html("<img src='image/icon-loding.gif' alt='Looding ..' />");   
                        },
            success: function(data)   // A function to be called if request succeeds
            {
                       
                $("#message").html(data).show('slow').delay(4000).hide('slow');
                
            }
            });
}));
    $('#adv-plus').click(function(){
    $('#adv').append(' <div><label> اسم المزيا<span class="btn btn-danger pull-left" id="delet-adv"><i class="icon icon-trash"></i></span></label><input type="text" id="advantages1" placeholder="اسم المزيا" name="adv_title[]" class="input-large"> <label>التفاصيل</label><textarea id="advantages2" placeholder="تفاصيل" name="adv[]" rows="2"></textarea><br></div>');
    });
     $('body').on('click', '#delet-adv', function() {
          $(this).parent().parent().remove();
     });
    
    </script>
