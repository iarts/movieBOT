<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
require_once '../includes/config.php';

session_start();

if(isset($_POST["insert"]) && $_POST["insert"] != "" && isset($_SESSION['id'])){
	
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
	
	$obj = json_decode($resp);
	
	//movie details
	$title = $obj -> {'Title'};
	$year = $obj -> {'Year'};
	$rated = $obj -> {'Rated'};
	$runtime = $obj -> {'Runtime'};
	$released = $obj -> {'Released'};
	$genre = $obj -> {'Genre'};
	$director = $obj -> {'Director'};
	$writer = $obj -> {'Writer'};
	$actors = $obj -> {'Actors'};
	$plot = $obj -> {'Plot'};
	$language = $obj -> {'Language'};
	$country = $obj -> {'Country'};
	$awards = $obj -> {'Awards'};
	$poster = $obj -> {'Poster'};
	$value = $obj -> {'Value'};

	$check_result = mysqli_query($link, "SELECT movies_imdbID FROM movies WHERE movies_imdbID = '".mysqli_real_escape_string($link, $movie)."'");
	
	if(mysqli_num_rows($check_result) == 0){					
		//insert movie
		$query_movie = "INSERT INTO `movies`(`movies_imdbID`, `movies_title`,
		 `movies_genre`, `movies_released`, `movies_rated`, `movies_writer`, `movies_director`,
		  `movies_actors`, `movies_runtime`, `movies_plot`, `movies_poster`)
					VALUES ('".mysqli_real_escape_string($link, $movie)."', '".mysqli_real_escape_string($link, $title)."'
					, '".mysqli_real_escape_string($link, $genre)."', '".mysqli_real_escape_string($link, $released)."'
					, '".mysqli_real_escape_string($link, $rated)."', '".mysqli_real_escape_string($link, $writer)."'
					, '".mysqli_real_escape_string($link, $director)."', '".mysqli_real_escape_string($link, $actors)."'
					, '".mysqli_real_escape_string($link, $runtime)."', '".mysqli_real_escape_string($link, $plot)."'
					, '".mysqli_real_escape_string($link, $poster)."')";
		mysqli_query($link, $query_movie);
		
		
		$last_id = mysqli_insert_id($link);
		
		//insert favorite
		$query = "INSERT INTO favorites(favorites_users_id, favorites_movies_id ) 
					VALUES ('".mysqli_real_escape_string($link, $_SESSION['id'])."', '".mysqli_real_escape_string($link, $last_id)."')";
		if(mysqli_query($link, $query)){
			 echo "success";
		}
	}
}
 
}

?>
