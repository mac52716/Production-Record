<?php
$conn = new mysqli('10.153.214.138', 'web3', 'web3', 'p1_equipt_db') 
		or die ('Cannot connect to db');
    	$result = $conn->query("SELECT DISTINCT family FROM p1_uph2 WHERE family NOT IN ('na') ORDER by family ASC");
    	while ($row = $result->fetch_assoc()) {
                  $family = $row['family']; 
                  echo '<option value="'.$family.'">'.$family.'</option>';
	}
?>