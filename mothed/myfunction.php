<?php

$Allcity = array(
    "sana" => array("منطقة صنعاء القديمة " => "sanaold", "منطقة آزال" => "azal","منظقة الصافية"=>"safa",
        "منطقة السبعين الأولى"=>"sban1","منطقة السبعين الثانية"=>"saban2","منطقة الوحدة"=>"ohde","منطقة التحرير"=>"thrar","منطقة معين"=>"moan",
        "منطقة شعوب"=>"shaob","منطقة الثورة"=>"althorh","منطقة بني الحارثة"=>"btnharth"
        ),
    "adan" => array("الشيخ عثمان" => "Alshakhathmen", "كريتر" => "kriter")
);
function Get_zone_ar($city,$zone){// اسم المنطقه بالعربي 
    global $Allcity;
    foreach ($Allcity[$city] as $value=>$key) {
                       if($zone==$key){
                           return $value;
                       }
}
}
function Get_city_ar($city){
    switch ($city) {
        case "sana":
            return "صنعاء";
            break;
         case "adan":
            return "عدن";
            break;

        default:
            return $city;
            break;
    }
}
function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d' ) {
    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) {

        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}
function getyear()
{
$next_year = strtotime('+1 year');
$current_time = time();
$year=array();
while($current_time < $next_year){
    $current_time = strtotime('+1 day', $current_time);
    /*print date('d-m-Y', $current_time);*/
	$year[@count($year)]=date('Y-m-d', $current_time);
}
return $year;
}
function get_date_myDB($Data)
{
	$count=@count($Data);
	$Data_r=array();
	for($i=0;$i<$count;$i++)
	{
		$Data_r[@count($Data_r)]=$Data[$i]->booking_date;
	}
	return $Data_r;
}
function getday($date)
{
	$d=strtotime($date);
	$day=date("D", $d);
	
	switch ($day)
	{
	case 'Fri':
	return "الجمعة";
	break;
	case 'Sat':
	return "السبت";
	break;
	case 'Sun':
	return "الاحد";
	break;
	case 'Mon':
	return "الثلاثاء";
	break;
	case 'Tue':
	return "الثلاثاء";
	break;
	case 'Wed':
	return "الاربعاء";
	break;
	case 'Thu':
	return "الخميس";
	break;
	 default:
	 return false;
	}
}
?>