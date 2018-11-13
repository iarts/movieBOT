
	<nav class="navbar navbar-inverse" style="border-radius: 0px; margin-bottom: 0px;">
		<div class="container-fluid">
			
			<div class="navbar-header">
				<a class="navbar-brand" href="#">MovieBOT</a>
			</div>

			<div class="header-menu">
				<ul class="nav navbar-nav">
					
					<li class="active"><a href="index.php">Αρχική</a></li>

					<li><a href="contact.php">Επικοινωνία</a></li>
					
					<?php
					session_start();
					if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['token'])){
						?>
							
							<li><a href="account.php">Ο λογαριασμός μου</a></li>	
							<li><a href="api/logout.php">Αποσύνδεση</a></li>
							
						<?php
					}
					else{
						?>
							<li><a href="register.php">Εγγραφή</a></li>
						<?php
					}
					?>
					
				</ul>
			</div>

		</div>
	</nav>	
