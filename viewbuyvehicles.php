<?php
session_start();
include("header.php");
include("sidebar.php");

include("dbconnection.php");

$dt= date("Y-m-d");
if(isset($_GET["purchaseid"]))
{

mysql_query("UPDATE booking SET paymenttype='Delivered',deliverydate='$dt' where purchaseid='$_GET[purchaseid]'");
}
if(isset($_SESSION[custid]))
{
$result= mysql_query("select * from booking where custid='$_SESSION[custid]'");
}
else
{
$result= mysql_query("select * from booking");
}
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>View purchased Vehicles</h1>
            <?php
if($ctins == 1)
{
	echo "<center><b>Employees account created successfully...</b></center><br>";
	echo "<center><b><a href='emplogin.php'>Click here to Login.</a></b></center>";
}
else
{
	?>
<form id="form1" name="form1" method="post" action="">
		  <table width="754" border="1">
		    <tr>
		      <th width="81" scope="col">Purchase ID</th>
		      <th width="103" scope="col">Vehicle Name</th>
		      <th width="135" scope="col">Customer details</th>
		      <th width="92" scope="col">Date</th>
		      <th width="105" scope="col">Comments</th>
		      <th width="87" scope="col">Paid amount</th>
		      <th width="105" scope="col">Status</th>
		
		      
         
	        </tr>
          <?php
		  while($arrrec= mysql_fetch_array($result))
		  {  
$result1= mysql_query("select * from vehiclestore where vehicleid='$arrrec[vehicleid]'");
$arrrec1= mysql_fetch_array($result1);

$result2= mysql_query("select * from customer where custid='$arrrec[custid]'");
$arrrec2= mysql_fetch_array($result2);
		   echo" <tr>
		      <td>$arrrec[purchaseid]</td>
		      <td><b>Vehicle ID:</b> $arrrec1[vehicleid]<br>
			  <b>Vehicle Name:</b> $arrrec1[vehname]<br>
			  <b>Vehicle Model:</b> $arrrec1[model]</td>
			   <td><b>Customer ID:</b> </b>$arrrec2[custid]<br>
			  <b>Name: </b>$arrrec2[fname] $arrrec2[lname]<br>
			  <b>Contact No.: </b><br>$arrrec2[contactno1]<br></td>
		      <td>&nbsp;Purchase date: <br>&nbsp;$arrrec[purchasedate]&nbsp;<hr>
			  &nbsp;Delivery date:  <br>&nbsp;$arrrec[deliverydate]</td>
		      <td>&nbsp; $arrrec[comments]</td>
		      <td>&nbsp; $arrrec[paid]</td>
			  <td align='center'>&nbsp; $arrrec[paymenttype]";
			 if(isset($_SESSION[empid]))
			 {
			  if($arrrec[paymenttype]=="Pending")
			  {

				   echo "<br><a href='viewbuyvehicles.php?purchaseid=$arrrec[purchaseid]'><strong>Paid</strong></a>";
			  }
			 }
			 echo " </td>
	        </tr>";
		  }
	      ?>
          </table>
		</form>
   	<?php
	}
	?>
			<p>&nbsp;</p>
<br />					
											
		</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>