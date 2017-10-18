<?php
include('dbcon.php');
	$result = $conn->query("SELECT DISTINCT Handler_ID FROM Testers WHERE Handler_ID NOT IN ('-', 'na', 'No Handler') ORDER by Handler_ID ASC");
	while ($row = $result->fetch_assoc()) {
			  $Handler_ID=$row['Handler_ID']; 
			  echo "<option value=".$Handler_ID.">".$Handler_ID."</option>";
	}
?>