<?php 
require_once('../db/db.php');
require_once('../db/HallAPI.php');
require_once('../db/pictureAPI.php');
require_once('../db/bookingAPI.php');

/*------------------------- var ---------------------------------*/
if(isset($_POST['b_date1']))
{
	$date1=$_POST['b_date1'];
}
if(isset($_POST['b_date2']))
{
	$date2=$_POST['b_date2'];
}
if(isset($_POST['hall_name']))
{
	$hall_name=$_POST['hall_name'];
}
if(isset($_POST['b_size1']))
{
	$size1=$_POST['b_size1'];
}
if(isset($_POST['b_size2']))
{
	$size2=$_POST['b_size2'];
}
if(isset($_POST['b_city']))
{
	$city=$_POST['b_city'];
}
/*------------------------- end var  --------------------------------------*/

/*------------------------- if statiment  ---------------------------------*/


if((!empty($size1)) && (!empty($size2))  && (!empty($hall_name)) && (!empty($date1)) && (!empty($date2)))
{
	$h=get_between_size_hall_name($size1,$size2,$hall_name);
	$count=@count($h);
	for($i=0;$i<$count;$i++)
		{
		  $halls=$h[$i];
		   $r=dyw_booking_get_buy_between_date_Hall_name($_POST['b_date1'],$_POST['b_date2'],$halls->hall_id);
		  print_rr($r);
		}	
}
else if((!empty($size1)) && (!empty($size2))  && (!empty($hall_name)))
{
	$hall_z=get_between_size_hall_name($size1,$size2,$hall_name);
	print_rr($hall_z);
}
else if((!empty($date1)) && (!empty($date2))  && (!empty($hall_name)))
{
	$hall=dyw_hall_get_buy_name($_POST['hall_name']);
	$count=@count($hall);
	for($i=0;$i<$count;$i++)
		{
		  $halls=$hall[$i];
		   $r=dyw_booking_get_buy_between_date_Hall_name($_POST['b_date1'],$_POST['b_date2'],$halls->hall_id);
		   print_rr($r);
		}		
}
else if((!empty($size1)) && (!empty($size2)) && (!empty($date1)) && (!empty($date2)))
{
	$hall=dyw_hall_get_buy_between_size($size1,$size2);
	$count=@count($hall);
	for($i=0;$i<$count;$i++)
		{
		  $halls=$hall[$i];
		   $r=dyw_booking_get_buy_between_date_Hall_name($_POST['b_date1'],$_POST['b_date2'],$halls->hall_id);
		   print_rr($r);
		}		
}
else if((!empty($size1)) && (!empty($size2)))
{
	$r=dyw_hall_get_buy_between_size($size1,$size2);
	print_rr($r);
}
else if((!empty($date1)) && (!empty($date2)))
{
		$r=get_between_date($_POST['b_date1'],$_POST['b_date2']);
			print_rr($r);
		}
else if ((!empty($hall_name)))
{
	$r=dyw_hall_get_buy_name($hall_name);
	print_rr($r);
}		
else
{
	echo "لا يوجد بيانات ";
}
/*-------------------------  print array ---------------------------------*/
function print_rr($arr)
{
	$ruslt='';
	$counts=@count($arr);	
		for($i=0;$i<$counts;$i++)
		{
			$rrs=$arr[$i];
			$ruslt=$ruslt."||".$rrs->hall_id;
		}
		header('Location:../SearchRuslt.php?info='.$ruslt);
}
/*------------------------- end print array ---------------------------------*/
/*-------------------------   ---------------------------------*/
function get_between_size_hall_name($size1,$size2,$hall_name)
{
	$r=dyw_hall_get_buy_between_size_Hall_name($size1,$size2,$hall_name);
	$count=@count($r);
			if($r != NULL)
				{
					return $r;
				}
}
/*-------------------------   ---------------------------------*/
function get_between_date($data1,$data2)
{
	$r=dyw_booking_get_buy_between_date($data1,$data2);
	$count=@count($r);
			if($r != NULL)
				{
					return $r;
				}
}
/*------------------------- end get date  ---------------------------------*/

/*-------------------------get size   ---------------------------------*/
function get_size_between($number1,$number2)
{
	$r=dyw_hall_get_buy_between_size(200,500);
	if($r != NULL)
		{
			return $r;
		}
}
/*-------------------------  end get size ---------------------------------*/

?>