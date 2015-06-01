<?php
include("header.php");

include("sidebar.php");
include("dbconnection.php");
$sql = mysql_query("select * from vehiclestore where vehicleid=$_GET[vahicleid]");
$row = mysql_fetch_array($sql);
?>
		
							
		<div id="main">
	    <h3>Vehicle store</h3>

											
		<table width="538" border="1">
		  <tr>
		    <td width="268">
            <p><img src="upload/<?= $row['images']; ?>" width="208" height="130" align="left" /><br />
              <br />
            </p></td>
		    <td width="246"><p><strong>Vehicle Name:</strong> <?= $row['vehname']; ?><br />
              <strong>Model:</strong> <?= $row['model']; ?> <br />
              <strong>              Brand:</strong> <?= $row['brand']; ?><br />
              <br />
              <br />
            </p></td>
	      </tr>
		  <tr>
		    <td>Other Information</td>
		    <td><p><?= $row['description']; ?></p>
	        </td>
	      </tr>
		  <tr>
		    <td colspan="2"><strong>Estimated price: Rs.<?= $row['estprice']; ?></strong></td>
	      </tr>
		  <tr>
		    <td colspan="2" align="right"><strong><?php echo"<a href='vehiclestorebook.php?vahicleid=$row[vehicleid]'>Book Vehicle Now&gt;&gt;</a></strong></td>"; ?>
	      </tr>
		  </table>
		</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>