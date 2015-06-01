<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
$sql = mysql_query("select * from vehiclestore where vehicleid=$_POST[vahicleid]");
$row = mysql_fetch_array($sql);
?>
<?
if(isset($_POST['submit']))
{
//echo $_POST['comments'];

$sql = false;
$date = date("Y-m-d");

$sql ="insert into booking(vehicleid,custid,purchasedate,comments,paid,paymenttype) values('$_POST[vahicleid]','$_SESSION[custid]','$date','$_POST[comments]','$_POST[vehprice]','Pending')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$sql = mysql_query("update vehiclestore set status='Sold' where vehicleid='$_POST[vahicleid]'");

	//if (!mysql_query($sql,$con))
	  if($sql !== true)
	  {
	  die('Error: ' . mysql_error());
	  echo "not working";
	  }
}

$sql = mysql_query("select * from vehiclestore where vehicleid='$_POST[vahicleid]'");
$row = mysql_fetch_array($sql);
?>			
							
		<div id="main">
	    <h3>Vehicle store</h3>

											
		<table width="538" border="1">
		  <tr>
		    <td height="45" colspan="2"><h2>Vehicle booked successfully...</h2></td>
	      </tr>
		  <tr>
		    <td width="268">
            <p><img src="upload/<?= $row['images']; ?>" width="208" height="130" align="left" /><br />
              <br />
            </p></td>
		    <td width="246"><p><strong>Vehicle Name:</strong><?= $row['vehname']; ?><br />
              <strong>Model:</strong>  <?= $row['model']; ?>  <br />
              <strong>              Brand:</strong> <?= $row['brand']; ?><br />
              <br />
              <br />
            </p></td>
	      </tr>
		  <tr>
		    <td>Other Information</td>
		    <td><p><?= $row['description']; ?></p><br />
	          </td>
	      </tr>
		  <tr>
		    <td colspan="2"><strong>Estimated price: Rs.<?= $row['estprice']; ?></strong></td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
	      </tr>
		  </table>
		</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>