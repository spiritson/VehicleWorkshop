<?php
ob_start();
session_start();
include("header.php");
include("sidebar.php");
// 
// if(isset($_SESSION[empid]))
// {
// 	header("Location: empaccount.php");
// }
// if(isset($_SESSION[custid]))
// {
// 	header("Location: account.php");
// }
?>

<script type="text/javascript">
function validate()
{
	if(document.form1.loginid.value=="")
	{
		alert("Enter Login ID");
		document.form1.loginid.focus();
		return false;
	}
	if(document.form1.password.value=="")
	{
		alert("Enter Password");
		document.form1.loginid.focus();
		return false;
	}
}
</script>


<?php
include("dbconnection.php");


if(isset($_POST[submit]))
{

	$result = mysql_query("SELECT * FROM customer where emailid='$_POST[loginid]' AND password='$_POST[password]'");

	if(mysql_num_rows($result) == 1)
	{

		while($row = mysql_fetch_array($result))
		{
			$_SESSION[custid] =  $row[custid];
		}


		header("Location: account.php");
	}
	else
	{
		$logres = "Invalid User ID and password entered..";

	}


}




?>

<div id="main">

	<a name="TemplateInfo"></a>
	<h1>Customer Login</h1>
	<p>Please enter Login ID/ Email ID and Password to login website.	</p>
	<form id="form1" name="form1" method="post" action="login.php"  onsubmit="return validate()">
		<table width="466" height="109" border="0">
			<tr>
				<th colspan="2" scope="row"><font color="#FF0000"><b><?php echo $logres; ?></b></font></th>
			</tr>
			<tr>
				<th scope="row">Login ID</th>
				<td><input name="loginid" type="text" id="loginid" size="30" /></td>
			</tr>
			<tr>
				<th scope="row">Password <br /></th>
				<td><input name="password" type="password" id="password" size="30" /></td>
			</tr>
			<tr>
				<th scope="row">&nbsp;</th>
				<td><input name="submit" type="submit" class="button" id="submit" value="Login" /></td>
			</tr>
			<tr>
				<th scope="row">&nbsp;</th>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<th scope="row">&nbsp;</th>
				<td><strong><a href="forgotpassword.php">Forgot Password &gt;&gt;</a></strong></td>
			</tr>
		</table>
	</form>
	<p>&nbsp;</p>
</div>

<!-- wrap ends here -->
</div>
<?php

include("footer.php");
?>
