<?php
require_once '../includes/config.php';

if(isset($_POST['check_email'])){
	$result = mysqli_query($link, "SELECT users_email FROM users WHERE users_email = '".mysqli_real_escape_string($link, $_POST['email'])."'");
	$row_count = mysqli_num_rows($result);
	if($row_count==0){
		echo 'No';
	}else{
		echo 'Yes';
	}
}

?>
