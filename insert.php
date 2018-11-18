<?php
if(isset($_POST["insert"]))
{
 $conn = mysqli_connect("localhost", "root", "", "phpmyadmin");
 $query = "INSERT INTO favorites(favorites_users_id ) VALUES ('".$_POST["insert"]."')";
 $result = mysqli_query($conn, $query);
 echo "Η Αποθήκευση Έγινε Με Επιτυχία!";
}
?>