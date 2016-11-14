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
			function formvalidate()
			{
				var sname =document.getElementById('session_name').value;
				if(sname=="")
				{
					alert('Session name cannot be empty');
					return false;
				}
				
				var conf = document.getElementById("conf_id");
				var strConf= conf.options[conf.selectedIndex].value;
				if(strConf==0)						
				{
					alert('Please select a Conference form the dropdown list');
					return false;
				}
				
				var speak = document.getElementById("speaker_id");
				var strSpeak= speak.options[speak.selectedIndex].value;
				if(strSpeak==0)						
				{
					alert('Please select a Speaker form the dropdown list');
					return false;
				}
				
				var Row = document.getElementById("dates");
				var Cells = Row.getElementsByTagName("td");
				var confstart = Cells[0].innerText;
				var confend = Cells[1].innerText;
				var session = document.getElementById('session_day').value;
				if(session=="")
				{
					alert('Please enter a session date');
					return false;
				}
				if(session < confstart)
				{
					alert('Session day cannot be before conference start date');
					return false;
				}
				if(session > confend)
				{
					alert('Session day cannot be after conference end date');
					return false;
				}
				
				var tt1 = document.getElementById('s_start').value;
				var tt2 = document.getElementById('s_end').value;
				if(tt1=="")
				{
					alert('Please enter a start time');
					return false;
				}
				if(tt2=="")
				{
					alert('Please enter an end time');
					return false;
				}				
				if (tt2<tt1) 
				{
					alert('Session End time cannot be before the Start time. Please enter time again');
					return false;
				} 
				var room = document.getElementById('session_room').value;
				if(room=="")
				{
					alert('Please enter a room name');
					return false;
				}
				
							
				confirm('Do you want to add this session?');
			}
		</script>
		
<script>
	function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getdate.php?q="+str,true);
        xmlhttp.send();
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
                <td colspan=2><input type="text" name="session_name"  id="session_name" class="twitter" placeholder="Session name " required /></td>
        </tr>
        <tr>
            	<td width="100" align="left" valign="top"><p>Conference name</p></td>
                <td width="80">	     
				 	<select name='conf_id' class='twitter' id='conf_id'  onchange="showUser(this.value)">
					<option value='0'>-Select-</option>
					<?php
					$query = "SELECT conf_id,conf_name,conf_startdate,conf_enddate FROM tblconference WHERE conf_enddate >= CURDATE() ";
					$result = mysql_query($query);
					
					while($row = mysql_fetch_array($result))
					{					
    					echo "<option value='".$row['conf_id']."' >" .$row['conf_name'].  "</option>";
					}
					echo "</select>";
				?>
                </td>
            </tr>
			<tr>
				<td colspan="2">
					<div id="txtHint"><b>Start and End date of conference will be displayed here</b></div>
				</td>
			</tr>
            <tr>
            	<td align="left" valign="top"><p>Speaker Name</p></td>
                <td>
				<select name='speaker_id' id="speaker_id" class="twitter">
				<option value="0">-Select-</option>
                 <?php
					$query = "SELECT speaker_id,speaker_firstname,speaker_lastname from tblspeaker ";
					$result = mysql_query($query);

					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['speaker_id']."'>".$row['speaker_firstname']." ".$row['speaker_lastname']."</option>";
					}
					echo "</select>";
				?>
                </td>
            </tr>
            <tr>
            <td align="left" valign="top"><p>Session day</p></td>
                <td colspan=2><input type="date" name="session_day" class="twitter" placeholder="YYYY/MM/DD" id="session_day" required /></td>
            </tr>
            <td align="left" valign="top"><p>Start time</p></td>
                <td colspan=2><input type="time" name="session_starttime" class="twitter" placeholder="HH:MM:SS" id="s_start" required /></td>
            </tr>
            <td align="left" valign="top"><p>End time</p></td>
                <td colspan=2><input type="time" name="session_endtime" class="twitter" placeholder="HH:MM:SS" id="s_end" required /></td>
            </tr>
            <td align="left" valign="top"><p>Session room</p></td>
                <td colspan=2><input type="text" name="session_room" id="session_room" class="twitter" placeholder="Room name" required /></td>
            </tr>
            <tr>
                    <td></td>
                	<td colspan=2><div style="float:left;"><input type="reset" name="reset" class="button" value="Clear"/></div>
                    				<div style="text-align:center;"><input type="submit" name="submit" class="button" value="Submit" onclick="return formvalidate();" /></div>
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