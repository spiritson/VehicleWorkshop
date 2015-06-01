<?php
session_start();
include("header.php");
include("sidebar.php");
include("dbconnection.php");
if(isset($_POST["submit"]))
{
move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$_FILES["file"]["name"]);
$img = $_FILES["file"]["name"];
if(empty($img))
{
$img = $_POST['image'];
}

$sql ="insert into vehiclestore(empid,vehname,model,brand,images,estprice,description,status) values('$_SESSION[empid]','$_POST[vehname]','$_POST[model]','$_POST[brand]','$img','$_POST[estprice]','$_POST[description]','Pending')";
$ctins = 1;
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$sql1 = mysql_query("update vehicle set status='Accepted' where sellno='$_GET[sellno]'");
}

?>
<?php 
if(isset($_GET['sellno']))
{
$result = mysql_query("select * from vehicle where sellno='$_GET[sellno]'");
$row = mysql_fetch_array($result);
}
?>
<?php
if($ctins == 1)
{
	echo "<center><b>Vehicle Added to vehicle store Successfully...</b></center><br>";
}
else
{	
?>					
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>Vehicle store</h1>
		<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">		
			<table width="325", border="0">
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
			    <td>
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
			      <input type="file" name="file" id="file" /><input type="hidden" value="<?php echo $row['images']; ?>" name="image" />
<img src="upload/<?php echo $row['images']; ?>" width="75" height="75"></img>                  
                  </td>
		      </tr>
			  <tr>
			    <th height="33" scope="row">Estimated Price</th>
			    <td><label for="estprice"></label>
		        <input type="text" name="estprice" value="<?php echo $row['estmdprice']; ?>" id="estprice" /></td>
		      </tr>
			  <tr>
			    <th height="30" scope="row">Description</th>
			    <td><label for="description2"></label>
                <textarea name="description" id="description2"><?php echo $row['otherinfo']; ?></textarea></td>
		      </tr>
			  
			  <tr>
			    <th scope="row">&nbsp;</th>
			    <td><input type="submit" name="submit" id="submit" value="Submit" /></td>
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