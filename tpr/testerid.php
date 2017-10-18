<?php
session_start();
include('dbcon.php');

    	$result = $conn->query("SELECT DISTINCT Tester_ID FROM testers ORDER by Tester_ID ASC");
    	while ($row = $result->fetch_assoc()) {
                  $Tester_ID = $row['Tester_ID']; 
                  echo '<option value="'.$Tester_ID.'">'.$Tester_ID.'';
	}

//We check to see if the "make" post has come through before we do any processing.
//if(isset($_POST['type']))
//{
	// In my example I assign the posted make to a variable and use strtolower() to put all the text in lowercase so it will match an array above.
	//$item = ($_POST['type']);
	
	//$result = $conn->query("SELECT Tester_ID FROM Testers WHERE Handler_ID LIKE '%".$item."%' ORDER by Handler_ID ASC");
	//while ($row = $result->fetch_assoc()) {
	//	$Tester_ID=$row['Tester_ID'];
		
	//}
	//echo '<input type="text" name="testerno" value="'.$Tester_ID.'" style="width: 134px; margin:0px 50px 0px 20px; background-color: #e1e1e1;" readonly>';
	
//}else

?>