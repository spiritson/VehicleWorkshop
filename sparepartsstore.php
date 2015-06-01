<?php
session_start();
include("header.php");
		if(isset($_SESSION[empid]))
	{
		header("Location: empaccount.php");
	}
include("sidebar.php");
include("dbconnection.php");
$sql = mysql_query("select * from  spareparts");

?>
		
							
		<div id="main">
	    <h3>Spare parts store</h3>
	    <br />					
											
		<table width="534" border="1">
        <?php
		while($row = mysql_fetch_array($sql))
		{
		?>
		  <tr>
		    <td colspan="2"><strong>Spare part name: </strong>abcd spare</td>
	      </tr>
		  <tr>
		    <td width="142"><img src="upload/<?php echo $row['image']; ?>" width="196" height="153" /></td> 
		    <td width="352" valign="top"><p><strong>Spare parts type : <?php echo $row['type']; ?></strong></p>
	        <p><strong>Cost : <?php echo $row['cost']; ?></strong></p>
	        <p><strong>Spare parts serial No. : <?php echo $row['sparepartno']; ?></strong></p>
	        <p><strong><?php echo "<a href='sparepartsstoremore.php?sparepartid=$row[spid]'>More &gt;&gt;</a>"; ?></strong></p></td>
	      </tr>
          <?php
		  }
		  ?>
		  </table>
		</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>