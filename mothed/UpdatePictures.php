<?php 
require_once('../db/hallandpic.php');
if(isset($_POST['hall_id']))
{
	$hall_id=$_POST['hall_id'];
	if(empty($hall_id))
	{
		die('not font page');
	}
}
if(isset($_POST['old_pic_path']))
{
	$old_path=$_POST['old_pic_path'];
}
$selcet='';
if(isset($_POST['pic_number']))
{
    $picture_number=$_POST['pic_number'];
    $selcet='sub';
}
else
{
    $selcet='MAIN';                  
}
    $time=time();
    $nam_file=$_FILES['file']['name'];
    $tmp_file=$_FILES['file']['tmp_name'];
    $type_file=$_FILES['file']['type'];
    $size_file=$_FILES['file']['size'];
    $error_file=$_FILES['file']['error'];
if($nam_file)
    {
        if(check_type_IMG($nam_file,$type_file,$error_file))
            {
                if(file_exists($old_path))
                {
                    unlink($old_path);
                }
                $target="../upload/".$time.$nam_file;						
                move_uploaded_file($tmp_file,$target);
                if($selcet=='sub')
                {
                $re=update_hall_AND_pictures($hall_id,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$target,$picture_number);
                }
                else
                {
                $re=update_hall_AND_pictures($hall_id,NULL,NULL,NULL,NULL,NULL,$target,NULL,NULL,NULL,NULL);
                }
                if($re)
                    {
                        echo "<span style=\"color:green\">تمت العملية بنجاح </span>";
                    }
                else 
                    {
                        echo "<span style=\"color:red\">خطاء  لم تتم العملية بنجاح </span>"; 
                    }
            }
    }
		


function check_type_IMG($pathname,$pathtype,$patherror)
{
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
?>