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
if(!isset($_POST['name_hall']) || (!isset($_POST['address_hall'])) || (!isset($_POST['size_hall']))  || 
        (!isset($_POST['phone_hall'])) || (!isset($_POST['type_hall'])) || (!isset($_POST['price_hall'])) || 
        (!isset($_POST['details_hall'])) || (!isset($_POST['zone_hall'])) || (!isset($_POST['county_hall']))
        || (!isset($_POST['map_hall'])))
{
  die('error');	
}
if(empty($_POST['name_hall']) || (empty($_POST['address_hall'])) || (empty($_POST['size_hall']))  || 
        (empty($_POST['phone_hall'])) || (empty($_POST['type_hall'])) || (empty($_POST['price_hall'])) || 
        (empty($_POST['details_hall'])) || (empty($_POST['zone_hall'])) || (empty($_POST['county_hall']))
        || (empty($_POST['map_hall'])))
{
	die('يوجد بيانات ناقصه يرجى مرجعة الحقول المدخلة');
}

$GetHallId=dyw_hall_get_buy_name($_POST['name_hall']);
if($GetHallId)
{
	dyw_db_close();
	die("اسم القاعه موجود لدينا سابقاً");
}
$hallid=null;
$image_main='';
$image_main=getimag('image_array');
$result=dyw_hall_add($_POST['name_hall'],$_POST['address_hall'],$_POST['size_hall'],$_POST['county_hall'],$_POST['phone_hall'],$_POST['map_hall']
        ,$_POST['type_hall'],$_POST['price_hall'],$_POST['zone_hall'],$_POST['details_hall'],$image_main,2,$id_clinte->clinte_id);
if($result)
    {
        $hallid=$result;
       
    }
 else {
        die('failed insert');
}
if(!$result)
	{
		echo "<span style=\"color:red\">خطاء  لم تتم العملية بنجاح </span>";
	}
	else
	{
		echo "<span style=\"color:green\">تمت العملية بنجاح </span>";	
	}
        getimag('file_array');
if(isset($_POST['adv_title']))//المزايا
{
    $title=$_POST['adv_title'];
    $adv=$_POST['adv'];
   foreach(  $title as $key => $n ) {
       $rs=  dyw_adv_add($n, $adv[$key], $hallid);
       if(!$rs)
       {
         $error='المزايا';  
       }
   }
        
}//نهايه كود المزايا

function getimag($file){
    if(isset($_FILES[$file])){
        global $hallid;   
	$m_nam_file=$_FILES[$file]['name'];
        $m_tmp_file=$_FILES[$file]['tmp_name'];
        $m_type_file=$_FILES[$file]['type'];
        $m_size_file=$_FILES[$file]['size'];
        $m_error_file=$_FILES[$file]['error'];
        for($i=0;$i<count($m_tmp_file);$i++)
        {
            if(!empty($m_nam_file[$i])){
             if(check_type_IMG($m_nam_file[$i],$m_type_file[$i],$m_error_file[$i])){
                    $time=time();
                    $target="../upload/".$time.$m_nam_file[$i];
                move_uploaded_file($m_tmp_file[$i],$target);
                if($file=='image_array'){                  
                    return $target;                       
                    }                    
                elseif($file=='file_array')
                    {                  
                    $resultpic=dyw_picture_add($target,$i+1,$hallid);
//                    if($resultpic){echo "success";}else{echo "error";}
                    
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
?>