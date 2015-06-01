<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
$result= mysql_query("select * from service where custid='$_SESSION[custid]' AND status='Pending'");
$result1= mysql_query("select * from service where custid='$_SESSION[custid]' AND status='Completed'");

?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>View Vehicle Service</h1>
            <h3>
             Pending Request:
           </h3>
         
		<form id="form1" name="form1" method="post" action="">
		  <table width="686" border="1">
		    <tr>
		     <th width="169" scope="col">Vehicle info</th>
		      <th scope="col">Date</th>
		      <th scope="col">Address</th>
		      <th scope="col">City</th>
              <th scope="col">Status</th>
	        </tr>
          <?php
		  while($arrrec= mysql_fetch_array($result))
		  {  
		   echo" <tr>
		      <td>&nbsp;
			  Vehicle name: $arrrec[vehiclename]<br>
			  &nbsp; Vehicle No. $arrrec[vehicleno]</td>
		      <td>&nbsp; $arrrec[date]</td>
		      <td>&nbsp; $arrrec[address]</td>
			  <td>&nbsp; $arrrec[city]</td>
              <td>&nbsp; $arrrec[status]</td>
	        </tr>";
		  }
	      ?>
          </table>
          <br /><br>
           <h3>
             Completed Request:
           </h3>
          <table width="686" border="1">
		    <tr>
		     <th width="169" scope="col">Vehicle info</th>
		      <th width="103" scope="col">Date</th>
		      <th width="134" scope="col">Address</th>
              <th width="104" scope="col">Status</th>
              <th width="64" scope="col">Bill</th>
	        </tr>
          <?php
		  while($arrrec= mysql_fetch_array($result1))
		  {  
		   echo" <tr>
		      <td>&nbsp;
			  Vehicle name: $arrrec[vehiclename]<br>
			  &nbsp; Vehicle No. $arrrec[vehicleno]</td>
		      <td>&nbsp; $arrrec[date]</td>
		      <td>&nbsp; $arrrec[address]
			  <br>&nbsp; 
			City : $arrrec[city]</td>
              <td>&nbsp; $arrrec[status]</td>
			  <td>&nbsp; <a href='vehicleservicebilling.php?serviceid=$arrrec[serviecid]'>View</a></td>
	        </tr>";
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