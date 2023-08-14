<?php
require_once('connection.php');

if (isset($_POST['submit_w'])) {
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    $TIN = $_POST['TIN'];
    $fullname = $_POST['fullname'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $mydate=getdate(date("U"));
    $date="$mydate[year]-$mydate[mon]-$mydate[mday]";
    $fdate = strtotime($date);
    $joindate = date('Y-m-d', $fdate);
    $email = $_POST['email'];
    $confirmemail = $_POST['confirmemail'];
    $pwd = $_POST['password'];
    $confirmpwd = $_POST['confirmpassword'];

    // Validate TIN, email, and passwords (add more validation if needed)
    if (empty($TIN) || empty($email) || empty($pwd) || empty($confirmpwd)) {
        echo '<script>alert("Please fill in all the required fields!")</script>';
    } elseif ($email !== $confirmemail) {
        echo '<script>alert("Email addresses do not match!")</script>';
    } elseif ($pwd !== $confirmpwd) {
        echo '<script>alert("Passwords do not match!")</script>';
    } else {
        // Check if the email is already registered
        $query_check_email = "SELECT * FROM privateagency WHERE PrivateAgency_Email='$email'";
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

                            // Hash the password before storing in the database
                            $pwdhash = password_hash($pwd, PASSWORD_DEFAULT);

                            $query = "INSERT INTO `privateagency`(`PrivateAgency_TIN`, `PrivateAgency_Name`, `PrivateAgency_Location`, `PrivateAgency_Email`, `PrivateAgency_Phone`, `PrivateAgency_JoinDate`, `PrivateAgency_Logo`, `NewsLetter`, `PrivateAgency_Password`) VALUES ('$TIN','$fullname','$location','$email','$phone','$joindate','$fileNameNew','$newsletter','$pwdhash')";

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
<!-- The rest of your HTML code for the registration form follows... -->

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
                        
                        <form action="register-agency.php" method="post" id="loginForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>TIN Number</label>
                                    <input name="TIN" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Full Name</label>
                                    <input name="fullname" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Location</label>
                                    <input name="location" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Phone Number</label>
                                    <input name="phone" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Join Date</label>
                                    <input name="joindate" class="form-control" placeholder="<?php
                                    $mydate=getdate(date("U"));
                                    echo "$mydate[year]-$mydate[month]-$mydate[mday]";
                                    $mydate="$mydate[year]-$mydate[month]-$mydate[mday]";
                                    ?>" readonly>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Logo</label>
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