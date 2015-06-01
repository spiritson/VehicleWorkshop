<?php
session_start();
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
if(document.form1.sparename.value=="")
{
	alert("Enter Sparepart Name");
	document.form1.sparename.focus();
	return false;
}
if(document.form1.sparetype.value=="")
{
	alert("Enter Sparepart Type");
	document.form1.sparetype.focus();
	return false;
}
if(document.form1.spareno.value=="")
{
	alert("Enter Sparepart Number");
	document.form1.spareno.focus();
	return false;
}
if(document.form1.sparecost.value=="")
{
	alert("Enter Sparepart Cost");
	document.form1.sparecost.focus();
	return false;
}
if(document.form1.description.value=="")
{
	alert("Enter Sparepart Description");
	document.form1.description.focus();
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
$sql ="insert into spareparts(name,type,cost,sparepartno,description,image) values('$_POST[sparename]','$_POST[sparetype]','$_POST[sparecost]','$_POST[spareno]','$_POST[description]','$img')";
$ctins = 1;
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
}
if(isset($_POST["update"]))
{
move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
$img = $_FILES["file"]["name"];
if($img=="")
{
$sql ="update spareparts set name='$_POST[sparename]',type='$_POST[sparetype]',cost='$_POST[sparecost]',sparepartno='$_POST[spareno]',description='$_POST[description]' where spid='$_GET[sparepartid]'";
}
else
{
$sql ="update spareparts set name='$_POST[sparename]',type='$_POST[sparetype]',cost='$_POST[sparecost]',sparepartno='$_POST[spareno]',description='$_POST[description]',image='$img'  where spid='$_GET[sparepartid]'";
}
$ctins = 1;
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
}


?>
<?php
$sql = mysql_query("select * from spareparts where spid = '$_GET[sparepartid]'");
$row = mysql_fetch_array($sql);
?>

<?php
if($ctins == 1)
{
	if(isset($_GET['sparepartid'])){
	echo "<center><b>Spare Parts Updated Successfully...</b></center><br>";
	}
	else
	{
	echo "<center><b>Spare Parts Added Successfully...</b></center><br>";
	}
}
else
{
?>	
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>Add spare parts</h1>
            <h3><center><a href="viewspareparts.php">View spare parts</a></center></h3>
		<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" onsubmit="return validate()">		
			<table width="489" border="0">
			  <tr>
			    <th width="169" height="33" scope="row">Sparepart Name</th>
			    <td width="140">
			      <label for="fname"></label>
			      <label for="custname"></label>
			      <label for="sparename"></label>
		        <input name="sparename" type="text" value="<?php echo $row['name']; ?>" id="sparename" size="30"  onKeyPress="return isNumberKey(event)"/></td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Sparepart Type
                  <label for="lname"></label></th>
			    <td><label for="vehname"></label>
			      <label for="sparetype"></label>
		        <input name="sparetype" type="text" value="<?php echo $row['type']; ?>" id="sparetype" size="30" /></td>
		      </tr>
			  <tr>
			    <th height="36" scope="row">Sparepart                No</th>
			    <td>
		          <input name="spareno" type="text" value="<?php echo $row['sparepartno']; ?>" id="spareno" size="30" />
	           </td>
		      </tr>
              <tr>
			    <th height="37" scope="row">Sparepart Cost
                  <label for="lname"></label></th>
			    <td><label for="vehname"></label>
			      <label for="sparecost"></label>
		        <input type="text" name="sparecost" value="<?php echo $row['cost']; ?>" id="sparecost" size="30"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
			  <tr>
			    <th height="34" scope="row">Description </th>
			    <td><label for="password"></label>
			      <label for="date"></label>
			      <label for="description"></label>
                <textarea name="description" id="description"><?php echo $row['description']; ?></textarea></td>
		      </tr>
			  <tr>
			    <th height="40" scope="row">Image</th>
			    <td><label for="confpass"></label>
			      <label for="images"></label>
			      <label for="address"></label>
			      <label for="image"></label>
		        <input type="file" name="file" id="file" />
		        <br />
				<?php 
				if(isset($_GET['sparepartid'])) 
				{ 
				?>
<img src="upload/<?php echo $row['image']; ?>" width="150" height="150" />
                <?php
				}
				?></td>
		      </tr>
			  <tr>
			    <th scope="row">&nbsp;</th>
			    <td><?php if(isset($_GET['sparepartid'])) { ?><input type="submit" name="update" id="submit" value="Update Spare parts" /> <?php } else { ?> <input type="submit" name="submit" id="submit" value="Submit" /><?php } ?></td>
		      </tr>
			  <tr>
			    <th scope="row">&nbsp;</th>
			    <td>&nbsp;</td>
		      </tr>
          </table>
	  </form>
      <?php
	  }
	  ?>
			<p>&nbsp;</p>
									
		</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>