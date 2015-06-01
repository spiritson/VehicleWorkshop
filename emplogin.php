<?php
ob_start();
session_start();

include("header.php");
include("sidebar.php");
include("dbconnection.php");
?>
<?php
session_start();
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
if(isset($_SESSION[empid]))
{
	header("Location: empaccount.php");
}

	if(isset($_POST[submit]))
	{
	$result = mysql_query("SELECT * FROM employee where loginid='$_POST[loginid]' AND password='$_POST[password]'");

if(mysql_num_rows($result) == 1)
{

			$row = mysql_fetch_array($result);
			$_SESSION[empid] =  $row[employeeid];
			$_SESSION[employeetype] =  $row[employeetype];

	header("Location: empaccount.php");
}
else
{
	$logres = "Invalid User ID and password entered..";
}


}
?>


		<div id="main">

			<a name="TemplateInfo"></a>
			<h1>Employee Login</h1>
			<p>Administrator and Employee Login page:</p>
		  <form id="form1" name="form1" method="post" action="emplogin.php" onsubmit="return validate()">
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
	      </table>
	  </form>
			<p>&nbsp;</p>
		</div>

<!-- wrap ends here -->
</div>

<?php
include("footer.php");
?>
