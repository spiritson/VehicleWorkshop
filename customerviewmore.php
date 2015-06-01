<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
?>
<?php
$sql = mysql_query("select * from customer where custid='$_GET[custid]'");
$row = mysql_fetch_array($sql);
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>View More</h1>
		<form action="viewcustomers.php" method="post" name="form1" id="form1">		
			<table width="500", border="0">
			    <th width="169" height="33" scope="row">Customer First Name</th>
			    <td width="140">
			      <label for="fname"></label>
			      <label for="custname"></label>
			      <label for="sparename"></label>
			      <label for="vehname2"></label>
			      <label for="empname"></label>
		       <?php echo $row['fname']; ?></td>
		      </tr> 
			  <tr>
			    <th height="33" scope="row">Customer Last Name
                  <label for="lname"></label></th>
			    <td><label for="vehname"></label>
			      <label for="sparetype"></label>
			      <label for="vehname3"></label>
		        <?php echo $row['lname']; ?></td>
		      </tr>
			  <tr>
			    <th height="31" scope="row">Email id</th>
			    <td><label for="password"></label>
			      <label for="date"></label>
			      <label for="description"></label>
			      <label for="brand"></label>
		         <?php echo $row['emailid']; ?></td>
		      </tr>
              <tr>
			    <th height="28" scope="row">Created Date</th>
			    <td><p>
			      <label for="email"></label>
			      <label for="model"></label>
			      <label for="vehicleno"></label>
			      <label for="spareno"></label>
			      <label for="sparename2"></label>
			      <label for="model2"></label>
		          <?php echo $row['createddate']; ?>
	            </td>
		      </tr>
              <tr>
			    <th height="28" scope="row">Address</th>
			    <td><p>
			      <label for="email"></label>
			      <label for="model"></label>
			      <label for="vehicleno"></label>
			      <label for="spareno"></label>
			      <label for="sparename2"></label>
			      <label for="model2"></label>
		          <?php echo $row['address']; ?>
	            </td>
		      </tr>
              <tr>
			    <th height="28" scope="row">City</th>
			    <td><p>
			      <label for="email"></label>
			      <label for="model"></label>
			      <label for="vehicleno"></label>
			      <label for="spareno"></label>
			      <label for="sparename2"></label>
			      <label for="model2"></label>
		          <?php echo $row['city']; ?>
	            </td>
		      </tr>
              <tr>
			    <th height="28" scope="row">Zip Code</th>
			    <td><p>
			      <label for="email"></label>
			      <label for="model"></label>
			      <label for="vehicleno"></label>
			      <label for="spareno"></label>
			      <label for="sparename2"></label>
			      <label for="model2"></label>
		          <?php echo $row['zipcode']; ?>
	            </td>
		      </tr>
			  <tr>
			    <th height="36" scope="row">Contact Number</th>
			    <td><label for="confpass"></label>
			      <label for="images"></label>
			      <label for="address"></label>
			      <label for="image"></label>
			      <label for="images2"></label>
			      <label for="images3"></label>
			      <label for="file"></label>
			       <?php echo $row['contactno1']; ?>
		      </tr>
			  <tr>
			    <th height="33" scope="row">Mobile Number</th>
			    <td><label for="estprice"></label>
		         <?php echo $row['contactno2']; ?></td>
		      </tr>
			  <tr>
			    <th scope="row">&nbsp;</th>
			    <td><input type="submit" name="submit" id="submit" value="Back" /></td>
		      </tr>
          </table>
</form>
			<p>&nbsp;</p>
<br />					
											
		</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>