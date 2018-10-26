<?php 
require_once('db.php');
require_once('hallapi.php');
require_once('pictureAPI.php');

function get_hall_pictures($uid)
{
$query="SELECT yhalls.hall_id, yhalls.hall_name,yhalls.hall_address,yhalls.hall_size,yhalls.hall_city,yhalls.hall_phone,yhalls.hall_map,yhalls.hall_price,yhalls.hall_zone,yhalls.hall_details,yhalls.hall_type,yhalls.hall_image,yhalls.hall_staute,yhalls.clinte_id, pictures.hall_id,pictures.picture_id, pictures.picture_path,pictures.picture_number
FROM yhalls
INNER JOIN pictures
ON yhalls.hall_id=pictures.hall_id
WHERE yhalls.hall_id =".$uid;
    // QUERY DB
    $qreuslt=@mysql_query($query);
	
	if(!$qreuslt)
	return NULL;
	
	$rcount=@mysql_num_rows($qreuslt);
	if($rcount==0)
	return NULL;

	$hall=array();
	for($i=0;$i<$rcount;$i++)
		$hall[@count($hall)]=mysql_fetch_object($qreuslt);
	@mysql_free_result($qreuslt);
	return $hall;
}

/*--------------------------------------------UPDATE HALL AND PIC----------------------------------------------------------*/
function update_hall_AND_pictures($uid,$name=NULL,$address=NULL,$size=NULL,$city=NULL,$zone_hall=NULL,$map_hall=NULL,$type_hall=NULL,$details_hall=NULL,$price_hall=NULL,$phone=NULL,$imag=NULL,$staute=NULL,$clinte_id=NULL,$picture_path=NULL,$picture_number=NULL)
{
	global $dyw_handle;
	$Andpath='';
		if(empty($uid))
			{
				return false;
			}
		$halls=dyw_hall_get_buy_id($uid);
		if(!$halls)
		{
			return false;
		}
if((empty($name)) && (empty($address)) && (empty($size)) && (empty($city)) && (empty($phone)) && (empty($imag)) &&  (empty($staute)) && (empty($clinte_id)) && (empty($picture_path)) && (empty($picture_number)) && (empty($zone_hall)) && (empty($map_hall)) && (empty($type_hall)) && (empty($price_hall)) && (empty($details_hall)))
		{
			return false;
		}
			
	$fileds=array();
			
			$query='UPDATE `yhalls`,`pictures` SET ';
			if(!empty($name))
				{
					$n_name=@mysql_real_escape_string(strip_tags($name),$dyw_handle);
					$fileds[@count($fileds)]= "yhalls.hall_name = '$n_name'";
				}
			if(!empty($address))
				{
					$n_add=@mysql_real_escape_string(strip_tags($address),$dyw_handle);
					$fileds[@count($fileds)]="yhalls.hall_address = '$n_add'";
				}
			if(!empty($size))
				{
					$sz=@mysql_real_escape_string(strip_tags($size),$dyw_handle);
					$fileds[@count($fileds)]="yhalls.hall_size = '$sz'";
				}
				if(!empty($city))
				{
					$ci=@mysql_real_escape_string(strip_tags($city),$dyw_handle);
					$fileds[@count($fileds)]="yhalls.hall_city = '$ci'";
				}
				if(!empty($phone))
				{
					$ph=@mysql_real_escape_string(strip_tags($phone),$dyw_handle);
					$fileds[@count($fileds)]="yhalls.hall_phone = '$ph'";
				}
				if(!empty($imag))
				{
					$img=@mysql_real_escape_string(strip_tags($imag),$dyw_handle);
					$fileds[@count($fileds)]="yhalls.hall_image = '$img'";
				}
				if(!empty($staute))
				{
					$st=@mysql_real_escape_string(strip_tags($staute),$dyw_handle);
					$fileds[@count($fileds)]="yhalls.hall_staute = '$st'";
				}
                                if(!empty($zone_hall))
				{
					$sz=@mysql_real_escape_string(strip_tags($zone_hall),$dyw_handle);
					$fileds[@count($fileds)]="yhalls.hall_zone = '$sz'";
				}
				if(!empty($map_hall))
				{
					$ci=@mysql_real_escape_string(strip_tags($map_hall),$dyw_handle);
					$fileds[@count($fileds)]="yhalls.hall_map = '$ci'";
				}
				if(!empty($type_hall))
				{
					$tp=@mysql_real_escape_string(strip_tags($type_hall),$dyw_handle);
					$fileds[@count($fileds)]="yhalls.hall_type = '$tp'";
				}
				if(!empty($price_hall))
				{
					$pr=@mysql_real_escape_string(strip_tags($price_hall),$dyw_handle);
					$fileds[@count($fileds)]="yhalls.hall_price = '$pr'";
				}
				if(!empty($details_hall))
				{
					$de=@mysql_real_escape_string(strip_tags($details_hall),$dyw_handle);
					$fileds[@count($fileds)]="yhalls.hall_details = '$de'";
				}
				if(!empty($clinte_id))
				{
					$cli=@mysql_real_escape_string(strip_tags($clinte_id),$dyw_handle);
					$fileds[@count($fileds)]="yhalls.clinte_id = '$cli'";
				}
				if(!empty($picture_path))
				{
					$pic_ph=@mysql_real_escape_string(strip_tags($picture_path),$dyw_handle);
					$fileds[@count($fileds)]= "pictures.picture_path = '$pic_ph'";
				}
				
			if(!empty($picture_number))
				{
					$pic_num=@mysql_real_escape_string(strip_tags($picture_number),$dyw_handle);
					$fileds[@count($fileds)]="pictures.picture_number = '$pic_num'";
					$Andpath='AND pictures.picture_number=';
					
				}
	$fcount=@count($fileds);
        if($fcount == 1)
            {
                $query .=$fileds[0].'WHERE pictures.hall_id = yhalls.hall_id '.$Andpath.$picture_number.' AND yhalls.hall_id = '.$uid;

                $qresult=@mysql_query($query);                               
                if(!$qresult){return false;}
                else{return true;}
            }
    for($i=0; $i < $fcount ; $i++)
        {
            $query .=$fileds[$i];				
            if($i != ($fcount - 1))
                    $query .=' , ';
        }
		$query .=' WHERE pictures.hall_id = yhalls.hall_id '.$Andpath.$picture_number.' AND yhalls.hall_id = '.$uid;
                   
		$qresult=mysql_query($query);
		if(!$qresult){return false;}
		else{return true;}
	}
	
/*------------------------------------------------------------------------------------------------------*/	
/*
$f=update_hall_AND_pic(49,'KHALIDALANSI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
if($f)
{
	echo 'true';
}
else
{
	echo 'false';
}*/

/*$r=get_hall_pictures(49);
$ucountPic=@count($r);
for($i=0;$i<$ucountPic;$i++)
	{
		$pic=$r[$i];
		echo $pic->hall_id;
		echo $pic->picture_path;
		echo $pic->hall_name."<br>";
	}*/
/*print_r(getdata());*/

?>