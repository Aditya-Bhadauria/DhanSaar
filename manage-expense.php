  <?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

//code deletion
if(isset($_GET['delid']))
{
$rowid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from tblexpense where ID='$rowid'");
if($query){
echo "<script>alert('Record successfully deleted');</script>";
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
	<title>DhanSaar || Manage Expense</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<style>
    body {
        background: linear-gradient(135deg, #D8B7DD, #FFF9C4); /* Purple to Yellow gradient */
        font-family: 'Arial', sans-serif;
        color: #333;
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

    /* Table styling */
    .table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th, .table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .table thead th {
        background-color: #6A1B9A; /* Purple background for headers */
        color: white;
    }

    .table tbody tr:hover {
        background-color:#9C4FBC; /* Yellow on hover */
    }

    /* Link styling */
    a {
        color: #FF8C00; /* Dark orange for links */
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Custom styling for delete link */
    a[href*="delid"] {
        color: #D32F2F; /* Red for delete links */
        font-weight: bold;
    }

    a[href*="delid"]:hover {
        color: #FF1744; /* Bright red on hover */
    }

	.sidebar {
    background-color: #ede7f6;
    color: black;
}


</style>

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
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
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
						<div class="col-md-12">
							
							<div class="table-responsive">
            <table class="table table-bordered mg-b-0">
              <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Expense Item</th>
                  <th>Expense Cost</th>
                  <th>Expense Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php
              $userid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"select * from tblexpense where UserId='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['ExpenseItem'];?></td>
                  <td><?php  echo $row['ExpenseCost'];?></td>
                  <td><?php  echo $row['ExpenseDate'];?></td>
                  <td><a href="manage-expense.php?delid=<?php echo $row['ID'];?>">Delete</a>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
               
              </tbody>
            </table>
          </div>
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
<?php }  ?>