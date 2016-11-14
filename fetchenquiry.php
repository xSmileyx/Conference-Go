<?php include('config.php');?>


<style>
p.msg{color: #7c795d; padding: 10px 5px 10px 5px; float:left; text-align: left;}

</style>
<form action="fetchenquiry.php" method="post" name="messageForm" id="messageForm" >
<?php 

if(isset($_GET['eid'])) {
    $id = $_GET['eid']; //escape string
	
	$SQLquery = "SELECT * from tblenquiries WHERE en_id = '$id'";
	$QueryResult =  $conn->query($SQLquery);
	 
	if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Message is not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{
					
					$date=date_create($row["enquiry_date"]);
					$msg = $row["msg_enquiry"];
					$smsg = stripslashes($msg);
					
					$title = $row["msg_title"];
					$first = $row['p_firstname'];
					$last = $row['p_surname'];
					
					echo "<p class='msg'><b>From</b> :" .$row['p_firstname']. " " .$row['p_surname']. "<br>";
					echo "<b>Title</b> : " .$row["msg_title"]. "<br>
					      <b>Date sent</b> : " .date_format($date,"jS F Y");
					
						 
					echo "<hr>";
					
					
		
					echo "<p class='msg'>" .$smsg. "</p>";
				
				}
		}
		
	

	echo "<input type='hidden' name='eID' value='".$id."'/>";
		
		
?><hr>
<input type="submit" name="Submit" style="width:auto; float:left;" value="Delete" class="button" onclick="return confirm('Are you sure?');">
</form>

<a class="button" name='reply'  style="float:right;" href="send_message.php?title=<?php echo $title; ?>&name=<?php echo $first. " " .$last; ?>"><i class="fa fa-reply" aria-hidden="true">     Reply</i></a>


<?php
}

 if(isset($_POST["Submit"]))//checks if the submit button is selected
	{
		$eID = $_POST['eID'];
		$SQLquery = "DELETE FROM tblenquiries WHERE en_id = '$eID'";
		$QueryResult =  $conn->query($SQLquery);
		
			if($QueryResult)
			{
				header('Location: ' .$_SERVER['HTTP_REFERER']);
		    }
		else
		    {
		
				echo "<br><font color = \"red\">Failed to delete enquiry</font>" .$conn->error(). ".";
		    } 
		

	}