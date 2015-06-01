<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
?>
<script type="text/javascript">
function validate() 
{
if(document.form1.billno.value=="")
{
	alert("Enter the Billing Number");
	document.form1.billno.focus();
	return false;
}
if(document.form1.servid.value=="")
{
	alert("Enter the Service ID");
	document.form1.servid.focus();
	return false;
}
if(document.form1.particulars.value=="")
{
	alert("Enter the Particulars");
	document.form1.particulars.focus();
	return false;
}
if(document.form1.scost.value=="")
{
	alert("Enter the scost");
	document.form1.scost.focus();
	return false;
}
if(document.form1.paidst.value=="")
{
	alert("Enter the paid status");
	document.form1.paidst.focus();
	return false;
}
}
</script>
<?php
$dt= date("Y-m-d");
if(isset($_POST["submit"]))
{

$sql ="insert into billing(billingno,serviceid,particulars,scost,date,paidstatus) values('$_POST[billno]','$_POST[servid]','$_POST[particulars]','$_POST[scost]','$_POST[date]','$_POST[paidst]')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$ctins =  mysql_affected_rows();
}
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>Billing</h1>

<?php
if($ctins == 1)
{
	echo "<center><b>Custmer registered Successfully...</b></center><br>";
	echo "<center><b><a href='login.php'>Click here to Login.</a></b></center>";
}
else
{
	?>
		<form id="form1" name="form1" method="post" action="" onsubmit="return valiadate()">		
			<table width="427" border="0">
			  <tr>
			    <th width="170" height="33" scope="row">Billing Number</th>
			    <td width="247">
			      <label for="billno"></label>
			      <input type="text" name="billno" id="billno"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
		        </td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Service Id
			      <label for="servid"></label></th>
			    <td><input type="text" name="servid" id="servid"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
			  <tr>
			    <th height="36" scope="row">Particulars</th>
			    <td><label for="particulars"></label>
		        <input type="text" name="particulars" id="particulars" /></td>
		      </tr>
			  <tr>
			    <th height="34" scope="row">Scost</th>
			    <td><label for="scost"></label>
		        <input type="text" name="scost" id="scost"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Date</th>
			    <td><label for="date"></label>
		          <label for="date"></label>
	            <input type="text" name="date" id="date" value="<?php echo $dt; ?>" readonly/></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Paid Status</th>
			    <td><label for="date"></label>
		        <input type="text" name="paidst" id="paidst" /></td>
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