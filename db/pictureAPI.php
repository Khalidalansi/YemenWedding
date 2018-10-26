<?php 
function dyw_picture_get($extra='')
{
	global $dyw_handle;
	$query=sprintf("SELECT * FROM `pictures` %s ",$extra);
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
/*------------------------------------------------------------------*/
/*--------------------------delete clinte--------------------------------------------------*/
function dyw_picture_delete($uid)
	{
		$id=(int)$uid;
		if($id==0)
		return false;
		$query=sprintf("DELETE FROM `pictures` WHERE `picture_id`=%d",$uid);
		$qresult=@mysql_query($query);
		if(!$qresult)
		return false;

		return true;
	}
/*--------------------------end delete clinte--------------------------------------------------*/

/*----------------get id-----------------------------------------------*/
function dyw_picture_get_buy_id($uid)
	{
	    if(empty($uid))
		{
		return NULL;
		}
        if($uid==0)
		return NULL;
		$result=dyw_picture_get('WHERE `picture_id`='.$uid);
		if($result==NULL)
		return NULL;
		$clintes=$result[0];
		return $clintes;
	}

/*--------------------------end get by id--------------------------------------------------*/
/*----------------get id-----------------------------------------------*/
function dyw_picture_get_buy_id_hall($id_hall)
	{
	    if(empty($id_hall))
		{
		return NULL;
		}
        if($id_hall==0)
		return NULL;
		$result=dyw_picture_get('WHERE `hall_id`='.$id_hall);
		if($result==NULL)
		return NULL;
		return $result;
	}

/*--------------------------end get by id--------------------------------------------------*/

/*--------------------------end clinte id hall--------------------------------------------------*/
function dyw_picture_add($picture_path,$picture_number,$hall_id)
{
    global $dyw_handle;
	if((empty($picture_path)) || (empty($picture_number)) || (empty($hall_id)) )
    {
	return false;
    }
    $num=mysql_real_escape_string(strip_tags($picture_number),$dyw_handle);
	    
	 $h_id=mysql_real_escape_string(strip_tags($hall_id),$dyw_handle);

     try
     {
	 $query=sprintf("INSERT INTO `pictures` VALUE(NULL,'%s',%d,%d)",$picture_path,$num,$h_id);
      
	$qresult=mysql_query($query);
	if(!$qresult)
        { 
	return false;
        }
        else
        {
	return true;
        }
    
     }
    catch(exception $e)
    {
            return $e;
    }
}
/*-----------------------------------------------------------------------------*/
function dyw_picture_update($uid,$picture_path=NULL,$picture_number=NULL)
	{
     global $dyw_handle;
		if(empty($uid))
			{
				return false;
			}
		$admins=dyw_picture_get_buy_id($uid);

		if(!$admins)
		{
			return false;
		}
		if((empty($picture_path)) && (empty($picture_number)))
			return false;
			$fileds=array();
			
			$query='UPDATE `pictures` SET ';
			if(!empty($picture_path))
				{
					$pic_ph=@mysql_real_escape_string(strip_tags($picture_path),$dyw_handle);
					$fileds[@count($fileds)]= "`picture_path` = '$pic_ph'";
				}
			if(!empty($picture_number))
				{
					$pic_num=@md5(@mysql_real_escape_string(strip_tags($picture_number),$dyw_handle));
					$fileds[@count($fileds)]="`picture_number` = '$pic_num'";
				}
		$fcount=@count($fileds);
		if($fcount == 1)
			{
				$query .=$fileds[0].'WHERE `picture_id` = '.$uid;
				$qresult=@mysql_query($query);
				if(!$qresult)
					{
						return false;
					}
				else
					return true;
			}
		for($i=0; $i < $fcount ; $i++)
			{
			   	$query .=$fileds[$i];
			if($i != ($fcount - 1))
					$query .=' , ';
			}
		$query .=' WHERE `picture_id` = '.$uid;
		$qresult=mysql_query($query);
		if(!$qresult)
			{

				return false;

			}
		else
       	 	{

             	return true;
       		 }
	}
/*--------------------------end updata clinte--------------------------------------------------*/
?>