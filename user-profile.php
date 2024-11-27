<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $userid = $_SESSION['detsuid'];
        $fullname = $_POST['fullname'];
        $mobno = $_POST['contactnumber'];

        $query = mysqli_query($con, "update tbluser set FullName='$fullname', MobileNumber='$mobno' where ID='$userid'");
        if ($query) {
            $msg = "User profile has been updated.";
        } else {
            $msg = "Something Went Wrong. Please try again.";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DhanSaar || User Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
    <?php include_once('includes/header.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <h1 align="center">KHATA BOOK</h1>
            <hr />
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">User Profile</div>
                    <div class="panel-body">
                        <p style="font-size:16px; color:red" align="center"> 
                            <?php if ($msg) {
                                echo $msg;
                            } ?> 
                        </p>
                        <div class="col-md-12">
                            <?php
                            $userid = $_SESSION['detsuid'];
                            $ret = mysqli_query($con, "select * from tbluser where ID='$userid'");
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            <form role="form" method="post" action="">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="form-control" type="text" value="<?php echo $row['FullName']; ?>" name="fullname" required="true">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $row['Email']; ?>" required="true" readonly="true">
                                </div>
                                
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input class="form-control" type="text" value="<?php echo $row['MobileNumber']; ?>" required="true" name="contactnumber" maxlength="10">
                                </div>
                                <div class="form-group">
                                    <label>Registration Date</label>
                                    <input class="form-control" name="regdate" type="text" value="<?php echo $row['RegDate']; ?>" readonly="true">
                                </div>
                                
                                <div class="form-group has-success">
                                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div><!-- /.panel-->
            </div><!-- /.col-->
        </div><!-- /.row -->
    </div><!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php } ?>
