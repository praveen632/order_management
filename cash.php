<?php
error_reporting(0);
include('include/includes.php');
include(DIR_COMMON_PATH.'header.php');
$user = new user();
$table=CMS_HISTORY;
if(isset($_REQUEST['userinput']))
{
	//$trans = mt_rand(10,1000000);
	$price = $_REQUEST['userinput'];
	$date = date("Ymd");	
	$data['price']=str_replace('$','',$_REQUEST['userinput']);
	$data['date']=$date;
	$data['type']='cash';
	$data['transaction_id']=0;
	$data['user_pro_id']=$_SESSION['user_data']['id'];
	$user_data=$user->insert_pro_his($table, $data);
	$user->update_table_history($user_data,array('transaction_id'=>$user_data+1000));
	$trans = $data['transaction_id'] = $user_data+1000;
	//$reg->insert($data, $condition);
}
include(DIR_TEMPLATE_PATH.'cash.php');
include(DIR_COMMON_PATH.'footer.php');
?>