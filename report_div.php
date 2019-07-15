<?php
include('include/includes.php');
$id = $_POST['user_id'];
if(isset($_POST['date']))
{
$date_type=$_POST['date'];
}
else
{
	$date_type=0;
}
$date_input=$_POST['date_input']; 
$limit1 = $_POST['limit1'];
if(isset($_POST['limit2']))
{
	if($_POST['limit2']=='')
	{
	$limit2 = $_POST['page'];
	}
	else
	{
	$limit2 = $_POST['limit2'];
	}
}
$type = $_POST['type'];
$start=$_POST['start'];
$end = $_POST['End'];
$user=new user();
if($date_type=="cur" && $type=='cash')
{
	$date = explode(' ', $date_input);
	$date = implode('-',$date);
	$data = $user->getfilter_pro_month_combo($id, $type, $date, $limit1, $limit2);
}
else if($date_type=="cur_month" && $type=='cash')
{
	$date = explode(' ', $date_input);
	$month=$date[1];
	$date[1]=$month;
	$date =$date[0]."-".$date[1];
	$data = $user->getfilter_pro_month_combo($id, $type, $date, $limit1, $limit2);
}
else if($date_type=="prv" && $type=='cash')
{
	$date = explode(' ', $date_input);
	$month=$date[1];
	$date[1]=$month-1;
	$date =$date[0]."-0".$date[1];
	$data = $user->getfilter_pro_month_combo($id, $type, $date, $limit1, $limit2);
}
else if($date_type=="date_from" && $type=='cash')
{
	$date=$start."/".$end;
	$data = $user->getfilter_pro_month_combo_between($id, $type, $date, $limit1, $limit2);
}
else if($date_type=="cur" && $type=='card')
{
	$date = explode(' ', $date_input);
	$date = implode('-',$date);
	$data = $user->getfilter_pro_month_combo($id, $type, $date, $limit1, $limit2);
}
else if($date_type=="cur_month" && $type=='card')
{
	$date = explode(' ', $date_input);
	$month=$date[1];
	$date[1]=$month;
	$date =$date[0]."-".$date[1];
	$data = $user->getfilter_pro_month_combo($id, $type, $date, $limit1, $limit2);
}
else if($date_type=="prv" && $type=='card')
{
	$date = explode(' ', $date_input);
	$month=$date[1];
	$date[1]=$month-1;
	$date =$date[0]."-0".$date[1];
	$data = $user->getfilter_pro_month_combo($id, $type, $date, $limit1, $limit2);
}
else if($date_type=="date_from" && $type=='card')
{
	$date=$start."/".$end;
	$data = $user->getfilter_pro_month_combo_between($id, $type, $date, $limit1, $limit2);
}
else if($date_type=="cur" && $type=='all')
{
	$date = explode(' ', $date_input);
	$date = implode('-',$date);
	$data = $user->getfilter_pro_month($id, $date, $limit1, $limit2);
}
else if($date_type=="cur_month" && $type=='all')
{
	$date = explode(' ', $date_input);
	$month=$date[1];
	$date[1]=$month;
	$date =$date[0]."-".$date[1];
	$data = $user->getfilter_pro_month($id, $date, $limit1, $limit2);
}
else if($date_type=="prv" && $type=='all')
{
	$date = explode(' ', $date_input);
	$month=$date[1];
	$date[1]=$month-1;
	$date =$date[0]."-0".$date[1];
	$data = $user->getfilter_pro_month($id, $date, $limit1, $limit2);
}
else if($date_type=="date_from" && $type=='all')
{
	$date=$start."/".$end;
	$data = $user->getfilter_pro_month_combo_type($id, $date, $limit1, $limit2);
}
echo $data_user = json_encode($data);

//echo json_encode(array(1=>$id));
?>