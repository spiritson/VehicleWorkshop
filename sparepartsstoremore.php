<?php
include("header.php");

include("sidebar.php");
include("dbconnection.php");
$sql = mysql_query("select * from spareparts where spid='$_GET[sparepartid]'");
$row = mysql_fetch_array($sql);
?>
		
							
		<div id="main">
	    <h3>Spare parts store</h3>
	    <br />					
											
		<table width="534" border="1">
		  <tr>
		    <td colspan="2"><strong>Spare part name: </strong>abcd spare</td>
	      </tr>
		  <tr>
		    <td width="142"><img src="upload/<?php echo $row['image']; ?>" width="196" height="153" /></td> 
		    <td width="352" valign="top"><p><strong>Spare parts type : <?php echo $row['type']; ?></strong></p>
	        <p><strong>Cost : <?php echo $row['cost']; ?></strong></p>
	        <p><strong>Spare parts serial No. : <?php echo $row['sparepartno']; ?></strong></p>
	        <p>&nbsp;</p></td>
	      </tr>
		  <tr>
		    <td><strong>Description:</strong></td>
		    <td valign="top"><?php echo $row['description']; ?></td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td valign="top"><strong><?php echo "<a href='sparepartsorder.php?sparepartid=$row[spid]'>Buy now&gt;&gt;</a>"; ?></strong></td>
	      </tr>
		  </table>
		</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>