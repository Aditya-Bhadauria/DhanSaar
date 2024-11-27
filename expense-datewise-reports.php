<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DhanSaar || Datewise Expense Report</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
	<!-- Custom Styles for Theme -->
	<!-- Custom Styles for Theme -->
<style>
    /* Apply the background gradient */
    body {
        background: linear-gradient(135deg, #D8B7DD, #FFF9C4);
        font-family: 'Arial', sans-serif;
        color: #333; /* Adjust text color */
    }

    /* Styling the panel header */
    .panel-heading {
        background-color: #6A1B9A; /* Deep purple */
        color: #fff;
        font-size: 18px;
        padding: 10px 15px;
        border-radius: 15px 15px 0 0; /* Rounded top corners for panel */
    }

    /* Styling the panel body */
    .panel-body {
        background-color: rgba(255, 255, 255, 0.9); 
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 0 0 15px 15px; /* Rounded bottom corners */
        padding: 20px;
    }

    /* Styling form controls */
    .form-control {
        border: 2px solid #6A1B9A; /* Purple border */
        border-radius: 25px; /* Rounded input fields */
        padding: 10px;
        font-size: 16px;
        color: #333; /* Dark text color */
    }

    /* Styling the submit button */
    .btn-primary {
        background-color: #FFEB3B; /* Yellow button */
        border-color: #FBC02D;
        color: #333; /* Dark text */
        /* border-radius: 25px; Rounded button */
        /* font-weight: bold; */
    }

    .btn-primary:hover {
        background-color: #FBC02D;
    }

    /* Styling the breadcrumb */
    .breadcrumb {
        background-color: #D8B7DD;
        border-radius: 5px;
		font-size: 14px;
        /* font-family: 'Montserrat', sans-serif; */
    }
	.sidebar {
    background-color: #ede7f6;
    color: black;
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
				<li class="active" style="font-family:Arial,sans-serif	">Datewise Expense Report</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Datewise Expense Report</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center"> 
							<?php if($msg){ echo $msg; } ?> 
						</p>
						<div class="col-md-12">
							<form role="form" method="post" action="expense-datewise-reports-detailed.php" name="bwdatesreport">
								<div class="form-group">
									<label>From Date</label>
									<input class="form-control" type="date" id="fromdate" name="fromdate" required="true">
								</div>
								<div class="form-group">
									<label>To Date</label>
									<input class="form-control" type="date" id="todate" name="todate" required="true">
								</div>
								<div class="form-group has-success">
									<button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
