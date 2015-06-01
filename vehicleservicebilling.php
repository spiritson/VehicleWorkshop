<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
?>

<?php
if(isset($_GET[serviceid]))
{
$result1= mysql_query("select * from service where serviecid='$_GET[serviceid]'");
$recrow1 = mysql_fetch_array($result1);

$result= mysql_query("select * from billing where serviceid='$_GET[serviceid]'");
$recrow = mysql_fetch_array($result);

}
else
{
$result2= mysql_query("SELECT MAX(serviecid) FROM  service where custid='$_SESSION[custid]' AND status='Completed'");
$recrow2 = mysql_fetch_array($result2);

$result1= mysql_query("select * from service where serviecid='$recrow2[0]' AND status='Completed'");
$recrow1 = mysql_fetch_array($result1);

$result= mysql_query("select * from billing where serviceid='$recrow2[0]'");
$recrow = mysql_fetch_array($result);
}

?>			
<div id="main">							
			<a name="TemplateInfo"></a>
			<h1>Vehicle Service Billing</h1>
<form id="form1" name="form1" method="post" action="" onchange="Disable()">
    <?php 
	if( mysql_num_rows($result1) == 1)
	{
		?>
		  <table width="504" border="1">
		    <tr>
		      <th width="210" scope="col">Service ID</th>
		      <th width="373" scope="col">&nbsp;<?php echo $recrow1[serviecid]; ?></th>
	        </tr>
		    <tr>
		      <th scope="col">Customer info</th>
		      <th scope="col">&nbsp;
<?php
	$result1= mysql_query("select * from customer where custid='$recrow1[custid]'");
	$arrrec1= mysql_fetch_array($result1);
		  echo $arrrec1[fname]. " ".$arrrec1[lname];
			  ?>
              </th>
	        </tr>
		    <tr>
		      <th scope="col">Vehicle name</th>
		      <th scope="col">&nbsp;<?php echo $recrow1[vehiclename]; ?></th>
	        </tr>
		    <tr>
		      <th scope="col">Vehicle Number</th>
		      <th scope="col">&nbsp;<?php echo $recrow1[vehicleno]; ?></th>
	        </tr>
		    <tr>
		      <th scope="col">Date</th>
		      <th scope="col">&nbsp;<?php echo $recrow1[date]; ?></th>
	        </tr>
		    <tr>
		      <th scope="col">Pick up address</th>
		      <th scope="col">&nbsp;
			  <?php 
			  echo $recrow1[address]."<br>"; 
			  echo "City : ".$recrow1[city]."<br>"; 
			  echo "Land mark : ".$recrow1[landmark]."<br>"; 
			  echo "ZIP Code : ".$recrow1[zipcode]."<br>"; 
			  


			  ?></th>
	        </tr>
      </table>
	<br />
    <?php

	if($recrow[paidstatus] == "Paid")
	{
	?>
		  <table width="504" border="1">
<tr>
		      <th width="210" scope="col">Billing No.</th>
		      <th width="373" scope="col">&nbsp;<?php echo $recrow[billingno]; ?></th>
	        </tr>
		    <tr>
		      <th scope="col">Service ID</th>
		      <th scope="col">&nbsp;<?php echo $recrow[serviceid]; ?></th>
	        </tr>
		    <tr>
		      <th scope="col">Particulars</th>
		      <th scope="col">&nbsp;<?php echo $recrow[particulars]; ?></th>
	        </tr>
		    <tr>
		      <th scope="col">Service Cost</th>
		      <th scope="col">&nbsp;<?php echo $recrow[scost]; ?></th>
	        </tr>
		    <tr>
		      <th scope="col">Date</th>
		      <th scope="col">&nbsp;<?php echo $recrow[date]; ?></th>
	        </tr>
		    <tr>
		      <th scope="col">Service Status</th>
		      <th scope="col">&nbsp;<?php
			 echo $recrow[paidstatus];
			   ?></th>
	        </tr>
          </table>
    <?php
	}
	else if($recrow[paidstatus] == "Pending")
	{
		echo "<center><h3>Payement status : Pending</h3></center>";		
	}
	else
	{
		echo "<center><h3>Cancelled</h3></center>";
	}
	 
	}
	else
	{
		echo "<h4>No records found</h4>";
	}
	?>
		  <br />

    </form>
	
<br />					
											
</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>