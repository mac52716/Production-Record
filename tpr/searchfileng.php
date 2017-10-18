<?php
include('dbcon.php');

if (!empty($_REQUEST['lotnumber'])) {
	$lotnumber = mysqli_real_escape_string($conn,$_REQUEST['lotnumber']);    
	$sql = "SELECT * FROM ng_retest WHERE lot_no LIKE '%".$lotnumber."%' ORDER BY id desc";
	$r_query = mysqli_query($conn,$sql);

	$count=mysqli_num_rows($r_query);

	if($count>0){
		
		while ($row = mysqli_fetch_array($r_query)){
		 
		echo "<tr class='tr'><td>".$row["lot_no"]."</td>",
			"<td>".$row["final_yld"]."</td>",
			"<td>".$row["process_name"]."</td>",
			"<td>".$row["handler_no"]."</td>",
			"<td>".$row["tester_no"]."</td>",
			"<td>".$row["dates"]."</td>",
			"<td>".$row["shifts"]."</td>",
			"<td>".$row["operators"]."</td>",
			"<td>".$row["family_name"]."</td>",
			"<td>".$row["total_qty"]."</td>",
			"<td>".$row["plate_no"]."</td>",
			"<td>".$row["time_start"]."</td>",
			"<td>".$row["act_n_rank2b"]."</td>",
			"<td>".$row["hd_n_rank2b"]."</td>",
			"<td>".$row["ts_n_rank2b"]."</td>",
			"<td>".$row["act_s_rank1a"]."</td>",
			"<td>".$row["hd_s_rank1a"]."</td>",
			"<td>".$row["ts_s_rank1a"]."</td>",
			"<td>".$row["act_cc_c1c9mos"]."</td>",
			"<td>".$row["hd_cc_c1c9mos"]."</td>",
			"<td>".$row["ts_cc_c1c9mos"]."</td>",
			"<td>".$row["act_os_c10mos"]."</td>",
			"<td>".$row["hd_os_c10mos"]."</td>",
			"<td>".$row["ts_os_c10mos"]."</td>",
			"<td>".$row["retest_lanebox"]."</td>",
			"<td>".$row["missing"]."</td>",
			"<td>".$row["dropped"]."</td>",
			"<td>".$row["excess"]."</td>",
			"<td>".$row["ng_yld"]."</td>",
			"<td>".$row["time_finish"]."</td>",
			"<td>".$row["lead"]."</td>",
			"<td>".$row["markdefect"]."</td>",
			"<td>".$row["ts2dropped"]."</td>",
			"<td>".$row["purgeBin"]."</td>",
			"<td>".$row["preform"]."</td>",
			"<td>".$row["rprSam"]."</td>",
			
			"<td>".$row["normal_lot"]."</td>",
			"<td>".$row["missing_dev"]."</td>",
			"<td>".$row["excess_dev"]."</td>",
			"<td>".$row["psi_dis"]."</td>",
			"<td>".$row["cntr_dis"]."</td>",
			"<td>".$row["low_yield"]."</td>",
			"<td>".$row["100_yield"]."</td>",
			"<td>".$row["others"]."</td>",
			"<td>".$row["prog_name"]."</td>",
			"<td>".$row["remarks"]."</td>".
		"</tr>";

		}
	}else{
		echo '<script type="text/javascript">function hidden(){document.getElementById("ngretest").style.display = "none";}</script>';
		echo '<script type="text/javascript">hidden()</script>';
	}
}else{
	$sql = "SELECT * FROM ng_retest ORDER BY id desc";
	$r_query = mysqli_query($conn,$sql);

	$count=mysqli_num_rows($r_query);

	if($count>0){
		
		while ($row = mysqli_fetch_array($r_query)){
		 
		echo "<tr class='tr'><td>".$row["lot_no"]."</td>",
			"<td>".$row["final_yld"]."</td>",
			"<td>".$row["process_name"]."</td>",
			"<td>".$row["handler_no"]."</td>",
			"<td>".$row["tester_no"]."</td>",
			"<td>".$row["dates"]."</td>",
			"<td>".$row["shifts"]."</td>",
			"<td>".$row["operators"]."</td>",
			"<td>".$row["family_name"]."</td>",
			"<td>".$row["total_qty"]."</td>",
			"<td>".$row["plate_no"]."</td>",
			"<td>".$row["time_start"]."</td>",
			"<td>".$row["act_n_rank2b"]."</td>",
			"<td>".$row["hd_n_rank2b"]."</td>",
			"<td>".$row["ts_n_rank2b"]."</td>",
			"<td>".$row["act_s_rank1a"]."</td>",
			"<td>".$row["hd_s_rank1a"]."</td>",
			"<td>".$row["ts_s_rank1a"]."</td>",
			"<td>".$row["act_cc_c1c9mos"]."</td>",
			"<td>".$row["hd_cc_c1c9mos"]."</td>",
			"<td>".$row["ts_cc_c1c9mos"]."</td>",
			"<td>".$row["act_os_c10mos"]."</td>",
			"<td>".$row["hd_os_c10mos"]."</td>",
			"<td>".$row["ts_os_c10mos"]."</td>",
			"<td>".$row["retest_lanebox"]."</td>",
			"<td>".$row["missing"]."</td>",
			"<td>".$row["dropped"]."</td>",
			"<td>".$row["excess"]."</td>",
			"<td>".$row["ng_yld"]."</td>",
			"<td>".$row["time_finish"]."</td>",
			"<td>".$row["lead"]."</td>",
			"<td>".$row["markdefect"]."</td>",
			"<td>".$row["ts2dropped"]."</td>",
			"<td>".$row["purgeBin"]."</td>",
			"<td>".$row["preform"]."</td>",
			"<td>".$row["rprSam"]."</td>",
			
			"<td>".$row["normal_lot"]."</td>",
			"<td>".$row["missing_dev"]."</td>",
			"<td>".$row["excess_dev"]."</td>",
			"<td>".$row["psi_dis"]."</td>",
			"<td>".$row["cntr_dis"]."</td>",
			"<td>".$row["low_yield"]."</td>",
			"<td>".$row["100_yield"]."</td>",
			"<td>".$row["others"]."</td>",
			"<td>".$row["prog_name"]."</td>",
			"<td>".$row["remarks"]."</td>".
		"</tr>";
		}
	}
}

?>