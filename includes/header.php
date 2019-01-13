	<!-- Links For Bootstrap, Header CSS file and fontawesome film glyphicon-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	
	<nav class="navbar navbar-inverse" style="border-radius: 0px; margin-bottom: 0px;">
		<div class="container-fluid">
			
			<div class="navbar-header">
				<a class="navbar-brand"> <i class="fas fa-film"></i> <href="#">MovieBOT</a>
				
			</div>

			<div class="header-menu">
				<ul class="nav navbar-nav">
					
					<li <?php if(basename($_SERVER['PHP_SELF'],'.php') == "index") { echo "class='active'"; } ?> ><a href="index.php">Αρχική</a></li>

					<li <?php if(basename($_SERVER['PHP_SELF'],'.php') == "about_us") { echo "class='active'"; } ?> ><a href="about_us.php">Η ομάδα</a></li>

					<li <?php if(basename($_SERVER['PHP_SELF'],'.php') == "contact") { echo "class='active'"; } ?> ><a href="contact.php">Επικοινωνία</a></li>
					
					<?php
					session_start();
					if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['token'])){
						?>
							
							<li <?php if(basename($_SERVER['PHP_SELF'],'.php') == "account") { echo "class='active'"; } ?> ><a href="account.php">Ο λογαριασμός μου</a></li>	
							<li><a href="api/logout.php">Αποσύνδεση</a></li>
							
						<?php
					}
					else{
						?>
							<li <?php if(basename($_SERVER['PHP_SELF'],'.php') == "register") { echo "class='active'"; } ?> ><a href="register.php">Εγγραφή</a></li>
						<?php
					}
					?>
					
				</ul>
			</div>

		</div>
	</nav>	
