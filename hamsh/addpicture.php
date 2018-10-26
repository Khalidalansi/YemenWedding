<?php 
if(isset($_GET['hall_id']))
	{
		$id=$_GET['hall_id'];
	}
 else {
     die('bad Access');
 }
 echo $id;

?>
<form class="cont" method="POST" action="" id="addpicture"  enctype="multipart/form-data" >
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
 
 

  
<span id="message"></span>
<script type="text/javascript">
 var res={
    loader:$('<div />',{class:'loader'}),
    contanier:$('.cont')
};
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
 </script>   