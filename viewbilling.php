<?php
include("header.php");
include("sidebar.php");

include("dbconnection.php");

$result= mysql_query("select * from billing");
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>Billing</h1>
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
		  <table width="686" border="1">
		    <tr>
		      <th scope="col">Bill No</th>
		      <th scope="col">Service ID</th>
		      <th scope="col">Particulars</th>
		      <th scope="col">Service Cost</th>
		      <th scope="col">Date</th>
		      <th scope="col">Advance</th>
	        </tr>
          <?php
		  while($arrrec= mysql_fetch_array($result))
		  {  
		   echo" <tr>
		      <td>&nbsp; $arrrec[billingno]</td>
		      <td>&nbsp; $arrrec[serviceid]</td>
		      <td>&nbsp; $arrrec[particulars]</td>
		      <td>&nbsp; $arrrec[scost]</td>
		      <td>&nbsp; $arrrec[date]</td>
		      <td>&nbsp; $arrrec[paidstatus]</td>
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