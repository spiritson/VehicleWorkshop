<?php
session_start();
include("header.php");
include("sidebar.php");
include("dbconnection.php");
?>

<script type="text/javascript">
function validate() 
{
if(document.form1.vehname.value=="")
{
	alert("Enter Vehicle");
	document.form1.vehname.focus();
	return false;
}
if(document.form1.model.value=="")
{
	alert("Enter Model");
	document.form1.model.focus();
	return false;
}
if(document.form1.brand.value=="")
{
	alert("Enter Brand");
	document.form1.brand.focus();
	return false;
}
if(document.form1.estdprice.value=="")
{
	alert("Enter the Estimated Price");
	document.form1.estdprice.focus();
	return false;
}
if(document.form1.other.value=="")
{
	alert("Enter other info");
	document.form1.other.focus();
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
$sql ="insert into vehicle(custid,vehname,model,brand,images,estmdprice,otherinfo,status) values('$_SESSION[custid]','$_POST[vehname]','$_POST[model]','$_POST[brand]','$img','$_POST[estdprice]','$_POST[other]','Pending')";

	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
}

if(isset($_POST["update"]))
{
	
move_uploaded_file($_FILES["file"]["tmp_name"],
"upload/" . $_FILES["file"]["name"]);
$img = $_FILES["file"]["name"];
if(empty($img)){
$img = $_POST['image'];
}

if($img != "")
{
$sql ="update vehicle set custid='$_SESSION[custid]',vehname='$_POST[vehname]',model='$_POST[model]',brand='$_POST[brand]',images='$img',estmdprice='$_POST[estdprice]',otherinfo='$_POST[other]' where sellno='$_GET[updtid]'";
}
else
{
$sql ="update vehicle set custid='$_SESSION[custid]',vehname='$_POST[vehname]',model='$_POST[model]',brand='$_POST[brand]',estmdprice='$_POST[estdprice]',otherinfo='$_POST[other]' where sellno='$_GET[updtid]'";
}
	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
	  
	  if(mysql_affected_rows() == 1)
	  {
		  $recresult = "<font color='green'><b>Vehicle record updated successfully...</b></font>";
	  }
}
?>
<?php

if(isset($_GET['updtid']))
{
$sql = mysql_query("select * from vehicle where sellno='$_GET[updtid]'");
$row = mysql_fetch_array($sql);
}
?>
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>Sell vehicles</h1>
            <?php
			if(isset($_POST[submit]))
			{
				?>
<center><h3>Vehicles record added successfully.. </center></h3>
          <?php
			}
	else
	{
		echo $recresult;
		?>
	
		<form action="" method="post" enctype="multipart/form-data" onsubmit="return validate()" name="form1" id="form1">		
			<table width="484" border="0">
			  <tr>
			    <th width="264" height="37" scope="row">Vehicle Name
                  <label for="lname"></label></th>
			    <td width="210"><label for="vehname"></label>
		        <input name="vehname" type="text" value="<?php echo $row['vehname']; ?>" id="vehname" size="35" /></td>
		      </tr>
			  <tr>
			    <th height="36" scope="row">Model</th>
			    <td><label for="email"></label>
			      <label for="model"></label>
		        <input name="model" type="text" value="<?php echo $row['model']; ?>" id="model" size="35" /></td>
		      </tr>
			  <tr>
			    <th height="47" scope="row">Brand</th>
			    <td><label for="password"></label>
		        <input name="brand" type="text" value="<?php echo $row['brand']; ?>" id="brand" size="35" /></td>
		      </tr>
			  <tr>
			    <th height="40" scope="row" valign="top"><br />
		        Images</th>
			    <td><label for="confpass"></label>
			      <label for="images"></label>
			      <label for="file"></label>
			      <input type="file" name="file" id="file" /><input type="hidden" name="image"  />
			      <?php if(isset($_GET['updtid'])) 
				{ 
				?>
				  <?php
				  if($row['images'] == "")
				  {
					$imgsrc =  "images/noimage.png";
				  }
				  else
				  {
					 $imgsrc =  "upload/$row[images]"; 
				  }
				  ?>
                
                  <img src="<?php echo $imgsrc; ?>" width="179" height="148" />
                   <?php
				}
				?>
                  </td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Estimated Price (In $)</th>
			    <td><label for="phone"></label>
			      <label for="estdprice"></label>
		        <input name="estdprice" type="text" value="<?php echo $row['estmdprice']; ?>" id="estdprice" size="35"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></td>
		      </tr>
			  <tr>
			    <th height="45" scope="row">Other Info</th>
			    <td><label for="mobile"></label>
			      <label for="other"></label>
                <textarea name="other" cols="15" id="other" ><?php echo $row['otherinfo']; ?></textarea></td>
		      </tr>
			  <tr>
			    <th scope="row">&nbsp;</th>
			    <td>
				<?php if(isset($_GET['updtid'])) 
				{ 
				?>
                <input type="submit" name="update" id="update" value="Update vehicle" /><?php }else{ ?><input type="submit" name="submit" id="submit" value="Sell vehicle" /><?php } ?></td>
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