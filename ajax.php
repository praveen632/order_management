<?php
include('include/includes.php');
$methodName = isset($_REQUEST['flag']) ? $_REQUEST['flag'] : '';
$return = [];
if($methodName && !empty($methodName)){
	switch ($methodName) {
		case 'updateNestedMenu':
			$changedData = $_REQUEST['changedData'];
			$changedData = json_decode($changedData, true);
			$menu = new Menu();
			$menu->updateRootMenu($changedData);
			$return = [
				'success' => true,
				'message' => 'Record update successfully!',
				'data' => ''
			];
		break;
		
		case 'updateSlierOrder':
			$changedData = $_REQUEST['changedData'];
			$changedData = json_decode($changedData, true);
			$slider = new Slider();
			if(!empty($changedData) && is_array($changedData)){
				foreach ($changedData as $key => $val) {
					$data = ['position' => $val, 'updated' => date('Y-m-d')];
					$condition = ['id' => $key,'client_id'=>$_SESSION['user_data']['client_id']];
					$slider->save($data, $condition);
				}
				$return = [
					'success' => true,
					'message' => 'Record update successfully!',
					'data' => $changedData
				];	
			}else{
				$return = [
					'success' => false,
					'message' => 'Empty data key value!',
					'data' => ''
				];
			}
			
		break;

		default:
			$return = [
				'success' => false,
				'message' => 'Flag not found!',
				'data' => ''
			];
		break;
	}
}else{
	$return = [
		'success' => false,
		'message' => 'Flag not found!',
		'data' => ''
	];
}
echo json_encode($return);
?>