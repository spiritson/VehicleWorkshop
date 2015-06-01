<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
?>
<script type="text/javascript">
function Disable()
{
var vstatus=document.getElementById("vehstatus");
var x=document.getElementById("vehcost");
var z=document.getElementById("vehstatus2");
var pa=document.getElementById("particulars");
if(vstatus.value == "Completed") 
{
x.disabled=false
z.disabled = false
pa.disabled = false
}
if(vstatus.value == "Cancelled") 
{
x.disabled=true
z.disabled = true
pa.disabled = true
}


}
</script>
<?php
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
		<form id="form1" name="form1" method="post" action="viewservicebillingreport.php">
        <input type="hidden" name="serviceid" value="<?php echo $row1[serviecid]; ?>"/>
        <input type="hidden" name="customerid" value="<?php echo $row1[custid]; ?>"/>  
        
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
		      <th scope="col">&nbsp;<?php echo $arrrec1[fname]. " ". $arrrec1[lname]; ?></th>
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
		      <th scope="col"><label for="vehstatus"></label>
		        <select name="vehstatus" id="vehstatus" onchange="Disable()">
		          <option value="Completed">Completed</option>
                   <option value="Cancelled">Cancelled</option>
              </select>		        &nbsp; </th>
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
		  <br />
		  <table width="494" border="1">
		    <tr>
		      <th width="237" height="36" scope="col">Particulars</th>
		      <th width="241" scope="col"><label for="particulars"></label>
              <textarea name="particulars" id="particulars"></textarea>                &nbsp;</th>
	        </tr>
		    <?php
			$result1= mysql_query("select * from customer where custid='$row1[custid]'");
$arrrec1= mysql_fetch_array($result1);
			?>
		    <tr>
		      <th height="30" scope="col">Service Cost</th>
		      <th scope="col"><input name="vehcost" type="text" id="vehcost" value="" />		        &nbsp;</th>
	        </tr>
		    <tr>
		      <th height="33" scope="col">Date</th>
		      <th scope="col"><input name="date" type="text" id="date" value="<?php echo date("Y-m-d"); ?>" />		        &nbsp;</th>
	        </tr>
		    <tr>
		      <th height="37" scope="col">Paid status</th>
		      <th scope="col">&nbsp;
		        <select name="vehstatus2" id="vehstatus2" >
		          <option value="Pending">Pending</option>
                  <option value="Paid">Paid</option>
              </select></th>
	        </tr>
		    <tr>
		      <th height="23" scope="col">&nbsp;</th>
		      <th scope="col">&nbsp;</th>
	        </tr>
		    <tr>
		      <th height="37" colspan="2" scope="col"><input type="submit" name="btnpay" id="btnpay" value="Generate vehicle service bill" /></th>
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