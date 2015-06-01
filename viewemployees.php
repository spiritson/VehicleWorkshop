<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
if(isset($_GET[empid]))
{
$results = mysql_query("DELETE from employee where employeeid ='$_GET[empid]'");
}
$results= mysql_query("select * from employee where employeetype='Employees'");
//echo "emp".mysql_num_rows($result);

?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>View Employees</h1>
            <?php
			if($_SESSION[empid] == 1)
			{
			?>
            <h3><center><a href="employees.php">Add Employees</a></center></h3>
             <?php
			 }
			?> 
           
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
		  <table width="531" border="1" align="left">
		    <tr>
		      <th width="130" scope="col">Employee Name</th>
		      <th width="123" scope="col">Login ID</th>
		      <th width="138" scope="col">Contact Nos</th>
		      <th colspan="3" width="112" scope="col">Action</th>
	        </tr>
          <?php
		  while($arrrec = mysql_fetch_array($results))
		  {  
		   echo" <tr>
		      <td>&nbsp; $arrrec[fname]&nbsp; $arrrec[lname]</td>
		      <td>&nbsp; $arrrec[loginid]</td>
		      <td>Ph. No.1 : $arrrec[contactno1] <br> Ph. No.2 : $arrrec[contactno2]</td>
		      <td><a href='employeeviewmore.php?empid=$arrrec[employeeid]'>More</a></td><td align='center'><a href='employees.php?empid=$arrrec[employeeid]'>Edit</a></td><td align='center'><a href='viewemployees.php?empid=$arrrec[employeeid]'>Delete</a></td>
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