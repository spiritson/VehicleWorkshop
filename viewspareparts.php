<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
if(isset($_GET['sparepartid']))
{
$results = mysql_query("DELETE from spareparts where spid ='$_GET[sparepartid]'");
}
$result= mysql_query("select * from spareparts");
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>View Spareparts</h1>
            <h3><center>
              <a href="spareparts.php">Add spareparts</a>
            </center></h3>
            <?php
if($ctins == 1)
{
	echo "<center><b>Employees account created successfully...</b></center><br>";
	echo "<center><b><a href='emplogin.php'>Click here to Login.</a></b></center>";
}
else
{
	?>
		<form id="form1" name="form1" method="post" action="">
		  <table width="686" border="1">
		    <tr>
		      <th scope="col">Image</th>
		      <th scope="col">Spareparts name</th>
		      <th scope="col">Spareparts type</th>
		      <th scope="col">Spareparts no</th>
		      <th scope="col">Description</th>
              <th width="63" scope="col" colspan="3">Actions</th>
	        </tr>
          <?php
		  while($arrrec= mysql_fetch_array($result))
		  {  
		   echo" <tr>
		       <td>&nbsp; <img src='upload/$arrrec[image]' height='75' width='100'></img></td>
		      <td>&nbsp; $arrrec[name]</td>
		      <td>&nbsp; $arrrec[type]</td>
		      <td>&nbsp; $arrrec[sparepartno]</td>
		      <td>&nbsp; $arrrec[description]</td>
			  <td><a href='viewsparepartsstoremore.php?sparepartid=$arrrec[spid]'>More</a></td><td><a href='spareparts.php?sparepartid=$arrrec[spid]'>Edit</a></td><td><a href='viewspareparts.php?sparepartid=$arrrec[spid]'>Delete</a></td>
	        </tr>";
		  }
	      ?>
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