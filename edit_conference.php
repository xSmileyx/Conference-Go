<?php
include 'dbconnection.php';

$conf_id = $_POST['conf_id']; 
$query = "SELECT * FROM tblconference WHERE conf_id = '$conf_id'"; 
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>
<?php session_start();?> <!DOCTYPE html>

<html>
<head>
<title>Conference management</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

			<script type="text/javascript">
			function dcheck()
			{
				var dd1 = document.getElementById('d1').value;
				var dd2 = document.getElementById('d2').value;
				if (dd2<dd1) 
				{
					alert('End date cannot be before Start date, Please enter date again');
				} 
			}
			</script>
			
</head>
<body id="top"> <?php if($_SESSION["user_name"]) { ?>

<!--include navigation bar-->
<?php include'nav.php';?>


<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content three_quarter first"> 
      <div class="scrollable">


 <div id="box">
	<div id="updateconference">
    <h1 align="center">Edit Conference</h1>
    </br>
    	<form action="updateconference.php" method="post" name="updateconference">
        <table align="center">
        	<tr>
            	<td align="left" valign="middle"><p>Conference ID</p></td>
                <td colspan="2"><input type="number" name="conf_id" class="twitter" value="<?php echo $row[0];?>" disabled /></td>
            </tr>
        	<tr>
            	<td align="left" valign="middle"><p>Conference name</p></td>
                <td colspan="2"><input type="text" name="conf_name" class="twitter" value="<?php echo $row[1];?>" required /></td>
            </tr>
            <tr>
            	<td align="left" valign="middle"><p>Conference start date</p></td>
                <td colspan="2"><input type="date" name="conf_startdate" class="twitter" id="d1" value="<?php echo $row[2];?>"  required /></td>
            </tr>
            <tr>
            	<td align="left" valign="middle"><p>Conference end date</p></td>
                <td colspan="2"><input type="date" name="conf_enddate" class="twitter" id="d2" value="<?php echo $row[3];?>"  required /></td>
            </tr>
            <tr>
            	<td align="left" valign="middle"><p>Number of pass</p></td>
                <td colspan="2"><input type="number" name="conf_numpass" class="twitter" value="<?php echo $row[4];?>"  required /></td>
            </tr>
			<tr>
            	<td align="left" valign="middle"><p>Current caterer</p></td>
                <td colspan="2"><input type="number" name="" class="twitter" value="<?php echo $row[5];?>" disabled /></td>
            </tr>
            <tr>
            	<td align="left" valign="middle"><p>Caterer id</p></td>
                <td width="80" colspan="2">	     
                 <?php
					$query = "SELECT caterer_id,caterer_name from tblcaterer ";
					$result = mysql_query($query);
					echo "<select name='caterer_id' class='twitter'>";
					echo "<option value='0'>-Select-</option>";
					
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['caterer_id']."'>".$row['caterer_id']."-".$row['caterer_name']."</option>";
					}
					echo "</select>";
				?>

                </td>

            </tr>
            
<tr><?php
include 'dbconnection.php';

$conf_id = $_POST['conf_id']; 
$query = "SELECT * FROM tblconference WHERE conf_id = '$conf_id'"; 
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>
</tr>
        	<tr>
            	<td align="left" valign="middle"><p>Current Venue ID</p></td>
                <td colspan="2"><input type="text" name="" class="twitter" value="<?php echo $row[6];?>" disabled /></td>
            </tr>
            
            <tr>
            	<td align="left" valign="middle"><p>Venue id</p></td>
                <td>
                <?php
					$query = "SELECT venue_id,venue_name from tblvenue ";
					$result = mysql_query($query);
					echo "<select name='venue_id'>";
					echo "<option value='0'>-Select-</option>";
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['venue_id']."'>".$row['venue_id']."-".$row['venue_name']."</option>";
					}
					echo "</select>";
				?>
                </td>
            </tr>
            
            <tr><?php
include 'dbconnection.php';

$conf_id = $_POST['conf_id']; 
$query = "SELECT * FROM tblconference WHERE conf_id = '$conf_id'"; 
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>
</tr>
        	<tr>
            	<td align="left" valign="middle"><p>Current Event manager</p></td>
                <td colspan="2"><input type="text" name="" class="twitter" value="<?php echo $row[7];?>" disabled /></td>
            </tr>
            
            <tr>
            	<td align="left" valign="middle"><p>Event manager ID</p></td>
                <td colspan="2">
                <?php
					$query = "SELECT em_id,em_username from tbleventmanager ";
					$result = mysql_query($query);
					echo "<select name='em_id'>";
					echo "<option value='0'>-Select-</option>";
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['em_id']."'>".$row['em_username']."</option>";
					}
					echo "</select>";
				?>
                </td>
            </tr>
            <tr><?php
include 'dbconnection.php';

$conf_id = $_POST['conf_id']; 
$query = "SELECT * FROM tblconference WHERE conf_id = '$conf_id'"; 
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>
</tr>
            <tr>
            	<td align="left" valign="top"><p>Conference description</p></td>
            	<td colspan="2"><textarea name="conf_desc"><?php echo $row[8];?></textarea></td>   
            </tr>  
            <tr align="left">
					<input type="hidden" name="conf_id" value="<?php echo $row[0];?>">
                	<td colspan="3"><input type="reset" name="reset" class="button" value="Clear"/>
					<input type="submit" name="submit" class="button" value="Submit" onclick="return confirm('Are you sure you want to apply these changes?')" style="float:right;"/></td>
			</tr>        
        </table>
        </form>
    </div>
</div>
    
      </div>
      <!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>

<?php
// close connection
mysql_close();
?>


</html>