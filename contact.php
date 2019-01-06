
<!DOCTYPE html>
<html lang="en">

<?php include "includes/config.php"; ?>

<?php include "includes/head.php"; ?>

<body>
	
	<?php include "includes/header.php"; ?>
	
	<?php
	$message_output = "";
	if(isset($_POST["text"]) && $_POST["text"] != "" && isset($_POST["email"]) && $_POST["email"] != ""){
		
		$msg = "";
		
		$subject = "Επικοινωνία από movieBOT";
		$to = "mcs.movie.bot@gmail.com";
							
		$msg .="<p>Μήνυμα από ".$_POST['first_name']." ".$_POST['last_name']."</p><br>";
		$msg .="<p>Email: ".$_POST['email']." Phone: ".$_POST['phone']."</p><br>";
		$msg .="<p>Μήνυμα: </p><br>";
		$msg .= $_POST['text'];
		
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
			  <strong>Σφάλμα!</strong> Σφάλμα κατα την αποστολή του μηνύματος.
			</div>";
		} else {
			$message_output = "<div class='alert alert-success'>
			  <strong>Επιτυχία!</strong> Το μήνυμα εστάλει με επιτυχία.
			</div>";
		}	
	}
	?>
	
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Φόρμα Επικοινωνίας</h2>
                    <?php echo $message_output; ?>
                    <form method="POST" action="contact.php">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Όνομα</label>
                                    <input class="input--style-4" type="text" id="first_name" name="first_name" placeholder="Όνομα" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Επώνυμο</label>
                                    <input class="input--style-4" type="text" id="last_name" name="last_name" placeholder="Επώνυμο" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" id="email" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Τηλέφωνο</label>
                                    <input class="input--style-4" type="text" id="phone" name="phone" placeholder="Τηλέφωνο">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <textarea class="input--style-4" rows="3" cols="35" type="text" id="text" name="text" placeholder="Μήνυμα" required></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Αποστολή</button>
                        </div>
                        
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

</body>

</html>
