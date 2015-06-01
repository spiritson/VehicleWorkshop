<?php
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
if(document.form1.empname.value=="")
{
	alert("Enter Employee Name");
	document.form1.empname.focus();
	return false;
}
if(document.form1.vehname.value=="")
{
	alert("Enter Vehicle Name");
	document.form1.vehname.focus();
	return false;
}
if(document.form1.model.value=="")
{
	alert("Enter the Model");
	document.form1.model.focus();
	return false;
}
if(document.form1.brand.value=="")
{
	alert("Enter the Brand");
	document.form1.brand.focus();
	return false;
}
if(document.form1.file.value=="")
{
	alert("Insert the Images");
	document.form1.file.focus();
	return false;
}
if(document.form1.estprice.value=="")
{
	alert("Enter Estimated Price");
	document.form1.modelestprice
	return false;
}
if(document.form1.description.value=="")
{
	alert("Enter the Description");
	document.form1.description.focus();
	return false;
}
if(document.form1.status.value=="")
{
	alert("Enter Status");
	document.form1.status.focus();
	return false;
}

}
</script>

<?php
if(isset($_POST["submit"]))
{
move_uploaded_file($_FILES["file"]["tmp_name"],
"upload/" . $_FILES["file"]["name"]);
$img = $_FILES["file"]["name"];

$sql ="insert into vehiclestore(empid,vehname,model,brand,images,estprice,description,status) 
values('$_POST[empname]','$_POST[vehname]','$_POST[model]','$_POST[brand]','$img','$_POST[estprice]','$_POST[description]','$_POST[status]')";

	if (!mysql_query($sql,$con))
 	 {
  	die('Error: ' . mysql_error());
  	}
}

if(isset($_POST["update"]))
{
move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
$img = $_FILES["file"]["name"];
if($img != "")
{
$sql ="UPDATE vehiclestore set empid='$_SESSION[empid]',vehname='$_POST[vehname]',images='$img',model='$_POST[model]',brand='$_POST[brand]',estprice='$_POST[estprice]',description='$_POST[description]',status='$_POST[status]' where vehicleid='$_GET[vahicleid]'";
}
else
{
$sql ="UPDATE vehiclestore set empid='$_SESSION[empid]',vehname='$_POST[vehname]',model='$_POST[model]',brand='$_POST[brand]',estprice='$_POST[estprice]',description='$_POST[description]',status='$_POST[status]' where vehicleid='$_GET[vahicleid]'";
}
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
	if(mysql_affected_rows() == 1)
		{
	$resultsucc = 1;
		}
}

?>
<?php
$sql = mysql_query("select * from vehiclestore where vehicleid='$_GET[vahicleid]'");
$row = mysql_fetch_array($sql);
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>Vehicle store</h1>
            <?php
			if($resultsucc == 1)
			{
				echo "Vehicle record updated successfully,...";
			}
			else
			{
				?>
		<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onlclick="return validate()">		
			<table width="325", border="0">
			  <?php if(!isset($_GET['vahicleid'])) { ?><tr>
			    <th width="169" height="33" scope="row">Employee Name</th>
			    <td width="140">
			      <label for="fname"></label>
			      <label for="custname"></label>
			      <label for="sparename"></label>
			      <label for="vehname2"></label>
			      <label for="empname"></label>
		        <input type="text" name="empname" value="<?php echo $row['']; ?>" id="empname"  onKeyPress="return isNumberKey(event)" /></td>
		      </tr> <?php } ?>
			  <tr>
			    <th height="33" scope="row">Vehicle Name
                  <label for="lname"></label></th>
			    <td><label for="vehname"></label>
			      <label for="sparetype"></label>
			      <label for="vehname3"></label>
		        <input type="text" name="vehname" value="<?php echo $row['vehname']; ?>" id="vehname" /></td>
		      </tr>
			  <tr>
			    <th height="28" scope="row">Model</th>
			    <td><p>
			      <label for="email"></label>
			      <label for="model"></label>
			      <label for="vehicleno"></label>
			      <label for="spareno"></label>
			      <label for="sparename2"></label>
			      <label for="model2"></label>
		          <input type="text" name="model" value="<?php echo $row['model']; ?>" id="model" />
	            </td>
		      </tr>
			  <tr>
			    <th height="31" scope="row">Brand</th>
			    <td><label for="password"></label>
			      <label for="date"></label>
			      <label for="description"></label>
			      <label for="brand"></label>
		        <input type="text" name="brand" value="<?php echo $row['brand']; ?>" id="brand" /></td>
		      </tr>
			  <tr>
			    <th height="36" scope="row">Images</th>
			    <td><label for="confpass"></label>
			      <label for="images"></label>
			      <label for="address"></label>
			      <label for="image"></label>
			      <label for="images2"></label>
			      <label for="images3"></label>
			      <label for="file"></label>
			      <input type="file" name="file" id="file" /></td>
		      </tr>
			  <tr>
			    <th height="33" scope="row">Estimated Price</th>
			    <td><label for="estprice"></label>
		        <input type="text" name="estprice" value="<?php echo $row['estprice']; ?>" id="estprice"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
			  <tr>
			    <th height="30" scope="row">Description</th>
			    <td><label for="description2"></label>
                <textarea name="description" id="description2"><?php echo $row['description']; ?></textarea></td>
		      </tr>
			  <tr>
			    <th height="27" scope="row">Status</th>
			    <td><label for="status"></label>
		        <input type="text" name="status" value="<?php echo $row['status']; ?>" id="status" /></td>
		      </tr>
			  <tr>
			    <th scope="row">&nbsp;</th>
			    <td><?php if(isset($_GET['vahicleid'])) { ?> <input type="submit" name="update" id="submit" value="Update Vahicle" /> <?php } else { ?> <input type="submit" name="submit" id="submit" value="Register" /><?php } ?></td>
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