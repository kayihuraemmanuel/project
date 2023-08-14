<?php
require_once('connection.php');

if (isset($_POST['submit_w'])) {
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    $ID = $_POST['ID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $residence = $_POST['residence'];
    $placeofbirth = $_POST['placeofbirth'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $maritalstatus = $_POST['maritalstatus'];
    $phone = $_POST['phone'];
    $mydate=getdate(date("U"));
    $date="$mydate[year]-$mydate[mon]-$mydate[mday]";
    $fdate = strtotime($date);
    $joindate = date('d-m-Y', $fdate);
    $email = $_POST['email'];
    $confirmemail = $_POST['confirmemail'];
    $pwd = $_POST['password'];
    $confirmpwd = $_POST['confirmpassword'];
    if (empty($ID) || empty($email) || empty($pwd) || empty($confirmpwd)) {
        echo '<script>alert("Please fill in all the required fields!")</script>';
    } elseif ($email !== $confirmemail) {
        echo '<script>alert("Email addresses do not match!")</script>';
    } elseif ($pwd !== $confirmpwd) {
        echo '<script>alert("Passwords do not match!")</script>';
    } else {
        // Check if the email is already registered
        $query_check_email = "SELECT * FROM users WHERE email='$email'";
        $result_check_email = mysqli_query($con, $query_check_email);
        if (mysqli_num_rows($result_check_email) > 0) {
            echo '<script>alert("Email already registered!")</script>';
        } else {
            if (!empty($_FILES['file']['name'])) {
                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg', 'jpeg', 'png', 'pdf');
                if (in_array($fileActualExt, $allowed)) {
                    if ($fileError === 0) {
                        if ($fileSize < 1000000) {
                            $fileNameNew = "profile" . mt_rand() . "." . $fileActualExt;
                            $fileDestination = 'img/profile/' . $fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);
                            $pwdhash = password_hash($pwd, PASSWORD_DEFAULT);
                            $query = "INSERT INTO `users`(`identification_number`, `first_name`, `last_name`, `email`, `phone`, `residence`, `place_of_birth`, `date_of_birth`, `marital_status`, `gender`, `profile_picture`, `newsletter`, `user_type`, `password`)
                            VALUES ('$ID', '$firstname','$lastname','$email','$phone','$residence','$placeofbirth','$dateofbirth','$maritalstatus','$gender','$fileNameNew','$newsletter', 'citizen', '$pwdhash')";
                            if (mysqli_query($con, $query)) {
                                echo '<script>alert("Registration Successful!")</script>';
                                // Redirect to a success page if desired
                            } else {
                                echo '<script>alert("Registration failed. Please contact the site manager.")</script>';
                            }
                        } else {
                            echo '<script>alert("Your file is too big!")</script>';
                        }
                    } else {
                        echo '<script>alert("There was an error uploading your file!")</script>';
                    }
                } else {
                    echo '<script>alert("You cannot upload files of this type!")</script>';
                }
            } else {
                echo '<script>alert("Please choose a file!")</script>';
            }
        }
    }
}
?>
<?php include 'header-register.php'; ?>
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
      <img src="img/logo/logodep.svg" width="150" height="150" alt>
				<h3>Please Register to CHADISS</h3>
				<p>If you have an existing Account, Please Login!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        
                        <form action="register-citizen.php" method="post" id="loginForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>ID Number</label>
                                    <input name="ID" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>First Name</label>
                                    <input name="firstname" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Last Name</label>
                                    <input name="lastname" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Residence</label>
                                    <input name="residence" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Place Of Birth</label>
                                    <input name="placeofbirth" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Date Of Birth</label>
                                    <input type="date" name="dateofbirth" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <select name="maritalstatus" class="form-control">
                                        <option value="none" selected="" disabled="">Select Marital Status</option>
                                        <option value="Married">Married</option>
                                        <option value="Single">Single</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <select name="gender" class="form-control">
                                        <option value="none" selected="" disabled="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Phone Number</label>
                                    <input name="phone" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Join Date</label>
                                    <input name="joindate" class="form-control" placeholder="<?=date('d-m-Y')?>" readonly>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Profile Picture</label>
                                    <input name="file" type="file" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                    <input name="email" type="email"class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repeat Email Address</label>
                                    <input name="confirmemail" type="email" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repeat Password</label>
                                    <input name="confirmpassword" type="password" class="form-control">
                                </div>
                                <div class="checkbox col-lg-12">
                                    <input name="newsletter" value="True" type="checkbox" class="i-checks" checked> Sigh up for our newsletter
                                </div>
                            </div>
                            <div class="text-center">
                                <button name="submit_w" class="btn btn-success loginbtn">Register</button>
                                <button class="btn btn-default" onclick="resetForm()">Cancel</button>
                                <a class="btn btn-default" href="login.php" style="width: 80px;">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				
			</div>
		</div>   
    </div>
    <?php include 'footer-register.php'; ?>