<?php
ob_start();
include("header.php");
include("sidebar.php");
include("dbconnection.php");
if(isset($_SESSION[custid]))
{
	header("Location: account.php");
}
?>
<div id="main">
	    <h3>Employee Home Page</h3>


  <table width="539" border="1">
    <tr>
      <td width="382" height="45" align="center" valign="middle"><strong>No. of customers</strong></td>

      <td width="141" align="center" valign="middle">
        <strong>
        <?php
$sqlcount = mysql_query("select * from customer");
echo mysql_num_rows($sqlcount);
?>
      </strong></td>
    </tr>
    <tr>
      <td height="42" align="center" valign="middle"><strong>Number of vehicle service requests</strong></td>
      <td align="center" valign="middle">
        <strong>
        <?php
$sqlcount = mysql_query("select * from service where status='Pending'");
echo mysql_num_rows($sqlcount);
?>
      </strong></td>
    </tr>

    <tr>
      <td height="40" align="center" valign="middle"><strong>Spare parts orders</strong></td>
      <td align="center" valign="middle">
		<strong>
		<?php
			$sqlcount = mysql_query("select * from sparepartsorder where deliverydate='0000-00-00'");
			echo mysql_num_rows($sqlcount);
			?>
      </strong></td>
    </tr>

    <tr>
      <td height="33" align="center" valign="middle"><strong>Used vehicles</strong></td>
      <td align="center" valign="middle"><strong>
        <?php
            $sqlcount = mysql_query("select * from vehicle where status ='Pending'");
			echo mysql_num_rows($sqlcount);
			?>
      </strong></td>
    </tr>
    <tr>
      <td height="40" align="center" valign="middle"><strong>No. of vehices in Vehicle store</strong></td>
      <td align="center" valign="middle">
	    <strong>
	    <?php
           $sqlcount = mysql_query("select * from vehiclestore where status !='Sold'");
			echo mysql_num_rows($sqlcount);
			?>
      </strong></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="middle"><strong>No. of test drive requests</strong></td>
      <td align="center" valign="middle"> <strong>
        <?php
           $sqlcount = mysql_query("select * from testdrive where status ='Pending'");
			echo mysql_num_rows($sqlcount);
			?>
      </strong></td>
    </tr>
  </table>
  </div>

<!-- wrap ends here -->
</div>

<?php
include("footer.php");
?>
