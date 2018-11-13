<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['token'])){
	header("Location: index.php");
	die();
}
?>
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
                    <h2 class="title">Δημιουργία λογαριασμού ή <a href="login.php">Σύνδεση</a></h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Όνομα</label>
                                    <input class="input--style-4" type="text" id="first_name" name="first_name" onKeyUp="fadeout()">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Επώνυμο</label>
                                    <input class="input--style-4" type="text" id="last_name" name="last_name" onKeyUp="fadeout()">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Ημ/νία Γέννησης</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" id="birthday" name="birthday" onKeyUp="fadeout()">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Φύλο</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Άνδρας
                                            <input type="radio" checked="checked" value="m" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Γυναίκα
                                            <input type="radio" value="f" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" id="email" name="email" onKeyUp="fadeout();" onBlur="checkEmail()">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Τηλέφωνο</label>
                                    <input class="input--style-4" type="text" id="phone" name="phone" onKeyUp="fadeout()">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Κωδικός</label>
                                    <input class="input--style-4" type="password" id="password" name="password" onKeyUp="fadeout()">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Επανάληψη Κωδικού</label>
                                    <input class="input--style-4" type="password" id="repeat_password" name="repeat_password" onKeyUp="fadeout()">
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="button" id="register">Αποθήκευση</button>
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
