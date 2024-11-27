<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
} else {

if(isset($_POST['submit'])) {
  	$userid=$_SESSION['detsuid'];
    $dateexpense=$_POST['dateexpense'];
    $item=$_POST['item'];
    $costitem=$_POST['costitem'];
    $query=mysqli_query($con, "insert into tblexpense(UserId,ExpenseDate,
    ExpenseItem,ExpenseCost) value('$userid','$dateexpense','$item','$costitem')");
    if($query){
        echo "<script>alert('Expense has been added');</script>";
        echo "<script>window.location.href='manage-expense.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DhanSaar || Add Expense</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(135deg, #D8B7DD, #FFF9C4); /* Purple to Yellow gradient */
            font-family: 'Arial', sans-serif;
            color: #333;
		}
        .sidebar {
            background-color: #ede7f6;
            color: black;
        }


        /* Panel heading */
        .panel-heading {
            background-color: #6A1B9A; /* Purple */
            color: #fff;
            font-size: 18px;
            padding: 10px 15px;
            border-radius: 5px 5px 0 0;
        }

        /* Panel body with semi-transparent background */
        .panel-body {
            background-color: rgba(255, 255, 255, 0.8); /* Transparent white */
            border-radius: 0 0 5px 5px;
            padding: 20px;
        }

        /* Button styling */
        .btn-primary {
            background-color: #FFEB3B; /* Yellow button */
            border-color: #FBC02D;
            color: #333;
        }

        .btn-primary:hover {
            background-color: #FBC02D;
            border-color: #FBC02D;
            color: #333;
        }

        /* Form input border and rounded corners */
        .form-control {
            border: 2px solid #6A1B9A; /* Purple border */
            border-radius: 8px; /* Rounded corners */
        }

        .breadcrumb {
            background-color: #D8B7DD; /* Light purple background */
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php include_once('includes/header.php');?>
    <?php include_once('includes/sidebar.php');?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Expense</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Expense</div>
                    <div class="panel-body">
                        <p style="font-size:16px; color:red" align="center">
                            <?php if($msg){ echo $msg; } ?>
                        </p>
                        <div class="col-md-12">
                            <form role="form" method="post" action="">
                                <div class="form-group">
                                    <label>Date of Expense</label>
                                    <input class="form-control" type="date" value="" name="dateexpense" required="true">
                                </div>
                                <div class="form-group">
                                    <label>Item</label>
                                    <input type="text" class="form-control" name="item" value="" required="true">
                                </div>

                                <div class="form-group">
                                    <label>Cost of Item</label>
                                    <input class="form-control" type="text" value="" required="true" name="costitem">
                                </div>

                                <div class="form-group has-success">
                                    <button type="submit" class="btn btn-primary" name="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.panel-->
            </div><!-- /.col-->
            <?php include_once('includes/footer.php');?>
        </div><!-- /.row -->
    </div><!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
<?php } ?>
