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
  <img src="https://images.unsplash.com/photo-1485095329183-d0797cdc5676?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" id="bg" alt="">
  <script src="js/main.js"></script>  
  
  <script>
	  function enableAll(){		  
		  x = document.getElementsByTagName('input');
		  if (document.getElementById('update').innerHTML == 'Αλλαγή στοιχείων'){
			for (i=0; i<x.length;i++){			 
			  x[i].disabled = false;
			}
			document.getElementById('update').innerHTML = 'Κλείδωμα';
			document.getElementById('store').disabled = false;
		  }
		  else{
			for (i=0; i<x.length;i++){			 
			  x[i].disabled = true;
			}
			document.getElementById('update').innerHTML = 'Αλλαγή στοιχείων';			  			  
			document.getElementById('store').disabled = true;
		  }
	  }
	  
	  function checkIfOk(){  				
		 x = document.getElementsByTagName('input');
		 for (i=0; i<x.length;i++){			 
			  if (x[i].value == ""){
				  alert("Παρακαλώ συμπληρώστε όλα τα πεδία");
				  x[i].focus();
				  return false;
			  }
		 }
		 return true;
	 }	  
	  function areusure(){  							
		return (confirm("Θέλετε σίγουρα να αφαιρέσετε την ταινία από τα αγαπημένα σας;!"));

	 }		 
  
  </script>    
</head>
<body>
	
<?php include "includes/head.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/config.php"; ?>

<?php
   if (isset($_POST['sub'])){			

	  $query_movie = "UPDATE users SET users_fname='".$_POST['first_name']."', users_lname='".$_POST['last_name']."', users_birthday='".$_POST['birthday']."', users_phone='".$_POST['phone']."', users_pass='".$_POST['password']."' WHERE users_id =".$_SESSION['id'];
	  //echo $query_movie;			
	  mysqli_query($link, $query_movie);            	                                                        
   }
?>

  <div class="container">

    <h4 id="result"></h4>

	<div class="container"> 
		<div class="container">
			<div class="jumbotron indexJumbotron">
    	    <?php 	
			   $url = $site_url.'/api/user.php?user='.$_SESSION['id']; // path to your JSON file
			   $data = file_get_contents($url); // put the contents of the file into a variable
			   $userdetails = json_decode($data); // decode the JSON feed																																								
				echo "<h4 class='text-center'>Στοιχεία Λογαριασμού Χρήστη ".$userdetails[0]->users_email."</h4>";
                    echo "<form method='POST' action='account.php' onsubmit='return checkIfOk()'>";                    
                        echo "<div class='row row-space'>";
                            echo "<div class='col-2'>";                            
                                echo "<div class='input-group'>";									
                                    echo "<label class='label'>Όνομα</label>";                                    
                                    echo "<input class='input--style-2' type='text' width='10%' id='first_name' name='first_name' onKeyUp='fadeout()' value='".$userdetails[0]->users_fname."' disabled>";
                                    echo "<label class='label'>Επώνυμο</label>";
                                    echo "<input class='input--style-2' type='text' id='last_name' name='last_name' onKeyUp='fadeout()' value='".$userdetails[0]->users_lname."' disabled>";
                                    echo "<label class='label'>Ημ/νία Γέννησης</label>";                                
                                    echo "<input class='input--style-2 js-datepicker' type='text' id='birthday' name='birthday' onKeyUp='fadeout()' value='".$userdetails[0]->users_birthday."' disabled>";
                                    echo "<label class='label'>Τηλέφωνο</label>";
                                    echo "<input class='input--style-2' type='text' id='phone' name='phone' onKeyUp='fadeout()' value='".$userdetails[0]->users_phone."' disabled>";
                                    echo "<label class='label'>Κωδικός</label>";
                                    echo "<input class='input--style-2' type='password' id='password' name='password' onKeyUp='fadeout()' value='".$userdetails[0]->users_pass."' disabled>";
                                    ?>
                                </div>
                                <button class="btn btn--radius-2 btn--blue" type="button" id="update" onclick="enableAll()">Αλλαγή στοιχείων</button>    
                                <button class="btn btn--radius-2 btn--blue" type="submit" name="sub" id="store" disabled>Ενημέρωση</button>    
                            </div>
                        </div>    
                    </form>                    
			</div>
		</div>		
		
	
		
		
		
				
		<?php 	
		
        if (isset($_GET['cb'])){
			$cb =  $_GET['cb'];
			$sqlcommand = "DELETE FROM favorites WHERE favorites_movies_id = '".$cb[0]."'"; //ο πρώτος...				
			for ($i=1; $i<count($cb); $i++) { // οι επόμενοι
				$sqlcommand = $sqlcommand." OR favorites_movies_id = '".$cb[$i]."'";				
			}
			//echo $sqlcommand; // Απλά για να δούμε...
			mysqli_query($link, $sqlcommand);            
		 }			

		$url = $site_url.'/api/favorites.php?user='.$_SESSION['id']; // path to your JSON file
		$data = file_get_contents($url); // put the contents of the file into a variable
		$fav_mov = json_decode($data); // decode the JSON feed
		
		if (count($fav_mov) > 0){
			//echo count($fav_mov);
			echo "<form method='GET' action='account.php' onsubmit='return areusure()'>";                    
			for ($i=0; $i<count($fav_mov); $i++){
				//print_r($fav_mov[$i]);
				echo "<div class='col-md-4'>";
				echo "<div class='well text-center'>";
				echo "<img src='".$fav_mov[$i]->movies_poster."' height='200'><br>";
				echo $fav_mov[$i]->movies_title."<br>";
			?>			
				<a onclick="movieSelected('<?php echo $fav_mov[$i]->movies_imdbID;?>')" class="btn btn-primary" href="#">Λεπτομέρειες ταινίας</a>
			<?php 			
				echo "<br>Διαγραφή<input type='checkbox' name='cb[]' value='".$fav_mov[$i]->favorites_movies_id."'>";
			?>				 
				</div>
				</div>			
			<?php 
			}
	     
			echo "</div>";
			echo "<div class='container'>";
			echo 	"<div class='jumbotron indexJumbotron'>";    	     	
			echo 		"<div class='row row-space'>";
			echo 			"<div class='col-1'>";
			echo 				"<div class='input-group'>";
			echo 					"<button class='btn btn--radius-2 btn--blue' type='submit' name='sub2' id='del'>Διαγραφή επιλεγμένων ταινιών</button>";
			echo 				"</div>";
			echo 			"</div>";
			echo 		"</div>";
			echo 	"</form>";
			echo 	"</div>";
			echo "</div>";
		 }
	     echo "</div>";
	     ?>		


