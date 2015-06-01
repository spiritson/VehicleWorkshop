<?php
session_start();
include("header.php");
include("sidebar.php");
include("dbconnection.php");
$result= mysql_query("select * from service where serviecid='$_POST[serviceid]'");
$row1 = mysql_fetch_array($result);

$result1= mysql_query("select * from customer where custid='$_POST[customerid]'");
$arrrec2= mysql_fetch_array($result1);


$dt = date("Y-m-d");
if($_POST["vehstatus"] == "Completed")
{
	$sql ="insert into billing(serviceid,particulars,scost,date,paidstatus) values('$_POST[serviceid]','$_POST[particulars]','$_POST[vehcost]','$dt','$_POST[vehstatus2]')";
	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
	 $insid =  mysql_insert_id();
	 
	 mysql_query("UPDATE service SET status='$_POST[vehstatus]' where serviecid='$_POST[serviceid]'");
}
if($_POST["vehstatus"] == "Cancelled")
{
	$sql ="insert into billing(serviceid,particulars,scost,date,paidstatus) values('$_POST[serviceid]','Calncelled','0.00','$dt','Cancelled')";
	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
	 $insid =  mysql_insert_id();
	 
	 mysql_query("UPDATE service SET status='$_POST[vehstatus]' where serviecid='$_POST[serviceid]'");
}
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			
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
		  <table width="494" border="1">
		    <tr>
		      <th colspan="2" scope="col"><h1>E-Workshop</h1></th>
	        </tr>
		    <tr>
		      <th height="40" scope="col">Bill No. : <?php echo $insid; ?></th>
		      <th scope="col">Date: <?php echo $dt;  ?></th>
	        </tr>
		    <tr>
		      <th width="237" height="45" scope="col">Sevice ID: </th>
		      <th width="241" scope="col">&nbsp; <?php echo $_POST[serviceid]; ?></th>
	        </tr>
            <?php
			$result1= mysql_query("select * from customer where custid='$row1[custid]'");
$arrrec1= mysql_fetch_array($result1);
			?>
		    <tr>
		      <th height="44" scope="col">Customer ID : <?php echo $arrrec2[custid]; ?></th>
		      <th scope="col">Customer name : <?php echo $arrrec2[fname]. " ". $arrrec2[lname]; ?></th>
	        </tr>
		    <tr>
		      <th height="35" scope="col">Vehicle name : <?php echo $row1[vehiclename]; ?></th>
		      <th scope="col">Vehicle No. : <?php echo $row1[vehicleno]; ?></th>
	        </tr>
		    <tr>
		      <th scope="col">Address</th>
		      <th scope="col">Address : <?php echo $row1[address]; ?> <br />
	          City : <?php echo $row1[city]; ?><br />
	          ZIP code: <?php echo $row1[zipcode]; ?></th>
	        </tr>
		    <?php
		  while($arrrec= mysql_fetch_array($result))
		  {  
$result1= mysql_query("select * from customer where custid='$arrrec[custid]'");
$arrrec1= mysql_fetch_array($result1);
		   echo" <tr>
		      <td>&nbsp; $arrrec[serviecid]</td>";
			echo "<td>&nbsp; $arrrec1[fname] $arrrec1[lname]</td>
		      <td>&nbsp; $arrrec[vehiclename]</td>
		      <td>&nbsp; $arrrec[date]</td>
		      <td>&nbsp; $arrrec[address] 
			  		<br>&nbsp; City: $arrrec[city]
					<br>&nbsp; landmark: $arrrec[landmark]
					<br>&nbsp; PIN: $arrrec[zipcode]</td>
			  <td>&nbsp; More | Billing</td>
	        </tr>";
		  }
	      ?>
         
		    <tr>
		      <th width="237" height="36" scope="col">Particulars</th>
		      <th width="241" scope="col"><label for="particulars"></label>
	          <?php echo 
$_POST[particulars]; ?>		        &nbsp;</th>
	        </tr>
		    <?php
			$result1= mysql_query("select * from customer where custid='$row1[custid]'");
$arrrec1= mysql_fetch_array($result1);
			?>
		    <tr>
		      <th height="30" scope="col">Service Cost</th>
		      <th scope="col"><?php echo 
$_POST[vehcost]; ?></th>
	        </tr>
		    <tr>
		      <th height="37" scope="col">Paid status</th>
		      <th scope="col">&nbsp;<?php echo 
$_POST[vehstatus2]; ?></th>
	        </tr>
		    <tr>
		      <th height="23" scope="col">&nbsp;</th>
		      <th scope="col">&nbsp;</th>
	        </tr>
		    <tr>
		      <th height="37" colspan="2" scope="col">
              <input type="button" name="btnpay" id="btnpay" value="Print"   onClick="window.print()"> </th>
	        </tr>
		    <?php
		  while($arrrec= mysql_fetch_array($result))
		  {  
$result1= mysql_query("select * from customer where custid='$arrrec[custid]'");
$arrrec1= mysql_fetch_array($result1);
		   echo" <tr>
		      <td>&nbsp; $arrrec[serviecid]</td>";
			echo "<td>&nbsp; $arrrec1[fname] $arrrec1[lname]</td>
		      <td>&nbsp; $arrrec[vehiclename]</td>
		      <td>&nbsp; $arrrec[date]</td>
		      <td>&nbsp; $arrrec[address] 
			  		<br>&nbsp; City: $arrrec[city]
					<br>&nbsp; landmark: $arrrec[landmark]
					<br>&nbsp; PIN: $arrrec[zipcode]</td>
			  <td>&nbsp; More | Billing</td>
	        </tr>";
		  }
	      ?>
	      </table>
	
		</form>
   	<?php
	}
	?>
			
<br />					
											
		</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>