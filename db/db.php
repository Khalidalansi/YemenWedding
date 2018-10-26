<?php 
$dyw_host='127.0.0.1';
$dyw_dbname='dyw';
$dyw_username='root';
$dyw_password='';
$dyw_handle=@mysql_connect($dyw_host,$dyw_username,$dyw_password);
if(!$dyw_handle)
die('Connection Problem ..');
$dyw_db_result=mysql_select_db($dyw_dbname);
if(!$dyw_db_result)
{
	mysql_close($dyw_handle);
	die('select problm');
}
@mysql_query("SET NAME 'utf8'");
function dyw_db_close()
{
	global $dyw_handle;
	@mysql_close($dyw_handle);	
}
?>
