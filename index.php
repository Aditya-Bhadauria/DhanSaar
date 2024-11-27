<?php session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['detsuid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DhanSaar- Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
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
            padding: 15px;
        }
		.panel-heading {
			background-color: #D8B7DD;
            color: #4A148C;
            font-size: 24px;
            text-align: center;
            border-radius: 10px;
            /* padding: 10px; */
        }
		.panel-body {
			background-color: #fff;
			/* padding: 30px; */
		}
		.form-group input {
            border: 2px solid #D8B7DD;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            font-size: 16px;
        }
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
		.btn-primary:focus {
			outline: none;
			box-shadow: 0 0 5px #ffea00;
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
		.alert {
			font-size: 16px;
			color: #ff0000;
			text-align: center;
		}
	</style>
</head>
<body>

	<div class="container">
		<h1 align="center">DhanSaar</h1>
		<hr />
		<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<p class="alert"><?php if($msg){ echo $msg; } ?></p>
					<form role="form" action="" method="post" id="" name="login">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" required="true">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required="true">
							</div>
							<button type="submit" value="login" name="login" class="btn btn-primary">Log in</button>
							<div class="checkbox">
								<a href="forgot-password.php">Forgot Password?</a>
								<br>
								<a href="register.php">Don't have an account? Register here</a>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
