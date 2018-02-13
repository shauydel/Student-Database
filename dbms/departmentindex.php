<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: departmentlogin.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: tables.html");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
         body {
            background-image: url("pic7.jpg");
background-size:cover;
			}
      </style>

	
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong> 
			<p><a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>
<br><br><br>
<center>		
   <a href="http://localhost/healthcare/doctor.php" class="btn">Enter Doctor Interface</a>
   <a href="http://localhost/healthcare/patient.php" class="btn">Enter Patient Interface</a>
   <a href="http://localhost/healthcare/prescription.php" class="btn">Enter Prescription Interface</a>
   <a href="http://localhost/healthcare/invoice.php" class="btn">Enter Invoice Interface</a>
   <a href="http://localhost/healthcare/payment.php" class="btn">Enter Payment Interface</a>
   
		
		</center>
		
</body>
</html>
