<?php
	include 'dbconnection.php';
?>
<?php session_start();?> <!DOCTYPE html>

<html>
<head>
<title>Conference management</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

			<script type="text/javascript">

			function validateform()
			{
				var conf_name = document.getElementById("conf_name").value;
								
				var conf_details = document.getElementById("conf_details").value;
				
				var dd1 = document.getElementById("d1").value;
				var dd2 = document.getElementById("d2").value;
				
				
				if (conf_name=="")
				{
					alert('Please enter a value for Conference name');
					return false;
				}
		
				var currentTime = new Date();
				var month = currentTime.getMonth() + 1;
				var day = currentTime.getDate();
				var year = currentTime.getFullYear();
				var today = year+"-"+month+"-"+day;
				if(dd1=="")
				{
					alert('Please enter Start date. Start date cannot be empty');
					return false;
				}
				if(dd2=="")
				{
					alert('Please enter End date. End date cannot be empty');
					return false;
				}
				if(dd1 < today)
				{
					alert('Start date of conference cannot be in the past');
					return false;
				}
				if (dd2<dd1) 
				{
					alert('End date cannot be before Start date, Please enter date again');
					return false;
				} 
				
				var caterer = document.getElementById("caterer_id");
				var strCaterer = caterer.options[caterer.selectedIndex].value;
				if(strCaterer==0)
				{
					alert('Please select a caterer form the dropdown list');
					return false;
				}
				
				var venue = document.getElementById("venue_id");
				var strVenue = venue.options[venue.selectedIndex].value;
				if(strVenue==0)
				{
					alert('Please select a venue form the dropdown list');
					return false;
				}
				
				var em = document.getElementById("em_id");
				var strUser = em.options[em.selectedIndex].value;
				if(strUser == 0)
				{
					alert('Please select the event manager from dropdown list');
					return false;
				}

				if(conf_details=="")
				{
					alert('Please enter conference details');
					return false;
				}
				
				confirm('Do you want to add this Conference?');
				
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

	<div id="addconference">
    <h1 align="center">Add Conference</h1>
    </br>
    	<form action="addconference.php" method="post" name="addconference">
        <table align="center">
        	<tr>
            	<td align="left" valign="middle"><p>Conference name</p></td>
                <td colspan="2"><input type="text" name="conf_name" id="conf_name" class="twitter" placeholder="Enter conference name" required /></td>
            </tr>
            <tr>
            	<td align="left" valign="middle"><p>Conference start date</p></td>
                <td colspan="2"><input type="date" name="conf_startdate"  class="twitter" id="d1" required /></td>
            </tr>
            <tr>
            	<td align="left" valign="middle"><p>Conference end date</p></td>
                <td colspan="2"><input type="date" name="conf_enddate" class="twitter" id="d2" required/></td>
            </tr>
                
            <tr>
            	<td align="left" valign="middle"><p>Caterer </p></td>
                <td colspan="2"	>	     
                 	<select name='caterer_id' id='caterer_id' class='twitter' >
					<option value='0'>-Select-</option>
				 <?php
					$query = "SELECT caterer_id,caterer_name from tblcaterer ";
					$result = mysql_query($query);
			
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['caterer_id']."'>".$row['caterer_name']."</option>";
					}
					echo "</select>";
				?>
                </td>
            </tr>
            <tr>
            	<td align="left" valign="middle"><p>Venue </p></td>
                <td colspan="2">
				<select name='venue_id' id='venue_id' class='twitter'>
                <option value='0'>-Select-</option>
				<?php
					$query = "SELECT venue_id,venue_name from tblvenue ";
					$result = mysql_query($query);
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['venue_id']."'>".$row['venue_name']."</option>";
					}
					echo "</select>";
				?>
                </td>
            </tr>
            <tr>
            	<td align="left" valign="middle"><p>Event manager </p></td>
                <td colspan="2">
				<select name='em_id' id='em_id' class='twitter'>
				<option value="0">-Select-</option>
                <?php
					$query = "SELECT em_id,em_username from tbleventmanager ";
					$result = mysql_query($query);
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['em_id']."'>".$row['em_username']."</option>";
					}
				?>
				</select>
                </td>
            </tr>
            <tr>
            	<td align="left" valign="top"><p>Conference description</p></td>
            	<td colspan="2"><textarea name="conf_details" id="conf_details" rows="5" cols="30"></textarea></td>   
            </tr>  
            <tr align="left">
                	<td><input type="reset" name="reset" class="button" value="Clear"/></td>
					<td align="right"><input type="submit" name="submit" class="button" value="Submit" onclick="return validateform();" /></td>
			</tr>        
        </table>
        </form>
    </div>
</div>
      </div>
<?php include'footer.php'?>

<?php } ?>
</body>
</html>