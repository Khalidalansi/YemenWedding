<?PHP
function dyw_clinte_get($extra='')
{
	global $dyw_handle;
	$query=sprintf("SELECT * FROM `clinte` %s ",$extra);
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
function dyw_clinte_get_buy_name($name)
{
    global $dyw_handle;
    $n_name=@mysql_real_escape_string(strip_tags($name),$dyw_handle);
     $clintes=dyw_clinte_get("WHERE `clinte_user`='$n_name'");
     if($clintes != NULL)
     {
        $u=$clintes[0];

     }   
	 else
     $u = NULL;
     return $u;
}
/*----------------get email-----------------------------------------------*/
function dyw_clinte_get_buy_email($email)
{
    global $dyw_handle;
    $n_email=@mysql_real_escape_string(strip_tags($email),$dyw_handle);
     $clintes=dyw_clinte_get("WHERE `clinte_email`='$n_email'");
     if($clintes != NULL)
     {
        $u=$clintes[0];

     }   else
     $u = NULL;
     return $u;
}
/*----------------get id-----------------------------------------------*/
function dyw_clinte_get_buy_id($uid)
	{
	    if(empty($uid))
		{
		return NULL;
		}
        if($uid==0)
		return NULL;


		$result=dyw_clinte_get('WHERE `clinte_id`='.$uid);
		if($result==NULL)
		return NULL;
		$clintes=$result[0];
		return $clintes;
	}

/*--------------------------end get by id--------------------------------------------------*/

/*--------------------------Add clinte--------------------------------------------------*/
function dyw_clinte_add($name,$phone,$email,$password,$user)
{
	global $dyw_handle;
  
	if((empty($name)) || (empty($password)) || (empty($email)) || (empty($phone)) || (empty($user)))
    {

	return false;
    }
	 $em=@mysql_real_escape_string(strip_tags($email),$dyw_handle);
	
	 if(!filter_var($email,FILTER_VALIDATE_EMAIL))
     {

		 return false;
     }
	 $nam=@mysql_real_escape_string(strip_tags($name),$dyw_handle);
	 $pass=@md5(mysql_real_escape_string(strip_tags($password),$dyw_handle));
	 $ph=@mysql_real_escape_string(strip_tags($phone),$dyw_handle);
	  $ur=@mysql_real_escape_string(strip_tags($user),$dyw_handle);
     try
     {
	 $query=sprintf("INSERT INTO `clinte` VALUE(NULL,'%s','%s','%s','%s',%d,%d,'%s')",$nam,$phone,$em,$pass,1,0,$ur);
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
function dyw_clinte_delete($uid)
	{
		$id=(int)$uid;
		if($id==0)
		return false;
		$query=sprintf("DELETE FROM `clinte` WHERE `clinte_id`=%d",$uid);
		$qresult=@mysql_query($query);
		if(!$qresult)
		return false;

		return true;
	}
/*--------------------------end delete clinte--------------------------------------------------*/

/*--------------------------updata clinte--------------------------------------------------*/
function dyw_clinte_update($uid,$name=NULL,$phone=NULL,$email=NULL,$user=NULL,$password=NULL,$staute=-1,$admin_id=-1)
{
     global $dyw_handle;
	 $n_clinte=$staute;
		if(empty($uid))
			{
				return false;
			}
		$admin=(int)$admin_id;
		if($admin == 0)
			return false;
		if(empty($staute))
			{
				$staute = 1;
			}
                    
		$clintes=dyw_clinte_get_buy_id($uid);                
		if(!$clintes)
		{
			return false;
		}

if((empty($name)) && (empty($password)) && (empty($phone)) && (empty($email)) && (empty($user)) && ($clintes->admin_id == $admin) && (empty($staute)))
		{

			return false;
		}
			
			
			$fileds=array();
			
			$query='UPDATE `clinte` SET ';
            if(!empty($email))
			{
		    $n_email=mysql_real_escape_string(strip_tags($email),$dyw_handle);
                    if(!filter_var($n_email,FILTER_VALIDATE_EMAIL) )
                     return false;
		    	$fileds[@count($fileds)]="`clinte_email` = '$n_email'";
			}

			if(!empty($name))
				{
					$n_name=@mysql_real_escape_string(strip_tags($name),$dyw_handle);
					$fileds[@count($fileds)]= "`clinte_name` = '$n_name'";
				}
			if(!empty($password))
				{
					$n_pass=@md5(@mysql_real_escape_string(strip_tags($password),$dyw_handle));
					$fileds[@count($fileds)]="`clinte_password` = '$n_pass'";
				}
				if(!empty($user))
				{
				$ur=@mysql_real_escape_string(strip_tags($user),$dyw_handle);
					$fileds[@count($fileds)]="`clinte_user` = '$ur'";
				}
            if($n_clinte == -1)
				$n_clinte=$clintes->clinte_staute;
			$fileds[@count($fileds)]="`clinte_staute` =$n_clinte";
			
			 if($admin == -1)
				$admin=$clintes->admin_id;
			$fileds[@count($fileds)]="`admin_id` =$admin";


		$fcount=@count($fileds);
		if($fcount == 1)
			{
				$query .=$fileds[0].'WHERE `clinte_id` = '.$uid;
                          
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
	
		$query .=' WHERE `clinte_id` = '.$uid;
//        echo $query;
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
/* $ruslt=dyw_clinte_update(1,'mohmmed',NULL,NULL,NULL,1,1,'khlaid');
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