<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','testing');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT conf_startdate,conf_enddate FROM tblconference WHERE conf_id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Start date</th>
<th>End date</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr id='dates'>";
    echo "<td>" .$row['conf_startdate']. "</td>";
    echo "<td>" .$row['conf_enddate']. "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>