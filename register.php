<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit'])) {
    $fname = $_POST['name'];
    $mobno = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $ret = mysqli_query($con, "select Email from tbluser where Email='$email'");
    $result = mysqli_fetch_array($ret);
    if($result > 0) {
        $msg = "This email is associated with another account";
    } else {
        $query = mysqli_query($con, "insert into tbluser(FullName, MobileNumber, Email, Password) values('$fname', '$mobno', '$email', '$password')");
        if($query) {
            $msg = "You have successfully registered";
        } else {
            $msg = "Something went wrong. Please try again";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DhanSaar - Signup</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script type="text/javascript">
        function checkpass() {
            if(document.signup.password.value != document.signup.repeatpassword.value) {
                alert('Password and Repeat Password fields do not match');
                document.signup.repeatpassword.focus();
                return false;
            }
            return true;
        }
    </script>
    <style>
        body {
			background: linear-gradient(135deg, #D8B7DD, #FFF9C4);
            font-family: 'Arial', sans-serif;
        }

        h1 {
            color: #4A148C;
			margin-top: 20px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
			font-size: 50px;
        }
        .login-panel {
            border-color: #D8B7DD;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 30px;
        }

        .panel-heading {
			background-color: #D8B7DD;
            color: #4A148C;
            font-size: 24px;
            text-align: center;
            border-radius: 10px;
            padding: 10px;
        }

        .panel-body {
			background-color: #fff;
            padding: 30px;
        }

        /* Form input field styles */
        .form-group input {
            border: 2px solid #D8B7DD;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            font-size: 16px;
        }

        /* Button styles */
        .btn-primary {
            background-color: #D8B7DD;
            border-color: #D8B7DD;
            color: #4A148C;
            font-size: 18px;
            padding: 10px 20px;
            width: 100%;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover {
            background-color: #E1BEE7;
            color: #4A148C;
            border-color: #4A148C;
        }
		.checkbox {
            text-align: center;
        }
    
		.panel-body a {
            color: #D8B7DD;
            text-decoration: none;
            font-size: 16px;
            /* display: block; */
            text-align: center;
            margin-top: 10px;
        }
        .panel-body a:hover {
            color: #4A148C;
        }

        p {
            color: #4A148C;
            font-size: 16px;
            text-align: center;
        }

        .form-group input:focus {
            border-color: #4A148C;
            box-shadow: 0 0 8px rgba(74, 20, 140, 0.3);
        }
    </style>
</head>
<body>

<div class="row">
    <h1 align="center">KHATA BOOK</h1>
    <hr />
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Sign Up</div>
            <div class="panel-body">
                <form role="form" action="" method="post" name="signup" onsubmit="return checkpass();">
                    <p><?php if($msg) { echo $msg; } ?></p>
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Full Name" name="name" type="text" required="true">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" required="true">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" required="true">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Repeat Password" required="true">
                        </div>
                        <div class="checkbox">
                            <button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button>
                            <span style="padding-left:250px">
                            <a href="index.php" class="btn btn-primary" style="color: #4A148C;">Login</a></span>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
