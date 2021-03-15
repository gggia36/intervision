<?php 

/*$begin = new DateTime( '2012-08-01' );
$endc = new DateTime( '2012-11-15' );
$end = $endc->modify( '+2 day' ); 

$interval = new DateInterval('P1M');
$daterange = new DatePeriod($begin, $interval ,$end);

$last = '';
$endc = new DateTime( '2012-11-15' );
$ed = $endc->format("Y-m-d");

$ndate = array();
$i=0;
foreach($daterange as $date){
    echo $date->format("Y-m-d") ."<br>";
    $ndate[$i] = $date->format("Y-m-d");
    $last = $date->format("Y-m-d");
    $i++;
}

foreach($ndate as $key=>$dts){
	$k = (string)$dts;
	$j = (string)$ndate[$key+1];
	if($ndate[$key+1]==''){
		$endc = $endc->modify( '+1 day' );
		$j = (string)$endc->format("Y-m-d");
	}
	$x = new DateTime($k);
	$y = new DateTime($j);
	
	$xy = $y->modify( '-1 day' );
	
	echo $x->format("Y-m-d")."+++".$xy->format("Y-m-d")."<br />";
	
}

echo $ed;

if($last<$ed){
	echo 'ddd';
}*/
 
/* 
$begin = new DateTime( '2012-08-01' );
$endc = new DateTime( '2013-08-15' );
$end = $endc->modify( '+1 day' ); 

$interval = new DateInterval('P1Y');
$daterange = new DatePeriod($begin, $interval ,$end);*/

/*$last = '';
$endc = new DateTime( '2012-11-15' );
$ed = $endc->format("Y-m-d");*/

/*$ndate = array();
$i=0;
foreach($daterange as $date){
    echo $date->format("Y-m-d") ."<br>";
    $ndate[$i] = $date->format("Y-m-d");
   
    $i++;
}*/

/*$array = array(0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red');

$key = array_search('green', $array); 
$key1 = array_search('reddd', $array);  

echo $key."--".$key1;
if($key1==''){
	echo 'fff';
}*/

//echo date('Y-m-d',strtotime('-1 month'));
//echo $date->format('Y-m-d') . "\n";
date_default_timezone_set('Asia/Bangkok');
if(!isset($_COOKIE['token'])){
	echo 'F';
	exit();
}

$date = date('d/m/Y H:i');
echo $date;
//print_r($_COOKIE);


?>
	
