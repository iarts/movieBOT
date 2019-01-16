<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();
if(!isset($_SESSION['id']) && !isset($_SESSION['user']) && !isset($_SESSION['token'])){
	header("Location: login.php");
	die();
}
?>
<!DOCTYPE html>
<head>
  <title>movieBOT</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/starrating.css">
  <img src="https://images.unsplash.com/photo-1485095329183-d0797cdc5676?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" id="bg" alt="">
  <!-- Image from unsplash.com artist: Jake Hills -->
</head>
<body>
  
  <?php include "includes/header.php"; ?>

  <div class="container">

    <h4 id="result"></h4>
  <div class="container">
    <div class="jumbotron indexJumbotron">
      <h3 class="text-center search_movie">Αναζήτηση Οποιαδήποτε Ταινίας</h3>
      <form id="searchForm">
        <input type="text" class="form-control" id="searchText" placeholder="Αναζήτηση ταινίας ..">
      </form>
    </div>
  </div>

  <div class="container">
		<form method="POST">
			<div id="movies" class="row"></div>
			<button class="btn btn--radius-2 btn--blue save_button" type="button" id="save_favorites" >Αποθήκευση</button>
		</form>
  </div>
  
  <br><br>
  <hr>
  <?php
  include "includes/config.php";

	$sql = "SELECT movies_genre, count(movies_genre) FROM favorites, movies, users 
		WHERE favorites_users_id = users_id
		AND favorites_movies_id = movies_id
		AND users_id = '".mysqli_real_escape_string($link, $_SESSION['id'])."'
		GROUP BY movies_genre
		LIMIT 1";

	$result = mysqli_query($link, $sql);
	
	while($row = mysqli_fetch_array($result)) {
		$fav_genre = $row[0];
	}
	
  ?>
 
	<h2 class="fav_genre">Αγαπημένη κατηγορία <?php echo $fav_genre; ?></h2>
   <br>
	<div class="container"> 
		<?php 
		if($fav_genre != ""){
			$myArray = explode(', ', $fav_genre);
			foreach($myArray as $item){
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_CUSTOMREQUEST => "GET",
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_URL => "https://www.omdbapi.com/?s=".$item."&apikey=34b63443"
				));
				$resp = curl_exec($curl);
				curl_close($curl);
				
				$json = json_decode($resp);
				if($json != ""){
				foreach($json as $obj){
					foreach($obj as $o){
					?>
					<div class="col-md-4">
						<div class="well text-center">
							<img src="<?php echo $o -> {'Poster'}; ?>" height="200">
							<h5><?php echo $o -> {'Title'} . " (" . $o -> {'Year'} . ")"; ?></h5>
							<a onclick="movieSelected('<?php echo $o -> {'imdbID'};?>')" class="btn btn-primary" href="#">Λεπτομέρειες ταινίας</a>
							</br>
						</div>
					</div>
					<?php 
					}
				} 
				}
			}
		}
		?>
	</div>
	<br><br>
	<hr>

  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="js/main.js"></script>
  <script src="ajax/ajax.js"></script>
  <script src="js/starrating.js"></script>
</body>
</html>
