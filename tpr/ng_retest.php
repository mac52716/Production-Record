<?php 
session_start();
include('dbcon.php');

		 if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			// username and password sent from form
			//$username=mysqli_real_escape_string($conn,$_POST['myusername']);
			//$password=mysqli_real_escape_string($conn,MD5($_POST['mypassword']));
			//$selectsql="SELECT * FROM users WHERE Email_Address='$username' and Password='$password'";
			
			//$result=mysqli_query($conn,$selectsql);

			//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

			//$active=$row['active'];

			//$count=mysqli_num_rows($result);

			// If result matched $username and $password, table row must be 1 row

			//if($count>0)
			//{
			
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
				$famname=$_POST['famname'];
				$famname = strtoupper($famname);
				$lotnumber=$_POST['lotnumber'];
				$ttlqty=$_POST['ttlqty'];
				$plteno=$_POST['plteno'];
				$plteno = strtoupper($plteno);
				$mlot=$_POST['mlot'];
				$mlot = strtoupper($mlot);
				
				$tstart=$_POST['ngstart2'];
				$actnrank2b = isset($_POST['ngactnrank2b2']) ? (int)$_POST['ngactnrank2b2'] : 0;
				$hdnrank2b=isset($_POST['nghdnrank2b2']) ? (int)$_POST['nghdnrank2b2'] : 0;
				$tsnrank2b=isset($_POST['ngtsnrank2b2']) ? (int)$_POST['ngtsnrank2b2'] : 0;
				$actsrank1a=isset($_POST['ngactsrank1a2']) ? (int)$_POST['ngactsrank1a2'] : 0;
				$hdsrank1a=isset($_POST['nghdsrank1a2']) ? (int)$_POST['nghdsrank1a2'] : 0;
				$tssrank1a=isset($_POST['ngtssrank1a2']) ? (int)$_POST['ngtssrank1a2'] : 0;
				$actccc1c9=isset($_POST['ngactccc1c92']) ? (int)$_POST['ngactccc1c92'] : 0;
				$hdccc1c9=isset($_POST['nghdccc1c92']) ? (int)$_POST['nghdccc1c92'] : 0;
				$tsccc1c9=isset($_POST['ngtsccc1c92']) ? (int)$_POST['ngtsccc1c92'] : 0;
				$actosc10=isset($_POST['ngactosc102']) ? (int)$_POST['ngactosc102'] : 0;
				$hdosc10=isset($_POST['nghdosc102']) ? (int)$_POST['nghdosc102'] : 0;
				$tsosc10=isset($_POST['ngtsosc102']) ? (int)$_POST['ngtsosc102'] : 0;
				$lanebox=isset($_POST['nglanebox2']) ? (int)$_POST['nglanebox2'] : 0;
				$imiss=isset($_POST['ngimiss2']) ? (int)$_POST['ngimiss2'] : 0;
				$dropped=isset($_POST['ngdropped2']) ? (int)$_POST['ngdropped2'] : 0;
				$excess=isset($_POST['ngexcess2']) ? (int)$_POST['ngexcess2'] : 0;
				//$psidefect=isset($_POST['ngpsi']) ? (int)$_POST['ngpsi'] : 0;
				$inityield=isset($_POST['ngyield2']) ? (int)$_POST['ngyield2'] : 0;
				$lead=isset($_POST['initlead']) ? (int)$_POST['initlead'] : 0;
				$markdefect=isset($_POST['initmarkdefect']) ? (int)$_POST['initmarkdefect'] : 0;
				$ts2dropped=isset($_POST['initts2dropped']) ? (int)$_POST['initts2dropped'] : 0;
				$purgeBin=isset($_POST['initpurgeBin']) ? (int)$_POST['initpurgeBin'] : 0;
				$preform=isset($_POST['initpreform']) ? (int)$_POST['initpreform'] : 0;
				$rprSam=isset($_POST['initrprSam']) ? (int)$_POST['initrprSam'] : 0;
				$tfinish=$_POST['ngstop2'];
				
				$normlot=$_POST['ngnormlot2'];
				$psidis=$_POST['ngpsidis2'];
				$yld=$_POST['ng1yld2'];
				$missdev=$_POST['ngmissdev2'];
				$countdis=$_POST['ngcountdis2'];
				$exdev=$_POST['ngexdev2'];
				$lyld=$_POST['nglyld2'];
				$others=$_POST['ngothers2'];
				$progname=$_POST['ngprogname'];
				$progname = strtoupper($progname);
				$remarks=$_POST['ngremarks2'];
				$remarks = strtoupper($remarks);

				$initqty = $_POST['initttlqty'];
				$ttlP = $_POST['ttlP'];
				$ttlyld = ($ttlP + $actnrank2b + $actsrank1a) / $initqty * 100 ;
				
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
						header("Location: index.php");
						exit;
					}
				}
				
				$sql = "INSERT INTO ng_retest (process_name,handler_no,tester_no,dates,shifts,operators,family_name,lot_no,total_qty,
						plate_no,time_start,act_n_rank2b,hd_n_rank2b,ts_n_rank2b,act_s_rank1a,hd_s_rank1a,ts_s_rank1a,act_cc_c1c9mos,
						hd_cc_c1c9mos,ts_cc_c1c9mos,act_os_c10mos,hd_os_c10mos,ts_os_c10mos,retest_lanebox,missing,dropped,excess,lead,
						markdefect,ts2dropped,purgeBin,preform,rprSam,ng_yld,final_yld,time_finish,normal_lot,missing_dev,excess_dev,
						psi_dis,cntr_dis,low_yield,100_yield,others,remarks,prog_name,mother_lot)
						VALUES ('".$processname."','".$handlerno."','".$testerno."','".$dates."','".$shift."','".$user."','".$famname."',
						'".$lotnumber."','".$ttlqty."','".$plteno."','".$tstart."','".$actnrank2b."','".$hdnrank2b."','".$tsnrank2b."',
						'".$actsrank1a."','".$hdsrank1a."','".$tssrank1a."','".$actccc1c9."','".$hdccc1c9."','".$tsccc1c9."','".$actosc10."',
						'".$hdosc10."','".$tsosc10."','".$lanebox."','".$imiss."','".$dropped."','".$excess."','".$lead."','".$markdefect."',
						'".$ts2dropped."','".$purgeBin."','".$preform."','".$rprSam."','".$inityield."','".$ttlyld."','".$tfinish."',
						'".$normlot."','".$missdev."','".$exdev."','".$psidis."','".$countdis."',
						'".$lyld."','".$yld."','".$others."','".$remarks."','".$progname."','".$mlot."')";
						
				$sql2 = "INSERT INTO fractions (lot_no,stdQty,noTubes,devQty,testtype,fraction1,fraction2,fraction3,fraction4,fraction5,fraction6,
						fraction7,fraction8,fraction9,fraction10,ttlQty,user)
						VALUES ('".$lotnumber."','".$stdQty."','".$tubes."','".$quantity."','RETEST','".$frctn1."','".$frctn1."',
						'".$frctn1."','".$frctn1."','".$frctn1."','".$frctn1."','".$frctn1."','".$frctn1."','".$frctn1."','".$frctn10."',
						'".$devttl."','".$user."')";

						if ($conn->query($sql)=== TRUE && $conn->query($sql2)=== TRUE) {
							$_SESSION['Msg'] = "Retest has have been saved.";
							header("location: home.php");
							exit;
						}else{
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}

						$conn->close();
						}

			//}else{
							//$_SESSION['Msg'] = "*Invalid password! Please try again.*";
					//header("Location: home.php"); //Redirect user back to your login form
					//exit;
				//}
		}

?>