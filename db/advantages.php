<?PHP
function dyw_adv_get($extra='')
{
	global $dyw_handle;
	$query=sprintf("SELECT * FROM `advantages` %s ",$extra);
	$qreuslt=@mysql_query($query);
	
	if(!$qreuslt)
	return NULL;

	$rcount=@mysql_num_rows($qreuslt);
	if($rcount==0)
	return NULL;
	
	$clinte=array();
	for($i=0;$i<$rcount;$i++)
		$clinte[@count($clinte)]=mysql_fetch_object($qreuslt);
	@mysql_free_result($qreuslt);
	return $clinte;
}
/*----------------get name-----------------------------------------------*/
function dyw_adv_get_buy_name($name)
{
    global $dyw_handle;
    $n_name=@mysql_real_escape_string(strip_tags($name),$dyw_handle);
     $clintes=dyw_adv_get("WHERE `adv_name`='$n_name'");
     if($clintes != NULL)
     {
        $u=$clintes[0];

     }   
	 else
     $u = NULL;
     return $u;
}
/*----------------get id hallid-----------------------------------------------*/
function dyw_adv_get_buy_id_hall($id_hall)
	{
	    if(empty($id_hall))
		{
		return NULL;
		}
        if($id_hall==0)
		return NULL;
		$result=dyw_adv_get('WHERE `hall_id`='.$id_hall);
		if($result==NULL)
		return NULL;
		return $result;
	}
/*----------------get id-----------------------------------------------*/
function dyw_adv_get_buy_id($uid)
	{
	    if(empty($uid))
		{
		return NULL;
		}
        if($uid==0)
		return NULL;
		$result=dyw_adv_get('WHERE `adv_id`='.$uid);
		if($result==NULL)
		return NULL;
		$clintes=$result[0];
		return $clintes;
	}

/*--------------------------end get by id--------------------------------------------------*/

/*--------------------------Add clinte--------------------------------------------------*/
function dyw_adv_add($name,$adv_other_other,$hall_id)
{
	global $dyw_handle;
  
	if((empty($name)) || (empty($adv_other_other)) || (empty($hall_id)))
   	 {

		return false;
   	 }
		 $nam=@mysql_real_escape_string(strip_tags($name),$dyw_handle);
		 $adv_other=@mysql_real_escape_string(strip_tags($adv_other_other),$dyw_handle);
		 $h_id=@mysql_real_escape_string(strip_tags($hall_id),$dyw_handle);
		
     try
    	 {
			 $query=sprintf("INSERT INTO `advantages` VALUE(NULL,'%s','%s','%d')",$nam,$adv_other,$h_id);
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
/*--------------------------end add clinte--------------------------------------------------*/

/*--------------------------delete clinte--------------------------------------------------*/
function dyw_adv_delete($uid)
	{
		$id=(int)$uid;
		if($id==0)
		return false;
		$query=sprintf("DELETE FROM `advantages` WHERE `adv_id`=%d",$uid);
		$qresult=@mysql_query($query);
		if(!$qresult)
		return false;

		return true;
	}
/*--------------------------end delete clinte--------------------------------------------------*/

/*--------------------------updata clinte--------------------------------------------------*/
function dyw_adv_update($uid,$name=NULL,$adv_other=NULL)
{
     global $dyw_handle;
		if(empty($uid)){return false;}	

if((empty($name)) && (empty($adv_other))){return false;}			
			
			$fileds=array();
			
			$query='UPDATE `advantages` SET ';
			if(!empty($name))
				{
					$n_name=@mysql_real_escape_string(strip_tags($name),$dyw_handle);                                             
					$fileds[@count($fileds)]= "`adv_name` = '$n_name'";                                 
				}
			
			if(!empty($adv_other))
				{
					$acc=@mysql_real_escape_string(strip_tags($adv_other),$dyw_handle);
					$fileds[@count($fileds)]="`adv_other` = '$acc'";
				}
		$fcount=@count($fileds);
		if($fcount == 1)
			{
				$query .=$fileds[0].'WHERE `adv_id` = '.$uid;                             
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
	
		$query .=' WHERE `adv_id` = '.$uid;        
		$qresult=mysql_query($query);
		if(!$qresult){return false;}
		else{return true; }
	}
/*--------------------------end updata clinte--------------------------------------------------*/
//        require_once('db.php');
// $r=  dyw_adv_update(38,'kh','kfd');
// if($r){
//     echo "success";
// }
//else
//{
//    echo "error";
//}
?>