<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<link rel="stylesheet" href="images/Underground.css" type="text/css" />

<title>E-Workshop</title>

</head>

<body>
<!-- wrap starts here -->
<div id="wrap">

		<!-- header -->
		<div id="header">

			<!-- tabs -->
		    <ul>
				<li id="current"><a href="index.php"><span>Home</span></a></li>
                <?php
                if(isset($_SESSION[custid]))
				{
                echo "<li><a href='account.php'><span>Account</span></a></li>";
				}
				else if(!(isset($_SESSION[empid])))
				{
           		echo "<li><a href='login.php'><span>Login</span></a></li>
				<li><a href='registration.php'><span>Registration</span></a></li>
				<li><a href='service.php'><span>Vehicle Service</span></a></li>";
				}
				?>
				<li><a href="vehiclestore.php"><span>Vehicle Store</span></a></li>
				<li><a href="sparepartsstore.php"><span>Spare Parts</span></a></li>
			</ul>
		</div>

		<div id="header-logo">

			<div id="logo">
				<span class="red">Online Vehicle Management System</span>
			</div>

		</div>
