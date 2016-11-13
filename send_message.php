<?php session_start();?> <!DOCTYPE html>
<html>
<head>
<title>Conference management</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

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
    	<h1 align="center">Send Message</h1>
		<form action="sendmessage.php" method="post" name="sendmessage" align="center" enctype="multipart/form-data" >
        	<table align="center">
				<tr>
                	<td width="160" align="left" valign="top"><p>To: </p></td>
					<td><?php 
								include "dbconnection.php";
							$query = "SELECT p_id,p_firstname,p_surname from tblparticipant ";
							$result = mysql_query($query);
							
							echo "<input list='userList' name='user_id' class='twitter' id='user'  placeholder='Search user' autocomplete='off'>";
							echo "<datalist id='userList'>";
							while($row = mysql_fetch_array($result))
							{
								echo "<option data-value='".$row['p_id']."'>".$row['p_firstname']." ".$row['p_surname']."</option>";
							}
							echo "</datalist>";
							
						?>
						<input type="hidden" name="answer" id="user-hidden">
						</td>         
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
					</tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Title</p></td>
       	            <td><input type="text" name="title" style="width:80%; " class="twitter" autocomplete=off  /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Message</p></td>
       	            <td><textarea  name="message" style="width:80%; height:100px; " class="twitter" ></textarea></td>
                </tr>
            	<tr>
                	<td height="60"></td>
                	<td><div style="float:left;"><input type="submit" name="submit" class="button" value="Submit"/></div><div style="text-align:center;"><input type="reset" name="reset" class="button" value="Clear"/></div></td>
                </tr>
            </table>
        </form>
	</div>
</div>




  

<!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>
</html>