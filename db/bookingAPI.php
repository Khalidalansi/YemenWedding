<?php 
function dyw_booking_get($extra='')
{
	global $dyw_handle;
        
	$query=sprintf("SELECT * FROM `booking` %s ",$extra);       
	$qreuslt=@mysql_query($query);
	if(!$qreuslt)
	return NULL;
	$rcount=@mysql_num_rows($qreuslt);
	if($rcount==0)
	return NULL;
	$booking=array();
	for($i=0;$i<$rcount;$i++)
		$booking[@count($booking)]=mysql_fetch_object($qreuslt);
	@mysql_free_result($qreuslt);
	return $booking;
}
/*------------------------------------------------------------------*/
function dyw_booking_delete($uid,$hid){
   $id=(int)$uid;
		if($id==0)
		return false;
                 $hd=(int)$hid;
		if($hd==0)
		return false;
                
     $query=sprintf("DELETE FROM `booking` WHERE `booking_id`=%d AND `hall_id`=%d",$uid,$hd);
     $qresult=@mysql_query($query);
     if($query){
         return TRUE;
     }else{
         return FALSE;
     }
}
/*----------------get id-----------------------------------------------*/
function dyw_booking_get_buy_id($uid)
	{
	    if(empty($uid))
		{
		return NULL;
		}
        if($uid==0)
		return NULL;
		$result=dyw_booking_get('WHERE `booking_id`='.$uid);
		if($result==NULL)
		return NULL;
		$bookings=$result[0];
		return $bookings;
	}

/*--------------------------end get by id--------------------------------------------------*/
function dyw_booking_get_buy_id_hall_date($id_hall,$date)
{
    if(empty($id_hall) && (empty($date)))
        {       
        return NULL;
        }
      
if($id_hall==0)
        return NULL;
        $result=dyw_booking_get('WHERE `hall_id`='.$id_hall.' AND booking_date=\''.$date."'");        
        if($result==NULL)
        return NULL;
        return $result;
}

/*----------------get id-----------------------------------------------*/
function dyw_booking_get_buy_id_hall($id_hall)
	{
	    if(empty($id_hall))
		{
		return NULL;
		}
        if($id_hall==0)
		return NULL;
		$result=dyw_booking_get('WHERE `hall_id`='.$id_hall);
		if($result==NULL)
		return NULL;
		return $result;
	}

/*--------------------------end get by id--------------------------------------------------*/
     

/*----------------get name-----------------------------------------------*/
function dyw_booking_get_buy_clinet_id($clinet_id,$start=0,$end=30,$bool=FALSE)
{
     if(empty($clinet_id))
		{
		return NULL;
		}
        if($clinet_id==0)
		return NULL;
        if($bool==TRUE){
          $st=" LIMIT $start , $end ";
        }else
            $st=NULL;
    $query="SELECT yhalls.hall_id,yhalls.clinte_id,yhalls.hall_name,booking.booking_id,booking.hall_id, booking.booking_date,booking.booking_period
    FROM yhalls
    INNER JOIN booking
    ON yhalls.hall_id=booking.hall_id
    WHERE yhalls.clinte_id =".$clinet_id." ORDER BY booking_id DESC".$st;
    // QUERY DB
//  echo $query;
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

/*----------------get id-----------------------------------------------*/

function dyw_booking_get_buy_between_date_Hall_name($booking_date1,$booking_date2,$hall_id)
{
    global $dyw_handle;
    $n_date1=@mysql_real_escape_string(strip_tags($booking_date1),$dyw_handle);
	$n_date2=@mysql_real_escape_string(strip_tags($booking_date2),$dyw_handle);
	$n_id=@mysql_real_escape_string(strip_tags($hall_id),$dyw_handle);
     $clintes=dyw_booking_get("WHERE `hall_id`=".$n_id." AND `booking_date` BETWEEN '$n_date1' AND '$n_date2'");
     if($clintes != NULL)
     {
        $u=$clintes;
     }   
	 else
     $u = NULL;
     return $u;
}
/*----------------get id-----------------------------------------------*/

function dyw_booking_get_buy_between_date($booking_date1,$booking_date2)
{
    global $dyw_handle;
    $n_date1=@mysql_real_escape_string(strip_tags($booking_date1),$dyw_handle);
	$n_date2=@mysql_real_escape_string(strip_tags($booking_date2),$dyw_handle);
     $clintes=dyw_booking_get("WHERE `booking_date` BETWEEN '$n_date1' AND '$n_date2'");
     if($clintes != NULL)
     {
        $u=$clintes;
     }   
	 else
     $u = NULL;
     return $u;
}
/*--------------------------end clinte id hall--------------------------------------------------*/
function dyw_booking_add($booking_date,$booking_period,$hall_id)
{
	global $dyw_handle;
	if((empty($booking_date)) || (empty($booking_period)) || (empty($hall_id)) )
    {
	return false;
    }	
	
	$booking_d=@mysql_real_escape_string(strip_tags($booking_date),$dyw_handle);
	
	 $booking_p=@mysql_real_escape_string(strip_tags($booking_period),$dyw_handle);
	    
	 $h_id=@mysql_real_escape_string(strip_tags($hall_id),$dyw_handle);

     try
     {
 /*$query= "INSERT INTO `booking` (`booking_date`,`booking_period`,`hall_id`) VALUES('".$booking_d."', '".$booking_p."','".$h_id."')";*/
	 $query=sprintf("INSERT INTO `booking` VALUE(NULL,'%s','%s','%s')",$booking_d,$booking_p,$h_id);
	$qresult=mysql_query($query);
	if(!$qresult)
    {
	return false;
    }
    else
	return true;
     }
    catch(exception $e)
    {
            return $e;
    }
}
/*-----------------------------------------------------------------------------*/
function dyw_booking_update($uid,$booking_date=NULL,$booking_period=NULL)
	{
     global $dyw_handle;
		if(empty($uid))
			{
				return false;
			}
		$bookings=dyw_booking_get_buy_id($uid);

		if(!$bookings)
		{
			return false;
		}
		if((empty($booking_date)) && (empty($booking_period)))
			return false;
			$fileds=array();
			
			$query='UPDATE `booking` SET ';
			if(!empty($booking_date))
				{
					$booking_d=@mysql_real_escape_string(strip_tags($booking_date),$dyw_handle);
					$fileds[@count($fileds)]= "`booking_date` = '$booking_d'";
				}
			if(!empty($booking_period))
				{
					$booking_p=@md5(@mysql_real_escape_string(strip_tags($booking_period),$dyw_handle));
					$fileds[@count($fileds)]="`booking_period` = '$booking_p'";
				}
		$fcount=@count($fileds);
		if($fcount == 1)
			{
				$query .=$fileds[0].'WHERE `booking_id` = '.$uid;
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
		$query .=' WHERE `booking_id` = '.$uid;
       // echo $query;
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

/*-----------------------------------------------------*/
// include('db.php');
//$ruslt=dyw_booking_get_buy_id_hall_date('1','2016-07-13');
//if(!$ruslt)
//{
//	dyw_db_close();
//        
//echo 'false';
//}
//else
//{
//	dyw_db_close();      
//echo 'true';
//} 
?>