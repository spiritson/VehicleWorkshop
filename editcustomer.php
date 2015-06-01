<?php
ob_start();
include("header.php");
include("sidebar.php");
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
if(document.form1.fname.value=="")
{
	alert("Enter First Name");
	document.form1.fname.focus();
	return false;
}
if(document.form1.lname.value=="")
{
	alert("Enter Last Name");
	document.form1.lname.focus();
	return false;
}
if(document.form1.email.value=="")
{
	alert("Enter Email ID");
	document.form1.email.focus();
	return false;
}
ml = document.form1.email.value;
		pos1 = ml.indexOf("@")
		pos = ml.indexOf(" ")
		pos2 = (pos1+1)
		server = ml.substring(pos2);
		server_pos = server.lastIndexOf(".")
		reqtype = server.substring(server_pos+1)
		type_end = reqtype.substring(reqtype.length-1)

if(ml.length<8)
	{
			document.form1.email.focus();
			document.form1.email.select();
			alert("Email length cannot be less than 8 characters");
			return false;
	}
		 if(ml.indexOf("@")==-1)
		{
			document.form1.email.focus();
			document.form1.email.select();
			alert("The Email Address must contain '@' sign");
			return false;
		}
		 if(pos1<1)
		{
			document.form1.email.focus();
			document.form1.email.select();
			alert("Email address cannot start with '@' sign");
			return false;
		}
		else if(ml.indexOf(".")==-1)
		{
			document.form1.email.focus();
			document.form1.email.select();
			alert("The Email Address must contain '.' sign");
			return false;
		}
		if(pos!=-1)
		{
			document.form1.email.focus();
			document.form1.email.select();
			alert("The Email Address cannot contain spaces");
			return false;
		}
		if(server.indexOf("@")!=-1)
		{
			document.form1.email.focus();
			document.form1.email.select();
			alert("A valid Email must contain only one '@' sign");
			return false;
		}
		if(server.indexOf(".")==0)
		{
			document.form1.email.focus();
			document.form1.email.select();
			alert("There should some text between '@' and '.' sign");
			return false;
		}
		if(reqtype=="")
		{
			document.form1.email.focus();
			document.form1.email.select();
			alert("Email Id should end with character(like .com,.net,.org)");
			return false;
		}
		 if(type_end.toUpperCase()<"A" || type_end.toUpperCase()>"Z")
		{
			document.form1.email.focus();
			document.form1.email.select();
			alert("Email Id should not end with number or symbol");
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
	alert("Enter the Zip");
	document.form1.zip.focus();
	return false;
}
if(document.form1.phone.value=="")
{
	alert("Enter Phone No");
	document.form1.phone.focus();
	return false;
}
if(document.form1.mobile.value=="")
{
	alert("Enter Mobile Number");
	document.form1.mobile.focus();
	return false;
}
}
</script>


<?php
include("dbconnection.php");

if(isset($_POST["submit"]))
{
  $sql ="update customer set fname='$_POST[custname]', lname='$_POST[lastname]', emailid='$_POST[custemailid]',address='$_POST[address]',city='$_POST[city]',zipcode='$_POST[zipcode]', contactno1='$_POST[contactno]',contactno2='$_POST[contactno2]' where custid='$_GET[custid]'";
  $ctins = 1;
  if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
}
if($ctins == 1)
{
	echo "<center><b>Your account Updated successfully...</b></center><br>";
}
else
{

if($_GET['custid'])
{
	$result = mysql_query("select * from customer where custid='$_GET[custid]'");
	$row = mysql_fetch_array($result);
	$fname = $row['fname'];
	$lname = $row['lname'];
	$emailid = $row['emailid'];
	$contactno1 = $row['contactno1'];
	$contactno2 = $row['contactno2'];
}

?>



		<div id="main">

			<a name="TemplateInfo"></a>
			<h1>service</h1>
		<form id="form1" name="form1" method="post" action="" onsubmit="return validate()">
			<table width="563" border="0">
			  <tr>
			    <th width="266" height="33" scope="row">Customer Name</th>
			    <td width="287">
			      <label for="fname"></label>
			      <label for="custname"></label>
		        <input type="text" name="custname" value="<?= $fname; ?>" id="custname"  onKeyPress="return isNumberKey(event)" /></td>
		      </tr>
              <tr>
			    <th height="37" scope="row">Last Name
                  <label for="lname"></label></th>
			    <td><label for="lastname"></label>
		        <input type="text" name="lastname" value="<?= $lname; ?>" id="lastname"  onKeyPress="return isNumberKey(event)"/></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Email ID</th>
			    <td><input type="text" name="custemailid" value="<?= $emailid; ?>" id="custemailid" /></td>
		      </tr>
              <tr>
			    <th height="37" scope="row">Address</th>
			    <td><textarea name="address"><?php echo $address; ?></textarea></td>
		      </tr>

              <tr>
			    <th height="37" scope="row">City</th>
			    <td><input type="text" name="city" value="<?= $city; ?>" id="contactno"  /></td>
		      </tr>

              <tr>
			    <th height="37" scope="row">Zip code</th>
			    <td><input type="text" name="zipcode" value="<?= $zipcode; ?>" id="contactno" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>

			  <tr>
			    <th height="37" scope="row">Contact No.</th>
			    <td><input type="text" name="contactno" value="<?= $contactno1; ?>" id="contactno"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>


			 <tr>
			    <th height="40" scope="row">Mobile Number</th>
			    <td><label for="confpass"></label>
			      <label for="images"></label>
			      <label for="contactno2"></label>
                 <input type="text" name="contactno2" value="<?= $contactno2; ?>" id="contactno2"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
			  <tr>
			    <th scope="row">&nbsp;</th>
			    <td><input type="submit" name="submit" id="submit" value="Update" /></td>
		      </tr>
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
