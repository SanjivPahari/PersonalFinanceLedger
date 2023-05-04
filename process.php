<?php
require_once('functions.php');


$name = $_POST['name'];
				
				
$remark = $_POST['remark'];
				
				
$amount = $_POST["amount"];
$type = $_POST["type"];

$direction = $_POST["direction"];

$payment_mode = $_POST["payment_mode"];

if($payment_mode=='cash') {
	
	$acc_num = '';
	
} else {

$acc_num = $_POST["other-account-number"];
	}
	

if($_POST['two_way']=='yes'){
	
	add_transaction($amount, 'pending', $name, $direction, $remark, $payment_mode, $acc_num);
	
}	


if($_POST['clear_check']=='yes'){
	
	$remark='all clear: '.$remark;
	
}	


add_transaction($amount, $type, $name, $direction, $remark, $payment_mode, $acc_num);

header("Location: index.php");
exit();
?>
