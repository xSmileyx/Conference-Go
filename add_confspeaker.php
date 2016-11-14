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
<script>
						document.querySelector('input[list]').addEventListener('input', function(e) {
    var input = e.target,
        list = input.getAttribute('list'),
        options = document.querySelectorAll('#' + list + ' option'),
        hiddenInput = document.getElementById(input.id + '-hidden'),
        inputValue = input.value;

    hiddenInput.value = inputValue;

    for(var i = 0; i < options.length; i++) {
        var option = options[i];

        if(option.innerText === inputValue) {
            hiddenInput.value = option.getAttribute('data-value');
            break;
        }
    }
});
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
<div id="addconfspeaker">
<h1 align="center">Add conference speaker</h1></br>
    	<form action="addconfspeaker.php" method="post" name="addconferencespeaker">
        <table width="106%" align="right">
                    <tr>
            	<td width="385" align="left" valign="top"><p>Conference name</p></td>
                <td>	     
                 <?php
					$query = "SELECT conf_id,conf_name,conf_enddate from tblconference WHERE conf_enddate >=CURDATE()";
					$result = mysql_query($query);
					echo "<select name='conf_id' class='twitter'>";
					echo "<option value='0'>-Select-</option>";
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['conf_id']."'>".$row['conf_name']."</option>";
					}
					echo "</select>";
				?>
                </td>
            </tr>
			<tr>
            	<td align="left" valign="top"><p>Speaker name</p></td>
                <td width="371">	     
				<?php
					$query = "SELECT speaker_id,speaker_firstname,speaker_lastname from tblspeaker ";
					$result = mysql_query($query);
					
					echo "<input list='speaker' class='twitter' id='s_id' autocomplete='off'>";
					echo "<datalist id='speaker'>";
					while($row = mysql_fetch_array($result))
					{
    					echo "<option data-value='".$row['speaker_id']."'>".$row['speaker_firstname']." ".$row['speaker_lastname']."</option>";
					}
					echo "</datalist>";
				?>
				<input type="hidden" name="speaker_id" id="s_id-hidden">
				<script>
							document.querySelector('input[list]').addEventListener('input', function(e)
							{
								var input = e.target,
								list = input.getAttribute('list'),
								options = document.querySelectorAll('#' + list + ' option'),
								hiddenInput = document.getElementById(input.id + '-hidden'),
								inputValue = input.value;
								hiddenInput.value = inputValue;

								for(var i = 0; i < options.length; i++) 
								{
									var option = options[i];

									if(option.innerText === inputValue)
										{
											hiddenInput.value = option.getAttribute('data-value');
											break;
										}
								}
							});
						</script>
				<input type="hidden" name="answer" id="user-hidden">
                </td>
            </tr>

            <tr>
					<td  align="left"><input type="reset" name="reset" class="button" value="Clear"	/></td>   
                    <td align="right"><input type="submit" name="submit" class="button" value="Submit"/></td>
                	       
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