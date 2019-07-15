<?php
include('include/includes.php');
include(DIR_COMMON_PATH.'header.php');
$user = new user();
if(isset($_POST['submit']))
{
	$product = $user->getProductdata($_SESSION['user_data']['id']);
	//print_r($product);									
	$length = count($product);
	$half_lenght = round($length/2);
	for($i=0;$i<$length;$i++)
	{
		$id =$_POST['id'.$i];
		$data['name']=$_POST['name'.$i];
		$data['price']=$_POST['price'.$i];
		$a = $user->update_table($id, $data);
		$message="New Data Updated";
		//echo $a;
		//$_POST['name'.$i];
		//$_POST['price'.$i];
	}
}
else
{
	$message=0;
}
include(DIR_TEMPLATE_PATH.'price.php');
include(DIR_COMMON_PATH.'footer.php');
?>