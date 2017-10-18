<?php 
session_start();
include('dbcon.php');

		 if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			// username and password sent from form
			//$username=mysqli_real_escape_string($conn,$_POST['myusername']);
			//$password=mysqli_real_escape_string($conn,MD5($_POST['mypassword']));
			$flausername=mysqli_real_escape_string($conn,$_POST['flausername']);
			$flapassword=mysqli_real_escape_string($conn,MD5($_POST['flapassword']));
			//$selectsql="SELECT * FROM users WHERE Email_Address='$username' AND Password='$password'";
			$selectsql2="SELECT * FROM users WHERE Email_Address='$flausername' AND Password='$flapassword'";

			//$result=mysqli_query($conn,$selectsql);
			$result2=mysqli_query($conn,$selectsql2);

			//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

			//$active=$row['active'];

			//$count=mysqli_num_rows($result);
			$count2=mysqli_num_rows($result2);

			// If result matched $username and $password, table row must be 1 row

			if($count2>0)
			{
			
				date_default_timezone_set("Asia/Manila");
				$dates=(date("y.m.d H:i"));
				
				if(isset($_POST['submit'])){
				$processname=$_POST['processname'];
				$handlerno=$_POST['handlerno'];
				$handlerno = strtoupper($handlerno);
				$testerno=$_POST['testerno'];
				$testerno = strtoupper($testerno);
				
				$shift=$_POST['shift'];
				$user=$_SESSION["login_user"];
				$flauser=$_POST['flausername'];
				$famname=$_POST['famname'];
				$famname = strtoupper($famname);
				$lotnumber=$_POST['lotnumber'];
				$ttlqty=$_POST['ttlqty'];
				$plteno=$_POST['plteno'];
				$plteno = strtoupper($plteno);
				$mlot=$_POST['mlot'];
				$mlot = strtoupper($mlot);
				
				$tstart=$_POST['ng2start2'];
				$actnrank2b = isset($_POST['ng2actnrank2b3']) ? (int)$_POST['ng2actnrank2b3'] : 0;
				$hdnrank2b=isset($_POST['ng2hdnrank2b3']) ? (int)$_POST['ng2hdnrank2b3'] : 0;
				$tsnrank2b=isset($_POST['ng2tsnrank2b3']) ? (int)$_POST['ng2tsnrank2b3'] : 0;
				$actsrank1a=isset($_POST['ng2actsrank1a3']) ? (int)$_POST['ng2actsrank1a3'] : 0;
				$hdsrank1a=isset($_POST['ng2hdsrank1a3']) ? (int)$_POST['ng2hdsrank1a3'] : 0;
				$tssrank1a=isset($_POST['ng2tssrank1a3']) ? (int)$_POST['ng2tssrank1a3'] : 0;
				$actccc1c9=isset($_POST['ng2actccc1c93']) ? (int)$_POST['ng2actccc1c93'] : 0;
				$hdccc1c9=isset($_POST['ng2hdccc1c93']) ? (int)$_POST['ng2hdccc1c93'] : 0;
				$tsccc1c9=isset($_POST['ng2tsccc1c93']) ? (int)$_POST['ng2tsccc1c93'] : 0;
				$actosc10=isset($_POST['ng2actosc103']) ? (int)$_POST['ng2actosc103'] : 0;
				$hdosc10=isset($_POST['ng2hdosc103']) ? (int)$_POST['ng2hdosc103'] : 0;
				$tsosc10=isset($_POST['ng2tsosc103']) ? (int)$_POST['ng2tsosc103'] : 0;
				$lanebox=isset($_POST['ng2lanebox3']) ? (int)$_POST['ng2lanebox3'] : 0;
				$imiss=isset($_POST['ng2imiss3']) ? (int)$_POST['ng2imiss3'] : 0;
				$dropped=isset($_POST['ng2dropped3']) ? (int)$_POST['ng2dropped3'] : 0;
				$excess=isset($_POST['ng2excess3']) ? (int)$_POST['ng2excess3'] : 0;
				//$psidefect=isset($_POST['ngpsi']) ? (int)$_POST['ngpsi'] : 0;
				$inityield=isset($_POST['ng2yield3']) ? (int)$_POST['ng2yield3'] : 0;
				$lead=isset($_POST['initlead']) ? (int)$_POST['initlead'] : 0;
				$markdefect=isset($_POST['initmarkdefect']) ? (int)$_POST['initmarkdefect'] : 0;
				$ts2dropped=isset($_POST['initts2dropped']) ? (int)$_POST['initts2dropped'] : 0;
				$purgeBin=isset($_POST['initpurgeBin']) ? (int)$_POST['initpurgeBin'] : 0;
				$preform=isset($_POST['initpreform']) ? (int)$_POST['initpreform'] : 0;
				$rprSam=isset($_POST['initrprSam']) ? (int)$_POST['initrprSam'] : 0;
				$tfinish=$_POST['ng2stop3'];
				
				$normlot=$_POST['ng2normlot3'];
				$psidis=$_POST['ng2psidis3'];
				$yld=$_POST['ng21yld3'];
				$missdev=$_POST['ng2missdev3'];
				$countdis=$_POST['ng2countdis3'];
				$exdev=$_POST['ng2exdev3'];
				$lyld=$_POST['ng2lyld3'];
				$others=$_POST['ng2others3'];
				$progname=$_POST['ng2progname'];
				$progname = strtoupper($progname);
				$remarks=$_POST['ng2remarks3'];
				$remarks = strtoupper($remarks);
				
				$initqty = $_POST['initttlqty'];
				$ttlP = $_POST['ttlP'];
				$ttlyld = ($ttlP + $actnrank2b + $actsrank1a) / $initqty * 100 ;
				
				//echo $inityield;
				
				$stdQty = isset($_POST['stdQty']) ? (int)$_POST['stdQty'] : NULL;
				$tubes = isset($_POST['tubes']) ? (int)$_POST['tubes'] : NULL;
				$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : NULL;
				$frctn1 = isset($_POST['frctn1']) ? (int)$_POST['frctn1'] : NULL;
				$frctn2 = isset($_POST['frctn2']) ? (int)$_POST['frctn2'] : NULL;
				$frctn3 = isset($_POST['frctn3']) ? (int)$_POST['frctn3'] : NULL;
				$frctn4 = isset($_POST['frctn4']) ? (int)$_POST['frctn4'] : NULL;
				$frctn5 = isset($_POST['frctn5']) ? (int)$_POST['frctn5'] : NULL;
				$frctn6 = isset($_POST['frctn6']) ? (int)$_POST['frctn6'] : NULL;
				$frctn7 = isset($_POST['frctn7']) ? (int)$_POST['frctn7'] : NULL;
				$frctn8 = isset($_POST['frctn8']) ? (int)$_POST['frctn8'] : NULL;
				$frctn9 = isset($_POST['frctn9']) ? (int)$_POST['frctn9'] : NULL;
				$frctn10 = isset($_POST['frctn10']) ? (int)$_POST['frctn10'] : NULL;
				$devttl = $quantity + $frctn1 + $frctn2 + $frctn3 + $frctn4 + $frctn5 + $frctn6 + $frctn7 + $frctn8 + $frctn9 + $frctn10;
				
				date_default_timezone_set("Asia/Manila");
				$dates2=(date("y.m.d"));
				
				if ($psidis == 1 || $yld == 1){
					$gonogo = "SELECT * FROM gonogo WHERE dateInput='$dates2' AND family='$famname'";
					
					$res=mysqli_query($conn,$gonogo);
					$cnt=mysqli_num_rows($res);
					
					if ($cnt>0){
						
					}else{
						$_SESSION['Msg'] = "Please Do a GONOGO.";
						header("Location: home.php");
						exit;
					}
				}
				
				$sql = "INSERT INTO ng2_retest (process_name,handler_no,tester_no,dates,shifts,operators,flauser,family_name,lot_no,total_qty,
						plate_no,time_start,act_n_rank2b,hd_n_rank2b,ts_n_rank2b,act_s_rank1a,hd_s_rank1a,ts_s_rank1a,act_cc_c1c9mos,
						hd_cc_c1c9mos,ts_cc_c1c9mos,act_os_c10mos,hd_os_c10mos,ts_os_c10mos,retest_lanebox,missing,dropped,excess,lead,
						markdefect,ts2dropped,purgeBin,preform,rprSam,ng2_yld,final_yld,time_finish,normal_lot,missing_dev,excess_dev,
						psi_dis,cntr_dis,low_yield,100_yield,others,remarks,prog_name,mother_lot)
						VALUES ('".$processname."','".$handlerno."','".$testerno."','".$dates."','".$shift."','".$user."','".$flauser."','".$famname."',
						'".$lotnumber."','".$ttlqty."','".$plteno."','".$tstart."','".$actnrank2b."','".$hdnrank2b."','".$tsnrank2b."',
						'".$actsrank1a."','".$hdsrank1a."','".$tssrank1a."','".$actccc1c9."','".$hdccc1c9."','".$tsccc1c9."','".$actosc10."',
						'".$hdosc10."','".$tsosc10."','".$lanebox."','".$imiss."','".$dropped."','".$excess."','".$lead."','".$markdefect."',
						'".$ts2dropped."','".$purgeBin."','".$preform."','".$rprSam."','".$inityield."','".$ttlyld."','".$tfinish."',
						'".$normlot."','".$missdev."','".$exdev."','".$psidis."','".$countdis."',
						'".$lyld."','".$yld."','".$others."','".$remarks."','".$progname."','".$mlot."')";
						
				$sql2 = "INSERT INTO fractions (lot_no,stdQty,noTubes,devQty,testtype,fraction1,fraction2,fraction3,fraction4,fraction5,fraction6,
						fraction7,fraction8,fraction9,fraction10,ttlQty,user)
						VALUES ('".$lotnumber."','".$stdQty."','".$tubes."','".$quantity."','RETEST2','".$frctn1."','".$frctn1."',
						'".$frctn1."','".$frctn1."','".$frctn1."','".$frctn1."','".$frctn1."','".$frctn1."','".$frctn1."','".$frctn10."',
						'".$devttl."','".$user." / ".$flausername."')";

						if ($conn->query($sql)=== TRUE && $conn->query($sql2)=== TRUE) {
							$_SESSION['Msg'] = "Retest 2 has have been saved.";
							header("location: home.php");
							exit;
						}else{
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}

						$conn->close();
						}

			}else{
				echo '<script type="text/javascript">function errmsg(){alert ("Invalid FLA password! Please try again.")}</script>'.
				'<script type="text/javascript">errmsg()</script>'.
				'<script> window.location.href="home.php"</script>';
							//$_SESSION['Msg'] = "*Invalid password! Please try again.*";
					//header("Location: home.php"); //Redirect user back to your login form
					//exit;
				}
		}

?>