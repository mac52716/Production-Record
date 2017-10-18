<?php
include('dbcon.php');

if (!empty($_REQUEST['lotnumber'])){
	$lotnumber = $_POST['lotnumber'];

$result = $conn->query("SELECT * FROM testers WHERE Lot_Name LIKE '%".$lotnumber."%'");
    $count=mysqli_num_rows($result);	

	if($count>0){
		while ($row = $result->fetch_assoc()) {
			$Lot_name = $row['Lot_Name'];
			$Tester_ID = $row['Tester_ID'];
			$Handler_ID = $row['Handler_ID'];
			$Device = $row['Device'];
	//while ($row = mysqli_fetch_array($r_query)) {
		//			  $Tester_ID = $row['Tester_ID'];
					  
		echo "<div class='text'>
		<div id='txtHint'>
	<table class='table' style='width: 800px;'>
		<tr>
			<td class='td2'>
				Lot number:
			</td>
			<td class='td2'>
				<input class='txtInput' id='txtInput2' type = 'text' name='lotnumber' onblur='query()' onkeypress='return isNumberKey(event)' maxlength='10' style='width: 180px;' value='$Lot_name'>
				<input id='subquery' type='submit' value='submit' style='display: none;'/>
				</td>
			<td class='td2'>
				Process name:
			</td>
			<td class='td2'>
				<select id='procname' name='processname' style='width: 130px;' >
				<option value='' disabled selected>Select process</option>
				<option value='TESTING 1'>TESTING 1</option>
				<option value='TESTING 2'>TESTING 2</option>
				<option value='TESTING 3'>TESTING 3</option>
				<option value='TESTING 4'>TESTING 4</option>
				<option value='TESTING 5'>TESTING 5</option>
				<option value='TESTING 6'>TESTING 6</option>
				<option value='7060 DVBE'>7060 DVBE</option>
				<option value='7080 O/S'>7080 O/S</option>
				</select>
				Year/Month:",
				date('y.m.d');
			echo "
			</td>
				
		</tr>
		<tr>
			<td class='td2'>
				Family name:
			</td>
			<td class='td2'>
				<input id='famname' class='famInput' type='text' name='famname' maxlength='25' style='width: 180px;' value='$Device' > 
			</td>
			<td class='td2'>
				Group:
			</td>
			<td class='td2'>
				<select tabindex='3' id='shift' name='shift' style='width: 130px;' >
				<option value='' disabled selected>Select group</option>
				<option value='GROUP A'>GROUP A</option>
				<option value='GROUP B'>GROUP B</option>
				<option value='GROUP C'>GROUP C</option>
				</select>
				Time:
				<content id='txt'></content>
			</td>
		</tr>							
		<tr>
			<td class='td2'>
				Total qty.:
			</td>
			<td class='td2'>
				<input tabindex='1' type='text' id='ttlqty' name='ttlqty' onkeypress='return isNumberKey(event)' maxlength='10' style='width: 50px;' >
			</td>
			<td class='td2'>
				Tester no.:
			</td>
			<td class='td2'>
				<input type='text' list='testersid' id='testerno' name='testerno' style='width: 125px;' value='$Tester_ID'/>
				<datalist id='testersid'>",
				include('testerid.php');
				echo "</datalist>
			</td>
		</tr>
		<tr>
			<td class='td2'>
				Plate no.:
			</td>
			<td class='td2'>
				<input tabindex='2' id='plteno' type='text' name='plteno' style='width: 50px;' maxlength='5' >
			</td>
			<td class='td2'>
				Handler no.:
			</td>
			<td class='td2'>
				<input type='text' list='handler' id='handlerno' name='handlerno' style='width: 125px;' value='$Handler_ID'/>
				<datalist id='handler'>",
				include('handlerno.php');
				echo "</datalist>
			</td>
		</tr>
		<tr>
			<td class='td2'>
				<input id='mlotchk' type='checkbox'/>With Mother Lot:
			</td>
			<td class='td2'>
				<input type='text' id='mlot' name='mlot' onkeypress='return isNumberKey(event)' readonly/>
			</td>
		</tr>
		<tr>
			<td colspan='4' class='td2'><hr></td>
		</tr>
		<tr>
		<td id='initstyle' class='td2'><input name='test' onclick='showfield()' type='radio' value='0' checked>INITIAL TEST</td>
		<td id='ngstyle' class='td2'><input name='test' onclick='showfield2()' type='radio' value='R'>NG RETEST</td>
		<td id='ng2style' class='td2'><input name='test' onclick='showfield3()' type='radio' value='R2'>NG RETEST 2</td>
		</tr>
		</table>
		</div>
		</div>
		
		<table id='initial' style='width: 800px;'>
				  <tr>
					<th colspan='14' style='background-color: #dddfff;'>INITIAL TEST</th>
				  </tr>
				  <tr>
					<td rowspan='2' style='background-color: #dddfff; padding: 0px 5px 0px 5px;'>Time start</td>
					<td rowspan='2' style='background-color: #dddfff;'>Ctr</td>
					<td colspan='2' style='background-color: #dddfff;'>Good</td>
					<td colspan='4' style='background-color: #dddfff;'>No Good</td>
					<td style='background-color: #dddfff;'>PSI defect</td>
					<td rowspan='2' style='background-color: #dddfff;  padding: 0px 3px 0px 3px;'>Time Finish</td>
					<td rowspan='2' colspan='3' style='background-color: #dddfff;'>FINAL JUDGEMENT</td>
					<td style='background-color: #dddfff;'>PROGRAM NAME</td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>Normal Rank 2/B</td>
					<td style='background-color: #dddfff;'>Special Rank 1/A</td>
					<td style='background-color: #dddfff;'>Charac/ Combine C1-C9 MOS</td>
					<td style='background-color: #dddfff;'>Open/ Short C10 MOS</td>
					<td style='background-color: #dddfff;'>Retest Lane/ Box</td>
					<td style='background-color: #dddfff;'>Others: (Dropped /Missing etc.)</td>
					<td style='background-color: #dddfff;'>Initial Yield</td>
					<td style='background-color: #dddfff;'>REMARKS</td>
				  </tr>
				  <tr>
					<td rowspan='3'><input id='initstart' tabindex='4' name='initstart' class='texthieght' type='text' onkeypress='return isNumberKey(event)'  minlength='4' maxlength='4' placeholder='hhmm' /></td>
					<td style='background-color: #dddfff;'>Act</td>
					<td><input tabindex='5' id='initactnrank2b' name='initactnrank2b' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='6' id='initactsrank1a' name='initactsrank1a' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='7' id='initactccc1c9' name='initactccc1c9' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='8' id='initactosc10' name='initactosc10' class='textwidth' onkeypress='return isNumberKey(event)' maxlength='6'></td>
					<td><input tabindex='9' id='initlanebox' name='initlanebox' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='10' id='initdropped' name='initdropped' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='dropped'/></td>
					<td><input tabindex='11' id='initpsi' name='initpsi' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='psi'/></td>
					<td rowspan='3'><input id='initstop' tabindex='22' name='initstop' onfocus='checkqtyinit();' class='texthieght' type ='text' onkeypress='return isNumberKey(event)' minlength='4' maxlength='4' placeholder='hhmm' /></td>
					
					<td><input name='initnormlot' value='0' type='hidden'><input type='checkbox' name='initnormlot' value='1' /><br>Normal lot</td>
					<td><input name='initpsidis' value='0' type='hidden'><input id='psidis' type='checkbox' name='initpsidis' value='1' onclick='chkd2()' /><br>PSI discrepancy</td>
					<td><input name='init1yld' value='0' type='hidden'><input id='100%yld' type='checkbox' name='init1yld' value='1' onclick='chkd()' /><br>100% yield</td>
					<td><input id='progname' type='text' name='progname' minlength='4' maxlength='10' placeholder='PROGRAM NAME' /></td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>HD</td>
					<td><input tabindex='12' id='inithdnrank2b' name='inithdnrank2b' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='13' id='inithdsrank1a' name='inithdsrank1a' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='14' id='inithdccc1c9' name='inithdccc1c9' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='15' id='inithdosc10' name='inithdosc10' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td></td>
					<td><input tabindex='16' placeholder='missing' id='initimiss' name='initimiss' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td rowspan='2'><input id='inityield' name='inityield' type='text' style='height: 85px; width: 90%; text-align: center; background-color: #d0d0d0;' onkeypress='return isNumberKey2(event)' readonly maxlength='6'/></td>
					
					<td><input name='initmissdev' value='0' type='hidden'><input type='checkbox' name='initmissdev' value='1' /><br>Missing devices</td>
					<td><input name='initcountdis' value='0' type='hidden'><input type='checkbox' name='initcountdis' value='1' /><br>Counter discrepancy</td>
					<td rowspan='2'>Others<input name='initothers' type='text' style='height: 70px; width: 90%;'></td>
					<td rowspan='2'><textarea  tabindex='42' type='text' class='textarea' name='initremarks' ></textarea></td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>TS</td>
					<td><input tabindex='17' id='inittsnrank2b' name='inittsnrank2b' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='18' id='inittssrank1a' name='inittssrank1a' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='19' id='inittsccc1c9' name='inittsccc1c9' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='20' id='inittsosc10' name='inittsosc10' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td></td>
					<td><input tabindex='21' name='initexcess' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='excess'/></td>
					<td><input name='initexdev' value='0' type='hidden'><input type='checkbox' name='initexdev' value='1' /><br>Excess devices</td>
					<td><input name='initlyld' value='0' type='hidden'><input type='checkbox' name='initlyld' value='1' /><br>Low yield</td>
				  </tr>
				</table>
				
				<table id='ng' style='width: 800px;'>
				  <tr>
					<th colspan='14' style='background-color: #dddfff;'>NG RETEST</th>
				  </tr>
				  <tr>
					<td rowspan='2' style='background-color: #dddfff; padding: 0px 5px 0px 5px;'>Time start</td>
					<td rowspan='2' style='background-color: #dddfff;'>Ctr</td>
					<td colspan='2' style='background-color: #dddfff;'>Good</td>
					<td colspan='5' style='background-color: #dddfff;'>No Good</td>
					<td rowspan='2' style='background-color: #dddfff;  padding: 0px 3px 0px 3px;'>Time Finish</td>
					<td rowspan='2' colspan='3' style='background-color: #dddfff;'>FINAL JUDGEMENT</td>
					<td style='background-color: #dddfff;'>PROGRAM NAME</td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>Normal Rank 2/B</td>
					<td style='background-color: #dddfff;'>Special Rank 1/A</td>
					<td style='background-color: #dddfff;'>Charac/ Combine C1-C9 MOS</td>
					<td style='background-color: #dddfff;'>Open/ Short C10 MOS</td>
					<td style='background-color: #dddfff;'>Retest Lane/ Box</td>
					<td style='background-color: #dddfff;'>Others: (Dropped /Missing etc.)</td>
					<td style='width: 50px; background-color: #dddfff;'>NG Yield</td>
					<td style='background-color: #dddfff;'>REMARKS</td>
				  </tr>
				  <tr>
					<td rowspan='3'><input id='ngstart' tabindex='9' name='ngstart2' class='texthieght' type='text' onkeypress='return isNumberKey(event)'  minlength='4' maxlength='4' placeholder='hhmm' /></td>
					<td style='background-color: #dddfff;'>Act</td>
					<td><input tabindex='10' id='ngactnrank2b' name='ngactnrank2b2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='11' id='ngactsrank1a' name='ngactsrank1a2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='12' id='ngactccc1c9' name='ngactccc1c92' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='13' id='ngactosc10' name='ngactosc102' class='textwidth' onkeypress='return isNumberKey(event)' maxlength='6'></td>
					<td><input tabindex='14' id='nglanebox' name='nglanebox2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='15' id='ngdropped' name='ngdropped2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='dropped'/></td>
					<td></td>
					<td rowspan='3'><input id='ngstop' tabindex='25' name='ngstop2' onfocus='checkqtyng();' class='texthieght' type ='text' onkeypress='return isNumberKey(event)' minlength='4' maxlength='4' placeholder='hhmm' /></td>
					
					<td><input name='ngnormlot2' value='0' type='hidden'><input type='checkbox' name='ngnormlot2' value='1' /><br>Normal lot</td>
					<td><input name='ngpsidis2' value='0' type='hidden'><input id='psidis' type='checkbox' name='ngpsidis2' value='1' onclick='chkd2()' /><br>PSI discrepancy</td>
					<td><input name='ng1yld2' value='0' type='hidden'><input id='100%yld' type='checkbox' name='ng1yld2' value='1' onclick='chkd()' /><br>100% yield</td>
					<td><input id='ngprogname' type='text' name='ngprogname' minlength='4' maxlength='10' placeholder='PROGRAM NAME' /></td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>HD</td>
					<td><input tabindex='17' id='nghdnrank2b' name='nghdnrank2b2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='18' id='nghdsrank1a' name='nghdsrank1a2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='19' id='nghdccc1c9' name='nghdccc1c92' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='20' id='nghdosc10' name='nghdosc102' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td></td>
					<td><input tabindex='15' placeholder='missing' id='ngimiss' name='ngimiss2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td rowspan='2'><input id='ngyield' name='ngyield2' type='text' style='height: 85px; width: 90%; text-align: center; background-color: #d0d0d0;' onkeypress='return isNumberKey2(event)' readonly maxlength='6'/></td>
					
					<td><input name='ngmissdev2' value='0' type='hidden'><input type='checkbox' name='ngmissdev2' value='1' /><br>Missing devices</td>
					<td><input name='ngcountdis2' value='0' type='hidden'><input type='checkbox' name='ngcountdis2' value='1' /><br>Counter discrepancy</td>
					<td rowspan='2'>Others<input name='ngothers2' type='text' style='height: 70px; width: 90%;'></td>
					<td rowspan='3'><textarea  tabindex='42' type='text' class='textarea' name='ngremarks2' ></textarea></td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>TS</td>
					<td><input tabindex='21' id='ngtsnrank2b' name='ngtsnrank2b2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='22' id='ngtssrank1a' name='ngtssrank1a2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='23' id='ngtsccc1c9' name='ngtsccc1c92' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='24' id='ngtsosc10' name='ngtsosc102' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td></td>
					<td><input tabindex='24' id='ngexcess' name='ngexcess2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='excess'/></td>
					<td><input name='ngexdev2' value='0' type='hidden'><input type='checkbox' name='ngexdev2' value='1' /><br>Excess devices</td>
					<td><input name='nglyld2' value='0' type='hidden'><input type='checkbox' name='nglyld2' value='1' /><br>Low yield</td>
				  </tr>
				</table>
				
				<table id='ng2' style='width: 800px;'>
				  <tr>
					<th colspan='14' style='background-color: #dddfff;'>NG RETEST 2</th>
				  </tr>
				  <tr>
					<td rowspan='2' style='background-color: #dddfff; padding: 0px 5px 0px 5px;'>Time start</td>
					<td rowspan='2' style='background-color: #dddfff;'>Ctr</td>
					<td colspan='2' style='background-color: #dddfff;'>Good</td>
					<td colspan='5' style='background-color: #dddfff;'>No Good</td>
					<td rowspan='2' style='background-color: #dddfff;  padding: 0px 3px 0px 3px;'>Time Finish</td>
					<td rowspan='2' colspan='3' style='background-color: #dddfff;'>FINAL JUDGEMENT</td>
					<td style='background-color: #dddfff;'>PROGRAM NAME</td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>Normal Rank 2/B</td>
					<td style='background-color: #dddfff;'>Special Rank 1/A</td>
					<td style='background-color: #dddfff;'>Charac/ Combine C1-C9 MOS</td>
					<td style='background-color: #dddfff;'>Open/ Short C10 MOS</td>
					<td style='background-color: #dddfff;'>Retest Lane/ Box</td>
					<td style='background-color: #dddfff;'>Others: (Dropped /Missing etc.)</td>
					<td style='width: 50px; background-color: #dddfff;'>NG2 Yield</td>
					<td style='background-color: #dddfff;'>REMARKS</td>
				  </tr>
				  <tr>
					<td rowspan='3'><input id='ng2start' tabindex='9' name='ng2start2' class='texthieght' type='text' onkeypress='return isNumberKey(event)'  minlength='4' maxlength='4' placeholder='hhmm' /></td>
					<td style='background-color: #dddfff;'>Act</td>
					<td><input tabindex='10' id='ng2actnrank2b' name='ng2actnrank2b3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='11' id='ng2actsrank1a' name='ng2actsrank1a3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='12' id='ng2actccc1c9' name='ng2actccc1c93' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='13' id='ng2actosc10' name='ng2actosc103' class='textwidth' onkeypress='return isNumberKey(event)' maxlength='6'></td>
					<td><input tabindex='14' id='ng2lanebox' name='ng2lanebox3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='15' id='ng2dropped' name='ng2dropped3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='dropped'/></td>
					<td></td>
					<td rowspan='3'><input id='ng2stop' tabindex='25' name='ng2stop3' onfocus='checkqtyng2();' class='texthieght' type ='text' onkeypress='return isNumberKey(event)' minlength='4' maxlength='4' placeholder='hhmm' /></td>
					
					<td><input name='ng2normlot3' value='0' type='hidden'><input type='checkbox' name='ng2normlot3' value='1' /><br>Normal lot</td>
					<td><input name='ng2psidis3' value='0' type='hidden'><input id='psidis' type='checkbox' name='ng2psidis3' value='1' onclick='chkd2()' /><br>PSI discrepancy</td>
					<td><input name='ng21yld3' value='0' type='hidden'><input id='100%yld' type='checkbox' name='ng21yld3' value='1' onclick='chkd()' /><br>100% yield</td>
					<td><input id='ng2progname' type='text' name='ng2progname' minlength='4' maxlength='10' placeholder='PROGRAM NAME' /></td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>HD</td>
					<td><input tabindex='17' id='ng2hdnrank2b' name='ng2hdnrank2b3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='18' id='ng2hdsrank1a' name='ng2hdsrank1a3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='19' id='ng2hdccc1c9' name='ng2hdccc1c93' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='20' id='ng2hdosc10' name='ng2hdosc103' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td></td>
					<td><input tabindex='15' placeholder='missing' id='ng2imiss' name='ng2imiss3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td rowspan='2'><input id='ng2yield' name='ng2yield3' type='text' style='height: 85px; width: 90%; text-align: center; background-color: #d0d0d0;' onkeypress='return isNumberKey2(event)' readonly maxlength='6'/></td>
					
					<td><input name='ng2missdev3' value='0' type='hidden'><input type='checkbox' name='ng2missdev3' value='1' /><br>Missing devices</td>
					<td><input name='ng2countdis3' value='0' type='hidden'><input type='checkbox' name='ng2countdis3' value='1' /><br>Counter discrepancy</td>
					<td rowspan='2'>Others<input name='ng2others3' type='text' style='height: 70px; width: 90%;'></td>
					<td rowspan='3'><textarea  tabindex='42' type='text' class='textarea' name='ng2remarks3' ></textarea></td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>TS</td>
					<td><input tabindex='21' id='ng2tsnrank2b' name='ng2tsnrank2b3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='22' id='ng2tssrank1a' name='ng2tssrank1a3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='23' id='ng2tsccc1c9' name='ng2tsccc1c93' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='24' id='ng2tsosc10' name='ng2tsosc103' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td></td>
					<td><input tabindex='24' id='ng2excess' name='ng2excess3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='excess'/></td>
					<td><input name='ng2exdev3' value='0' type='hidden'><input type='checkbox' name='ng2exdev3' value='1' /><br>Excess devices</td>
					<td><input name='ng2lyld3' value='0' type='hidden'><input type='checkbox' name='ng2lyld3' value='1' /><br>Low yield</td>
				  </tr>
				</table>
				
				<div class='rules' >
				<table>
					<caption style='border: 1px solid black; background-color: #dddfff;'><b>FRACTIONS</b></caption>
					<tr>
						<th style='background-color: #dddfff;'>stdQty</th>
						<th style='background-color: #dddfff;'>no.Tubes</th>
						<th style='background-color: #dddfff;'>Qty</th>
						<th style='background-color: #dddfff;'>F1</th>
						<th style='background-color: #dddfff;'>F2</th>
						<th style='background-color: #dddfff;'>F3</th>
						<th style='background-color: #dddfff;'>F4</th>
						<th style='background-color: #dddfff;'>F5</th>
						<th style='background-color: #dddfff;'>F6</th>
						<th style='background-color: #dddfff;'>F7</th>
						<th style='background-color: #dddfff;'>F8</th>
						<th style='background-color: #dddfff;'>F9</th>
						<th style='background-color: #dddfff;'>F10</th>
					</tr>
					<tr>
						<td><input type='text' id='stdQty' name='stdQty' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='tubes' name='tubes' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='quantity' name='quantity' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn1' name='frctn1' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn2' name='frctn2' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn3' name='frctn3' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn4' name='frctn4' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn5' name='frctn5' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn6' name='frctn6' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn7' name='frctn7' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn8' name='frctn8' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn9' name='frctn9' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn10' name='frctn10' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
					</tr>
				</table>
				
				<hr>
				<input id='initvalcbx63' type='text' name='initlead' value='0' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px; display: none;'/><input id='initcbx63' onclick='initshowtxtbx()' type='checkbox'/>63 LEAD
				<input id='initvalcbx64' type='text' name='initmarkdefect' value='0' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px; display: none;'/><input id='initcbx64' onclick='initshowtxtbx()' type='checkbox'/>64 MARKING DEFECT
				<input id='initvalcbx65' type='text' name='initts2dropped' value='0' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px; display: none;'/><input id='initcbx65' onclick='initshowtxtbx()' type='checkbox'/>65 DROPPED
				<input id='initvalcbx75' type='text' name='initpurgeBin' value='0' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px; display: none;'/><input id='initcbx75' onclick='initshowtxtbx()' type='checkbox'/>75 PURGE BIN
				<input id='initvalcbx77' type='text' name='initpreform' value='0' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px; display: none;'/><input id='initcbx77' onclick='initshowtxtbx()' type='checkbox'/>77 PREFORM DEFECT
				<input id='initvalcbx95' type='text' name='initrprSam' value='0' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px; display: none;'/><input id='initcbx95' onclick='initshowtxtbx()' type='checkbox'/>95 REPAIR SAMPLE
				
				<h3><hr>SPC RULE</h3>
				<input type='checkbox' name='rule1' value='Rule 1' disabled/>Rule 1
				<input type='checkbox' name='rule2' value='Rule 2' disabled/>Rule 2
				<input type='checkbox' name='rule3' value='Rule 3' disabled/>Rule 3
				<input type='checkbox' name='rule4' value='Rule 4' disabled/>Rule 4
				<input type='checkbox' name='rule5' value='Rule 5' disabled/>Rule 5
				<input type='checkbox' name='rule6' value='Rule 6' disabled/>Rule 6
				<input type='checkbox' name='rule7' value='Rule 7' disabled/>Rule 7
				<input type='checkbox' name='rule8' value='Rule 8' disabled/>Rule 8
				<input type='checkbox' name='rule9' value='Rule 9' disabled/>Rule 9
				<input type='checkbox' name='rule10' value='Rule 10' disabled/>Rule 10
				<br>
				<input type='checkbox' name='rule11' value='Rule 11' disabled/>Rule 11
				<input type='checkbox' name='rule12' value='Rule 12' disabled/>Rule 12
				<input type='checkbox' name='rule13' value='Rule 13' disabled/>Rule 13
				<input type='checkbox' name='rule14' value='Rule 14' disabled/>Rule 14
				<input type='checkbox' name='rule15' value='Rule 15' disabled/>Rule 15
				<input type='checkbox' name='rule16' value='Rule 16' disabled/>Rule 16
				<input type='checkbox' name='rule17' value='Rule 17' disabled/>Rule 17
				<input type='checkbox' name='rule18' value='Rule 18' disabled/>Rule 18
				<input type='checkbox' name='rule19' value='Rule 19' disabled/>Rule 19
				<input type='checkbox' name='rule20' value='Rule 20' disabled/>Rule 20
				</div>
				<br>
				<div style='text-align: center; color: maroon;'>";
				if(!empty($_SESSION['Msg'])) { echo $_SESSION['Msg']; };
				unset($_SESSION['Msg']);
				echo "</div>
				<div class='bttncontainer'>
				<div id='fla' style='margin-right:167px;'>
				FLA / Product: <select  tabindex='43' id='flaUser' name='flausername' style='margin-top:7px; width: 185px;' >
				<option value='' disabled selected>Select name</option>
				<option value='Ariel.Burbos'>Ariel.Burbos</option>
				<option value='Samuel Jr..Ordinado'>Samuel Jr..Ordinado</option>
				<option value='Jervie.Cordova'>Jervie.Cordova</option>
				<option value='Joel.Apilado'>Joel.Apilado</option>
				<option value='Mariejoy.Tango'>Mariejoy.Tango</option>
				<option value='Jevin.Aripal'>Jevin.Aripal</option>Christian.Ancheta
				<option value='Christian.Ancheta'>Christian.Ancheta</option>
				</select>
				Password: <input tabindex='44' type='password' id='flaPass' name='flapassword' >
				</div>
				<br>
	        <input class='mybutton' id='submit' name='submit' type='button' value='OK'>
			<input class='mybutton' onclick=location.href='home.php' name='reset' type='button' value='RESET'></div>";
		}
	}else{
		$lotnumber = $_POST['lotnumber'];
		
		echo "<div class='text'>
		<div id='txtHint'>
	<table class='table' style='width: 800px;'>
		<tr>
			<td class='td2'>
				Lot number:
			</td>
			
			<td class='td2'>
				<input class='txtInput' id='txtInput2' type = 'text' name='lotnumber' onblur='query()' onkeypress='return isNumberKey(event)' maxlength='10' style='width: 180px;' value='$lotnumber'>
				<input id='subquery' type='submit' value='submit' style='display: none;'/>
				
			</td>
			<td class='td2'>
				Process name:
			</td>
			<td class='td2'>
				<select tabindex='3' id='procname' name='processname' style='width: 130px;' >
				<option value='' disabled selected>Select process</option>
				<option value='TESTING 1'>TESTING 1</option>
				<option value='TESTING 2'>TESTING 2</option>
				<option value='TESTING 3'>TESTING 3</option>
				<option value='TESTING 4'>TESTING 4</option>
				<option value='TESTING 5'>TESTING 5</option>
				<option value='TESTING 6'>TESTING 6</option>
				<option value='7060 DVBE'>7060 DVBE</option>
				<option value='7080 O/S'>7080 O/S</option>
				</select>
				Year/Month:",
				date('y.m.d');
			echo "</td>
		</tr>
		<tr>
			<td class='td2'>
				Family name:
			</td>
			<td class='td2'>
				<input id='famname' class='famInput' type='text' name='famname' maxlength='25' style='width: 180px;' />
			</td>
			<td class='td2'>
				Group:
			</td>
			<td class='td2'>
				<select  tabindex='4' id='shift' name='shift' style='width: 130px;' >
				<option value='' disabled selected>Select group</option>
				<option value='GROUP A'>GROUP A</option>
				<option value='GROUP B'>GROUP B</option>
				<option value='GROUP C'>GROUP C</option>
				</select>
				Time:
				<content id='txt'></content>
			</td>
		</tr>							
		<tr>
			<td class='td2'>
				Total qty.:
			</td>
			<td class='td2'>
				<input tabindex='1' type='text' id='ttlqty' name='ttlqty' onkeypress='return isNumberKey(event)' maxlength='10' style='width: 50px;' >
				
			</td>
			<td class='td2'>
				Tester no.:
			</td>
			<td class='td2'>
				<input tabindex='5' type='text' list='testersid' id='testerno' name='testerno' style='width: 125px;'/>
				<datalist id='testersid'>",
				include('testerid.php');
				echo "</datalist>
			</td>
		</tr>
		<tr>
			<td class='td2'>
				Plate no.:
			</td>
			<td class='td2'>
				<input tabindex='2' id='plteno' type='text' name='plteno' style='width: 50px;' maxlength='5' >
			</td>
			<td class='td2'>
				Handler no.:
			</td>
			<td class='td2'>
				<input  tabindex='6' type='text' list='handler' id='handlerno' name='handlerno' style='width: 125px;'/>
				<datalist id='handler'>",
				include('handlerno.php');
				echo "</datalist>
			</td>
		</tr>
		<tr>
			<td class='td2'>
				<input id='mlotchk' type='checkbox'/>With Mother Lot:
			</td>
			<td class='td2'>
				<input type='text' id='mlot' name='mlot' onkeypress='return isNumberKey(event)' readonly/>
			</td>
		</tr>
		<tr>
			<td colspan='4' class='td2'><hr></td>
		</tr>
		<tr>
		<td id='initstyle' class='td2'><input name='test' onclick='showfield()' type='radio' value='0' checked>INITIAL TEST</td>
		<td id='ngstyle' class='td2'><input name='test' onclick='showfield2()' type='radio' value='R'>NG RETEST</td>
		<td id='ng2style' class='td2'><input name='test' onclick='showfield3()' type='radio' value='R2'>NG RETEST 2</td>
		</tr>
		</table>
		</div>
		</div>
		
		<table id='initial' style='width: 800px;'>
				  <tr>
					<th colspan='14' style='background-color: #dddfff;'>INITIAL TEST</th>
				  </tr>
				  <tr>
					<td rowspan='2' style='background-color: #dddfff; padding: 0px 5px 0px 5px;'>Time start</td>
					<td rowspan='2' style='background-color: #dddfff;'>Ctr</td>
					<td colspan='2' style='background-color: #dddfff;'>Good</td>
					<td colspan='4' style='background-color: #dddfff;'>No Good</td>
					<td style='background-color: #dddfff;'>PSI defect</td>
					<td rowspan='2' style='background-color: #dddfff;  padding: 0px 3px 0px 3px;'>Time Finish</td>
					<td rowspan='2' colspan='3' style='background-color: #dddfff;'>FINAL JUDGEMENT</td>
					<td style='background-color: #dddfff;'>PROGRAM NAME</td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>Normal Rank 2/B</td>
					<td style='background-color: #dddfff;'>Special Rank 1/A</td>
					<td style='background-color: #dddfff;'>Charac/ Combine C1-C9 MOS</td>
					<td style='background-color: #dddfff;'>Open/ Short C10 MOS</td>
					<td style='background-color: #dddfff;'>Retest Lane/ Box</td>
					<td style='background-color: #dddfff;'>Others: (Dropped /Missing etc.)</td>
					<td style='background-color: #dddfff;'>Initial Yield</td>
					<td style='background-color: #dddfff;'>REMARKS</td>
				  </tr>
				  <tr>
					<td rowspan='3'><input tabindex='7' id='initstart' name='initstart' class='texthieght' type='text' onkeypress='return isNumberKey(event)'  minlength='4' maxlength='4' placeholder='hhmm' /></td>
					<td style='background-color: #dddfff;'>Act</td>
					<td><input tabindex='8' id='initactnrank2b' name='initactnrank2b' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='9' id='initactsrank1a' name='initactsrank1a' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='10' id='initactccc1c9' name='initactccc1c9' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='11' id='initactosc10' name='initactosc10' class='textwidth' onkeypress='return isNumberKey(event)' maxlength='6'></td>
					<td><input tabindex='12' id='initlanebox' name='initlanebox' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='13' id='initdropped' name='initdropped' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='dropped'/></td>
					<td><input tabindex='14' id='initpsi' name='initpsi' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='psi'/></td>
					<td rowspan='3'><input id='initstop' tabindex='25' name='initstop' onfocus='checkqtyinit();' class='texthieght' type ='text' onkeypress='return isNumberKey(event)' minlength='4' maxlength='4' placeholder='hhmm' /></td>
					
					<td><input name='initnormlot' value='0' type='hidden'><input type='checkbox' name='initnormlot' value='1' /><br>Normal lot</td>
					<td><input name='initpsidis' value='0' type='hidden'><input id='psidis' type='checkbox' name='initpsidis' value='1' onclick='chkd2()' /><br>PSI discrepancy</td>
					<td><input name='init1yld' value='0' type='hidden'><input id='100%yld' type='checkbox' name='init1yld' value='1' onclick='chkd()' /><br>100% yield</td>
					<td><input id='progname' type='text' name='progname' minlength='4' maxlength='10' placeholder='PROGRAM NAME' /></td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>HD</td>
					<td><input tabindex='15' id='inithdnrank2b' name='inithdnrank2b' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='16' id='inithdsrank1a' name='inithdsrank1a' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='17' id='inithdccc1c9' name='inithdccc1c9' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='18' id='inithdosc10' name='inithdosc10' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td></td>
					<td><input tabindex='19' placeholder='missing' id='initimiss' name='initimiss' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td rowspan='2'><input id='inityield' name='inityield' type='text' style='height: 85px; width: 90%; text-align: center; background-color: #d0d0d0;' onkeypress='return isNumberKey2(event)' readonly maxlength='6'/></td>
					
					<td><input name='initmissdev' value='0' type='hidden'><input type='checkbox' name='initmissdev' value='1' /><br>Missing devices</td>
					<td><input name='initcountdis' value='0' type='hidden'><input type='checkbox' name='initcountdis' value='1' /><br>Counter discrepancy</td>
					<td rowspan='2'>Others<input name='initothers' type='text' style='height: 70px; width: 90%;'></td>
					<td rowspan='3'><textarea  tabindex='42' type='text' class='textarea' name='initremarks' ></textarea></td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>TS</td>
					<td><input tabindex='20' id='inittsnrank2b' name='inittsnrank2b' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='21' id='inittssrank1a' name='inittssrank1a' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='22' id='inittsccc1c9' name='inittsccc1c9' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='23' id='inittsosc10' name='inittsosc10' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td></td>
					<td><input tabindex='24' name='initexcess' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='excess'/></td>
					<td><input name='initexdev' value='0' type='hidden'><input type='checkbox' name='initexdev' value='1' /><br>Excess devices</td>
					<td><input name='initlyld' value='0' type='hidden'><input type='checkbox' name='initlyld' value='1' /><br>Low yield</td>
				  </tr>
				</table>
				
				<table id='ng' style='width: 800px;'>
				  <tr>
					<th colspan='14' style='background-color: #dddfff;'>NG RETEST</th>
				  </tr>
				  <tr>
					<td rowspan='2' style='background-color: #dddfff; padding: 0px 5px 0px 5px;'>Time start</td>
					<td rowspan='2' style='background-color: #dddfff;'>Ctr</td>
					<td colspan='2' style='background-color: #dddfff;'>Good</td>
					<td colspan='5' style='background-color: #dddfff;'>No Good</td>
					<td rowspan='2' style='background-color: #dddfff;  padding: 0px 3px 0px 3px;'>Time Finish</td>
					<td rowspan='2' colspan='3' style='background-color: #dddfff;'>FINAL JUDGEMENT</td>
					<td style='background-color: #dddfff;'>PROGRAM NAME</td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>Normal Rank 2/B</td>
					<td style='background-color: #dddfff;'>Special Rank 1/A</td>
					<td style='background-color: #dddfff;'>Charac/ Combine C1-C9 MOS</td>
					<td style='background-color: #dddfff;'>Open/ Short C10 MOS</td>
					<td style='background-color: #dddfff;'>Retest Lane/ Box</td>
					<td style='background-color: #dddfff;'>Others: (Dropped /Missing etc.)</td>
					<td style='width: 50px; background-color: #dddfff;'>NG Yield</td>
					<td style='background-color: #dddfff;'>REMARKS</td>
				  </tr>
				  <tr>
					<td rowspan='3'><input id='ngstart' tabindex='9' name='ngstart2' class='texthieght' type='text' onkeypress='return isNumberKey(event)'  minlength='4' maxlength='4' placeholder='hhmm' /></td>
					<td style='background-color: #dddfff;'>Act</td>
					<td><input tabindex='10' id='ngactnrank2b' name='ngactnrank2b2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='11' id='ngactsrank1a' name='ngactsrank1a2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='12' id='ngactccc1c9' name='ngactccc1c92' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='13' id='ngactosc10' name='ngactosc102' class='textwidth' onkeypress='return isNumberKey(event)' maxlength='6'></td>
					<td><input tabindex='14' id='nglanebox' name='nglanebox2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='15' id='ngdropped' name='ngdropped2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='dropped'/></td>
					<td></td>
					<td rowspan='3'><input id='ngstop' tabindex='25' name='ngstop2' onfocus='checkqtyng();' class='texthieght' type ='text' onkeypress='return isNumberKey(event)' minlength='4' maxlength='4' placeholder='hhmm' /></td>
					
					<td><input name='ngnormlot2' value='0' type='hidden'><input type='checkbox' name='ngnormlot2' value='1' /><br>Normal lot</td>
					<td><input name='ngpsidis2' value='0' type='hidden'><input id='psidis' type='checkbox' name='ngpsidis2' value='1' onclick='chkd2()' /><br>PSI discrepancy</td>
					<td><input name='ng1yld2' value='0' type='hidden'><input id='100%yld' type='checkbox' name='ng1yld2' value='1' onclick='chkd()' /><br>100% yield</td>
					<td><input id='ngprogname' type='text' name='ngprogname' minlength='4' maxlength='10' placeholder='PROGRAM NAME' /></td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>HD</td>
					<td><input tabindex='17' id='nghdnrank2b' name='nghdnrank2b2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='18' id='nghdsrank1a' name='nghdsrank1a2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='19' id='nghdccc1c9' name='nghdccc1c92' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='20' id='nghdosc10' name='nghdosc102' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td></td>
					<td><input tabindex='15' placeholder='missing' id='ngimiss' name='ngimiss2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td rowspan='2'><input id='ngyield' name='ngyield2' type='text' style='height: 85px; width: 90%; text-align: center; background-color: #d0d0d0;' onkeypress='return isNumberKey2(event)' readonly maxlength='6'/></td>
					
					<td><input name='ngmissdev2' value='0' type='hidden'><input type='checkbox' name='ngmissdev2' value='1' /><br>Missing devices</td>
					<td><input name='ngcountdis2' value='0' type='hidden'><input type='checkbox' name='ngcountdis2' value='1' /><br>Counter discrepancy</td>
					<td rowspan='2'>Others<input name='ngothers2' type='text' style='height: 70px; width: 90%;'></td>
					<td rowspan='3'><textarea  tabindex='42' type='text' class='textarea' name='ngremarks2' ></textarea></td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>TS</td>
					<td><input tabindex='21' id='ngtsnrank2b' name='ngtsnrank2b2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='22' id='ngtssrank1a' name='ngtssrank1a2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='23' id='ngtsccc1c9' name='ngtsccc1c92' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='24' id='ngtsosc10' name='ngtsosc102' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td></td>
					<td><input tabindex='24' id='ngexcess' name='ngexcess2' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='excess'/></td>
					<td><input name='ngexdev2' value='0' type='hidden'><input type='checkbox' name='ngexdev2' value='1' /><br>Excess devices</td>
					<td><input name='nglyld2' value='0' type='hidden'><input type='checkbox' name='nglyld2' value='1' /><br>Low yield</td>
				  </tr>
				</table>
				
				<table id='ng2' style='width: 800px;'>
				  <tr>
					<th colspan='14' style='background-color: #dddfff;'>NG RETEST 2</th>
				  </tr>
				  <tr>
					<td rowspan='2' style='background-color: #dddfff; padding: 0px 5px 0px 5px;'>Time start</td>
					<td rowspan='2' style='background-color: #dddfff;'>Ctr</td>
					<td colspan='2' style='background-color: #dddfff;'>Good</td>
					<td colspan='5' style='background-color: #dddfff;'>No Good</td>
					<td rowspan='2' style='background-color: #dddfff;  padding: 0px 3px 0px 3px;'>Time Finish</td>
					<td rowspan='2' colspan='3' style='background-color: #dddfff;'>FINAL JUDGEMENT</td>
					<td style='background-color: #dddfff;'>PROGRAM NAME</td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>Normal Rank 2/B</td>
					<td style='background-color: #dddfff;'>Special Rank 1/A</td>
					<td style='background-color: #dddfff;'>Charac/ Combine C1-C9 MOS</td>
					<td style='background-color: #dddfff;'>Open/ Short C10 MOS</td>
					<td style='background-color: #dddfff;'>Retest Lane/ Box</td>
					<td style='background-color: #dddfff;'>Others: (Dropped /Missing etc.)</td>
					<td style='width: 50px; background-color: #dddfff;'>NG2 Yield</td>
					<td style='background-color: #dddfff;'>REMARKS</td>
				  </tr>
				  <tr>
					<td rowspan='3'><input id='ng2start' tabindex='9' name='ng2start2' class='texthieght' type='text' onkeypress='return isNumberKey(event)'  minlength='4' maxlength='4' placeholder='hhmm' /></td>
					<td style='background-color: #dddfff;'>Act</td>
					<td><input tabindex='10' id='ng2actnrank2b' name='ng2actnrank2b3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='11' id='ng2actsrank1a' name='ng2actsrank1a3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='12' id='ng2actccc1c9' name='ng2actccc1c93' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='13' id='ng2actosc10' name='ng2actosc103' class='textwidth' onkeypress='return isNumberKey(event)' maxlength='6'></td>
					<td><input tabindex='14' id='ng2lanebox' name='ng2lanebox3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='15' id='ng2dropped' name='ng2dropped3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='dropped'/></td>
					<td></td>
					<td rowspan='3'><input id='ng2stop' tabindex='25' name='ng2stop3' onfocus='checkqtyng2();' class='texthieght' type ='text' onkeypress='return isNumberKey(event)' minlength='4' maxlength='4' placeholder='hhmm' /></td>
					
					<td><input name='ng2normlot3' value='0' type='hidden'><input type='checkbox' name='ng2normlot3' value='1' /><br>Normal lot</td>
					<td><input name='ng2psidis3' value='0' type='hidden'><input id='psidis' type='checkbox' name='ng2psidis3' value='1' onclick='chkd2()' /><br>PSI discrepancy</td>
					<td><input name='ng21yld3' value='0' type='hidden'><input id='100%yld' type='checkbox' name='ng21yld3' value='1' onclick='chkd()' /><br>100% yield</td>
					<td><input id='ng2progname' type='text' name='ng2progname' minlength='4' maxlength='10' placeholder='PROGRAM NAME' /></td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>HD</td>
					<td><input tabindex='17' id='ng2hdnrank2b' name='ng2hdnrank2b3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='18' id='ng2hdsrank1a' name='ng2hdsrank1a3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='19' id='ng2hdccc1c9' name='ng2hdccc1c93' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='20' id='ng2hdosc10' name='ng2hdosc103' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td></td>
					<td><input tabindex='15' placeholder='missing' id='ng2imiss' name='ng2imiss3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td rowspan='2'><input id='ng2yield' name='ng2yield3' type='text' style='height: 85px; width: 90%; text-align: center; background-color: #d0d0d0;' onkeypress='return isNumberKey2(event)' readonly maxlength='6'/></td>
					
					<td><input name='ng2missdev3' value='0' type='hidden'><input type='checkbox' name='ng2missdev3' value='1' /><br>Missing devices</td>
					<td><input name='ng2countdis3' value='0' type='hidden'><input type='checkbox' name='ng2countdis3' value='1' /><br>Counter discrepancy</td>
					<td rowspan='2'>Others<input name='ng2others3' type='text' style='height: 70px; width: 90%;'></td>
					<td rowspan='3'><textarea  tabindex='42' type='text' class='textarea' name='ng2remarks3' ></textarea></td>
				  </tr>
				  <tr>
					<td style='background-color: #dddfff;'>TS</td>
					<td><input tabindex='21' id='ng2tsnrank2b' name='ng2tsnrank2b3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' /></td>
					<td><input tabindex='22' id='ng2tssrank1a' name='ng2tssrank1a3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='23' id='ng2tsccc1c9' name='ng2tsccc1c93' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td><input tabindex='24' id='ng2tsosc10' name='ng2tsosc103' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6'/></td>
					<td></td>
					<td><input tabindex='24' id='ng2excess' name='ng2excess3' class='textwidth' type='text' onkeypress='return isNumberKey(event)' maxlength='6' placeholder='excess'/></td>
					<td><input name='ng2exdev3' value='0' type='hidden'><input type='checkbox' name='ng2exdev3' value='1' /><br>Excess devices</td>
					<td><input name='ng2lyld3' value='0' type='hidden'><input type='checkbox' name='ng2lyld3' value='1' /><br>Low yield</td>
				  </tr>
				</table>
				
				<div class='rules' >
				<table>
					<caption style='border: 1px solid black; background-color: #dddfff;'><b>FRACTIONS</b></caption>
					<tr>
						<th style='background-color: #dddfff;'>stdQty</th>
						<th style='background-color: #dddfff;'>no. Tubes</th>
						<th style='background-color: #dddfff;'>Qty</th>
						<th style='background-color: #dddfff;'>F1</th>
						<th style='background-color: #dddfff;'>F2</th>
						<th style='background-color: #dddfff;'>F3</th>
						<th style='background-color: #dddfff;'>F4</th>
						<th style='background-color: #dddfff;'>F5</th>
						<th style='background-color: #dddfff;'>F6</th>
						<th style='background-color: #dddfff;'>F7</th>
						<th style='background-color: #dddfff;'>F8</th>
						<th style='background-color: #dddfff;'>F9</th>
						<th style='background-color: #dddfff;'>F10</th>
					</tr>
					<tr>
						<td><input type='text' id='stdQty' name='stdQty' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='tubes' name='tubes' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='quantity' name='quantity' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn1' name='frctn1' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn2' name='frctn2' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn3' name='frctn3' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn4' name='frctn4' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn5' name='frctn5' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn6' name='frctn6' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn7' name='frctn7' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn8' name='frctn8' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn9' name='frctn9' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
						<td><input type='text' id='frctn10' name='frctn10' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px;'/></td>
					</tr>
				</table>
					
				<hr>
				<input id='initvalcbx63' type='text' name='initlead' value='0' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px; display: none;'/><input id='initcbx63' onclick='initshowtxtbx()' type='checkbox'/>63 LEAD
				<input id='initvalcbx64' type='text' name='initmarkdefect' value='0' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px; display: none;'/><input id='initcbx64' onclick='initshowtxtbx()' type='checkbox'/>64 MARKING DEFECT
				<input id='initvalcbx65' type='text' name='initts2dropped' value='0' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px; display: none;'/><input id='initcbx65' onclick='initshowtxtbx()' type='checkbox'/>65 DROPPED
				<input id='initvalcbx75' type='text' name='initpurgeBin' value='0' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px; display: none;'/><input id='initcbx75' onclick='initshowtxtbx()' type='checkbox'/>75 PURGE BIN
				<input id='initvalcbx77' type='text' name='initpreform' value='0' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px; display: none;'/><input id='initcbx77' onclick='initshowtxtbx()' type='checkbox'/>77 PREFORM DEFECT
				<input id='initvalcbx95' type='text' name='initrprSam' value='0' onkeypress='return isNumberKey(event)' maxlength='5' style='width: 40px; display: none;'/><input id='initcbx95' onclick='initshowtxtbx()' type='checkbox'/>95 REPAIR SAMPLE
				
				<h3><hr>SPC RULE</h3>
				<input type='checkbox' name='rule1' value='Rule 1' disabled/>Rule 1
				<input type='checkbox' name='rule2' value='Rule 2' disabled/>Rule 2
				<input type='checkbox' name='rule3' value='Rule 3' disabled/>Rule 3
				<input type='checkbox' name='rule4' value='Rule 4' disabled/>Rule 4
				<input type='checkbox' name='rule5' value='Rule 5' disabled/>Rule 5
				<input type='checkbox' name='rule6' value='Rule 6' disabled/>Rule 6
				<input type='checkbox' name='rule7' value='Rule 7' disabled/>Rule 7
				<input type='checkbox' name='rule8' value='Rule 8' disabled/>Rule 8
				<input type='checkbox' name='rule9' value='Rule 9' disabled/>Rule 9
				<input type='checkbox' name='rule10' value='Rule 10' disabled/>Rule 10
				<br>
				<input type='checkbox' name='rule11' value='Rule 11' disabled/>Rule 11
				<input type='checkbox' name='rule12' value='Rule 12' disabled/>Rule 12
				<input type='checkbox' name='rule13' value='Rule 13' disabled/>Rule 13
				<input type='checkbox' name='rule14' value='Rule 14' disabled/>Rule 14
				<input type='checkbox' name='rule15' value='Rule 15' disabled/>Rule 15
				<input type='checkbox' name='rule16' value='Rule 16' disabled/>Rule 16
				<input type='checkbox' name='rule17' value='Rule 17' disabled/>Rule 17
				<input type='checkbox' name='rule18' value='Rule 18' disabled/>Rule 18
				<input type='checkbox' name='rule19' value='Rule 19' disabled/>Rule 19
				<input type='checkbox' name='rule20' value='Rule 20' disabled/>Rule 20
				</div>
				<br>
				<div style='text-align: center; color: maroon;'>";
				if(!empty($_SESSION['Msg'])) { echo $_SESSION['Msg']; };
				unset($_SESSION['Msg']);
				echo "</div>
				<div class='bttncontainer'>
				<div id='fla' style='margin-right:167px;'>
				FLA / Product: <select  tabindex='43' id='flaUser' name='flausername' style='margin-top:7px; width: 185px;' >
				<option value='' disabled selected>Select name</option>
				<option value='Ariel.Burbos'>Ariel.Burbos</option>
				<option value='Samuel Jr..Ordinado'>Samuel Jr..Ordinado</option>
				<option value='Jervie.Cordova'>Jervie.Cordova</option>
				<option value='Joel.Apilado'>Joel.Apilado</option>
				<option value='Mariejoy.Tango'>Mariejoy.Tango</option>
				<option value='Jevin.Aripal'>Jevin.Aripal</option>Christian.Ancheta
				<option value='Christian.Ancheta'>Christian.Ancheta</option>
				</select>
				Password: <input tabindex='44' type='password' id='flaPass' name='flapassword' >
				</div>
				<br>
				<input class='mybutton' id='submit' name='submit' type='button' value='OK'>
				<input class='mybutton' onclick=location.href='home.php' name='reset' type='button' value='RESET'></div>";
	}

}else{

	echo "<div class='text'>
	<table class='table' style='width: 800px;'>
		<tr>
			<td class='td2'>
				Lot number:
			</td>
			<td class='td2'>
				<input tabindex='5' class='txtInput' id='txtInput2' type = 'text' name='lotnumber' onblur='query()' onkeypress='return isNumberKey(event)' maxlength='10' style='width: 180px;'>
				<input id='subquery' type='submit' value='submit' style='display: none;'/>
				
			</td>
			<td class='td2'>
				Process name:
			</td>
			<td class='td2'>
				<select name='processname' style='width: 130px;' >
				<option value='' disabled selected>Select process</option>
				<option value='TESTING 1'>TESTING 1</option>
				<option value='TESTING 2'>TESTING 2</option>
				<option value='TESTING 3'>TESTING 3</option>
				<option value='TESTING 4'>TESTING 4</option>
				<option value='TESTING 5'>TESTING 5</option>
				<option value='TESTING 6'>TESTING 6</option>
				<option value='7060 DVBE'>7060 DVBE</option>
				<option value='7080 O/S'>7080 O/S</option>
				</select>
				Year/Month:",
				date('y.m.d');
			echo "</td>
				
		</tr>
		<tr>
			<td class='td2'>
				Family name:
			</td>
			<td class='td2'>
				<input tabindex='6' id='famname' class='famInput' type='text' name='famname' maxlength='25' style='width: 180px;' >
			</td>
			<td class='td2'>
				Group:
			</td>
			<td class='td2'>
				<select name='shift' style='width: 130px;' >
				<option value='' disabled selected>Select group</option>
				<option value='GROUP A'>GROUP A</option>
				<option value='GROUP B'>GROUP B</option>
				<option value='GROUP C'>GROUP C</option>
				</select>
				Time:
				<content id='txt'></content>
			</td>
		</tr>							
		<tr>
			<td class='td2'>
				Total qty.:
			</td>
			<td class='td2'>
				<input tabindex='7' type='text' id='ttlqty' name='ttlqty' onkeypress='return isNumberKey(event)' maxlength='10' style='width: 50px;' >
				
			</td>
			<td class='td2'>
				Tester no.:
			</td>
			<td class='td2'>
				<input type='text' list='testersid' id='testerno' name='testerno' style='width: 125px;'/>
				<datalist id='testersid'>",
				include('testerid.php');
				echo "</datalist>
			</td>
		</tr>
		<tr>
			<td class='td2'>
				Plate no.:
			</td>
			<td class='td2'>
				<input tabindex='8' type='text' name='plteno' style='width: 50px;' maxlength='5' >
				
			</td>
			<td class='td2'>
				Handler no.:
			</td>
			<td class='td2'>
				<input type='text' list='handler' id='handlerno' name='handlerno' style='width: 125px;'/>
				<datalist id='handler'>",
				include('handlerno.php');
				echo "</datalist>
			</td>
		</tr>
		
		</table>
		<div style='text-align: center; color: maroon;'>";
				if(!empty($_SESSION['Msg'])) { echo $_SESSION['Msg']; };
				unset($_SESSION['Msg']);
				echo "</div>
		</div>";

}

?>