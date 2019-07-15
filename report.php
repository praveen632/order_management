<?php
include('include/includes.php');
include(DIR_COMMON_PATH.'header.php');
$user=new user();
//$_GET['date_type'];
//$_GET['type'];
//$_GET['id'];
//$_GET['limit1'];
//$_GET['limit2'];
if((isset($_GET['start']))&& (isset($_GET['End'])))
{
	$start=$_GET['start'];
	$end = $_GET['End'];
}
else
{
	$start="";
	$end="";
}
if((isset($_GET['date_type']))&& (isset($_GET['type'])))
{
	//echo "hi";
	echo $date = $_GET['date_type'];
	echo $type= $_GET['type'];
	$combo=$date;
}
else{
		if(isset($_GET['date_type']))
		{
			$date = $_GET['date_type'];
			$type =0;
			$combo=0;
		}
		if(isset($_GET['type']))
		{
			$type= $_GET['type'];
			$date =0;
			$combo=0;
		}
}
if(isset($_GET['page']))
{
	$page_row = $_GET['page'];
}
else{
	$page_row=20;
}
if(isset($_GET['limit1'])||isset($_GET['limit2']))
{
	$limit1=0;
	$limit2=$page_row;
}
else
{
	$limit1=0;
	$limit2=$page_row;
	$type = 'all';
	$date ='all';
	$combo=0;
	$message=0;
}
$result=$user->get_table_num($_SESSION['user_data']['id']);
$page_data=ceil($result['num']);
$num_page=ceil($result['num']/$page_row);
include(DIR_TEMPLATE_PATH.'report.php');
include(DIR_COMMON_PATH.'footer.php');
?>	