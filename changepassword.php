<?php
session_start();
include("header.php");
include("sidebar.php");
include("dbconnection.php");

if(isset($_SESSION[empid]))
{
	header("Location: empaccount.php");
}
if(isset($_SESSION[custid]))
{
	header("Location: account.php");
}

	if(isset($_POST[submit]))
		{
			mysql_query("UPDATE customer SET password='$_POST[password]' where emailid='$_POST[emailid]'");
			if(mysql_affected_rows() == 1)
			{
				$respass = "Password updated successfully...";
			}
		}
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>Forgot password</h1>
			<p><strong>Please enter New Password and confirmation password to reset password </strong></p>
		  <form id="form1" name="form1" method="post" action=""  onsubmit="return validate()">
		  <table width="521" height="208" border="0">
          <?php
			if(isset($_POST[submit]))
		  {
		  ?>
		    <tr>
		      <th colspan="2" scope="row"><font color="#FF0000"><b><?php echo $respass; ?></b></font></th>
	        </tr>
            <?php
		  }
		  else
		  {			  
			?>
		    <tr>
		      <th width="155" height="39" scope="row">Email ID</th>
		      <td width="301"><input name="emailid" type="text" id="emailid" value="<?php echo $_GET[emailid] ; ?>" size="50" readonly="readonly" /></td>
	        </tr>
		    <tr>
		      <th height="39" scope="row">New Password</th>
		      <td><input name="password" type="password" id="password" size="50" /></td>
	        </tr>
		    <tr>
		      <th height="49" scope="row">Confirm password</th>
		      <td><input name="cpassword" type="password" id="cpassword" size="50" /></td>
	        </tr>
		    <tr>
		      <th scope="row">&nbsp;</th>
		      <td><input name="submit" type="submit" class="button" id="submit" value="Recover password" /></td>
	        </tr>
            <?php
		  }
			?>
		    <tr>
		      <th scope="row">&nbsp;</th>
		      <td>&nbsp;</td>
	        </tr>
		    </table>
</form>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>