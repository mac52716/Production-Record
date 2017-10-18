<?php
include('dbcon.php');

if (!empty($_REQUEST['lotnumber'])) {
	$lotnumber = mysqli_real_escape_string($conn,$_REQUEST['lotnumber']);    
	$sql = "SELECT * FROM init_test WHERE lot_no LIKE '%".$lotnumber."%' ORDER BY id desc";
	$r_query = mysqli_query($conn,$sql);

	$count=mysqli_num_rows($r_query);

	if($count>0){
		
		while ($row = mysqli_fetch_array($r_query)){
		 
		echo "<tr class='tr' style='cursor: pointer;'><td>".$row["lot_no"]."</td>",
			"<td>".$row["process_name"]."</td>",
			"<td>".$row["handler_no"]."</td>",
			"<td>".$row["tester_no"]."</td>",
			"<td>".$row["dates"]."</td>",
			"<td>".$row["shifts"]."</td>",
			"<td>".$row["operators"]."</td>",
			"<td>".$row["family_name"]."</td>",
			"<td>".$row["total_qty"]."</td>",
			"<td>".$row["plate_no"]."</td>",
			"<td>".$row["int_yield"]."</td>",
			"<td>".$row["prog_name"]."</td>",
			"<td>".$row["remarks"]."</td>".
		"</tr>";

		}
	}else{
		echo '<h4 style="color:#cc1111;">*NO RECORDS FOUND*</h4>';
	}
}else{
	$sql = $conn->query("SELECT * FROM init_test ORDER BY id DESC");
	//$result = mysqli_query($conn,$sql);

	//$count=mysqli_num_rows($r_query);

	//if($count>0){
		
		while ($row = $sql->fetch_assoc()){
			
			echo "<tr class='tr' style='cursor: pointer;'><td>".$row["lot_no"]."</td>",
			"<td>".$row["process_name"]."</td>",
			"<td>".$row["handler_no"]."</td>",
			"<td>".$row["tester_no"]."</td>",
			"<td>".$row["dates"]."</td>",
			"<td>".$row["shifts"]."</td>",
			"<td>".$row["operators"]."</td>",
			"<td>".$row["family_name"]."</td>",
			"<td>".$row["total_qty"]."</td>",
			"<td>".$row["plate_no"]."</td>",
			"<td>".$row["int_yield"]."</td>",
			"<td>".$row["prog_name"]."</td>",
			"<td>".$row["remarks"]."</td>".
		"</tr>";
		}
	//}
}

?>