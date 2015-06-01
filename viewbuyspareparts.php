<?php
session_start();
include("header.php");
include("sidebar.php");

include("dbconnection.php");
if(isset($_GET["ordid"]))
{
$dt= date("Y-m-d");
mysql_query("UPDATE sparepartsorder SET status='Delivered',deliverydate='$dt' where sporderid='$_GET[ordid]'");
}

if(isset($_SESSION[custid]))
{
	$result= mysql_query("select * from sparepartsorder where custid='$_SESSION[custid]'");
}
else
{
	$result= mysql_query("select * from sparepartsorder");
}
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>View purchased Vehicles</h1>
         
<form id="form1" name="form1" method="post" action="">
		  <table width="657" border="1">
		    <tr>
		      <th width="67" scope="col">Order ID</th>
		      <th width="221" scope="col">Spare Parts details</th>
		      <th width="138" scope="col">Customer<br />
	          details</th>
		      <th width="81" scope="col">Date</th>
		      <th width="45" scope="col">No. of Items</th>
              
		      <th width="46" scope="col">Status</th>
              
	        </tr>
          <?php
		  while($arrrec= mysql_fetch_array($result))
		  {  
$result1= mysql_query("select * from vehiclestore where vehicleid='$arrrec[vehicleid]'");
$arrrec1= mysql_fetch_array($result1);

$result2= mysql_query("select * from spareparts where spid='$arrrec[spid]'");
$arrrec2= mysql_fetch_array($result2);

$result3= mysql_query("select * from customer where custid='$arrrec[custid]'");
$arrrec3= mysql_fetch_array($result3);
		   echo" <tr>
		      <td>&nbsp; $arrrec[sporderid]</td>
		      <td><img src='upload/$arrrec2[image]' height='75' width='75' align='left'>
			  Name: <b>$arrrec2[name]</b><br>
			  Type: <b>$arrrec2[type]</b><br>
			  Cost: Dhs. <b>$arrrec2[cost]</b><br>
			  Spareparts No: <b>$arrrec2[sparepartno]</b><br>
			  </td>
			   <td>&nbsp;";
			   echo "<strong>Name: </strong>".$arrrec3[fname]. " ". $arrrec3[lname]."<br>";
			   echo "<strong>Contact No.: </strong>". $arrrec3[contactno1];			   
			 echo  " </td>
		      <td>&nbsp;<strong>Order date:</strong> <br>&nbsp;$arrrec[orderdate]&nbsp;<hr>
			  &nbsp;<strong>Delivered date:</strong>  <br>&nbsp;$arrrec[deliverydate]</td>
		      <td>&nbsp; $arrrec[noofitems]</td>
		      <td>&nbsp; <strong>$arrrec[status]</strong><br>";
			  if(!isset($_SESSION[custid]))
			  {
			  if($arrrec[status] == "Pending")
			  {
echo "<a href='viewbuyspareparts.php?ordid=$arrrec[sporderid]'>Delivered</a>";
			  }
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