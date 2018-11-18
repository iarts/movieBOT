<?php
require_once '../includes/config.php';

session_start();

if(isset($_POST["insert"]) && isset($_SESSION['id'])){
	
$selected_movies = explode(",", $_POST["insert"]);

foreach($selected_movies as $movie){
	
	//make call to api to get movie details 
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => "https://www.omdbapi.com/?i=".$movie."&apikey=34b63443"
	));
	$resp = curl_exec($curl);
	curl_close($curl);
	
	//parse response
	//.......
	

	//insert movie
	$query_movie = "INSERT INTO movies(movies_imdbID,  ) 
				VALUES ('".mysqli_real_escape_string($link, $_SESSION['id'])."', '".mysqli_real_escape_string($link, $_POST["insert"])."')";
	mysqli_query($link, $query_movie);
	
	
	$last_id = mysqli_insert_id($link);
	
	//insert favorite
	$query = "INSERT INTO favorites(favorites_users_id, favorites_movies_id ) 
				VALUES ('".mysqli_real_escape_string($link, $_SESSION['id'])."', '".mysqli_real_escape_string($link, $last_id)."')";
	mysqli_query($link, $query);
}
 
 echo "Η Αποθήκευση Έγινε Με Επιτυχία!";
}
?>
