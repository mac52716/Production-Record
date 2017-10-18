<!DOCTYPE html>
<html>
    <head>
        
		<meta http-equiv="X-UA-Compatible" content="IE=Edge;IE=9;IE=8;IE=7">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
        <title>TESTING PRODUCTION RECORD</title>
    </head>
    
	<div style="width: 1040px;" class="navigationbar">
	<div class="navibutton">
	<button class="mybutton" onclick="location.href='http://10.153.214.200:81/Default.aspx'">PROMIS</button>
	<button class="mybutton" onclick="location.href='home.php'">TPR</button>
	</div>
	</div>

	<body>
	<div  style="width: 1020px;" class="maincontent">

				<div class="formcontainer">

				<input class="mybutton" type="button" name="back" value="BACK" onclick="location.href='search.php'" />
				
<br>
				
<table id="tableId" style="margin: auto; border-collapse: collapse;  width: 800px;">
<tr>
<th colspan="10" style="border: solid 2px black; background-color: #0000fe; color: #ffffff;"><span id="tblhead">INITIAL TEST</span></th>
</tr>
<?php
include('dbcon.php');
$lotSummID = $_POST['lotSummID'];
$result = $conn->query("SELECT * FROM init_test WHERE lot_no = '$lotSummID' ORDER BY ID DESC");
			
		while ($row = $result->fetch_assoc()){
			$lot_no = $row['lot_no'];
			$mlot = $row['mother_lot'];
			$prog_name = $row['prog_name'];
			$process_name = $row['process_name'];
			$handler_no = $row['handler_no']; 
			$tester_no = $row['tester_no']; 
			$dates = $row['dates'];
			$family_name = $row['family_name'];
			$plate_no = $row['plate_no'];
			$int_yield = $row['int_yield'];
			$total_qty = $row['total_qty'];
			$time_start = $row['time_start'];
			$time_finish = $row['time_finish'];
			$act_n_rank2b = $row['act_n_rank2b'];
			$act_s_rank1a = $row['act_s_rank1a'];
			$act_cc_c1c9mos = $row['act_cc_c1c9mos'];
			$act_os_c10mos = $row['act_os_c10mos'];
			$hd_n_rank2b = $row['hd_n_rank2b'];
			$hd_s_rank1a = $row['hd_s_rank1a'];
			$hd_cc_c1c9mos = $row['hd_cc_c1c9mos'];
			$hd_os_c10mos = $row['hd_os_c10mos'];
			$ts_n_rank2b = $row['ts_n_rank2b'];
			$ts_s_rank1a = $row['ts_s_rank1a'];
			$ts_cc_c1c9mos = $row['ts_cc_c1c9mos'];
			$ts_os_c10mos = $row['ts_os_c10mos'];
			
			$retest_lanebox = $row['retest_lanebox'];
			$missing = $row['missing'];
			$dropped = $row['dropped'];
			$excess = $row['excess'];
			$lead = $row['lead'];
			$markdefect = $row['markdefect'];
			$ts2dropped = $row['ts2dropped'];
			$purgeBin = $row['purgeBin'];
			$preform = $row['preform'];
			$rprSam = $row['rprSam'];
			
			$psi_defect = $row['psi_defect'];
			$normal_lot = $row['normal_lot'];
			$missing_dev = $row['missing_dev'];
			$excess_dev = $row['excess_dev'];
			$psi_dis = $row['psi_dis'];
			
			$cntr_dis = $row['cntr_dis'];
			$low_yield = $row['low_yield'];
			$hundyield = $row['100_yield'];
			$others = $row['others'];
			$remarks = $row['remarks'];
			
			if (empty($mlot)){
				$mlot = 'NO MOTHER LOT';
			}
			
			$result2 = $conn->query("SELECT * FROM fractions WHERE lot_no = '$lotSummID' AND testtype = 'INITIAL' ORDER BY ID DESC");
			
		while ($row = $result2->fetch_assoc()){
			$stdQty = $row['stdQty'];
			$noTubes = $row['noTubes'];
			$devQty = $row['devQty'];
			$testtype = $row['testtype'];
			$fraction1 = $row['fraction1'];
			$fraction2 = $row['fraction2'];
			$fraction3 = $row['fraction3'];
			$fraction4 = $row['fraction4'];
			$fraction5 = $row['fraction5'];
			$fraction6 = $row['fraction6'];
			$fraction7 = $row['fraction7'];
			$fraction8 = $row['fraction8'];
			$fraction9 = $row['fraction9'];
			$fraction10 = $row['fraction10'];
			  
			echo "<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>LOT NO</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$lot_no</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>MOTHER LOT</td>",
			"<td colspan='5' class='td'>$mlot</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>PROGRAM NAME</td>",
			"<td colspan='5' class='td'>$prog_name</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>PROCESS</td>",
			"<td colspan='5' class='td'>$process_name</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>HANDLER ID</td>",
			"<td colspan='5' class='td'>$handler_no</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>TESTER ID</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$tester_no</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>DATE / TIME</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$dates</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>FAMILY NAME</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$family_name</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>PLATE NO.</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$plate_no</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>TIME START</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$time_start</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>TIME FINISH</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$time_finish</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>TOTAL QUANTITY</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$total_qty</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>YIELD</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$int_yield</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'>ACTUAL</td>", //<===== ACTUAL
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>NORMAL RANK 2/B</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$act_n_rank2b</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>SPECIAL RANK 1/A</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$act_s_rank1a</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>CHARAC / COMBINE C1-C9 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$act_cc_c1c9mos</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>OPEN / SHORT C10 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$act_os_c10mos</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'>HANDLER</td>", //<===== HD
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>NORMAL RANK 2/B</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$hd_n_rank2b</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>SPECIAL RANK 1/A</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$hd_s_rank1a</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>CHARAC / COMBINE C1-C9 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$hd_cc_c1c9mos</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>OPEN / SHORT C10 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$hd_os_c10mos</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'>TESTER</td>", //<===== TS
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>NORMAL RANK 2/B</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$ts_n_rank2b</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>SPECIAL RANK 1/A</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$ts_s_rank1a</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>CHARAC / COMBINE C1-C9 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$ts_cc_c1c9mos</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>OPEN / SHORT C10 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$ts_os_c10mos</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'></td>", //<===== TS
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'></td>", //<===== TS
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>RETEST LANE/BOX</td>",
			"<td class='td' style='text-align: center;'>$retest_lanebox</td>",
			"<td style='text-align: center;'>MISSING</td>",
			"<td class='td' style='text-align: center;'>$missing</td>",
			"<td style='text-align: center;'>DROPPED</td>",
			"<td class='td' style='text-align: center;'>$dropped</td>",
			"<td style='text-align: center;'>EXCESS</td>",
			"<td class='td' style='text-align: center;'>$excess</td>",
			"<td style='text-align: center;'>PSI DEFECT</td>",
			"<td class='td' style='text-align: center;'>$psi_defect</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'>FINAL JUDGEMENT</td>", //<===== FINAL JUDGEMENT
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>LEAD</td>",
			"<td class='td' style='text-align: center;'>$lead</td>",
			"<td style='text-align: center;'>MARK DEFECT</td>",
			"<td class='td' style='text-align: center;'>$markdefect</td>",
			"<td style='text-align: center;'>DROPPED</td>",
			"<td class='td' style='text-align: center;'>$ts2dropped</td>",
			"<td style='text-align: center;'>PURGE BIN</td>",
			"<td class='td' style='text-align: center;'>$purgeBin</td>",
			"<td style='text-align: center;'>PREFORM DEFECT</td>",
			"<td class='td' style='text-align: center;'>$preform</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>REPAIR SAMPLE</td>",
			"<td class='td' style='text-align: center;'>$rprSam</td>",
			"<td style='text-align: center;'>NORMAL LOT</td>",
			"<td class='td' style='text-align: center;'>$normal_lot</td>",
			"<td style='text-align: center;'>MISSING DEVICES</td>",
			"<td class='td' style='text-align: center;'>$missing_dev</td>",
			"<td style='text-align: center;'>EXCESS DEVICES</td>",
			"<td class='td' style='text-align: center;'>$excess_dev</td>",
			"<td style='text-align: center;'>PSI DISCREPANCY</td>",
			"<td class='td' style='text-align: center;'>$psi_dis</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>COUNTER DISCREPANCY</td>",
			"<td class='td' style='text-align: center;'>$cntr_dis</td>",
			"<td style='text-align: center;'>LOW YIELD</td>",
			"<td class='td' style='text-align: center;'>$low_yield</td>",
			"<td style='text-align: center;'>100% YIELD</td>",
			"<td class='td' style='text-align: center;'>$hundyield</td>",
			"<td style='text-align: center;'>OTHERS</td>",
			"<td class='td' style='text-align: center;'>$others</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>REMARKS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$remarks</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'>FRACTIONS</td>", //<===== FRACTIONS
			"</tr>",
			"<tr  class='tr'>",
			"<td style='text-align: center;'>STANDARD QUANTITY</td>",
			"<td class='td' style='text-align: center;'>$stdQty</td>",
			"<td style='text-align: center;'>NO. TUBES</td>",
			"<td class='td' style='text-align: center;'>$noTubes</td>",
			"<td style='text-align: center;'>DEVICE QTY.</td>",
			"<td class='td' style='text-align: center;'>$devQty</td>",
			"<td style='text-align: center;'>TEST TYPE</td>",
			"<td class='td' style='text-align: center;'>$testtype</td>",
			"<td style='text-align: center;'>FRACTION 1</td>",
			"<td class='td' style='text-align: center;'>$fraction1</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>FRACTION 2 </td>",
			"<td class='td' style='text-align: center;'>$fraction2</td>",
			"<td style='text-align: center;'>FRACTION 3</td>",
			"<td class='td' style='text-align: center;'>$fraction3</td>",
			"<td style='text-align: center;'>FRACTION 4</td>",
			"<td class='td' style='text-align: center;'>$fraction4</td>",
			"<td style='text-align: center;'>FRACTION 5</td>",
			"<td class='td' style='text-align: center;'>$fraction5</td>",
			"<td style='text-align: center;'>FRACTION 6</td>",
			"<td class='td' style='text-align: center;'>$fraction6</td>",
			"</tr>",
			"<tr  class='tr'>",
			"<td style='text-align: center;'>FRACTION 7 </td>",
			"<td class='td' style='text-align: center;'>$fraction7</td>",
			"<td style='text-align: center;'>FRACTION 8</td>",
			"<td class='td' style='text-align: center;'>$fraction8</td>",
			"<td style='text-align: center;'>FRACTION 9</td>",
			"<td class='td' style='text-align: center;'>$fraction9</td>",
			"<td style='text-align: center;'>FRACTION 10</td>",
			"<td class='td' style='text-align: center;'>$fraction10</td>",
			"<tr class='tr'>",
			"<td colspan='10' style='text-align: center; background-color: #0000ff; color: #ffffff;'>PREVIOUS ENTRY</td>",
			"</tr>";
		}


			  
			
		}
?>
</table>

<br>

<table id="tableId" style="margin: auto; border-collapse: collapse;  width: 800px;">
<tr>
<th colspan="10" style="border: solid 2px black; background-color: #0000fe; color: #ffffff;"><span id="tblhead">RETEST</span></th>
</tr>
<?php
include('dbcon.php');
$lotSummID = $_POST['lotSummID'];
$result = $conn->query("SELECT * FROM ng_retest WHERE lot_no = '$lotSummID' ORDER BY ID DESC");
			
		while ($row = $result->fetch_assoc()){
			$lot_no = $row['lot_no'];
			$mlot = $row['mother_lot'];
			$mlot = $row['mother_lot'];
			$prog_name = $row['prog_name'];
			$process_name = $row['process_name'];
			$handler_no = $row['handler_no']; 
			$tester_no = $row['tester_no']; 
			$dates = $row['dates'];
			$family_name = $row['family_name'];
			$plate_no = $row['plate_no'];
			$final_yld = $row['final_yld'];
			$total_qty = $row['total_qty'];
			$time_start = $row['time_start'];
			$time_finish = $row['time_finish'];
			$act_n_rank2b = $row['act_n_rank2b'];
			$act_s_rank1a = $row['act_s_rank1a'];
			$act_cc_c1c9mos = $row['act_cc_c1c9mos'];
			$act_os_c10mos = $row['act_os_c10mos'];
			$hd_n_rank2b = $row['hd_n_rank2b'];
			$hd_s_rank1a = $row['hd_s_rank1a'];
			$hd_cc_c1c9mos = $row['hd_cc_c1c9mos'];
			$hd_os_c10mos = $row['hd_os_c10mos'];
			$ts_n_rank2b = $row['ts_n_rank2b'];
			$ts_s_rank1a = $row['ts_s_rank1a'];
			$ts_cc_c1c9mos = $row['ts_cc_c1c9mos'];
			$ts_os_c10mos = $row['ts_os_c10mos'];
			
			$retest_lanebox = $row['retest_lanebox'];
			$missing = $row['missing'];
			$dropped = $row['dropped'];
			$excess = $row['excess'];
			$lead = $row['lead'];
			$markdefect = $row['markdefect'];
			$ts2dropped = $row['ts2dropped'];
			$purgeBin = $row['purgeBin'];
			$preform = $row['preform'];
			$rprSam = $row['rprSam'];
			
			$normal_lot = $row['normal_lot'];
			$missing_dev = $row['missing_dev'];
			$excess_dev = $row['excess_dev'];
			$psi_dis = $row['psi_dis'];
			
			$cntr_dis = $row['cntr_dis'];
			$low_yield = $row['low_yield'];
			$hundyield = $row['100_yield'];
			$others = $row['others'];
			$remarks = $row['remarks'];
			 
			if (empty($mlot)){
				$mlot = 'NO MOTHER LOT';
			}
			
			echo "<tr  class='tr'>",
			"<td colspan='5' style='text-align: center;'>LOT NO</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$lot_no</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>MOTHER LOT</td>",
			"<td colspan='5' class='td'>$mlot</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>PROGRAM NAME</td>",
			"<td colspan='5' class='td'>$prog_name</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>PROCESS</td>",
			"<td colspan='5' class='td'>$process_name</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>HANDLER ID</td>",
			"<td colspan='5' class='td'>$handler_no</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>TESTER ID</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$tester_no</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>DATE / TIME</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$dates</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>FAMILY NAME</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$family_name</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>PLATE NO.</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$plate_no</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>TIME START</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$time_start</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>TIME FINISH</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$time_finish</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>TOTAL QUANTITY</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$total_qty</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>FINAL YIELD</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$final_yld</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'>ACTUAL</td>", //<===== ACTUAL
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>NORMAL RANK 2/B</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$act_n_rank2b</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>SPECIAL RANK 1/A</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$act_s_rank1a</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>CHARAC / COMBINE C1-C9 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$act_cc_c1c9mos</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>OPEN / SHORT C10 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$act_os_c10mos</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'>HANDLER</td>", //<===== HD
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>NORMAL RANK 2/B</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$hd_n_rank2b</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>SPECIAL RANK 1/A</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$hd_s_rank1a</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>CHARAC / COMBINE C1-C9 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$hd_cc_c1c9mos</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>OPEN / SHORT C10 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$hd_os_c10mos</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'>TESTER</td>", //<===== TS
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>NORMAL RANK 2/B</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$ts_n_rank2b</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>SPECIAL RANK 1/A</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$ts_s_rank1a</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>CHARAC / COMBINE C1-C9 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$ts_cc_c1c9mos</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>OPEN / SHORT C10 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$ts_os_c10mos</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'></td>", //<===== TS
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'></td>", //<===== TS
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>RETEST LANE/BOX</td>",
			"<td class='td' style='text-align: center;'>$retest_lanebox</td>",
			"<td style='text-align: center;'>MISSING</td>",
			"<td class='td' style='text-align: center;'>$missing</td>",
			"<td style='text-align: center;'>DROPPED</td>",
			"<td class='td' style='text-align: center;'>$dropped</td>",
			"<td style='text-align: center;'>EXCESS</td>",
			"<td class='td' style='text-align: center;'>$excess</td>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'>FINAL JUDGEMENT</td>", //<===== FINAL JUDGEMENT
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>LEAD</td>",
			"<td class='td' style='text-align: center;'>$lead</td>",
			"<td style='text-align: center;'>MARK DEFECT</td>",
			"<td class='td' style='text-align: center;'>$markdefect</td>",
			"<td style='text-align: center;'>DROPPED</td>",
			"<td class='td' style='text-align: center;'>$ts2dropped</td>",
			"<td style='text-align: center;'>PURGE BIN</td>",
			"<td class='td' style='text-align: center;'>$purgeBin</td>",
			"<td style='text-align: center;'>PREFORM DEFECT</td>",
			"<td class='td' style='text-align: center;'>$preform</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>REPAIR SAMPLE</td>",
			"<td class='td' style='text-align: center;'>$rprSam</td>",
			"<td style='text-align: center;'>NORMAL LOT</td>",
			"<td class='td' style='text-align: center;'>$normal_lot</td>",
			"<td style='text-align: center;'>MISSING DEVICES</td>",
			"<td class='td' style='text-align: center;'>$missing_dev</td>",
			"<td style='text-align: center;'>EXCESS DEVICES</td>",
			"<td class='td' style='text-align: center;'>$excess_dev</td>",
			"<td style='text-align: center;'>PSI DISCREPANCY</td>",
			"<td class='td' style='text-align: center;'>$psi_dis</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>COUNTER DISCREPANCY</td>",
			"<td class='td' style='text-align: center;'>$cntr_dis</td>",
			"<td style='text-align: center;'>LOW YIELD</td>",
			"<td class='td' style='text-align: center;'>$low_yield</td>",
			"<td style='text-align: center;'>100% YIELD</td>",
			"<td class='td' style='text-align: center;'>$hundyield</td>",
			"<td style='text-align: center;'>OTHERS</td>",
			"<td class='td' style='text-align: center;'>$others</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>REMARKS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$remarks</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='10' style='text-align: center; background-color: #0000ff; color: #ffffff;'>PREVIOUS ENTRY</td>",
			"</tr>";
		}

$result2 = $conn->query("SELECT * FROM fractions WHERE lot_no = '$lotSummID' AND testtype = 'RETEST' ORDER BY ID DESC");
			
		while ($row = $result2->fetch_assoc()){
			$stdQty = $row['stdQty'];
			$noTubes = $row['noTubes'];
			$devQty = $row['devQty'];
			$testtype = $row['testtype'];
			$fraction1 = $row['fraction1'];
			$fraction2 = $row['fraction2'];
			$fraction3 = $row['fraction3'];
			$fraction4 = $row['fraction4'];
			$fraction5 = $row['fraction5'];
			$fraction6 = $row['fraction6'];
			$fraction7 = $row['fraction7'];
			$fraction8 = $row['fraction8'];
			$fraction9 = $row['fraction9'];
			$fraction10 = $row['fraction10'];
			  
			echo "<tr>",
			"<td colspan='10' style='text-align: center;'>FRACTIONS</td>", //<===== FRACTIONS
			"</tr>",
			"<tr  class='tr'>",
			"<td style='text-align: center;'>STANDARD QUANTITY</td>",
			"<td class='td' style='text-align: center;'>$stdQty</td>",
			"<td style='text-align: center;'>NO. TUBES</td>",
			"<td class='td' style='text-align: center;'>$noTubes</td>",
			"<td style='text-align: center;'>DEVICE QTY.</td>",
			"<td class='td' style='text-align: center;'>$devQty</td>",
			"<td style='text-align: center;'>TEST TYPE</td>",
			"<td class='td' style='text-align: center;'>$testtype</td>",
			"<td style='text-align: center;'>FRACTION 1</td>",
			"<td class='td' style='text-align: center;'>$fraction1</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>FRACTION 2 </td>",
			"<td class='td' style='text-align: center;'>$fraction2</td>",
			"<td style='text-align: center;'>FRACTION 3</td>",
			"<td class='td' style='text-align: center;'>$fraction3</td>",
			"<td style='text-align: center;'>FRACTION 4</td>",
			"<td class='td' style='text-align: center;'>$fraction4</td>",
			"<td style='text-align: center;'>FRACTION 5</td>",
			"<td class='td' style='text-align: center;'>$fraction5</td>",
			"<td style='text-align: center;'>FRACTION 6</td>",
			"<td class='td' style='text-align: center;'>$fraction6</td>",
			"</tr>",
			"<tr  class='tr'>",
			"<td style='text-align: center;'>FRACTION 7 </td>",
			"<td class='td' style='text-align: center;'>$fraction7</td>",
			"<td style='text-align: center;'>FRACTION 8</td>",
			"<td class='td' style='text-align: center;'>$fraction8</td>",
			"<td style='text-align: center;'>FRACTION 9</td>",
			"<td class='td' style='text-align: center;'>$fraction9</td>",
			"<td style='text-align: center;'>FRACTION 10</td>",
			"<td class='td' style='text-align: center;'>$fraction10</td>",
			"</tr>";
		}
?>
</table>

<br>

<table id="tableId" style="margin: auto; border-collapse: collapse;  width: 800px;">
<tr>
<th colspan="10" style="border: solid 2px black; background-color: #0000fe; color: #ffffff;"><span id="tblhead">RETEST 2</span></th>
</tr>
<?php
include('dbcon.php');
$lotSummID = $_POST['lotSummID'];
$result = $conn->query("SELECT * FROM ng2_retest WHERE lot_no = '$lotSummID' ORDER BY ID DESC");
			
		while ($row = $result->fetch_assoc()){
			$lot_no = $row['lot_no'];
			$mlot = $row['mother_lot'];
			$prog_name = $row['prog_name'];
			$process_name = $row['process_name'];
			$handler_no = $row['handler_no']; 
			$tester_no = $row['tester_no']; 
			$dates = $row['dates'];
			$family_name = $row['family_name'];
			$plate_no = $row['plate_no'];
			$final_yld = $row['final_yld'];
			$total_qty = $row['total_qty'];
			$time_start = $row['time_start'];
			$time_finish = $row['time_finish'];
			$act_n_rank2b = $row['act_n_rank2b'];
			$act_s_rank1a = $row['act_s_rank1a'];
			$act_cc_c1c9mos = $row['act_cc_c1c9mos'];
			$act_os_c10mos = $row['act_os_c10mos'];
			$hd_n_rank2b = $row['hd_n_rank2b'];
			$hd_s_rank1a = $row['hd_s_rank1a'];
			$hd_cc_c1c9mos = $row['hd_cc_c1c9mos'];
			$hd_os_c10mos = $row['hd_os_c10mos'];
			$ts_n_rank2b = $row['ts_n_rank2b'];
			$ts_s_rank1a = $row['ts_s_rank1a'];
			$ts_cc_c1c9mos = $row['ts_cc_c1c9mos'];
			$ts_os_c10mos = $row['ts_os_c10mos'];
			
			$retest_lanebox = $row['retest_lanebox'];
			$missing = $row['missing'];
			$dropped = $row['dropped'];
			$excess = $row['excess'];
			$lead = $row['lead'];
			$markdefect = $row['markdefect'];
			$ts2dropped = $row['ts2dropped'];
			$purgeBin = $row['purgeBin'];
			$preform = $row['preform'];
			$rprSam = $row['rprSam'];
			
			$normal_lot = $row['normal_lot'];
			$missing_dev = $row['missing_dev'];
			$excess_dev = $row['excess_dev'];
			$psi_dis = $row['psi_dis'];
			
			$cntr_dis = $row['cntr_dis'];
			$low_yield = $row['low_yield'];
			$hundyield = $row['100_yield'];
			$others = $row['others'];
			$remarks = $row['remarks'];
			
			if (empty($mlot)){
				$mlot = 'NO MOTHER LOT';
			}
			
			echo "<tr  class='tr'>",
			"<td colspan='5' style='text-align: center;'>LOT NO</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$lot_no</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>MOTHER LOT</td>",
			"<td colspan='5' class='td'>$mlot</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>PROGRAM NAME</td>",
			"<td colspan='5' class='td'>$prog_name</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>PROCESS</td>",
			"<td colspan='5' class='td'>$process_name</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>HANDLER ID</td>",
			"<td colspan='5' class='td'>$handler_no</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>TESTER ID</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$tester_no</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>DATE / TIME</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$dates</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>FAMILY NAME</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$family_name</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>PLATE NO.</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$plate_no</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>TIME START</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$time_start</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>TIME FINISH</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$time_finish</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>TOTAL QUANTITY</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$total_qty</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>FINAL YIELD</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$final_yld</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'>ACTUAL</td>", //<===== ACTUAL
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>NORMAL RANK 2/B</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$act_n_rank2b</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>SPECIAL RANK 1/A</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$act_s_rank1a</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>CHARAC / COMBINE C1-C9 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$act_cc_c1c9mos</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>OPEN / SHORT C10 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$act_os_c10mos</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'>HANDLER</td>", //<===== HD
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>NORMAL RANK 2/B</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$hd_n_rank2b</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>SPECIAL RANK 1/A</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$hd_s_rank1a</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>CHARAC / COMBINE C1-C9 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$hd_cc_c1c9mos</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>OPEN / SHORT C10 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$hd_os_c10mos</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'>TESTER</td>", //<===== TS
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>NORMAL RANK 2/B</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$ts_n_rank2b</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>SPECIAL RANK 1/A</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$ts_s_rank1a</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>CHARAC / COMBINE C1-C9 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$ts_cc_c1c9mos</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>OPEN / SHORT C10 MOS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$ts_os_c10mos</td>",
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'></td>", //<===== TS
			"</tr>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'></td>", //<===== TS
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>RETEST LANE/BOX</td>",
			"<td class='td' style='text-align: center;'>$retest_lanebox</td>",
			"<td style='text-align: center;'>MISSING</td>",
			"<td class='td' style='text-align: center;'>$missing</td>",
			"<td style='text-align: center;'>DROPPED</td>",
			"<td class='td' style='text-align: center;'>$dropped</td>",
			"<td style='text-align: center;'>EXCESS</td>",
			"<td class='td' style='text-align: center;'>$excess</td>",
			"<tr>",
			"<td colspan='10' style='text-align: center;'>FINAL JUDGEMENT</td>", //<===== FINAL JUDGEMENT
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>LEAD</td>",
			"<td class='td' style='text-align: center;'>$lead</td>",
			"<td style='text-align: center;'>MARK DEFECT</td>",
			"<td class='td' style='text-align: center;'>$markdefect</td>",
			"<td style='text-align: center;'>DROPPED</td>",
			"<td class='td' style='text-align: center;'>$ts2dropped</td>",
			"<td style='text-align: center;'>PURGE BIN</td>",
			"<td class='td' style='text-align: center;'>$purgeBin</td>",
			"<td style='text-align: center;'>PREFORM DEFECT</td>",
			"<td class='td' style='text-align: center;'>$preform</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>REPAIR SAMPLE</td>",
			"<td class='td' style='text-align: center;'>$rprSam</td>",
			"<td style='text-align: center;'>NORMAL LOT</td>",
			"<td class='td' style='text-align: center;'>$normal_lot</td>",
			"<td style='text-align: center;'>MISSING DEVICES</td>",
			"<td class='td' style='text-align: center;'>$missing_dev</td>",
			"<td style='text-align: center;'>EXCESS DEVICES</td>",
			"<td class='td' style='text-align: center;'>$excess_dev</td>",
			"<td style='text-align: center;'>PSI DISCREPANCY</td>",
			"<td class='td' style='text-align: center;'>$psi_dis</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>COUNTER DISCREPANCY</td>",
			"<td class='td' style='text-align: center;'>$cntr_dis</td>",
			"<td style='text-align: center;'>LOW YIELD</td>",
			"<td class='td' style='text-align: center;'>$low_yield</td>",
			"<td style='text-align: center;'>100% YIELD</td>",
			"<td class='td' style='text-align: center;'>$hundyield</td>",
			"<td style='text-align: center;'>OTHERS</td>",
			"<td class='td' style='text-align: center;'>$others</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='5' style='text-align: center;'>REMARKS</td>",
			"<td colspan='5' class='td' style='text-align: center;'>$remarks</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td colspan='10' style='text-align: center; background-color: #0000ff; color: #ffffff;'>PREVIOUS ENTRY</td>",
			"</tr>";
		}

$result2 = $conn->query("SELECT * FROM fractions WHERE lot_no = '$lotSummID' AND testtype = 'RETEST2' ORDER BY ID DESC");
			
		while ($row = $result2->fetch_assoc()){
			$stdQty = $row['stdQty'];
			$noTubes = $row['noTubes'];
			$devQty = $row['devQty'];
			$testtype = $row['testtype'];
			$fraction1 = $row['fraction1'];
			$fraction2 = $row['fraction2'];
			$fraction3 = $row['fraction3'];
			$fraction4 = $row['fraction4'];
			$fraction5 = $row['fraction5'];
			$fraction6 = $row['fraction6'];
			$fraction7 = $row['fraction7'];
			$fraction8 = $row['fraction8'];
			$fraction9 = $row['fraction9'];
			$fraction10 = $row['fraction10'];
			  
			echo "<tr>",
			"<td colspan='10' style='text-align: center;'>FRACTIONS</td>", //<===== FRACTIONS
			"</tr>",
			"<tr  class='tr'>",
			"<td style='text-align: center;'>STANDARD QUANTITY</td>",
			"<td class='td' style='text-align: center;'>$stdQty</td>",
			"<td style='text-align: center;'>NO. TUBES</td>",
			"<td class='td' style='text-align: center;'>$noTubes</td>",
			"<td style='text-align: center;'>DEVICE QTY.</td>",
			"<td class='td' style='text-align: center;'>$devQty</td>",
			"<td style='text-align: center;'>TEST TYPE</td>",
			"<td class='td' style='text-align: center;'>$testtype</td>",
			"<td style='text-align: center;'>FRACTION 1</td>",
			"<td class='td' style='text-align: center;'>$fraction1</td>",
			"</tr>",
			"<tr class='tr'>",
			"<td style='text-align: center;'>FRACTION 2 </td>",
			"<td class='td' style='text-align: center;'>$fraction2</td>",
			"<td style='text-align: center;'>FRACTION 3</td>",
			"<td class='td' style='text-align: center;'>$fraction3</td>",
			"<td style='text-align: center;'>FRACTION 4</td>",
			"<td class='td' style='text-align: center;'>$fraction4</td>",
			"<td style='text-align: center;'>FRACTION 5</td>",
			"<td class='td' style='text-align: center;'>$fraction5</td>",
			"<td style='text-align: center;'>FRACTION 6</td>",
			"<td class='td' style='text-align: center;'>$fraction6</td>",
			"</tr>",
			"<tr  class='tr'>",
			"<td style='text-align: center;'>FRACTION 7 </td>",
			"<td class='td' style='text-align: center;'>$fraction7</td>",
			"<td style='text-align: center;'>FRACTION 8</td>",
			"<td class='td' style='text-align: center;'>$fraction8</td>",
			"<td style='text-align: center;'>FRACTION 9</td>",
			"<td class='td' style='text-align: center;'>$fraction9</td>",
			"<td style='text-align: center;'>FRACTION 10</td>",
			"<td class='td' style='text-align: center;'>$fraction10</td>",
			"</tr>";
		}
?>
</table>

<br>
</div>

<div style="width: 1040px;" id="footer"><p style="text-align: center; color: white; padding: 15px;">&#9400; TEST APPLICATIONS ENGG.</p></div>
</div>



<script>
function getcookie(){
	//function getCookie(cname) {
    //var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
} 
	//document.getElementById("tblhead").innerHTML = "INITIAL TEST"//  + getcookie();
//}
window.onload = getcookie();
</script>
</body>
</html>