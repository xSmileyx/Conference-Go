<?php	
		$db = mysqli_connect("localhost","root","","testing"); //keep your db name
		$sql = "SELECT * FROM tbldash ORDER BY dash_id DESC LIMIT 1";
		$sth = $db->query($sql);
		$result=mysqli_fetch_array($sth);
?>

