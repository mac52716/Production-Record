<?php
//include ('dbcon.php');

		$sql = "CREATE TABLE tprs (
			id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			process_name varchar(10) NOT NULL,
			handler_no varchar(20) NOT NULL,
			tester_no varchar(20) NOT NULL,
			dates varchar(14) NOT NULL,
			shifts varchar(7) NOT NULL,
			operators varchar(40) NOT NULL,
			family_name varchar(30) NOT NULL,
			lot_no bigint(10) NOT NULL,
			total_qty int(7) NOT NULL,
			plate_no int(7) NOT NULL,
			time_start int(5) NOT NULL,
			act_n_rank2b int(7) NOT NULL DEFAULT '0',
			hd_n_rank2b int(7) NOT NULL DEFAULT '0',
			ts_n_rank2b int(7) NOT NULL DEFAULT '0',
			act_s_rank1a int(7) NOT NULL DEFAULT '0',
			hd_s_rank1a int(7) NOT NULL DEFAULT '0',
			ts_s_rank1a int(7) NOT NULL DEFAULT '0',
			act_cc_c1c9mos int(7) NOT NULL DEFAULT '0',
			hd_cc_c1c9mos int(7) NOT NULL DEFAULT '0',
			ts_cc_c1c9mos int(7) NOT NULL DEFAULT '0',
			act_os_c10mos int(7) NOT NULL DEFAULT '0',
			hd_os_c10mos int(7) NOT NULL DEFAULT '0',
			ts_os_c10mos int(7) NOT NULL DEFAULT '0',
			retest_lanebox int(7) NOT NULL DEFAULT '0',
			drop_missing int(7) NOT NULL DEFAULT '0',
			psi_defect int(7) NOT NULL DEFAULT '0',
			int_yield int(7) NOT NULL DEFAULT '0',
			time_finish int(5) NOT NULL NOT NULL,
			r_time_start int(5) NOT NULL DEFAULT '0',
			r_act_n_rank2b int(7) NOT NULL DEFAULT '0',
			r_hd_n_rank2b int(7) NOT NULL DEFAULT '0',
			r_ts_n_rank2b int(7) NOT NULL DEFAULT '0',
			r_act_s_rank1a int(7) NOT NULL DEFAULT '0',
			r_hd_s_rank1a int(7) NOT NULL DEFAULT '0',
			r_ts_s_rank1a int(7) NOT NULL DEFAULT '0',
			r_act_cc_c1c9mos int(7) NOT NULL DEFAULT '0',
			r_hd_cc_c1c9mos int(7) NOT NULL DEFAULT '0',
			r_ts_cc_c1c9mos int(7) NOT NULL DEFAULT '0',
			r_act_os_c10mos int(7) NOT NULL DEFAULT '0',
			r_hd_os_c10mos int(7) NOT NULL DEFAULT '0',
			r_ts_os_c10mos int(7) NOT NULL DEFAULT '0',
			r_retest_lanebox int(7) NOT NULL DEFAULT '0',
			r_drop_missing int(7) NOT NULL DEFAULT '0',
			r_time_finish int(5) NOT NULL DEFAULT '0',
			normal_lot int(2) NOT NULL DEFAULT '0',
			missing_dev int(2) NOT NULL DEFAULT '0',
			excess_dev int(2) NOT NULL DEFAULT '0',
			psi_dis int(2) NOT NULL DEFAULT '0',
			cntr_dis int(2) NOT NULL DEFAULT '0',
			low_yield int(2) NOT NULL DEFAULT '0',
			100_yield int(2) NOT NULL DEFAULT '0',
			others varchar(20) NOT NULL DEFAULT 'na',
			remarks varchar(100) NOT NULL DEFAULT 'na'
			)";
			
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>