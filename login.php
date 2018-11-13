<!DOCTYPE html>
<html lang="en">

<?php include "includes/config.php"; ?>

<?php include "includes/head.php"; ?>

<body>
	
	<?php include "includes/header.php"; ?>
	
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Συνδεθείτε ή <a href="register.php">Δημιουργία λογαριασμού</a></h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="text" id="username" name="email" onKeyUp="fadeout()" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" id="password" name="password" onKeyUp="fadeout()" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="button" id="login" >Σύνδεση</button>
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
