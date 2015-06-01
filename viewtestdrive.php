<?php
include("header.php");
include("sidebar.php");

include("dbconnection.php");
if(isset($_GET['testid']))
{
$results = mysql_query("DELETE from testdrive where bookingid ='$_GET[testid]'");
}

if(isset($_GET['testbid']))
{
$results = mysql_query("UPDATE testdrive SET status='Approved' where bookingid ='$_GET[testbid]'");
}

if(isset($_GET['testbida']))
{
$results = mysql_query("UPDATE testdrive SET status='Rejected' where bookingid ='$_GET[testbida]'");
}
if(isset($_GET["testbidab"]))
{
	echo "test";
$results = mysql_query("UPDATE testdrive SET status='Completed' where bookingid ='$_GET[testbidab]'");
}


$result= mysql_query("select * from testdrive");
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>Test drive</h1>
          
		<form id="form1" name="form1" method="post" action="">
		  <table width="672" border="1">
		    <tr>
		      <th width="76" scope="col">Booking <br />          ID</th>
              
		      <th width="123" scope="col">Vehicle details</th>
		      <th width="128" scope="col">Customer details</th>
		      <th width="108" scope="col">Booking <br />	          Date / Time</th>
		      <th width="71" scope="col">Comments</th>
                <th width="70" scope="col">Status</th>
              
		      <th width="64" scope="col">Action</th>
           
	        </tr>
             <?php
		  while($arrrec= mysql_fetch_array($result))
		  {  
		  
$result1= mysql_query("select * from vehiclestore where vehicleid='$arrrec[vehicleid]'");
$arrrec1= mysql_fetch_array($result1);

$result2= mysql_query("select * from customer where custid='$arrrec[custid]'");
$arrrec2= mysql_fetch_array($result2);


		    echo "<tr>
		      <td>$arrrec[bookingid]</td>
		      <td>

			  <b>Vehicle ID:</b> $arrrec1[vehicleid]<br>
			  <b>Vehicle Name:</b> $arrrec1[vehname]<br>
			  <b>Vehicle Model:</b> $arrrec1[model]<br>
			  </td>
		      <td>
			  <b>Customer ID: </b>$arrrec2[custid]<br>
			  <b>Name: </b>$arrrec2[fname] $arrrec2[lname]<br>
			  <b>Contact No.: </b><br>$arrrec2[contactno1]<br>
			  </td>
		      <td><strong>Date:</strong> $arrrec[date] <br>
			  <strong>Time:</strong> $arrrec[time]</td>
			   <td>$arrrec[comments]</td>";
		   
			echo "<td><b>$arrrec[status]</b><br>";
			
	if(isset($_SESSION[empid]))
{
		if($arrrec[status] != "Completed")
		{
					echo "<a href='viewtestdrive.php?testbid=$arrrec[bookingid]'>Accept</a><br>";
					echo "<a href='viewtestdrive.php?testbida=$arrrec[bookingid]'>Reject</a><br>";
				echo "<a href='viewtestdrive.php?testbidab=$arrrec[bookingid]'>Completed</a></td>";
		}
}
		      echo "</td><td>";
			 if($arrrec[status] != "Completed")
			 {
			  echo " <a href='testdrive.php?testid=$arrrec[bookingid]'>Edit</a> | 
			  <a href='viewtestdrive.php?testid=$arrrec[bookingid]'>Delete</a>";
			 }
			  echo "</td></tr>";
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