<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
$result= mysql_query("select * from service where serviecid='$_GET[vserviceid]'");
$row1 = mysql_fetch_array($result);
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
		<form id="form1" name="form1" method="post" action="">
		  <table width="494" border="1">
		    <tr>
		      <th width="58" scope="col">Sevice ID</th>
		      <th width="100" scope="col">&nbsp;<?php echo $row1[serviecid]; ?> </th>
	        </tr>
            <?php
			$result1= mysql_query("select * from customer where custid='$row1[custid]'");
$arrrec1= mysql_fetch_array($result1);
			?>
		    <tr>
		      <th scope="col">Customer ID</th>
		      <th scope="col">&nbsp;<?php echo $arrrec1[custid]; ?> </th>
	        </tr>
		    <tr>
		      <th scope="col">Customer name</th>
		      <th scope="col">&nbsp; <?php echo $arrrec1[fname]. " ". $arrrec1[lname]; ?></th>
	        </tr>
		    <tr>
		      <th scope="col">Vehicle name</th>
		      <th scope="col">&nbsp;<?php echo $row1[vehiclename]; ?> </th>
	        </tr>
		    <tr>
		      <th scope="col">Vehicle No.</th>
		      <th scope="col">&nbsp;<?php echo $row1[vehicleno]; ?> </th>
	        </tr>
		    <tr>
		      <th scope="col">Date</th>
		      <th scope="col">&nbsp;<?php echo $row1["date"]; ?> </th>
	        </tr>
		    <tr>
		      <th scope="col">Address</th>
		      <th scope="col">&nbsp;<?php echo $row1[address]; ?> </th>
	        </tr>
		    <tr>
		      <th scope="col">City</th>
		      <th scope="col">&nbsp;<?php echo $row1[city]; ?> </th>
	        </tr>
		    <tr>
		      <th scope="col">Landmark</th>
		      <th scope="col">&nbsp;<?php echo $row1[landmark]; ?> </th>
	        </tr>
		    <tr>
		      <th scope="col">ZIP Code</th>
		      <th scope="col">&nbsp;<?php echo $row1[zipcode]; ?> </th>
	        </tr>
		    <tr>
		      <th scope="col">Status</th>
		      <th scope="col">&nbsp;<?php echo $row1[status]; ?> </th>
	        </tr>
		    <tr>
		      <th colspan="2" scope="col"><a href="viewservice.php">&lt;&lt;Back</a></th>
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
			<p>&nbsp;</p>
<br />					
											
		</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>