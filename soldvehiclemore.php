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
          <?php
		  $sql = mysql_query("select paid from booking where vehicleid='$_GET[vahicleid]'");
		  $row = mysql_fetch_array($sql);
		  ?>
		  <tr>
		    <td colspan="2"><strong>Paid price: Rs.<?= $row['paid']; ?></strong></td>
	      </tr>
		   </table>
		</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>