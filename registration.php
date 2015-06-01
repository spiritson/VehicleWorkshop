<?php
session_start();
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
if(document.form1.emailid.value=="")
{
	alert("Enter Email ID");
	document.form1.emailid.focus();
	return false;
}
	ml = document.form1.emailid.value;
		pos1 = ml.indexOf("@")
		pos = ml.indexOf(" ")
		pos2 = (pos1+1)
		server = ml.substring(pos2);
		server_pos = server.lastIndexOf(".")
		reqtype = server.substring(server_pos+1)
		type_end = reqtype.substring(reqtype.length-1)

if(ml.length<8)
	{
			document.form1.emailid.focus();
			document.form1.emailid.select();
			alert("emailid length cannot be less than 8 characters");
			return false;  
	}
		 if(ml.indexOf("@")==-1)
		{
			document.form1.emailid.focus();
			document.form1.emailid.select();
			alert("The emailid Address must contain '@' sign");
			return false;  
		}
		 if(pos1<1)
		{
			document.form1.emailid.focus();
			document.form1.emailid.select();
			alert("emailid address cannot start with '@' sign");
			return false;  
		}  
		if(ml.indexOf(".")==-1)
		{
			document.form1.emailid.focus();
			document.form1.emailid.select();
			alert("The emailid Address must contain '.' sign");
			return false;  
		}
		if(pos!=-1)
		{
			document.form1.emailid.focus();
			document.form1.emailid.select();
			alert("The emailid Address cannot contain spaces");
			return false;  
		}
		if(server.indexOf("@")!=-1)
		{
			document.form1.emailid.focus();
			document.form1.emailid.select();
			alert("A valid emailid must contain only one '@' sign");
			return false;  
		} 
		if(server.indexOf(".")==0)
		{
			document.form1.emailid.focus();
			document.form1.emailid.select();
			alert("There should some text between '@' and '.' sign");
			return false;  
		} 
		if(reqtype=="")
		{  
			document.form1.emailid.focus();
			document.form1.emailid.select();
			alert("emailid Id should end with character(like .com,.net,.org)");
			return false;  
		}
		if(type_end.toUpperCase()<"A" || type_end.toUpperCase()>"Z")
		{
			document.form1.emailid.focus();
			document.form1.emailid.select();
			alert("emailid Id should not end with number or symbol");
			return false;  
		}



if(document.form1.password.value=="")
{
	alert("Enter Password");
	document.form1.password.focus();
	return false;
}
if(document.form1.confpass.value=="")
{
	alert("Please confirm the Password");
	document.form1.confpass.focus();
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
		if(isset($_SESSION[empid]))
	{
		header("Location: empaccount.php");
	}
if(isset($_SESSION[custid]))
{
	header("Location: account.php");
}
$dt= date("Y-m-d");
if(isset($_POST["submit"]))
{
$sql ="insert into customer(fname,lname,emailid ,password,createddate,contactno1,contactno2,address,city,zipcode) values('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[password]','$dt','$_POST[phone]','$_POST[mobile]','$_POST[address]','$_POST[city]','$_POST[zipcode]')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$ctins =  mysql_affected_rows();
}
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>Customer Registration</h1>

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
			<table width="522" border="0">
			  <tr bgcolor="#CCFFFF">
			    <th height="33" scope="row" align="left">User information:</th>
			    <td>&nbsp;</td>
		      </tr>
			  <tr>
			    <th width="170" height="33" scope="row">First Name</th>
			    <td width="247">
			      <label for="lname"></label>
			      <input name="fname" type="text" id="fname" size="35"   onKeyPress="return isNumberKey(event)"/>
		        </td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Last Name
			      <label for="lname"></label></th>
			    <td><input name="lname" type="text" id="lname" size="35"  onKeyPress="return isNumberKey(event)" /></td>
		      </tr>
			  <tr>
			    <th height="36" scope="row">Email Id</th>
			    <td><label for="email"></label>
		        <input name="email" type="text" id="email" size="35" /></td>
		      </tr>
			  <tr>
			    <th height="34" scope="row">Password</th>
			    <td><label for="password"></label>
		        <input name="password" type="password" id="password" size="35" /></td>
		      </tr>
			  <tr>
			    <th height="40" scope="row">Confirm Password</th>
			    <td><label for="confpass"></label>
		        <input name="confpass" type="password" id="confpass" size="35" /></td>
		      </tr>
			  <tr align="left" bgcolor="#CCFFFF">
			    <th height="29" colspan="2" scope="row"><u>Contact information</u></th>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Address</th>
			    <td><textarea name="address" cols="35" id="address"></textarea></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">City</th>
			    <td><input name="city" type="text" id="city" size="35" /></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Zip code</th>
			    <td><input name="zipcode" type="text" id="zipcode" size="35"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Phone No</th>
			    <td><label for="date"></label>
		        <input name="phone" type="text" id="phone" size="35"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
			  <tr>
			    <th scope="row">Mobile No</th>
			    <td><label for="mobile"></label>
		        <input name="mobile" type="text" id="mobile" size="35"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
			  <tr>
			    <th scope="row">&nbsp;</th>
			    <td><br />			      <input type="submit" name="submit" id="submit" value="Register" /></td>
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