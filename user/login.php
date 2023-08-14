<?php
// session_start();
?>
<?php include 'header-register.php'; ?>
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
        <img src="img/logo/logodep.svg" width="150" height="150" alt>
				<h3>PLEASE LOGIN TO CHADISS</h3>
				<p>If you don't have Account Please Register!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
<?php

require_once('connection.php');

// Check if the form is submitted
if (isset($_POST['w_submit'])) {
    $name = $_POST['username'];

    // Check if username and password are provided
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo("<div class='error_message text--center'>Please Fill in the Blanks.</div>");
    } else {
        $username = $_POST['username'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);;
        $query = "SELECT * FROM users WHERE email='" . $username . "'";
        $result = mysqli_query($con, $query) or trigger_error($con->error);

        if ($row = mysqli_fetch_assoc($result)) {

            if(password_verify($_POST['password'], $row['password'])){
                // User credentials are correct, set session variables
                $_SESSION["user_id"] = $row['user_id'];
                $_SESSION["user_names"] = $row['first_name'] . ' ' . $row['last_name'];
                $_SESSION["profile_picture"] = $row['profile_picture'];
                $_SESSION["user_type"] = $row['user_type'];

                // Check if the "Remember Me" checkbox is checked
                if (isset($_POST['remember_me']) && $_POST['remember_me'] == 'on') {
                    // Set a cookie to remember the user for 30 days (you can adjust the expiration time as needed)
                    setcookie("remember_me_cookie", $row['id'], time() + (30 * 24 * 60 * 60));
                }

                echo("<script>location.href='submit-issue.php'</script>");
            }else{
                echo("<h3 class='text-danger mb-3 error_message text--center'>Invalid!<br> Enter Correct user name and password.</h3>");
            }

            
        } else {
            echo("<h3 class='text-danger mb-3 error_message text--center'>Invalid!<br> Enter Correct user name and password.</h3>");
        }
    }
} else {
    echo("<div class='error_message text--center'>login.</div>");
}
?>
                        <form name="login_form" id="loginForm" action="login.php" method="post" >
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Yur strong password</span>
                            </div>

                            <div class="checkbox login-checkbox">
                                <label>
										<input type="checkbox" class="i-checks" name="remember_me"> Remember me </label>
                                <p class="help-block small">(if this is a private computer)</p>
                            </div>

                            <button name="w_submit" class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="register-citizen.php">Register as Citizen</a>
                            <a class="btn btn-default btn-block" href="register-agency.php">Register as Private Agency</a>
                        </form>
                    </div>
                </div>
			</div>
		</div>   
    </div>
<?php include 'footer-register.php'; ?>