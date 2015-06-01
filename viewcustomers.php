<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
if(isset($_GET[empid]))
{
$results = mysql_query("DELETE from customer where custid ='$_GET[empid]'");
}
$results= mysql_query("select * from customer");
//echo "emp".mysql_num_rows($result);

?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>View Customers</h1>
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
		  <table width="579" border="1" align="left">
		    <tr>
		      <th width="65" scope="col">Customer<br />
	          ID</th>
		      <th width="104" scope="col">Customer  Name</th>
		      <th width="109" scope="col">Email ID</th>
	
		      <th width="135" scope="col">Contact Nos</th>
		      <th width="180" scope="col" colspan="3">Action</th>
	        </tr>
          <?php
		  while($arrrec = mysql_fetch_array($results))
		  {  
		   echo" <tr>
		      <td>&nbsp; $arrrec[custid]</td>
			  <td>&nbsp; $arrrec[fname] &nbsp; $arrrec[lname]</td>
		      <td>&nbsp; $arrrec[emailid]</td>
		
		      <td>Ph. No.1 : $arrrec[contactno1] <br> Ph. No.2 : $arrrec[contactno2]</td>
		      <td align='center'><a href='customerviewmore.php?custid=$arrrec[custid]'>More</a></td><td align='center'><a href='editcustomer.php?custid=$arrrec[custid]'>Edit</a></td><td align='center'><a href='viewcustomers.php?empid=$arrrec[custid]'>Delete</a></td>
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