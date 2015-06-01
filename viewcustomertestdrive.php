<?php
include("header.php");
include("sidebar.php");

include("dbconnection.php");
if(isset($_GET['testid']))
{
$results = mysql_query("DELETE from testdrive where bookingid ='$_GET[testid]'");
}
if(isset($_SESSION['custid']))
{
$result = mysql_query("select * from testdrive where custid='$_SESSION[custid]'");
}
else
{
$result= mysql_query("select * from testdrive");
}
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>Test drive</h1>
            <?php

	echo "<center><b><a href='testdrive.php'>Add New test drive</a></b></center>";

	?>
		<form id="form1" name="form1" method="post" action="">
		  <table width="686" border="1">
		    <tr>
		      <th scope="col">Booking ID</th>
		      <th scope="col">Vehicle ID</th>
		      <th scope="col">Customer ID</th>
		      <th scope="col">Date</th>
		      <th scope="col">Time</th>
              <th scope="col">Comments</th>
                <th scope="col">Status</th>
		      <th scope="col">Action</th>
	        </tr>
             <?php
		  while($arrrec= mysql_fetch_array($result))
		  {  
		  
$result1= mysql_query("select * from testdrive where vehicleid='$arrrec[vehicleid]'");
$arrrec1= mysql_fetch_array($result1);

		    echo "<tr>
		      <th scope='col'>$arrrec[bookingid]</th>
		      <th scope='col'>$arrrec[vehicleid]</th>
		      <th scope='col'>$arrrec[custid]</th>
		      <th scope='col'>$arrrec[date]</th>
		      <th scope='col'>$arrrec[time]</th>
			   <th scope='col'>$arrrec[comments]</th>
		      <th scope='col'>$arrrec[status]</th>
		      <th scope='col'>"; if(!isset($_SESSION['custid'])) { ?><?php echo "<a href='testdrive.php?testid=$arrrec[bookingid]'>Edit</a> | "; ?><?php } ?>
			  	<?php echo "<a href='viewtestdrive.php?testid=$arrrec[bookingid]'>Delete</a></th>
	        </tr>";
			}
         ?>
          </table>
		</form>

		  <p>&nbsp;</p>
<br />					
											
		</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>