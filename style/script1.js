$(document).ready(function(){   
var number=5;
var url='index.php';
$(function(){
    $('.carousel').carousel();
    $('.slide').refineSlide({
        maxWidth:1140,
        autoPlay:true,
        transition:"random", 
        perpspective:1200
    });
      //=--------------------slid show -----------------------------//
    var options = {
  // thumbnail container
  thumbUl : $('#thumbnail'), 
  // slideshow container
  mainPhoto : $('#main_photo'),
  // parent container
  parentDiv : $('#photo_container'),
  // slide animation speed
  slideSpeed: 3000, 
  // crossfade animation seepd
  fadeSpeed: 500, 
  // auto play
  startPlay: true, 
  // maximum width of the slideshow
  maxWidth : 520, 
  // maximum width of the thumbnails
  thumbMaxWidth : 80, 
  // minimum width of the thumbnails.
  thumbMinWidth : 65 
  
};
    //=-------------------------------------------------//
    $('.del-booking').click(function(){
        var f= confirm("هل انت متاكد من هذه العملية"); 
        if(f){
        var th=$(this);
        var p=th.parent();
        var hid=p.find('#bk-hid').val();
          var bk_id=p.find('#bk-id').val();
      var sendData="bk_id="+bk_id+"&hall_id="+hid;	
        $.post('mothed/deletebooking.php',sendData,function(data){ 
           alert(data);
      
      location.reload(true);
        });
        }
    });
    
  
$('.btn-updata-account').click(function(){
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
                       
                        var sendData=name+"="+text;	
                        $.post('mothed/clinetupdata.php',sendData,function(data){ 
                            p.find(':input').each(function(){$(this).val('');});
                              p.find('.alert').removeClass('alert-error').addClass('alert-success').text(data).fadeIn('slow').delay(1000).fadeOut('slow');                      
                           
                            input.fadeOut('slow');
                              p.find('.name-updata>h4').text(text);
                        });
                  }

            }
    
    });
  //=-------------------------------------------------//
    $(".js-example-basic-single+.hall-type").select2({
          placeholder: "اختار الفئه",
           dir:"rtl",
            allowClear: true
     });
     $(".js-example-basic-single").select2({
//          placeholder: "اختار المحافظة",
           dir:"rtl",
            allowClear: true
     });
     
      $(".js-example-data-array-selected").select2({
             placeholder: "اختار المنطقة",
               dir:"rtl",
                allowClear: true
            });
        $('.zone').change(function (){      
          var c=$('.city').val();         
          window.location='hallview.php?zone='+this.value+'&city='+c;
        });  
     $("#select-city").change(function(){        
           window.location='hallview.php?city='+this.value;   
         
     });
     $("#select-name").click(function(){    
      
         var p=$(this).parent();
         
         var name=p.find("input").val();
       
         
           window.location='hallView.php?hall_name='+name;   
         
     });
     //-----------------------------------------//
//--------------------------------booking --------------------------// 
$("#addbooking").on('submit',(function(e) {
    e.preventDefault();
          $("#message").empty();       
//        var massage=$(this).find('#message');
        var ha=$(this).find('#input_hall');
         var da=$(this).find('#input_date');
          var pr=$(this).find('#input_period');            
        if(checkedval(ha,da,pr)){   
            $.ajax({
            url: "mothed/savebooking.php", 
            type: "POST",             
            data: new FormData(this), 
            contentType: false,       
            cache: false,             
            processData:false,        
                        beforeSend: function(xhr) {
                        $('#message').html("<img src='image/icon-loding.gif' alt='Looding ..' />");   
                        },
            success: function(data)   
            {   
                if(data=='<div class=\"alert alert-success\">تمت العملية بنجاح </div>'){
                $("#message").html(data).show('slow').delay(4000).hide('slow'); 
                 window.location="settings.php?tab=booking";
                 }else{
                     $("#message").html(data).show('slow').delay(4000).hide('slow');  
                 }
            }
            });
        }
function checkedval(h,d,p){
     var ha=$(h);
     var da=$(d);
     var pr=$(p);
     if(!ha.val()){
          ha.parent().parent().find('.help-inline').addClass('alert alert-error').text('يرجاء اختيار التاريخ').show('slow').delay(4000).hide('slow');         
           return false;
     }
     else if(!da.val()){
         da.parent().parent().find('.help-inline').addClass('alert alert-error').text('يرجاء اختيار التاريخ').show('slow').delay(4000).hide('slow');   
           return false;
     }
     else if(!pr.val()){
         pr.val('d');
        return false;
     }else{
        return true;
     }
     
 }
    return  false;
}));
$('.showdate').datepicker({defaultDate: "+1w",dateFormat: 'yy-mm-dd'});
 $("#search-booking").on('submit',(function(e) {
     var d=$(this).serialize();
  
//     d.each(function(){
//        alert($(this).val()); 
//     });
    $.ajax({
            url: 'mothed/searchbooking.php', 
            type: "POST",             
            data: new FormData(this), 
            contentType: false,       
            cache: false,             
            processData:false,        
                        beforeSend: function(xhr) {                            
                       $('#massge').html("<img src='image/icon-loding.gif' alt='Looding ..' />");   
                        },
            success: function(data)   
            {              
              
               $('#massge').html(data).show('slow');                                
            }
            });
 
            return false;
 })); 
//--------------------------------booking --------------------------//
  
  
});           
$(function(){
	$('#login').submit(function(){
	var uname=$('#username').val();
	var ps=$('#password').val();
	if(uname=="")
	{
		$('.bk-massgs').css('color','#AD2628');
		$('.bk-massgs').text('ادخل اسم المستخدم ').show('fast').hide(2000);
	}
	else if(ps=="")
	{
		$('.bk-massgs').css('color','#AD2628');
		$('.bk-massgs').text('ادخل كلمة المرور').show('fast').hide(2000);
	}
	else
	{
	var sendData="username="+uname+"&password="+ps;	
	$.post('mothed/ChekedLogin.php',sendData,function(data){
		$('.bk-massgs').html(data).show('slow').delay(4000).hide('slow');
		$('#login').hide();
        gotourl();
	})};
	return  false;
	});	
        
/*------------------------- Get regsiter ---------------------------------------*/
        $('#reg_new').click(function(){
		$('.modal-body').load('Register.php');                                		
	});
 /*------------------------- end Get regsiter ---------------------------------------*/
  
 /*------------------------- add client ---------------------------------------*/
   
/*------------------------- add client ---------------------------------------*/
});    
 function gotourl()
{         
     setTimeout(gotourl,1000);
     $('#loram').html("سوف يتم الانتقال تلقائياً ");
     number--;
     if(number<0)
     {
         window.location=url;
         number=0;
      }
 }

 });
 
function getajax(pathfile,contant){
    var inf={};
    inf.url=pathfile;
    inf.type="GET";
    inf.beforeSend=function(){
            $(contant).html("<img src=\"image/icon-loding.gif\" alt=\"Looding ..\" />");

            };
    statusCode={404: function(){
            $(contant).text("not found page");
            }
            };	
    inf.data={id:1};
    inf.success=function(rt,s,xhr)
    {
            if(s == "Error")
            alret("error");
    //		$('#m_contanet').hide(0).slideDown(2000);
           $(contant).html(rt);

    }
    inf.datatype="php";
$.ajax(inf);
    return false;
}