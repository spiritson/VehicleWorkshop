<?php
session_start();
if(!isset($_SESSION[custid]))
{
	header("Location: registration.php");
}
include("header.php");
include("sidebar.php");
include("dbconnection.php");

?>
<script type="text/javascript">
function isNumberKey(evt)
      {

         var charCode = (evt.which) ? evt.which : event.keyCode
		//alert(charCode);
         if (charCode > 63 && charCode < 92 )
      	 {
		 return true;
	 }
	 else if (charCode > 96 && charCode < 123 )
      	 {
		 return true;
	 }
	 else
	 {
                             alert("should be alphabet");
	  	return false;
	 }
     }
function validate()
{
if(document.form1.custname.value=="")
{
	alert("Enter Customer Name");
	document.form1.custname.focus();
	return false;
}
if(document.form1.custemailid.value=="")
{
	alert("Enter the Email ID");
	document.form1.custemailid.focus();
	return false;
}
if(document.form1.contactno.value=="")
{
	alert("Enter the Contact Number");
	document.form1.contactno.focus();
	return false;
}
if(document.form1.vehname.value=="")
{
	alert("Enter Vehicle Name");
	document.form1.vehname.focus();
	return false;
}
if(document.form1.vehicleno.value=="")
{
	alert("Enter Vehicle Numnber");
	document.form1.vehicleno.focus();
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
if(document.form1.landmark.value=="")
{
	alert("Enter the Landmark");
	document.form1.landmark.focus();
	return false;
}
if(document.form1.zip.value=="")
{
	alert("Enter the Zip Code");
	document.form1.zip.focus();
	return false;
}


}
</script>
<?php
if(isset($_SESSION[empid]))
{
header("Location: empaccount.php");
}

$result = mysql_query("SELECT * FROM customer where custid='$_SESSION[custid]'");
$row = mysql_fetch_array($result);


if(isset($_POST["submit"]))
{
/*$dt = date("Y-m-d");
  $sql ="insert into customer(fname ,emailid,contactno1,createddate) values('$_POST[custname]','$_POST[custemailid]','$_POST[contactno]','$dt')";
  if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$insid =   mysql_insert_id();
*/
$dt= date("Y-m-d");
$sql ="insert into service(custid,vehiclename,vehicleno,date,address,city,landmark,zipcode,status) values('$_SESSION[custid]','$_POST[vehname]','$_POST[vehicleno]','$dt','$_POST[address]','$_POST[city]','$_POST[landmark]','$_POST[zip]','Pending')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

}
?>



		<div id="main">

			<a name="TemplateInfo"></a>
			<h1>Vehicle service</h1>
		<form id="form1" name="form1" method="post" action="" onsubmit="return validate()">
			<?php

if(isset($_POST["submit"]))
{
	echo "<h4><center>Vehicle service request sent successfully...</center></h4>";
}
else
{
			?>
          <table width="563" border="0">
			  <tr>
			    <th width="266" height="33" scope="row">Customer Name</th>
			    <td width="287">
			      <label for="fname"></label>
			      <label for="custname"></label>
		        <input name="custname" type="text" id="custname"  onKeyPress="return isNumberKey(event)" value="<?php echo  $row[fname]. " ".$row[lname]; ?>" size="35" readonly="readonly"/></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Email ID</th>
			    <td><input type="text" name="custemailid" id="custemailid" value="<?php echo  $row[emailid]; ?>" size="35" readonly="readonly" /></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Contact No.</th>
			    <td><input name="contactno" type="text" id="contactno"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo  $row[contactno1]; ?>" size="35" ></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Vehicle Name
                  <label for="lname"></label></th>
			    <td><label for="vehname"></label>
		        <input type="text" name="vehname" id="vehname" size="35" /></td>
		      </tr>
			  <tr>
			    <th height="36" scope="row">Vehicle No
                  <label for="lname2"></label></th>
			    <td><label for="email"></label>
			      <label for="model"></label>
			      <label for="vehicleno"></label>
		        <!--input type="text" name="vehicleno" id="vehicleno"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" size="35" /></td-->
				<input type="text" name="vehicleno" id="vehicleno"  onKeypress="" size="35" /></td>
		      </tr>
			  <tr>
			    <th height="40" scope="row">Address</th>
			    <td><label for="confpass"></label>
			      <label for="images"></label>
			      <label for="address"></label>
                <textarea name="address" id="address"></textarea></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">City</th>
			    <td><label for="phone"></label>
			      <label for="estdprice"></label>
			      <label for="city"></label>
		        <input type="text" name="city" id="city"  size="35"/></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Landmark</th>
			    <td><label for="mobile"></label>
			      <label for="other"></label>
			      <label for="landmark"></label>
		        <input type="text" name="landmark" id="landmark"  size="35"/></td>
		      </tr>
			  <tr>
			    <th height="35" scope="row">Zipcode</th>
			    <td><input type="text" name="zip" id="zip"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" size="35" /></td>
		      </tr>
			  <tr>
			    <th scope="row">&nbsp;</th>
			    <td><label for="status"></label></td>
		      </tr>
			  <tr>
			    <th scope="row">&nbsp;</th>
			    <td><input type="submit" name="submit" id="submit" value="Request to vehicle service" /></td>
		      </tr>
          </table>
          <?php
}

?>
</form>
			<p>&nbsp;</p>
<br />

		</div>

<!-- wrap ends here -->
</div>

<?php
include("footer.php");
?>
