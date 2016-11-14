<?php session_start();?> <!DOCTYPE html>
<html>
<head>
<title>Conference management</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
	<div id="addcater">
    	<h1 align="center">Add Tour</h1>
		<form action="addtour.php" method="post" name="addtour" align="center" enctype="multipart/form-data" >
        	<table align="center">
        		<tr>
                	<td width="160" align="left" valign="top"><p>Tour Name</p></td>
       	            <td><input type="text" id="tour_name" name="tour_name" style="width:80%; " class="twitter" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Tour Location</p></td>
       	            <td><input type="text" id="tour_location" name="tour_location" style="width:80%; " class="twitter"  required /></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Tour Price (RM)</p></td>
       	            <td><input type="number" id="tour_price" name="tour_price" min=1 step="0.1" class="twitter" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Tour duration</p></td>
       	            <td><input type="number" name="tour_duration_hour" style='display:inline-block; float:left; ' id='hours' min=1 max=24 class="twitter" autocomplete=off   />
					    <input type="radio" style='float:left; margin-top:10px;' id='hour' onclick="toggle(this.value)" name="duration_format" value="hour"  checked>
						<font style='float:left; margin-top:5px;'>Hour(s)</font><br><br>
						
						<input type="number" name="tour_duration_day" style='display:inline-block; float:left;' id='days' min=1 max=14 class="twitter" autocomplete=off  disabled />
					    <input type="radio" style='float:left; margin-top:10px;' id='day' onclick="toggle(this.value)" name="duration_format" value="day" >
						<font style='float:left;margin-top:5px; '>Day(s)</font><br>
						
						<script>
				
							
						$('#hours').keypress(function(event){
								event.preventDefault();
							});
							
						$('#days').keypress(function(event){
								event.preventDefault();
							});					


						$('#tour_price').keypress(function(event){
								event.preventDefault();
							});

							

						function toggle(bool) 
							{
								if(bool == 'hour')
								{
									document.getElementById("days").disabled = true;
									document.getElementById("days").value = '';
									document.getElementById("hours").disabled = false;
								}
								if(bool == 'day')
								{
									document.getElementById("hours").disabled = true;
									document.getElementById("hours").value = '';
									document.getElementById("days").disabled = false;
								}
								
								
							}
						</script>
       	            
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Tour Start Time</p></td>
       	            <td><input type="time" id="tour_starttime" name="tour_starttime"   class="twitter" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Tour Image</p></td>
       	            <td><input type="file" id="tour_image" name="tour_image" class="twitter" /></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Includes<p></td>
       	            <td><textarea name="includes" id="includes" style="width:80%; height:200px; "  class="twitter"  /></textarea></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Excludes<p></td>
       	            <td><textarea name="excludes" id="excludes" style="width:80%; height:200px; "  class="twitter" required /></textarea></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Remarks<p></td>
       	            <td><textarea name="remark" id="remark" style="width:80%; height:200px; "  class="twitter"  /></textarea></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Description<p></td>
       	            <td><textarea name="description" id="description" style="width:80%; height:300px; "  class="twitter" required /></textarea></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Validity Date<p></td>
       	            <td><input type="date" name="validity" id="validity" min="<?php echo date("Y/m/d"); ?>" class="twitter" required /></td>
					
					<script>
								Date.prototype.toDateInputValue = (function() {
								var local = new Date(this);
								local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
								return local.toJSON().slice(0,10);
							});
								
								
							document.getElementById('validity').value = new Date().toDateInputValue();	
							document.getElementById('validity').setAttribute("min", new Date().toDateInputValue());
					</script>
                </tr>
            	<tr>
                	<td height="60"></td>
                	<td><div style="float:left;"><input type="submit" name="submit" class="button" onclick="return validate();" value="Submit"/></div><div style="text-align:center;"><input type="reset" name="reset" class="button" value="Clear"/></div></td>
                </tr>
            </table>
        </form>
	</div>
</div>
	  
</div>
	  
<script>
function validate()
{
	if(document.getElementById('tour_name').value == '')
	{		
		alert("Please enter the tour name.");
		return false;
	}
	
	if(document.getElementById('tour_location').value == '')
	{		
		alert("Please enter the tour location.");
		return false;
	}
	
	if(document.getElementById('tour_price').value == '')
	{		
		alert("Please enter the tour price.");
		return false;
	}

	if(document.getElementById('tour_starttime').value == '')
	{		
		alert("Please enter the tour start time.");
		return false;
	}
	
	if ($('#includes').val() == '')
	{
		alert("Please put includes.");
		return false;
	}
	
	if ($('#excludes').val() == '')
	{
		alert("Please put excludes.");
		return false;
	}
	
	if ($('#description').val() == '')
	{
		alert("Please put description.");
		return false;
	}

	return confirm("Are you sure you want to add this tour?")

	
	
}
</script>

<!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>
</html>