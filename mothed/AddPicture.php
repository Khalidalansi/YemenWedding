<?php
require_once('../mothed/session.php');
require_once('../db/db.php');
require_once('../db/HallAPI.php');
require_once('../db/advantages.php');
require_once('../db/ClinteAPI.php');
require_once('../db/pictureAPI.php');
if(!empty($_SESSION['user_info']))
{
$id_clinte=$_SESSION['user_info'];
$clintes=dyw_clinte_get_buy_id($id_clinte->clinte_id);
 }
$hall_id=null;
if(isset($_POST['hall_id']))
{
	$hall_id=$_POST['hall_id'];      
	if(empty($hall_id))
	{
		die('not font page');
	}
}

getimag('file_array',$hall_id);
function getimag($file,$hall_id){
if(isset($_FILES[$file]))
{
	$m_nam_file=$_FILES[$file]['name'];
	$m_tmp_file=$_FILES[$file]['tmp_name'];
    $m_type_file=$_FILES[$file]['type'];
    $m_size_file=$_FILES[$file]['size'];
    $m_error_file=$_FILES[$file]['error'];
    for($i=0;$i<count($m_tmp_file);$i++)
    {
        if(!empty($m_nam_file[$i]))
        {
         if(check_type_IMG($m_nam_file[$i],$m_type_file[$i],$m_error_file[$i]))
            {
                $time=time();
                $target="../upload/".$time.$m_nam_file[$i];
            if(move_uploaded_file($m_tmp_file[$i],$target)){                          
               if($file=='file_array')
                    {                          
                    $resultpic=dyw_picture_add($target,$i+1,$hall_id);
                    if($resultpic){
                        $n=$i+1;
                        echo "<div class='alert alert-success'>تم اضافه  $n صور</div>";
                        
                    }else{
                         echo "<div class='alert alert-error'>فشلت العملية  </div>'";                        
                    } 
                    
                    }
                }
            }
        }

            
        }
    }
}
function check_type_IMG($pathname,$pathtype,$patherror){
$allowedExts = array("gif", "jpeg", "jpg", "png","bmp","gif");
$temp = explode(".", $pathname);
$extension = end($temp);
if ((($pathtype == "image/gif") || ($pathtype == "image/jpeg")
|| ($pathtype == "image/jpg")
|| ($pathtype == "image/pjpeg")
|| ($pathtype == "image/x-png")
|| ($pathtype == "image/png") || ($pathtype == "image/bmp") || ($pathtype == "image/gif"))
&& in_array($extension, $allowedExts)) 
	{
  		if ($patherror > 0) 
		{
   			 return false;
  		}
  		 else
   			 {
				 return true;
  			}
    } 
    else 
		{
      return false;
		}
}
