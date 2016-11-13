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
			function tcheck()
			{
				var tt1 = document.getElementById('s_start').value;
				var tt2 = document.getElementById('s_end').value;
				if (tt2<tt1) 
				{
					alert('Session End time cannot be before the Start time. Please enter time again');
				} 
			}
			</script>
			
			<script type="text/javascript">
			function datecheck()
			{
				var confstart = document.getElementById('start_date').value;
				var confend = document.getElementById('end_date').value;
				var sessionday = document.getElementById('session_day').value;
				if (sessionday < confstart || sessionday > confend) 
				{
					alert('Session day cannot be before the start of the conference or after its end. Please check date and enter again');
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
		<div id="addsession">
          <h1 align="center">Add Session</h1>
    	<form action="addsession.php" method="post" name="addsession">
        <table align="center">
        <tr>
        <td align="left" valign="top"><p>Session name</p></td>
                <td colspan=2><input type="text" name="session_name" class="twitter" placeholder="Session name " required /></td>
            </tr>
        <tr>
            	<td width="100" align="left" valign="top"><p>Conference name</p></td>
                <td width="80">	     
                 <?php
					$query = "SELECT conf_id,conf_name,conf_startdate,conf_enddate FROM tblconference WHERE conf_enddate >= CURDATE() ";
					$result = mysql_query($query);
					echo "<select name='conf_id'>";
					echo "<option value='0'>-Select-</option>";
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['conf_id']."' >" .$row['conf_name'].  "</option>";								
						 echo '<input type="hidden" id="start_date" value="'.$row['conf_startdate'].'" />';
						 echo '<input type="hidden" id="end_date" value="'.$row['conf_enddate'].'" />';
					
					}
					echo "</select>";
					
					
				?>
                </td>
            </tr>
            <tr>
            	<td align="left" valign="top"><p>Speaker ID</p></td>
                <td>	     
                 <?php
					$query = "SELECT speaker_id,speaker_firstname,speaker_lastname from tblspeaker ";
					$result = mysql_query($query);
					
					echo "<input list='speaker' name='speaker_id'>";
					echo "<datalist id='speaker'>";
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['speaker_id']."'>".$row['speaker_firstname']." ".$row['speaker_lastname']."</option>";
					}
					echo "</datalist>";
				?>
                </td>
            </tr>
            <tr>
            <td align="left" valign="top"><p>Session day</p></td>
                <td colspan=2><input type="date" name="session_day" class="twitter" placeholder="YYYY/MM/DD" id="session_day" onblur="datecheck()" required /></td>
            </tr>
            <td align="left" valign="top"><p>Start time</p></td>
                <td colspan=2><input type="time" name="session_starttime" class="twitter" placeholder="HH:MM:SS" id="s_start" required /></td>
            </tr>
            <td align="left" valign="top"><p>End time</p></td>
                <td colspan=2><input type="time" name="session_endtime" class="twitter" placeholder="HH:MM:SS" id="s_end" onblur="tcheck()" required /></td>
            </tr>
            <td align="left" valign="top"><p>Session room</p></td>
                <td colspan=2><input type="text" name="session_room" class="twitter" placeholder="Room name" required /></td>
            </tr>
            <tr>
                    <td></td>
                	<td colspan=2><div style="float:left;"><input type="reset" name="reset" class="button" value="Clear"/></div>
                    				<div style="text-align:center;"><input type="submit" name="submit" class="button" value="Submit"/></div>
                                    </td>          
			</tr>        
        </table>
        </form>
    </div>
</div>
      </div>
<!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>
</html>