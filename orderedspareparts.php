<?php
include("header.php");
include("sidebar.php");
include("dbconnection.php");
?>
<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
    </script>
<?php
$sql = mysql_query("select * from spareparts where spid=$_POST[spid]");
$row = mysql_fetch_array($sql);

if(isset($_POST["submit"]))
{
$dt = date("Y-m-d");
$sql ="insert into sparepartsorder(spid,custid,orderdate,noofitems,status) values('$_POST[spid]','$_SESSION[custid]','$dt','$_POST[noofitems]','Pending')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
}
?>			
							
		<div id="main">
             <div id="printablediv" style="width: 100%;">
	    <h3>Ordered spare part report</h3>

											
		<table width="538" border="1">
		  <tr>
		    <td height="45" colspan="2"><h2>Spare Parts booked successfully...</h2></td>
	      </tr>
		  <tr>
		    <td width="268">
            <p><img src="upload/<?php echo  $row['image']; ?>" width="208" height="130" align="left" /><br />
              <br />
            </p></td>
		    <td width="246"><p><strong>SparePart Name:</strong><?php echo  $row['name']; ?><br />
              <strong>type:</strong> <?php echo  $row['type']; ?>  <br />
              <strong>SparePart No:</strong> <?php echo  $row['sparepartno']; ?><br />
              <br />
              <br />
            </p></td>
	      </tr>
		  <tr>
		    <td>Other Information</td>
		    <td><p><?php echo  $row['description']; ?></p><br />
	          </td>
	      </tr>
		  	  <tr>
		    <td colspan="2"><strong>Total Amount: Dhs. <?php echo  $_POST[noofitems] * $row['cost']; ?></strong></td>
	      </tr>
		  <tr>
		    <td height="23" colspan="2" align="center"><a href='#' onclick="javascript:printDiv('printablediv')" ><strong>Print purchase report..</strong></a></td>
	      </tr>
		  </table>
		</div>			
		
<!-- wrap ends here -->
</div>
		
<?php
include("footer.php");
?>