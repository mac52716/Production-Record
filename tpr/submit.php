<?php 
session_start();
include('dbcon.php');



		 if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			// username and password sent from form
			$username=mysqli_real_escape_string($conn,$_POST['myusername']);
			$password=mysqli_real_escape_string($conn,MD5($_POST['mypassword']));
			$selectsql="SELECT * FROM users WHERE Email_Address='$username' and Password='$password'";

			$result=mysqli_query($conn,$selectsql);

			//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

			//$active=$row['active'];

			$count=mysqli_num_rows($result);

			// If result matched $username and $password, table row must be 1 row

			if($count>0)
			{
			
				$query="SELECT * FROM tprs";
				date_default_timezone_set("Asia/Manila");
				$dates=(date("y.m.d H:i"));
				
				if(isset($_POST['submit'])){
				$processname=$_POST['processname'];
				$handlerno=$_POST['handlerno'];
				$testerno=$_POST['testerno'];
				
				$shift=$_POST['shift'];
				$user=$_POST['myusername'];
				$famname=$_POST['famname'];
				$lotnumber=$_POST['lotnumber'];
				$ttlqty=$_POST['ttlqty'];
				$plteno=$_POST['plteno'];
				
				$tstart=$_POST['tstart'];
				$actnrank2b = isset($_POST['actnrank2b']) ? (int)$_POST['actnrank2b'] : 0;
				$hdnrank2b=isset($_POST['hdnrank2b']) ? (int)$_POST['hdnrank2b'] : 0;
				$tsnrank2b=isset($_POST['tsnrank2b']) ? (int)$_POST['tsnrank2b'] : 0;
				$actsrank1a=isset($_POST['actsrank1a']) ? (int)$_POST['actsrank1a'] : 0;
				$hdsrank1a=isset($_POST['hdsrank1a']) ? (int)$_POST['hdsrank1a'] : 0;
				$tssrank1a=isset($_POST['tssrank1a']) ? (int)$_POST['tssrank1a'] : 0;
				$actccc1c9=isset($_POST['actccc1c9']) ? (int)$_POST['actccc1c9'] : 0;
				$hdccc1c9=isset($_POST['hdccc1c9']) ? (int)$_POST['hdccc1c9'] : 0;
				$tsccc1c9=isset($_POST['tsccc1c9']) ? (int)$_POST['tsccc1c9'] : 0;
				$actosc10=isset($_POST['actosc10']) ? (int)$_POST['actosc10'] : 0;
				$hdosc10=isset($_POST['hdosc10']) ? (int)$_POST['hdosc10'] : 0;
				$tsosc10=isset($_POST['tsosc10']) ? (int)$_POST['tsosc10'] : 0;
				$lanebox=isset($_POST['lanebox']) ? (int)$_POST['lanebox'] : 0;
				$dropped=isset($_POST['dropped']) ? (int)$_POST['dropped'] : 0;
				$imiss=isset($_POST['imiss']) ? (int)$_POST['imiss'] : 0;
				$psidefect=isset($_POST['psidefect']) ? (int)$_POST['psidefect'] : 0;
				$inityield=isset($_POST['inityield']) ? (int)$_POST['inityield'] : 0;
				$tfinish=$_POST['tfinish'];
				
				$rtstart=isset($_POST['rtstart']) ? (int)$_POST['rtstart'] : 0;
				$ractnrank2b=isset($_POST['ractnrank2b']) ? (int)$_POST['ractnrank2b'] : 0;
				$rhdnrank2b=isset($_POST['rhdnrank2b']) ? (int)$_POST['rhdnrank2b'] : 0;
				$rtsnrank2b=isset($_POST['rtsnrank2b']) ? (int)$_POST['rtsnrank2b'] : 0;
				$ractsrank1a=isset($_POST['ractsrank1a']) ? (int)$_POST['ractsrank1a'] : 0;
				$rhdsrank1a=isset($_POST['rhdsrank1a']) ? (int)$_POST['rhdsrank1a'] : 0;
				$rtssrank1a=isset($_POST['rtssrank1a']) ? (int)$_POST['rtssrank1a'] : 0;
				$ractccc1c9=isset($_POST['ractccc1c9']) ? (int)$_POST['ractccc1c9'] : 0;
				$rhdccc1c9=isset($_POST['rhdccc1c9']) ? (int)$_POST['rhdccc1c9'] : 0;
				$rtsccc1c9=isset($_POST['rtsccc1c9']) ? (int)$_POST['rtsccc1c9'] : 0;
				$ractosc10=isset($_POST['ractosc10']) ? (int)$_POST['ractosc10'] : 0;
				$rhdosc10=isset($_POST['rhdosc10']) ? (int)$_POST['rhdosc10'] : 0;
				$rtsosc10=isset($_POST['rtsosc10']) ? (int)$_POST['rtsosc10'] : 0;
				$rlanebox=isset($_POST['rlanebox']) ? (int)$_POST['rlanebox'] : 0;
				$rdropped=isset($_POST['rdropped']) ? (int)$_POST['rdropped'] : 0;
				$rmiss=isset($_POST['rmiss']) ? (int)$_POST['rmiss'] : 0;
				$rtfinish=isset($_POST['rtfinish']) ? (int)$_POST['rtfinish'] : 0;
				
				$normlot=$_POST['normlot'];
				$psidis=$_POST['psidis'];
				$yld=$_POST['1yld'];
				$missdev=$_POST['missdev'];
				$countdis=$_POST['countdis'];
				$exdev=$_POST['exdev'];
				$lyld=$_POST['lyld'];
				$others=$_POST['others'];
				$remarks=$_POST['remarks'];
				
				date_default_timezone_set("Asia/Manila");
				$dates2=(date("y.m.d"));
				
				if ($psidis == 1 || $yld == 1){
					$gonogo = "SELECT * FROM gonogo WHERE dateInput='$dates2' AND family='$famname'";
					
					$res=mysqli_query($conn,$gonogo);
					$cnt=mysqli_num_rows($res);
					
					if ($cnt>0){
						
					}else{
						$_SESSION['Msg'] = "Please Do a GONOGO.";
						header("Location: index.php");
						exit;
					}
				}
				
				$sql = "INSERT INTO tprs (process_name,handler_no,tester_no,dates,shifts,operators,family_name,lot_no,total_qty,
						plate_no,time_start,act_n_rank2b,hd_n_rank2b,ts_n_rank2b,act_s_rank1a,hd_s_rank1a,ts_s_rank1a,act_cc_c1c9mos,
						hd_cc_c1c9mos,ts_cc_c1c9mos,act_os_c10mos,hd_os_c10mos,ts_os_c10mos,retest_lanebox,missing,dropped,psi_defect,
						int_yield,time_finish,r_time_start,r_act_n_rank2b,r_hd_n_rank2b,r_ts_n_rank2b,r_act_s_rank1a,r_hd_s_rank1a,
						r_ts_s_rank1a,r_act_cc_c1c9mos,r_hd_cc_c1c9mos,r_ts_cc_c1c9mos,r_act_os_c10mos,r_hd_os_c10mos,r_ts_os_c10mos,
						r_retest_lanebox,r_missing,r_dropped,r_time_finish,normal_lot,missing_dev,excess_dev,psi_dis,cntr_dis,low_yield,
						100_yield,others,remarks)
						VALUES ('".$processname."','".$handlerno."','".$testerno."','".$dates."','".$shift."','".$user."','".$famname."',
						'".$lotnumber."','".$ttlqty."','".$plteno."','".$tstart."','".$actnrank2b."','".$hdnrank2b."','".$tsnrank2b."',
						'".$actsrank1a."','".$hdsrank1a."','".$tssrank1a."','".$actccc1c9."','".$hdccc1c9."','".$tsccc1c9."','".$actosc10."',
						'".$hdosc10."','".$tsosc10."','".$lanebox."','".$imiss."','".$dropped."','".$psidefect."','".$inityield."','".$tfinish."',
						'".$rtstart."','".$ractnrank2b."','".$rhdnrank2b."','".$rtsnrank2b."','".$ractsrank1a."','".$rhdsrank1a."',
						'".$rtssrank1a."','".$ractccc1c9."','".$rhdccc1c9."','".$ractccc1c9."','".$ractosc10."','".$rhdosc10."',
						'".$rtsosc10."','".$rlanebox."','".$rmiss."','".$rdropped."','".$rtfinish."','".$normlot."','".$missdev."','".$exdev."','".$psidis."','".$countdis."',
						'".$lyld."','".$yld."','".$others."','".$remarks."')";

						if ($conn->query($sql)=== TRUE) {
							$_SESSION['Msg'] = "A new record have been saved.";
							header("location: index.php");
							exit;
						}else{
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}

						$conn->close();
						}

			}else{
							$_SESSION['Msg'] = "*Invalid password! Please try again.*";
					header("Location: index.php"); //Redirect user back to your login form
					exit;
				}
		}

?>