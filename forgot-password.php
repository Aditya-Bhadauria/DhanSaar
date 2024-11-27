<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit'])) {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

    $query=mysqli_query($con,"select ID from tbluser where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
        $_SESSION['contactno']=$contactno;
        $_SESSION['email']=$email;
        header('location:reset-password.php');
    }
    else{
        $msg="Invalid Details. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DhanSaar- Forgot Password</title>
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
            margin-top: 50px;
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
            padding: 20px;
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
        .sidebar {
    background-color: #ede7f6;
    color: black;
}

    </style>
</head>
<body>
    <div class="row">
        <h1 align="center">DhanSaar</h1>
        <hr />
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Forgot Password</div>
                <div class="panel-body">
                    <p style="font-size:16px; color:red" align="center"> 
                        <?php if($msg){ echo $msg; } ?> 
                    </p>
                    <form role="form" action="" method="post" id="forgot-password" name="forgot-password">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" required="true">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mobile Number" name="contactno" type="contactno" value="" required="true">
                            </div>
                            <div class="checkbox">
                                <button type="submit" name="submit" class="btn btn-primary">Reset</button>
                                <span style="padding-left:250px">
                                    <a href="index.php" class="btn btn-primary" style="color: #4A148C;">Login</a>
                                </span>
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
