<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
if($_GET[sstatus] == "All")
{
$result= mysql_query("select * from service");
}
else if ($_GET[sstatus] == "Completed")
{
	$result= mysql_query("select * from service where status='Completed'");
}
else
{
	$result= mysql_query("select * from service where status='Pending'");
}
?>


		<div id="main">

			<a name="TemplateInfo"></a>
			<h1>Vehicle Service</h1>
            <?php
if($ctins == 1)
{
	echo "<center><b>Employees account created successfully...</b></center><br>";
	echo "<center><b><a href='emplogin.php'>Click here to Login.</a></b></center>";
}
else
{
	?>
            <strong>    <a href="viewservice.php?sstatus=Pending">Pending</a>
            | <a href="viewservice.php?sstatus=Completed">Completed</a>
             | <a href="viewservice.php?sstatus=All">All</a></strong>
<form id="form1" name="form1" method="post" action="">
<table width="799" border="1">
		    <tr>
		      <th width="67" scope="col">Service<br />
ID</th>
		      <th width="147" scope="col">Customer</th>
		      <th width="127" scope="col">Vehicle name</th>
		      <th width="97" scope="col">Date</th>
		      <th width="159" scope="col">Address</th>
        <th width="162" scope="col">Action</th>
	        </tr>
          <?php
		  while($arrrec= mysql_fetch_array($result))
		  {
$result1= mysql_query("select * from customer where custid='$arrrec[custid]'");
$arrrec1= mysql_fetch_array($result1);
		   echo " <tr>
		      <td>&nbsp; $arrrec[serviecid]</td>";
			echo "<td><strong>$arrrec1[fname] $arrrec1[lname]</strong><br>
			Contact No. $arrrec1[contactno1]
			</td>
		      <td>&nbsp; $arrrec[vehiclename]</td>
		      <td>&nbsp; $arrrec[date]</td>
		      <td>&nbsp; $arrrec[address]
			  		<br>&nbsp; City: $arrrec[city]
					<br>&nbsp; landmark: $arrrec[landmark]
					<br>&nbsp; PIN: $arrrec[zipcode]</td>
			  <td>&nbsp; <a href='viewservicemore.php?vserviceid=$arrrec[serviecid]'>More</a> | ";
			  if($arrrec[status] == "Completed")
			  {
				  echo "Completed";
			  }
			   else if($arrrec[status] == "Cancelled")
			  {
				  echo "Cancelled";
			  }
			  else
			  {
echo "<a href='viewservicebilling.php?vserviceid=$arrrec[serviecid]'>Billing</a>";
			  }
	     echo "</td> </tr>";
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
