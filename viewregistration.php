<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
$result= mysql_query("select * from customer");
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>Registration</h1>
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
		  <table width="790" border="1">
		    <tr>
		      <th width="110" scope="col">Customer ID</th>
		      <th width="88" scope="col">First name</th>
		      <th width="88" scope="col">Last name</th>
		      <th width="133" scope="col">Email ID</th>
		      <th width="107" scope="col">Created date</th>
		      <th width="95" scope="col">Contact no1</th>
		      <th width="123" scope="col">Contact no2</th>
	        </tr>
          <?php
		  while($arrrec= mysql_fetch_array($result))
		  {  
		   echo" <tr>
		      <td>&nbsp; $arrrec[custid]</td>
		      <td>&nbsp; $arrrec[fname]</td>
		      <td>&nbsp; $arrrec[lname]</td>
		      <td>&nbsp; $arrrec[emailid]</td>
		      <td>&nbsp; $arrrec[createddate]</td>
		      <td>&nbsp; $arrrec[contactno1]</td>
			  <td>&nbsp; $arrrec[contactno2]</td>
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