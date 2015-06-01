<?php
include("header.php");

include("sidebar.php");
include("dbconnection.php");
$sql = mysql_query("select * from spareparts where spid='$_GET[sparepartid]'");
$row = mysql_fetch_array($sql);
if(!isset($_SESSION[custid]))
{
	header("Location: login.php");
}
?>	
		
							
		<div id="main">
	    <h3>Spare parts order</h3>
				
		<form id="form1" name="form1" method="post" action="orderedspareparts.php">							
		<table width="534" border="1">
		  <tr>
		    <td colspan="2"><strong>Spare part name: </strong>abcd spare</td>
	      </tr>
		  <tr>
		    <td width="142"><img src="upload/<?php echo $row['image']; ?>" width="196" height="153" /></td> 
		    <td width="352" valign="top"><p><strong>Spare parts type : <?php echo $row['type']; ?></strong>a123	</p>
	        <p><strong>Cost : </strong><?php echo $row['cost']; ?></p>
	        <p><strong>Spare parts serial No. :</strong> <?php echo $row['sparepartno']; ?></p>
	        <p>&nbsp;</p></td>
	      </tr>
          <?php
		  $result = mysql_query("select * from customer where custid='$_SESSION[custid]'");
		  $res = mysql_fetch_array($result);
		  ?>
		  <tr>
		    <td colspan="2"><strong>Customer Information:</strong></td>
	      </tr>
		  <tr>
		    <td><strong>Customer name :</strong></td>
		    <td valign="top"><?php echo $res['fname'].$res['lname']; ?></td>
	      </tr>
		  <tr>
		    <td><strong>Email ID:</strong></td>
		    <td valign="top"><?php echo $res['emailid']; ?></td>
	      </tr>
		  <tr>
		    <td><strong>Contact No.:</strong></td>
		    <td valign="top"><?php echo $res['contactno1']; ?></td>
	      </tr>
          <tr>
		    <td><strong>No. Of Items</strong></td>
		    <td valign="top"><label for="address"></label>
	        <input type="text" name="noofitems" id="noofitems" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/><input type="hidden" name="spid" value="<?php echo $row['spid']; ?>" /></td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td valign="top">&nbsp;</td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td valign="top">
		      <input type="submit" name="submit" id="submit" value="Order products" />
	        </form></td>
	      </tr>
		  </table>
		</div>			
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>