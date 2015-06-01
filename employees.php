<?php
ob_start();
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
if(document.form1.loginid.value=="")
{
	alert("Enter Login ID");
	document.form1.loginid.focus();
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



if(document.form1.mobile.value=="")
{
	alert("Enter Mobile Number");
	document.form1.mobile.focus();
	return false;
}
if(document.form1.phone.value=="")
{
	alert("Enter Phone No");
	document.form1.phone.focus();
	return false;
}
if(document.form1.emptype.value=="")
{
	alert("Select Employee Typt");
	document.form1.emptype.focus();
	return false;
}
}
</script>
<?php

if(isset($_POST["submit"]))
{
$sql ="insert into employee(fname,lname,loginid ,password,emailid,contactno1,contactno2,employeetype) values('$_POST[fname]','$_POST[lname]','$_POST[loginid]','$_POST[password]','$_POST[emailid]','$_POST[mobile]','$_POST[phone]','$_POST[emptype]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  $ctins =  mysql_affected_rows();
}

if(isset($_POST["update"]))
{
$sql ="update employee set fname='$_POST[fname]',lname='$_POST[lname]',loginid='$_POST[loginid]', emailid='$_POST[emailid]',contactno1='$_POST[mobile]',contactno2='$_POST[phone]' where employeeid='$_GET[empid]'";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  $ctins =  mysql_affected_rows();
}
?>
<?php
if(isset($_GET['empid']))
{
$sql = mysql_query("select * from  employee where employeeid='$_GET[empid]'");
$row = mysql_fetch_array($sql);
}
?>

		<div id="main">

			<a name="TemplateInfo"></a>
			<h1>Add Employees</h1>
            <h3><center><a href="viewemployees.php">View Employees</a></center></h3>
            <?php
if($ctins == 1)
{
if(isset($_GET['empid']))
{
		echo "<center><b>Employees account Updated successfully...</b></center><br>";
}
else
{
	echo "<center><b>Employees account created successfully...</b></center><br>";
}
}
else
{
	?>
		<form id="form1" name="form1" method="post" action="" onsubmit="return validate()">
			<table width="371" border="0">
			  <tr>
			    <th width="169" height="33" scope="row">First Name</th>
			    <td width="140">
			      <label for="fname"></label>
			      <input type="text" name="fname" value="<?php echo $row['fname']; ?>" id="fname" onKeyPress="return isNumberKey(event)"/>
		        </td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Last Name
			      <label for="lname"></label></th>
			    <td><input type="text" name="lname" value="<?php echo $row['lname']; ?>" id="lname" onKeyPress="return isNumberKey(event)" /></td>
		      </tr>
			  <tr>
			    <th height="36" scope="row">Login Id</th>
			    <td><label for="loginid"></label>
		        <input type="text" name="loginid" id="loginid" value="<?php echo $row['loginid']; ?>" /></td>
		      </tr>
			  <tr>
			    <th height="34" scope="row">Password</th>
			    <td><label for="password"></label>
		        <input type="password" name="password" <?php if(isset($_GET['empid'])) { ?> readonly="readonly" <?php } ?> id="password" /></td>
		      </tr>
			  <tr>
			    <th height="40" scope="row">Confirm Password</th>
			    <td><label for="confpass"></label>
		        <input type="password" name="confpass" <?php if(isset($_GET['empid'])) { ?> readonly="readonly" <?php } ?> id="confpass" /></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Email ID</th>
			    <td><label for="emailid"></label>
		        <input type="text" name="emailid" value="<?php echo $row['emailid']; ?>" id="emailid" /></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Mobile No</th>
			    <td><label for="mobile"></label>
		        <input type="text" name="mobile" value="<?php echo $row['contactno1']; ?>" id="mobile"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
			  <tr>
			    <th scope="row">Phone No</th>
			    <td><input type="text" name="phone" value="<?php echo $row['contactno2']; ?>" id="phone"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
			      <label for="phone2"></label></td>
		      </tr>
			  <tr>
			    <th scope="row">Employee Type</th>
			    <td><label for="emptype"></label>
			      <label for="emptype2"></label>
			      <select name="emptype" id="emptype2">
			        <option value="Employees">Employees</option>
			        <option value="Administrator">Administrator</option>
                </select></td>
		      </tr>
			  <tr>
			    <th scope="row">&nbsp;</th>
			    <td><br /><?php if(isset($_GET['empid'])) { ?> <input type="submit" name="update" id="submit" value="Update Employees" /><?php } else { ?>			      <input type="submit" name="submit" id="submit" value="Add Employees" /><?php } ?></td>
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
