<?php 
function dyw_hall_get($extra='')
{
	global $dyw_handle;
	$query=sprintf("SELECT * FROM `yhalls` %s ",$extra);
//	echo $query."<br>";
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
function dyw_hall_get_staute(){
    $clintes=dyw_hall_get("WHERE `hall_staute`=2");
     if($clintes != NULL)
     {
        $u=$clintes;
     }  
      else
     $u = NULL;
     return $u;
}
/*----------------get name-----------------------------------------------*/
function dyw_hall_get_buy_name($name)
{
    global $dyw_handle;
    $n_name=@mysql_real_escape_string(strip_tags($name),$dyw_handle);
     $clintes=dyw_hall_get("WHERE `hall_name` LIKE '%$n_name%'");
     if($clintes != NULL)
     {
        $u=$clintes;
     }   
	 else
     $u = NULL;
     return $u;
}
/*----------------get id-----------------------------------------------*/
function dyw_hall_get_buy_id($uid)
	{
	    if(empty($uid))
		{
		return NULL;
		}
        if($uid==0)
		return NULL;


		$result=dyw_hall_get('WHERE `hall_id`='.$uid);
		if($result==NULL)
		return NULL;
		$clintes=$result[0];
		return $clintes;
	}

        /*--------------------------end get by id--------------------------------------------------*/
function dyw_hall_get_buy_limt($start,$end,$name=NULL,$zone=NULL,$city=NULL)         
{
    $wr='WHERE `hall_staute`=2';
    if($name!=NULL){
     global $dyw_handle;
    $namee=@mysql_real_escape_string(strip_tags($name),$dyw_handle);
        $st="`hall_name` LIKE '%$namee%'";
    }else{
        $st=NULL;
    }
    if($zone!=NULL){
     global $dyw_handle;
    $zonee=@mysql_real_escape_string(strip_tags($zone),$dyw_handle);
       
             $zo=" AND `hall_zone`='$zonee'";
       
    }else{
        $zo=NULL;
    }
    if($city!=NULL){
     global $dyw_handle;
    $citye=@mysql_real_escape_string(strip_tags($city),$dyw_handle);      
        $ci=" AND `hall_city`='$citye'";
    }else{
        $ci=NULL;
    }
        $result=dyw_hall_get($wr.$st.$zo.$ci.' LIMIT '.intval($start).','.intval($end));
        if($result==NULL)
        return NULL;
       
        return $result;
}
/*----------------get id-----------------------------------------------*/
/*--------------------------end get by id--------------------------------------------------*/

/*----------------get id-----------------------------------------------*/
function dyw_hall_get_buy_id_search($uid)
	{
	    if(empty($uid))
		{
		return NULL;
		}
        if($uid==0)
		return NULL;


		$result=dyw_hall_get('WHERE `hall_id`='.$uid);
		if($result==NULL)
		return NULL;
		$clintes=$result[0];
		return $clintes;
	}

/*--------------------------end get by id--------------------------------------------------*/

function dyw_hall_get_buy_between_size($hall_size1,$hall_size2)
{
    global $dyw_handle;
    $n_size1=@mysql_real_escape_string(strip_tags($hall_size1),$dyw_handle);
	$n_size2=@mysql_real_escape_string(strip_tags($hall_size2),$dyw_handle);
     $clintes=dyw_hall_get("WHERE `hall_size` BETWEEN ". $n_size1." AND ". $n_size2);
     if($clintes != NULL)
     {
        $u=$clintes;
     }   
	 else
     $u = NULL;
     return $u;
}

function dyw_hall_get_buy_between_size_Hall_name($hall_size1,$hall_size2,$hall_name)
{
    global $dyw_handle;
    $n_size1=@mysql_real_escape_string(strip_tags($hall_size1),$dyw_handle);
    $n_size2=@mysql_real_escape_string(strip_tags($hall_size2),$dyw_handle);
$n_name=@mysql_real_escape_string(strip_tags($hall_name),$dyw_handle);
     $clintes=dyw_hall_get("WHERE `hall_name` LIKE '%$n_name%' AND `hall_size` BETWEEN ". $n_size1." AND ". $n_size2);
     if($clintes != NULL)
     {
        $u=$clintes;
     }   
	 else
     $u = NULL;
     return $u;
}
/*----------------get id-----------------------------------------------*/
/*--------------------------end clinte id hall--------------------------------------------------*/
/*--------------------------delete clinte--------------------------------------------------*/
function dyw_hall_delete($uid)
	{
		$id=(int)$uid;
		if($id==0)
		return false;
		$query=sprintf("DELETE FROM `yhalls` WHERE `hall_id`=%d",$uid);
		$qresult=@mysql_query($query);
		if(!$qresult)
		return false;

		return true;
	}
/*--------------------------end delete clinte--------------------------------------------------*/

/*----------------get clinte id hall -----------------------------------------------*/
function dyw_hall_get_buy_clinte_id($uid)
	{
	    if(empty($uid))
		{
		return NULL;
		}
        if($uid==0)
		return NULL;

		$result=dyw_hall_get('WHERE `clinte_id`='.$uid);
		if($result==NULL)
		return NULL;
		/*$clintes=$result[0];*/
		return $result;
	}

/*--------------------------end clinte id hall--------------------------------------------------*/

function dyw_hall_add($hall_name,$hall_address,$hall_size,$hall_city,$hall_phone,$hall_map,$hall_type,$hall_price,$hall_zone,$hall_details,$hall_image,$hall_staute,$client_id)
{
	global $dyw_handle;
    if(($hall_staute != 1 ) && ( $hall_staute != 2))
	 $hall_staute = 1;
//echo $hall_name."<br>";
//echo $hall_address."<br>";
//echo $hall_size."<br>";
//echo $hall_city."<br>";
//echo $hall_phone."<br>";
//echo $hall_map."<br>";
//echo $hall_type."<br>";
//echo $hall_price."<br>";
//echo $hall_image."<br>";
if((empty($hall_name)) || (empty($hall_address)) || (empty($hall_size)) || (empty($hall_city)) || (empty($hall_phone)) || (empty($hall_image)) || (empty($client_id)) || (empty($hall_map)) || (empty($hall_type)) || (empty($hall_price)) || (empty($hall_zone))|| (empty($hall_details)))
{
    return false;
}

	 $nam=@mysql_real_escape_string(strip_tags($hall_name),$dyw_handle);
	 
	 $address=@mysql_real_escape_string(strip_tags($hall_address),$dyw_handle);
	    
	 $size=@mysql_real_escape_string(strip_tags($hall_size),$dyw_handle);
	
	 $city=@mysql_real_escape_string(strip_tags($hall_city),$dyw_handle);
	
         $phone=@mysql_real_escape_string(strip_tags($hall_phone),$dyw_handle);
         $map=@mysql_real_escape_string(strip_tags($hall_map),$dyw_handle);
         $ty=@mysql_real_escape_string(strip_tags($hall_type),$dyw_handle);
         $pr=@mysql_real_escape_string(strip_tags($hall_price),$dyw_handle);
        
         $zone=@mysql_real_escape_string(strip_tags($hall_zone),$dyw_handle);
         $de=@mysql_real_escape_string(strip_tags($hall_details),$dyw_handle);

        $image=@mysql_real_escape_string(strip_tags($hall_image),$dyw_handle);
             
        $cid=@mysql_real_escape_string(strip_tags($client_id),$dyw_handle);


     try
     {       
	 $query=sprintf("INSERT INTO `yhalls` VALUE(NULL,'%s','%s',%d,'%s',%d,'%s','%s',%d,'%s','%s','%s',%d,%d)",$nam,$address,$size,$city,$phone,$map,$ty,$pr,$zone,$de,$image,$hall_staute,$cid);
//         echo $query;
         $qresult=mysql_query($query);
	if(!$qresult)
            {
                return false;
            }
            else
                {
                return mysql_insert_id();
                }
     }
    catch(exception $e)
    {
            return $e;
    }
}
/*-----------------------------------------------------------------------------*/
function dyw_hall_update($uid,$name=NULL,$address=NULL,$size=NULL,$city=NULL,$phone=NULL,$imag=NULL,$staute=NULL,$clinte_id=NULL)
	{
     global $dyw_handle;
		if(empty($uid))
			{
				return false;
			}

		$admins=dyw_hall_get_buy_id($uid);

		if(!$admins)
		{
			return false;
		}

if((empty($name)) && (empty($password))  && (empty($access)))
		{

			return false;
		}
			
			
			$fileds=array();
			
			$query='UPDATE `yhalls` SET ';
			if(!empty($name))
				{
					$n_name=@mysql_real_escape_string(strip_tags($name),$dyw_handle);
					$fileds[@count($fileds)]= "`hall_name` = '$n_name'";
				}
			if(!empty($address))
				{
					$n_add=@mysql_real_escape_string(strip_tags($address),$dyw_handle);
					$fileds[@count($fileds)]="`hall_address` = '$n_add'";
				}
			if(!empty($size))
				{
					$sz=@md5(@mysql_real_escape_string(strip_tags($size),$dyw_handle));
					$fileds[@count($fileds)]="`hall_size` = '$sz'";
				}
				if(!empty($city))
				{
					$ci=@md5(@mysql_real_escape_string(strip_tags($city),$dyw_handle));
					$fileds[@count($fileds)]="`hall_city` = '$ci'";
				}
				if(!empty($phone))
				{
					$ph=@md5(@mysql_real_escape_string(strip_tags($phone),$dyw_handle));
					$fileds[@count($fileds)]="`hall_phone` = '$ph'";
				}
				if(!empty($imag))
				{
					$img=@md5(@mysql_real_escape_string(strip_tags($imag),$dyw_handle));
					$fileds[@count($fileds)]="`hall_image` = '$img'";
				}
				if(!empty($staute))
				{
					$st=@md5(@mysql_real_escape_string(strip_tags($staute),$dyw_handle));
					$fileds[@count($fileds)]="`hall_staute` = '$st'";
				}
				if(!empty($clinte_id))
				{
					$cli=@md5(@mysql_real_escape_string(strip_tags($clinte_id),$dyw_handle));
					$fileds[@count($fileds)]="`clinte_id` = '$cli'";
				}
		$fcount=@count($fileds);
		if($fcount == 1)
			{
				$query .=$fileds[0].'WHERE `hall_id` = '.$uid;
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
	
		$query .=' WHERE `hall_id` = '.$uid;
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
        
/*function dyw_hall_get_buy_limt_st($start,$end,$name=NULL,$zone=NULL,$city=NULL)         
{
    $wr='WHERE ';
    if($name!=NULL){
     global $dyw_handle;
    $namee=@mysql_real_escape_string(strip_tags($name),$dyw_handle);
        $st=$wr."`hall_name` LIKE '%$namee%'";
    }else{
        $st=NULL;
    }
    if($zone!=NULL){
     global $dyw_handle;
    $zonee=@mysql_real_escape_string(strip_tags($zone),$dyw_handle);
        if($st==NULL){
             $zo="WHERE `hall_zone`='$zonee'";
        }else{
             $zo=" AND `hall_zone`='$zonee'";
        }
    }else{
        $zo=NULL;
    }
    if($city!=NULL){
     global $dyw_handle;
    $citye=@mysql_real_escape_string(strip_tags($city),$dyw_handle);
        if((($st==NULL) && ($zo==NULL))) {
             $ci="WHERE `hall_city`='$citye'";
        }else{
        $ci=" AND `hall_city`='$citye'";}
    }else{
        $ci=NULL;
    }
        $result=dyw_hall_get($st.$zo.$ci.' LIMIT '.intval($start).','.intval($end));
        if($result==NULL)
        return NULL;
       
        return $result;
}*/

?>
