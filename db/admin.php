<?PHP
function dyw_admin_get($extra='')
{
	global $dyw_handle;
	$query=sprintf("SELECT * FROM `admin_dyw` %s ",$extra);
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
function dyw_admin_get_buy_name($name)
{
    global $dyw_handle;
    $n_name=@mysql_real_escape_string(strip_tags($name),$dyw_handle);
     $clintes=dyw_admin_get("WHERE `admin_name`='$n_name'");
     if($clintes != NULL)
     {
        $u=$clintes[0];
     }   
 else
     $u = NULL;
     return $u;
}

/*----------------get id-----------------------------------------------*/
function dyw_admin_get_buy_id($uid)
	{
	    if(empty($uid))
		{
		return NULL;
		}
        if($uid==0)
		return NULL;


		$result=dyw_admin_get('WHERE `admin_id`='.$uid);
		if($result==NULL)
		return NULL;
		$clintes=$result[0];
		return $clintes;
	}

/*--------------------------end get by id--------------------------------------------------*/

/*--------------------------Add clinte--------------------------------------------------*/
function dyw_admin_add($name,$access,$password)
{
	global $dyw_handle;
  
	if((empty($name)) || (empty($password))  || (empty($access)))
   	 {

		return false;
   	 }
		 $nam=@mysql_real_escape_string(strip_tags($name),$dyw_handle);
		 $pass=@md5(mysql_real_escape_string(strip_tags($password),$dyw_handle));
		 $acc=@mysql_real_escape_string(strip_tags($access),$dyw_handle);
     try
    	 {
			 $query=sprintf("INSERT INTO `admin_dyw` VALUE(NULL,'%s','%s','%s')",$nam,$acc,$pass);
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
function dyw_admin_delete($uid)
	{
		$id=(int)$uid;
		if($id==0)
		return false;
		$query=sprintf("DELETE FROM `admin_dyw` WHERE `admin_id`=%d",$uid);
		$qresult=@mysql_query($query);
		if(!$qresult)
		return false;

		return true;
	}
/*--------------------------end delete clinte--------------------------------------------------*/

/*--------------------------updata clinte--------------------------------------------------*/
function dyw_admin_update($uid,$name=NULL,$access=NULL,$password=NULL)
	{
     global $dyw_handle;
		if(empty($uid))
			{
				return false;
			}

		$admins=dyw_admin_get_buy_id($uid);

		if(!$admins)
		{
			return false;
		}

if((empty($name)) && (empty($password))  && (empty($access)))
		{

			return false;
		}
			
			
			$fileds=array();
			
			$query='UPDATE `admin_dyw` SET ';
			if(!empty($name))
				{
					$n_name=@mysql_real_escape_string(strip_tags($name),$dyw_handle);
					$fileds[@count($fileds)]= "`admin_name` = '$n_name'";
				}
			if(!empty($password))
				{
					$n_pass=@md5(@mysql_real_escape_string(strip_tags($password),$dyw_handle));
					$fileds[@count($fileds)]="`password` = '$n_pass'";
				}
			if(!empty($access))
				{
					$acc=@md5(@mysql_real_escape_string(strip_tags($access),$dyw_handle));
					$fileds[@count($fileds)]="`admin_access` = '$acc'";
				}
		$fcount=@count($fileds);
		if($fcount == 1)
			{
				$query .=$fileds[0].'WHERE `admin_id` = '.$uid;
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
	
		$query .=' WHERE `admin_id` = '.$uid;
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
//include('db.php');
/*$ruslt=dyw_admin_add('mohmmed','123','12345');
	if($ruslt)
		{
			dyw_db_close();
			die('success');
		}
		else
		{
			dyw_db_close();
			die('error');
		} 
*/

/*$users=dyw_clinte_get_buy_email('khalid@gmail.com');
    dyw_db_close();
    if($users != NULL)
    {
        echo '<pre>';
        print_r($users);
        echo '</pre>';
		echo $users->clinte_name;
    }
*/
?>