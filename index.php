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
   <button type="button" name="submit" id="submit" class="btn btn-primary">Αποθήκευση</button>
    <h4 id="result"></h4>
<script>
    $(document).ready(function(){
     $('#submit').click(function(){
      var insert = [];
       $('.get_value').each(function(){
        if($(this).is(":checked"))
      {
        insert.push($(this).val());
     }
   });
        insert = insert.toString();
         $.ajax({
          url: "insert.php",
           method: "POST",
            data:{insert:insert},
             success:function(data){
              $('#result').html(data);
             }
          });
       });
    });
</script>


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

  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="js/main.js"></script>
  <script src="ajax/ajax.js"></script>
</body>
</html>
