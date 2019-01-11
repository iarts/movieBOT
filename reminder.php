<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); ?>
<!DOCTYPE html>
<html lang="en">

<?php include "includes/config.php"; ?>

<?php include "includes/head.php"; ?>

<body>
	
	<?php include "includes/header.php"; ?>
	
	<?php
	$message_output = "";
	if(isset($_POST["email"]) && $_POST["email"] != ""){
		
		$sql = "SELECT users_email, users_pass FROM users 
				WHERE users_email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
		$result = mysqli_query($link, $sql);
		$num_users = mysqli_num_rows($result);
		
		if($num_users > 0){
			
			$row=mysqli_fetch_array($result,MYSQLI_NUM);
			
			$msg = "";
			$subject = "Υπενθύμιση κωδικού από movieBOT";
			$to = $_POST['email'];
						
			$msg .="<p>Ο κωδικός σας είναι: </p><br>";
			$msg .= $row[1];
			
			include "PHPMailer/PHPMailerAutoload.php";
			$mail = new PHPMailer();
			$mail->CharSet = 'UTF-8';
			$mail->isSMTP();
			$mail->SMTPSecure = 'tls';
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host = "smtp.gmail.com";
			$mail->Port = "587";
			$mail->SMTPAuth = true;
			$mail->Username = "mcs.movie.bot@gmail.com";
			$mail->Password = "qazxsw!@#123";
			$mail->setFrom("mcs.movie.bot@gmail.com", "movieBOT");
			$mail->addAddress($to, $to);
			$mail->Subject = $subject;
			$mail->msgHTML($msg);
			$mail->AltBody = $subject;
			
			if (!$mail->send()) {
				$message_output = "<div class='alert alert-danger'>
				  <strong>Σφάλμα!</strong> Σφάλμα κατα την αποστολή του μηνύματος υπενθύμισης.
				</div>";
			} else {
				$message_output = "<div class='alert alert-success'>
				  <strong>Επιτυχία!</strong> Το μήνυμα υπενθύμισης εστάλει με επιτυχία.
				</div>";
			}	
		}
		else{
			$message_output = "<div class='alert alert-danger'>
				  <strong>Σφάλμα!</strong> Ο χρήστης " . $_POST['email'] . " δεν υπάρχει στην βάση δεδομένων μας
				</div>";
		}
	}
	?>
	
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Υπενθύμιση κωδικού</h2>
                    <?php echo $message_output; ?>
                    <form method="POST" action="reminder.php">
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="text" id="email" name="email" placeholder="Πληκρολογήστε το email σας">
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Υπενθύμιση</button>
                            &nbsp;&nbsp;&nbsp;<a href="login.php">Σύνδεση</a> &nbsp;&nbsp;&nbsp; | 
                            &nbsp;&nbsp;&nbsp;<a href="register.php">Δημιουργία λογαριασμού</a> 
                        </div>
                        
                        <div id="warning" style="height:0px; transition-property:height; transition-duration:0.5s;">
                        <div id="message" style="display:none; color:#b20000; font-size:12px; padding:10px;"></div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <script src="js/global.js"></script>
    
    <script src="ajax/ajax.js"></script>

</body>

</html>
