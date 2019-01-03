<?php
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
</head>
<body>
  
  <?php include "includes/header.php"; ?>

  <div class="container">

    <h4 id="result"></h4>

  <div class="container">
    <div class="jumbotron">
      <h3 class="text-center">Αναζήτηση Οποιαδήποτε Ταινίας</h3>
      <form id="searchForm">
        <input type="text" class="form-control" id="searchText" placeholder="Αναζήτηση ταινίας ..">
      </form>
    </div>
  </div>

  <div class="container">
		<form method="POST">
			<div id="movies" class="row"></div>
			<button class="btn btn--radius-2 btn--blue" type="button" id="save_favorites">Αποθήκευση</button>
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
  <h2>Αγαπημένη κατηγορία <?php echo $fav_genre; ?></h2>
  <br>
	<div class="container"> 
		<?php 
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => "https://www.omdbapi.com/?s=".$fav_genre."&apikey=34b63443"
		));
		$resp = curl_exec($curl);
		curl_close($curl);
		
		$json = json_decode($resp);
		
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
</body>
</html>
