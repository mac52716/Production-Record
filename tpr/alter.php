<?php
//include ('dbcon.php');

		$sql = "ALTER TABLE tprs MODIFY remarks varchar(255) NOT NULL DEFAULT 'na'";
			
if ($conn->query($sql) === TRUE) {
    echo "Alter table successfully";
} else {
    echo "Error Alter table: " . $conn->error;
}

$conn->close();
?>