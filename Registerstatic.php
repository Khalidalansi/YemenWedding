<?php
$pageTitle="YemenWedding";
    $page="HOME";
    require_once 'inc/header.php';
     if(!$_SESSION['user_info']==FALSE){
        header("Location:index.php");
    }
 ?>
<div class="page-header"><h4>اضافة شركة جديدة</h4></div>
<form class="form-horizontal" method="POST" action="" id="addclient" >
    <div class="control-group">
        <label class="control-label" for="userlogin">اسم الشخص المسئول</label>
        <div class="controls">
            <input type="text" id="userlogin" placeholder="اسم الشخص المسئول" name="user">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="phone">رقم الهاتف</label>
        <div class="controls">
            <input type="text" id="phone" placeholder="7x7777777" name="phone">
        </div>
    </div>                    
      <div class="control-group">
        <label class="control-label" for="inputEmail">البريد الألكتروني</label>
        <div class="controls">
          <input type="text" id="inputEmail" placeholder="Email" name="email">
        </div>
      </div>
    <div class="control-group">
        <label class="control-label" for="username">اسم الدخول</label>
        <div class="controls">
            <input type="text" id="username" placeholder="UserName" name="username">
        </div>
    </div>  
  <div class="control-group">
    <label class="control-label" for="inputPassword">كلمة المرور</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Password" name="password">
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="inputPassword2">تاكيد كلمة المرور</label>
    <div class="controls">
        <input type="password" id="inputPassword2" placeholder="Password" name="password2">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">                     
      <button type="submit" class="btn btn-success btn-large">أضافة شركة</button>
    </div>
  </div>
</form> 
<div class="row">
        <label class="span5 bk-massgs" style="display:none"></label>
</div>
<?php require_once 'inc/footer.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
 var number=5;
var url='index.php';
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
     $('#addclient').on('submit',(function(e){
        e.preventDefault();
        
	var uname=$('#username').val();
	var ps=$('#inputPassword').val();
	var ps2=$('#inputPassword2').val();
	var ph=$('#phone').val();
	var em=$('#inputEmail').val();
	var us=$('#userlogin').val();
        
        
	if((uname=="") && (ps=="") && (ph=="") && (em=="") && (us==""))
	{
		$('.bk-massgs').css('color','#AD2628');
		$('.bk-massgs').text('يرجى املاء الحقول جميعها ').show('fast').hide(2000);
	}
	else if(ps=="")
	{
		$('.bk-massgs').css('color','#AD2628');
		$('.bk-massgs').text('ادخل الباسورد').show('fast').hide(2000);
	}
	else if(ps!==ps2)
	{
		$('.bk-massgs').text('كلمة السر غير متطابقتان ').css('color','red');
	}
	else
	{
         
//            var dataall={username:uname,password:ps,phome:ph,email:em,user:us};
        $.ajax({
        url: "mothed/saveclinte.php", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        beforeSend: function(){
			$(".bk-massgs").html("<img src=\"image/icon-loding.gif\" alt=\"Looding ..\" />");
			},
        success: function(data)   // A function to be called if request succeeds
            {           
                        $(".bk-massgs").html(data).show('slow').delay(4000).hide('slow');
                        $('#addclient').hide();
                        gotourl();
            }
    });	
    }
	
	return  false;
}));
    });
</script>