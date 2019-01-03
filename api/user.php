<?php
header("Content-Type: application/json");

include "../includes/config.php";

$sql = "SELECT * FROM users 
		WHERE users_id = '".mysqli_real_escape_string($link, $_GET['user'])."'";

$result = mysqli_query($link, $sql);

echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC), JSON_PRETTY_PRINT);
mysqli_free_result($result);

mysqli_close($link);

?>
