<?php
session_start();
?>
<?php include 'header-register.php'; ?>
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
        <img src="img/logo/logodep.svg" width="150" height="150" alt>
				<h3>PLEASE LOGIN TO CHADISS</h3>
				<p>If you don't have Account or it's locked Please Contact System Administrator!</p>
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
        $pass = md5($_POST['password']);
        $query = "SELECT * FROM users WHERE user_names='" . $username . "' AND password='" . $pass . "'";
        $result = mysqli_query($con, $query);

        if ($row = mysqli_fetch_assoc($result)) {

            // User credentials are correct, set session variables
            $_SESSION["user_id"] = $row['id'];

            // Check if the "Remember Me" checkbox is checked
            if (isset($_POST['remember_me']) && $_POST['remember_me'] == 'on') {
                // Set a cookie to remember the user for 30 days (you can adjust the expiration time as needed)
                setcookie("remember_me_cookie", $row['id'], time() + (30 * 24 * 60 * 60));
            }

            echo("<script>location.href='myaccount.php?user=" . $row['user_names'] . "';</script>");
        } else {
            echo("<div class='error_message text--center'>Invalid!<br> Enter Correct user name and password.</div>");
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
                        </form>
                    </div>
                </div>
			</div>
		</div>   
    </div>
<?php include 'footer-register.php'; ?>