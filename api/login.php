<?php
require_once '../includes/config.php';

if(isset($_POST['login'])){
	$result = mysqli_query($link, "SELECT * FROM users 
							WHERE users_email = '".mysqli_real_escape_string($link, $_POST['username'])."' 
							AND users_pass = '".mysqli_real_escape_string($link, $_POST['password'])."'");
	$row_count = mysqli_num_rows($result);
	if($row_count!=0){
		echo 'Yes';
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			session_start();
			$_SESSION['id']=$row['users_id'];
			$_SESSION['user']=$row['users_email'];
			$_SESSION['token']=$row['users_token'];
		}
	}
	else{
		echo 'No';
	}
}
?>
