<?php
include('dbcon.php');
$q = strval($_GET['q']);

if (!empty($_GET['q'])){
$sql="SELECT * FROM ng_retest WHERE lot_no = '".$q."' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn,$sql);

$sql2="SELECT * FROM init_test WHERE lot_no = '".$q."' ORDER BY id DESC LIMIT 1";
$result2 = mysqli_query($conn,$sql2);

	if ($result->num_rows > 0) {
		while($row = mysqli_fetch_array($result2)) {
			$ttlqty = $row['total_qty'];
			$actnrank2b2 = $row['act_n_rank2b'];
			$actsrank1a2 = $row['act_s_rank1a'];
		}
		while($row = mysqli_fetch_array($result)) {
			//GOOD
			$actnrank2b = $row['act_n_rank2b'];
			$actsrank1a = $row['act_s_rank1a'];
			$ttlP = $actnrank2b2 + $actsrank1a2 + $actnrank2b + $actsrank1a;
			// NO GOOD
			$charac = $row['act_cc_c1c9mos'];
			$os = $row['act_os_c10mos'];
			$rtlane = $row['retest_lanebox'];
			$rtQty = $charac + $os + $rtlane;

	echo "<table class='table' style='width: 800px;'>
			<tr>
				<td class='td2'>
					Lot number:
				</td>
				<td class='td2'>
					<input class='txtInput' id='txtInput2' type = 'text' name='lotnumber' onblur='query()' onkeypress='return isNumberKey(event)' maxlength='10' style='width: 180px;' value='$row[lot_no]'>
					<input id='subquery' type='submit' value='submit' style='display: none;'/>
				</td>
				<td class='td2'>
					Process name:
				</td>
				<td class='td2'>
					<input type='hidden' name='processname' value='$row[process_name]' readonly/>
					<select id='procname' name='processname' style='width: 125px; background-color: #e1e1e1;' disabled />
					<option value='$row[process_name]' selected>$row[process_name]</option>
					<option value='testing 1'>TESTING 1</option>
					<option value='testing 2'>TESTING 2</option>
					<option value='testing 3'>TESTING 3</option>
					<option value='testing 4'>TESTING 4</option>
					<option value='testing 5'>TESTING 5</option>
					<option value='testing 6'>TESTING 6</option>
					<option value='7060 DVBE'>7060 DVBE</option>
					<option value='7080 O/S'>7080 O/S</option>
					</select>
					<input name='initttlqty' value='$ttlqty' style='display: none;' readonly />
					<input name='ttlP' value='$ttlP' style='display: none;' readonly />
					Year/Month:",
					date('y.m.d');
				echo "</td>
					
			</tr>
			<tr>
				<td class='td2'>
					Family name:
				</td>
				<td class='td2'>
					<input tabindex='2' id='famname' type='text' name='famname' maxlength='25' style='width: 180px; background-color: #e1e1e1;' value='$row[family_name]' readonly />
				</td>
				<td class='td2'>
					Group:
				</td>
				<td class='td2'>
					<input type='hidden' name='shift' value='$row[shifts]' readonly/>
					<select type='text'  tabindex='5' id='shift' name='shift' style='width: 125px; background-color: #e1e1e1;' disabled />
					<option value='$row[shifts]' selected>$row[shifts]</option>
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
					<input tabindex='4' type='text' id='ttlqty' name='ttlqty' onkeypress='return isNumberKey(event)' maxlength='10' style='width: 50px; background-color: #e1e1e1;' value='$rtQty' readonly />
				</td>
				<td class='td2'>
					Tester no.:
				</td>
				<td class='td2'>
					<input tabindex='3' type='text' list='testersid' id='testerno' name='testerno' style='width: 125px; background-color: #e1e1e1;' value='$row[tester_no]' readonly />
				</td>
			</tr>
			<tr>
				<td class='td2'>
					Plate no.:
				</td>
				<td class='td2'>
					<input tabindex='6' id='plteno' type='text' name='plteno' style='width: 50px; background-color: #e1e1e1;' maxlength='5' value='$row[plate_no]' readonly />
				</td>
				<td class='td2'>
					Handler no.:
				</td>
				<td class='td2'>
					<input type='text' tabindex='1' type='text' list='handler' id='handlerno' name='handlerno' style='width: 125px;  background-color: #e1e1e1;' value='$row[handler_no]' readonly />
				</td>
			</tr>
			<tr>
				<td class='td2'>
					<input id='mlotchk' type='checkbox' disabled/>With Mother Lot:
				</td>
				<td class='td2'>
					<input type='text' id='mlot' name='mlot' onkeypress='return isNumberKey(event)' disabled/>
				</td>
			</tr>
			<tr>
				<td colspan='4' class='td2'><hr></td>
			</tr>
			<tr>
			<td id='initstyle' class='td2'><input name='test' onclick='showfield()' type='radio' value='0'>INITIAL TEST</td>
			<td id='ngstyle' class='td2'><input name='test' onclick='showfield2()' type='radio' value='R'>NG RETEST</td>
			<td id='ng2style' class='td2'><input name='test' onclick='showfield3()' type='radio' value='R2' checked>NG RETEST 2</td>
			</tr>
			</table>
			</div>";


		}
		}else {
			echo "<table class='table' style='width: 800px;'>
			<tr>
				<td class='td2'>
					Lot number:
				</td>
				<td class='td2'>
					<input class='txtInput' id='txtInput2' type = 'text' name='lotnumber' onblur='query()' onkeypress='return isNumberKey(event)' maxlength='10' style='width: 180px; color: red;' placeholder='NO NG RETEST YET' />
					<input id='subquery' type='submit' value='submit' style='display: none;'/>
				</td>
				<td class='td2'>
					Process name:
				</td>
				<td class='td2'>
					<select id='procname' name='processname' style='width: 130px;' disabled>
					<option value='' disabled selected>Select process</option>
					<option value='testing 1'>TESTING 1</option>
					<option value='testing 2'>TESTING 2</option>
					<option value='testing 3'>TESTING 3</option>
					<option value='testing 4'>TESTING 4</option>
					<option value='testing 5'>TESTING 5</option>
					<option value='testing 6'>TESTING 6</option>
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
					<input  tabindex='2' id='famname' type='text' onfocus='clr()' name='famname' maxlength='25' style='width: 180px;' readonly />
				</td>
				<td class='td2'>
					Group:
				</td>
				<td class='td2'>
					<select  tabindex='5' id='shift' name='shift' style='width: 130px;' disabled />
					<option></option>
					<option value='group a'>GROUP A</option>
					<option value='group b'>GROUP B</option>
					<option value='group c'>GROUP C</option>
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
					<input tabindex='4' type='text' id='ttlqty' name='ttlqty' onkeypress='return isNumberKey(event)' maxlength='10' style='width: 50px;' readonly />
				</td>
				<td class='td2'>
					Tester no.:
				</td>
				<td class='td2'>
					<input tabindex='3' type='text' list='testersid' id='testerno' name='testerno' style='width: 125px;' readonly />
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
					<input tabindex='6' id='plteno' type='text' name='plteno' style='width: 50px;' maxlength='5' readonly />
				</td>
				<td class='td2'>
					Handler no.:
				</td>
				<td class='td2'>
					<input  tabindex='1' type='text' list='handler' id='handlerno' name='handlerno' style='width: 125px;' readonly />
					<datalist id='handler'>",
					include('handlerno.php');
					echo "</datalist>
				</td>
			</tr>
			<tr>
				<td colspan='4' class='td2'><hr></td>
			</tr>
			<tr>
			<td id='initstyle' class='td2'><input name='test' onclick='showfield()' type='radio' value='0' />INITIAL TEST</td>
			<td id='ngstyle' class='td2'><input name='test' onclick='showfield2()' type='radio' value='R' />NG RETEST</td>
			<td id='ng2style' class='td2'><input name='test' onclick='showfield3()' type='radio' value='R2' checked />NG RETEST 2</td>
			</tr>
			</table>
			</div>";
		}
}
mysqli_close($conn);
?>
