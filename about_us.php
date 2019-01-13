<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); ?>
<!DOCTYPE html>
<html lang="en">

<?php include "includes/config.php"; ?>

<?php include "includes/head.php"; ?>

<body>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<?php include "includes/header.php"; ?>
		
    <div class="page-wrapper about_us p-t-30 p-b-100 about_font_styling font-poppins">
		<div class="container">
		<h1 class="text-center"> MovieBot</h1>
			<div class="text-center">
			<p>  Είμαστε μια ομάδα φοιτητών του Αλεξανδρείου ΑΤΕΙ Θεσσαλονίκης απο το ΠΜΣ Ευφυείς Τεχνολογίες Διαδικτύου <br>
			 Το MovieBot αποτελεί την συλλογική μας προσπάθεια για την ομαδική εργασία του μαθήματος:<br>
			 Μηχανική Λογισμικού Διαδικτυακές Εφαρμογές<br>
			 Πρόκειται για μια web εφαρμογή μέσω της οποίας μπορεί ένας χρήστης να αναζητήσει ταινίες μέσω του 
			 λογαριασμού του στο MovieBot. Επιπλέον μπορεί να αποθηκεύσει στα favorites τις ταινίες που του
			 άρεσαν καθώς και να τις αξιολογήσει. Η αναζήτηση των ταινιών γίνεται μέσω του OMDB API<br>
			 <br>
			 Η ομάδα: <br>
			 Βοζίνης Ευάγγελος<br>
			 Σταύρου Ιωακείμ<br>
			 Χατζημάγκας Χρυσοβαλάντης<br>
			 Χείτας Χρήστος<br>
			</p>
			</div>
		</div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <script src="js/global.js"></script>

</body>

</html>
