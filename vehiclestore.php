<?php
session_start();
include("header.php");
		if(isset($_SESSION[empid]))
	{
		header("Location: empaccount.php");
	}
include("sidebar.php");
include("dbconnection.php");
$sql = mysql_query("select * from vehiclestore where status != 'Sold'");

?>


		<div id="main">
	    <h3>Vehicle store</h3>

		<div id="wrapper">
        <?php
		   while($row = mysql_fetch_array($sql))
        {
		?>
        <div id="products">
        <table width="497" border="0">
        <tr>
        <td><img src="upload/<?= $row['images']; ?>" width="122" height="95" align="left" /><strong>Vehicle Name:</strong> <?= $row['vehname']; ?><br />
        <strong>Model:</strong> <?= $row['model']; ?> <br />
        <strong>              Brand:</strong><?= $row['brand']; ?><br />
              <strong>Estimated price: </strong>$<?= $row['estprice']; ?><br />
              <strong>              <?php echo "<br><a href='testdrive.php?vahicleidnum=$row[vehicleid]'>Test Drive&gt;&gt;</a>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; <a href='vehiclestoremore.php?vahicleid=$row[vehicleid]'>More&gt;&gt;</a></strong><br />"; ?>
              <br />
            </p>
        </td></tr></table>
        </div>
         <?
		}
		?>
        </div>

		<!--<table width="538" border="1">


		  <tr>
            <td width="268">
            <p><img src="images/vehicle.jpg" width="122" height="95" align="left" /><strong>Vehicle Name:</strong> <?= $row['vehname']; ?><br />
              <strong>Model:</strong> <?= $row['vehname']['0']; ?> <br />
              <strong>              Brand:</strong> tyere<br />
              <strong>Estimated price: </strong>Rs.20000<br />
              <strong>              <a href="vehiclestoremore.php">More&gt;&gt;</a></strong><br />
              <br />
            </p></td>
		    <td width="246"><p><img src="images/vehicle.jpg" width="122" height="95" align="left" /><strong>Vehicle Name:</strong> <?= $row['vehname']; ?><br />
              <strong>Model:</strong>  <?= $row['vehname']['1']; ?> <br />
              <strong>              Brand:</strong> tyere<br />
              <strong>Estimated price: </strong>Rs.20000<br />
              <strong>              <a href="vehiclestoremore.php">More&gt;&gt;</a></strong><br />
              <br />
            </p></td>
	      </tr>
         <?
		 // }
		  ?>
		  <tr>
		    <td>&nbsp;<p><img src="images/vehicle.jpg" width="122" height="95" align="left" /><strong>Vehicle Name:</strong> <?= $row['vehname']; ?><br />
              <strong>Model:</strong> <?= $row['vehname']; ?> <br />
              <strong>              Brand:</strong> tyere<br />
              <strong>Estimated price: </strong>Rs.20000<br />
              <strong>              <a href="vehiclestoremore.php">More&gt;&gt;</a></strong><br />
              <br />
            </p></td>
		    <td>&nbsp;<p><img src="images/vehicle.jpg" width="122" height="95" align="left" /><strong>Vehicle Name:</strong> <?= $row['vehname']; ?><br />
              <strong>Model:</strong> <?= $row['vehname']; ?> <br />
              <strong>              Brand:</strong> tyere<br />
              <strong>Estimated price: </strong>Rs.20000<br />
              <strong>              <a href="vehiclestoremore.php">More&gt;&gt;</a></strong><br />
              <br />
            </p></td>
	      </tr>
            <tr>
		    <td>&nbsp;<p><img src="images/vehicle.jpg" width="122" height="95" align="left" /><strong>Vehicle Name:</strong> <?= $row['vehname']; ?><br />
              <strong>Model:</strong>  <?= $row['vehname']; ?> <br />
              <strong>              Brand:</strong> tyere<br />
              <strong>Estimated price: </strong>Rs.20000<br />
              <strong>              <a href="vehiclestoremore.php">More&gt;&gt;</a></strong><br />
              <br />
            </p></td>
		    <td>&nbsp;<p><img src="images/vehicle.jpg" width="122" height="95" align="left" /><strong>Vehicle Name:</strong> <?= $row['vehname']; ?><br />
              <strong>Model:</strong>  <?= $row['vehname']; ?> <br />
              <strong>              Brand:</strong> tyere<br />
              <strong>Estimated price: </strong>Rs.20000<br />
              <strong>              <a href="vehiclestoremore.php">More&gt;&gt;</a></strong><br />
              <br />
            </p></td>
	      </tr>  <tr>
		    <td>&nbsp;<p><img src="images/vehicle.jpg" width="122" height="95" align="left" /><strong>Vehicle Name:</strong> <?= $row['vehname']; ?><br />
              <strong>Model:</strong>  <?= $row['vehname']; ?> <br />
              <strong>              Brand:</strong> tyere<br />
              <strong>Estimated price: </strong>Rs.20000<br />
              <strong>              <a href="vehiclestoremore.php">More&gt;&gt;</a></strong><br />
              <br />
            </p></td>
		    <td>&nbsp;<p><img src="images/vehicle.jpg" width="122" height="95" align="left" /><strong>Vehicle Name:</strong> <?= $row['vehname']; ?><br />
              <strong>Model:</strong>  <?= $row['vehname']; ?> <br />
              <strong>              Brand:</strong> tyere<br />
              <strong>Estimated price: </strong>Rs.20000<br />
              <strong>              <a href="vehiclestoremore.php">More&gt;&gt;</a></strong><br />
              <br />
            </p></td>
	      </tr>
		  </table>-->
		</div>

<!-- wrap ends here -->
</div>

<?php
include("footer.php");
?>
