<?php
include("header.php");
include("sidebar.php");

include("dbconnection.php");
//if(isset($_GET['sellno']))
//{
//$result = mysql_query("select status from vehicle where sellno='$_GET[sellno]'");
//$res = mysql_fetch_array($result);
//if($res['status'] == 'Pending')
//{
//$res = mysql_query("update vehicle set status='Accepted' where sellno='$_GET[sellno]'");
//$res = mysql_query("insert into vehiclestore(empid,vehname,model,brand,images,estprice,description,status) values('$_SESSION[employeeid]','$_GET[vehiclename]','$_GET[model]','$_GET[brand]','$_GET[image]','$_GET[estprice]','$_GET[otherinfo]','Accepted')");
//}
//else
//{
//$res = mysql_query("update vehicle set status='Pending' where sellno='$_GET[sellno]'"); 
//}
//}
if(isset($_GET["st"]))
{
$res = mysql_query("update vehicle set status='Rejected' where sellno='$_GET[sellno]'"); 
}

$result= mysql_query("select * from vehicle");
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>Sell Vehicle</h1>
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
		  <table width="778" border="1">
		    <tr>
		      <th width="62" scope="col">Sell No</th>
		      <th width="152" scope="col">Customer Name</th>
		      <th width="273" scope="col">Vehicle info</th>
		      <th width="161" scope="col">Estimated price</th>
		      <th width="185" scope="col">Vehicle status</th>
	        </tr>
		    <?php
		  while($arrrec= mysql_fetch_array($result))
		  {  
		  ?>
          <tr>
		      <td>&nbsp;<?php echo $arrrec[sellno]; ?></td>
		      <td>&nbsp;<?php 
			  
$result1= mysql_query("select * from customer where custid='$arrrec[custid]'");
	$arrrec1= mysql_fetch_array($result1);
		  echo $arrrec1[fname]. " ".$arrrec1[lname];
			  ?></td>
		      <td>
			  <img src='upload/<?php echo $arrrec[images]; ?>' width='75' height='75' align='left'>&nbsp;<font color="green"><b><?php echo $arrrec[vehname]; ?></b></font><br>
			          <b> Model : </b><?php echo $arrrec[model]; ?><br>
					  <b>Brand : </b><?php echo $arrrec[brand]; ?></td>
			  <td>&nbsp;&nbsp;Dhs.&nbsp;<?php echo $arrrec[estmdprice]; ?></td>
			  <td>&nbsp;<?php
			   if($arrrec[status] == 'Accepted' || $arrrec[status] == 'Rejected') 
			   { 
			   echo $arrrec[status]; 
			   }
			   else
			   { 
echo "<a href='acceptvehicle.php?sellno=$arrrec[sellno]&vehiclename=$arrrec[vehname]&model=$arrrec[model]&brand=$arrrec[brand]&image=$arrrec[images]&estprice=$arrrec[estmdprice]&otherinfo=$arrrec[otherinfo]'>Accept</a> | "; 
echo "<a href='viewcustomersellvehicle.php?sellno=$arrrec[sellno]&st=reject'>Reject</a>"; 
			   } 
			   ?>
		    </td>
	        </tr>
            <?php
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