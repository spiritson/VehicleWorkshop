<?php
session_start();
include("header.php");
include("sidebar.php");
include("dbconnection.php");

if(!isset($_SESSION[custid]))
{
	if(!isset($_SESSION[empid]))
	{
	header("Location: login.php");
	}
}
?>
<script type="text/javascript">
function validate() 
{
if(document.form1.bookingid.value=="")
{
	alert("Enter Booking ID");
	document.form1.bookingid.focus();
	return false;
}
if(document.form1.vehname.value=="")
{
	alert("Enter Vehicle Name");
	document.form1.vehname.focus();
	return false;
}
if(document.form1.custname.value=="")
{
	alert("Enter Customer Name");
	document.form1.custname.focus();
	return false;
}
if(document.form1.date.value=="")
{
	alert("Enter the Date");
	document.form1.date.focus();
	return false;
}
if(document.form1.time.value=="")
{
	alert("Enter the Time");
	document.form1.time.focus();
	return false;
}
if(document.form1.comment.value=="")
{
	alert("Enter the Comment");
	document.form1.comment.focus();
	return false;
}
if(document.form1.status.value=="")
{
	alert("Enter Status");
	document.form1.status.focus();
	return false;
}
}
</script>
<?php
//if(isset($_SESSION[custid]))
//{
//	header("Location: account.php");
//}
$dt= date("Y-m-d");
$tm= date("H:m:s");

if(isset($_POST["submit"]))
{
 $tim = $_POST[hour].":". $_POST[minute].":00";

$originalDate = $_POST[date];
 $newDate = date("Y-m-d", strtotime($originalDate));

$sql ="insert into testdrive(vehicleid,custid,date,time,comments,status) values('$_POST[vahicleid]','$_SESSION[custid]','$newDate','$tim','$_POST[comment]','Pending')";

	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
}
if(isset($_POST["update"]))
{
	$originalDate = $_POST[date];
 $newDate = date("Y-m-d", strtotime($originalDate));
	 $tim = $_POST[hour].":". $_POST[minute].":00";
$sql ="update testdrive set vehicleid='$_POST[vahicleid]',custid='$_SESSION[custid]',date='$newDate',time='$tim',comments='$_POST[comment]' where bookingid='$_GET[testid]'";

	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
	  if(mysql_affected_rows() == 1)
	  {
		  $resrec = "Test drive record updated succcessfully...";
	  }
}
?>
<?php
if(isset($_GET['testid']))
{
$result = mysql_query("select * from  testdrive where bookingid='$_GET[testid]'");
$res=mysql_fetch_array($result);
$dt = $res['date'];
$tm = $res['time'];
}
?>
		
							
		<div id="main">				
			
			<a name="TemplateInfo"></a>
			<h1>Test drive</h1>

          <p>
            <?php
if($ctins == 1)
{
	echo "<center><b>Custmer registered Successfully...</b></center><br>";
	echo "<center><b><a href='login.php'>Click here to Login.</a></b></center>";
}
else
{
    if(isset($_POST[submit]) || isset($_POST[update]))
    {
		echo "<h4>Test drive request sent successfully... </h4>";
	}
	else
	{
 ?>   
   </p>
          <p><?php echo $resrec; ?> </p>
          <form id="form1" name="form1" method="post" action="" onsubmit="return validate()">		
			<table width="522" border="0">
            <?php
			if(isset($_GET['testid']))
			{
			?>
			  <tr>
			    <th width="170" height="33" scope="row">Booking ID </th>
			    <td width="247">
			      <label for="vehname"></label>
			      <input name="bookingid" value="<?php echo $res['bookingid']; ?>" readonly="readonly" type="text" id="bookingid" size="35"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
		        </td>
		      </tr>
              <?php
			  }
			  ?>
			  <tr>
			    <th height="37" scope="row">Vehicle name
			      <label for="vehname"></label></th>
			    <td>
                <?php if(isset($_GET['vahicleidnum']))
			  {
			  $res = mysql_query("select vehname from vehiclestore where vehicleid='$_GET[vahicleidnum]'");
			  $rows = mysql_fetch_array($res);
			  ?><input name="vahiclename" type="text" value="<?php echo $rows['vehname']; ?>" /><input type="hidden" name="vahicleid" value="<?php echo $_GET['vahicleidnum']; ?>" />
              <?php } else { ?>
              <select name="vahicleid" id="bstatus3">
                <?php
				$sql = mysql_query("select vehname,vehicleid from vehiclestore");
				while($row = mysql_fetch_array($sql))
				{
				if($row['vahicleid'] == $res['vehicleid'])
				{
				?>
                <option value="<?php echo $row['vehicleid']; ?>" selected="selected"><?php echo $row['vehname']; ?></option>
		        <?php }else{ ?>
                <option value="<?php echo $row['vehicleid']; ?>"><?php echo $row['vehname']; ?></option>
                <?php
				}
				}
				?>
                </select><?php } ?></td>
		      </tr>
			 <!-- <tr>
			    <th height="36" scope="row">Customer name</th>
			    <td><label for="custname"></label>
			      <select name="custid" id="bstatus2">
                  <?php
				//$sql = mysql_query("select custid,fname from customer");
//				while($row = mysql_fetch_array($sql))
//				{
//				if($row['custid'] == $res['custid'])
//				{
				?>
                <option value="<?php //echo $row['custid']; ?>" selected="selected"><?php //echo $row['fname']; ?></option>
//		        <?php //}else{ ?>
//                   <option value="<?php //echo $row['custid']; ?>"><?php //echo $row['fname']; ?></option>
//                     <?php
//				}
//				}
				?>
	            </select></td>
		      </tr>-->
			  <tr>
			    <th height="34" scope="row">Date</th>
			    <td>
                <?php
				 $dt1 = date("m-d-Y"); ?>
                          <script src="datetimepicker_css.js"></script>
		        <script language="javascript" type="text/javascript" src="datetimepicker.js">
</script>
<input name="date" type="text" value="<?php echo $dt1; ?>" id="date" size="35" />
	  	<a href="javascript:NewCal('date','ddmmmyyyy',false,24)"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
	  		</td>
		      </tr>
			  <tr>
			    <th height="40" scope="row">Time</th>
			    <td><label for="time"></label>
                <select name="hour" id="hour">
                <option>Hour</option>
                <option>00</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>11</option>
                <option>11</option>
                <option>11</option>
                <option>11</option>
                </select>
                <select name="minute" id="minute">
                <option>Minute</option>
                <option>00</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <?php
                for($i=10; $i<=59; $i++)
				{
				echo "<option value='$i'>$i</option>";
				}
				?>
				</select>
                </td>
		      </tr>
			  <tr>
			    <th height="37" scope="row">Comment</th>
			    <td><textarea name="comment" cols="35" id="comment"><?php echo $res['comments']; ?></textarea></td>
		      </tr>
			 <!-- <tr>
			    <th height="37" scope="row">Status</th>
			    <td><label for="bstatus"></label>
			      <select name="bstatus" id="bstatus">
	            <option value="Pending">Pending</option>
                <option value="Finished">Finished</option>
                </select></td>
		      </tr>-->
			  <tr>
			    <th scope="row">&nbsp;</th>
			    <td><br /><?php if(isset($_GET['testid'])) { ?><input type="submit" name="update" id="submit" value="Update test drive" /><?php } else { ?><input type="submit" name="submit" id="submit" value="Add test drive" /><?php } ?></td>
		      </tr>
	      </table>
		</form>
      <?php
	}
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