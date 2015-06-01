<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
?>
<script type="text/javascript">
function validate() 
{
if(document.form1.purid.value=="")
{
	alert("Enter the Purchase ID");
	document.form1.purid.focus();
	return false;
}
if(document.form1.vehid.value=="")
{
	alert("Enter the Vehicle ID");
	document.form1.vehid.focus();
	return false;
}
if(document.form1.custid.value=="")
{
	alert("Enter the Customer ID");
	document.form1.custid.focus();
	return false;
}
if(document.form1.purdate.value=="")
{
	alert("Enter Purchase Date");
	document.form1.purdate.focus();
	return false;
}
if(document.form1.deldate.value=="")
{
	alert("Enter Delivery Date");
	document.form1.deldate.focus();
	return false;
}
if(document.form1.comments.value=="")
{
	alert("Insert Comments");
	document.form1.comments.focus();
	return false;
}
if(document.form1.advance.value=="")
{
	alert("Enter the Advance Amount");
	document.form1.advance.focus();
	return false;
}
if(document.form1.payment.value=="")
{
	alert("Enter the Payment Type");
	document.form1.payment.focus();
	return false;
}
if(document.form1.address.value=="")
{
	alert("Enter the Address");
	document.form1.address.focus();
	return false;
}
if(document.form1.city.value=="")
{
	alert("Enter the City");
	document.form1.city.focus();
	return false;
}
if(document.form1.zip.value=="")
{
	alert("Enter the Zipcode");
	document.form1.zip.focus();
	return false;
}
}
</script>
<?php
$dt= date("Y-m-d");

if(isset($_POST["submit"]))
{

$sql ="insert into buyvehicles(purchaseid,vehicleid,custid ,purchasedate,deliverydate,comments,paid,paymenttype,address,city,zipcode) values('$_POST[purid]','$_POST[vehid]','$_POST[custid]','$_POST[purdate]','$_POST[deldate]','$_POST[comments]','$_POST[advance]','$_POST[payment]','$_POST[address]','$_POST[city]','$_POST[zipcode]')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$ctins =  mysql_affected_rows();
}
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>buyveh</h1>

<?php
if($ctins == 1)
{
	echo "<center><b>Custmer registered Successfully...</b></center><br>";
	echo "<center><b><a href='login.php'>Click here to Login.</a></b></center>";
}
else
{

	?>
		<form id="form1" name="form1" method="post" action="" onsubmit="return validate()">		
			<table width="427" border="0">
			  <tr>
			    <th width="170" height="33" scope="row">Purchase Id</th>
			    <td width="247">
			      <label for="purid"></label>
			      <input type="text" name="purid" id="purid"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" />
		        </td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Vehicle Id
			      <label for="vehid"></label></th>
			    <td><input type="text" name="vehid" id="vehid"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
			  <tr>
			    <th height="36" scope="row">Customer Id</th>
			    <td><label for="custid"></label>
		        <input type="text" name="custid" id="custid"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
			  <tr>
			    <th height="34" scope="row">Purchase Date</th>
			    <td><label for="purdate"></label>
		        <input type="text" name="purdate" id="purdate" /></td>
		      </tr>
			  <tr>
			    <th height="40" scope="row">Delivery Date</th>
			    <td><label for="deldate"></label>
		        <input type="text" name="deldate" id="deldate" /></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Comments</th>
			    <td><label for="date"></label>
		        <input type="text" name="comments" id="comments" /></td>
		      </tr>
			  <tr>
			    <th height="34" scope="row">Advance</th>
			    <td><label for="advance"></label>
		        <input type="text" name="advance" id="advance"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
			  <tr>
			    <th height="31" scope="row">Payment Type </th>
			    <td><label for="payment"></label>
		        <input type="text" name="payment" id="payment" /></td>
		      </tr>
			  <tr>
			    <th height="33" scope="row">Address</th>
			    <td><input type="text" name="address" id="address" /></td>
		      </tr>
			  <tr>
			    <th height="36" scope="row">City</th>
			    <td><input type="text" name="city" id="city" /></td>
		      </tr>
			  <tr>
			    <th scope="row">Zipcode</th>
			    <td><input type="text" name="zipcode" id="zipcode"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
          </table>
			<table width="427" border="0">
			  <tr>
			    <th width="181" scope="row">&nbsp;</th>
			    <td width="236"><br />
			      <input type="submit" name="submit" id="submit" value="Register" /></td>
		      </tr>
		  </table>
        </form>
        <?php
}
?>
		<p>&nbsp;</p>
		</div>
        
<?php
include("footer.php");
?>