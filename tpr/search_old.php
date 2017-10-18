<!DOCTYPE html>
<html>
    <head>
        
		<meta http-equiv="X-UA-Compatible" content="IE=Edge;IE=9;IE=8;IE=7">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
        <title>TESTING PRODUCTION RECORD</title>
    </head>
    
	<div class="navigationbarsearch">
	<div class="navibutton">
	<button class="mybutton" onclick="location.href='http://10.153.214.138:81/Default.aspx'">PROMIS</button>
	<button class="mybutton" onclick="location.href='home.php'">TPR</button>
	</div>
	<div class="">

	<body>

				<div class="formcontainersearch">
				<h2>SEARCH</h2>
			<form action="" method="post">
				<div class="text">
					Lot number:<input type="text" name="lotnumber" onkeypress="return isNumberKey(event)" maxlength="10" style="width: 100px; margin-left:20px;" placeholder="search">
					<button id='submit' type="submit" class="search" name="search" style="width:50px;height:40px; margin-left:5px; margin-top:-10px;"/><img src="img/search.png" style="width:37px;height:33px; margin-left:-3px; margin-top:-5px;"/></button>
					
					<span style='margin-left: 50px;'>Filter:<select name='categ' onchange="showfield(this.options[this.selectedIndex].value)">
					<option value='all'>All</option>
					<option value='initial'>Initial Test</option>
					<option value='ng'>NG Retest</option>
					<option value='ng2'>NG Retest 2</option>
					</select></span>
					<br>
				</div>
				<br>
				<div >
				<table id='initial' style="width: 2400px;" class="tablesearch">
				  <tr>
					<td rowspan="3"><b>LOT NUMBER</b></td>
					<td rowspan="3"><b>PROCESS NAME</b></td>
					<td rowspan="3"><b>HANDLER NO</b></td>
					<td rowspan="3"><b>TESTER NO</b></td>
					<td rowspan="3"><b>DATE / TIME</b></td>
					<td rowspan="3"><b>SHIFT</b></td>
					<td rowspan="3"><b>OPERATOR</b></td>
					<td rowspan="3"><b>FAMILY NAME</b></td>
					<td rowspan="3"><b>TOTAL QTY</b></td>
					<td rowspan="3"><b>PLATE NO</b></td>
					<td colspan="20"><b>INITIAL TEST</b></td>
					<td colspan="14"><b>FINAL JUDGEMENT</b></td>
					<td rowspan="3"><b>PROGRAM NAME</b></td>
					<td rowspan="3"><b>REMARKS</b></td>
				  </tr>
				  <tr>
					<td rowspan="2" style="padding: 0px 5px 0px 5px;"><b>Time start</b></td>
					<td colspan="6"><b>Good</b></td>
					<td colspan="12"><b>No Good</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Time Finish</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Lead</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Market Defect</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Dropped</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Purge Bin</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Preform Defect</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Repair Sample</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Normal lot</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Missing Devices</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Excess Devices</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>PSI Discrepancy</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Counter Discrepancy</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Low Yield</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>100% Yield</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Others</b></td>
				  </tr>
				  <tr>
				  	<td><b>Act Normal Rank 2/B</b></td>
					<td><b>HD Normal Rank 2/B</b></td>
					<td><b>TS Normal Rank 2/B</b></td>
					<td><b>Act Special Rank 1/A</b></td>
					<td><b>HD Special Rank 1/A</b></td>
					<td><b>TS Special Rank 1/A</b></td>
					<td><b>Act Charac/ Combine C1-C9 MOS</b></td>
					<td><b>HD Charac/ Combine C1-C9 MOS</b></td>
					<td><b>TS Charac/ Combine C1-C9 MOS</b></td>
					<td><b>Act Open/ Short C10 MOS</b></td>
					<td><b>HD Open/ Short C10 MOS</b></</td>
					<td><b>TS Open/ Short C10 MOS</b></</td>
					<td><b>Retest Lane/ Box</b></td>
					<td><b>Missing</b></td>
					<td><b>Dropped</b></td>
					<td><b>Excess</b></td>
					<td><b>PSI Defect</b></td>
					<td><b>Initial Yield</b></td>
				  </tr>
				  
				  <?php
include('searchfile.php');

?>
				</table>
				
				<table id='ngretest'style="width: 2400px;" class="tablesearch">
				  <tr>
					<td rowspan="3"><b>LOT NUMBER</b></td>
					<td rowspan="3"><b>FINAL YIELD</b></td>
					<td rowspan="3"><b>PROCESS NAME</b></td>
					<td rowspan="3"><b>HANDLER NO</b></td>
					<td rowspan="3"><b>TESTER NO</b></td>
					<td rowspan="3"><b>DATE / TIME</b></td>
					<td rowspan="3"><b>SHIFT</b></td>
					<td rowspan="3"><b>OPERATOR</b></td>
					<td rowspan="3"><b>FAMILY NAME</b></td>
					<td rowspan="3"><b>TOTAL QTY</b></td>
					<td rowspan="3"><b>PLATE NO</b></td>
					<td colspan="19"><b>NG RETEST</b></td>
					<td colspan="14"><b>FINAL JUDGEMENT</b></td>
					<td rowspan="3"><b>PROGRAM NAME</b></td>
					<td rowspan="3"><b>REMARKS</b></td>
				  </tr>
				  <tr>
					<td rowspan="2" style="padding: 0px 5px 0px 5px;"><b>Time start</b></td>
					<td colspan="6"><b>Good</b></td>
					<td colspan="11"><b>No Good</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Time Finish</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Lead</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Market Defect</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Dropped</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Purge Bin</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Preform Defect</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Repair Sample</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Normal lot</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Missing Devices</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Excess Devices</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>PSI Discrepancy</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Counter Discrepancy</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Low Yield</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>100% Yield</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Others</b></td>
				  </tr>
				  <tr>
				  	<td><b>Act Normal Rank 2/B</b></td>
					<td><b>HD Normal Rank 2/B</b></td>
					<td><b>TS Normal Rank 2/B</b></td>
					<td><b>Act Special Rank 1/A</b></td>
					<td><b>HD Special Rank 1/A</b></td>
					<td><b>TS Special Rank 1/A</b></td>
					<td><b>Act Charac/ Combine C1-C9 MOS</b></td>
					<td><b>HD Charac/ Combine C1-C9 MOS</b></td>
					<td><b>TS Charac/ Combine C1-C9 MOS</b></td>
					<td><b>Act Open/ Short C10 MOS</b></td>
					<td><b>HD Open/ Short C10 MOS</b></</td>
					<td><b>TS Open/ Short C10 MOS</b></</td>
					<td><b>Retest Lane/ Box</b></td>
					<td><b>Missing</b></td>
					<td><b>Dropped</b></td>
					<td><b>Excess</b></td>
					<td><b>Initial Yield</b></td>
				  </tr>
				  
				  <?php
include('searchfileng.php');

?>
				</table>
				
				<table id='ngretest2' style="width: 2400px;" class="tablesearch">
				  <tr>
					<td rowspan="3"><b>LOT NUMBER</b></td>
					<td rowspan="3"><b>FINAL YIELD</b></td>
					<td rowspan="3"><b>PROCESS NAME</b></td>
					<td rowspan="3"><b>HANDLER NO</b></td>
					<td rowspan="3"><b>TESTER NO</b></td>
					<td rowspan="3"><b>DATE / TIME</b></td>
					<td rowspan="3"><b>SHIFT</b></td>
					<td rowspan="3"><b>OPERATOR</b></td>
					<td rowspan="3"><b>FLA</b></td>
					<td rowspan="3"><b>FAMILY NAME</b></td>
					<td rowspan="3"><b>TOTAL QTY</b></td>
					<td rowspan="3"><b>PLATE NO</b></td>
					<td colspan="19"><b>NG RETEST 2</b></td>
					<td colspan="14"><b>FINAL JUDGEMENT</b></td>
					<td rowspan="3"><b>PROGRAM NAME</b></td>
					<td rowspan="3"><b>REMARKS</b></td>
				  </tr>
				  <tr>
					<td rowspan="2" style="padding: 0px 5px 0px 5px;"><b>Time start</b></td>
					<td colspan="6"><b>Good</b></td>
					<td colspan="11"><b>No Good</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Time Finish</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Lead</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Market Defect</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Dropped</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Purge Bin</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Preform Defect</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Repair Sample</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Normal lot</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Missing Devices</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Excess Devices</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>PSI Discrepancy</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Counter Discrepancy</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Low Yield</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>100% Yield</b></td>
					<td rowspan="2" style="padding: 0px 3px 0px 3px;"><b>Others</b></td>
				  </tr>
				  <tr>
				  	<td><b>Act Normal Rank 2/B</b></td>
					<td><b>HD Normal Rank 2/B</b></td>
					<td><b>TS Normal Rank 2/B</b></td>
					<td><b>Act Special Rank 1/A</b></td>
					<td><b>HD Special Rank 1/A</b></td>
					<td><b>TS Special Rank 1/A</b></td>
					<td><b>Act Charac/ Combine C1-C9 MOS</b></td>
					<td><b>HD Charac/ Combine C1-C9 MOS</b></td>
					<td><b>TS Charac/ Combine C1-C9 MOS</b></td>
					<td><b>Act Open/ Short C10 MOS</b></td>
					<td><b>HD Open/ Short C10 MOS</b></</td>
					<td><b>TS Open/ Short C10 MOS</b></</td>
					<td><b>Retest Lane/ Box</b></td>
					<td><b>Missing</b></td>
					<td><b>Dropped</b></td>
					<td><b>Excess</b></td>
					<td><b>Initial Yield</b></td>
				  </tr>
				  
				  <?php
include('searchfileng2.php');

?>
				</table>
				
				</div>
				<br>
			</form>
			</div>
		</div>
		<div id="footersearch"><p style="text-align: center; color: white; padding: 15px; width:auto;">&#9400; TEST APPLICATIONS ENGG.</p></div>
		
<script>		
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function showfield(name){
	if(name=='initial'){
		document.getElementById('initial').style.display = '';
		document.getElementById('ngretest').style.display = 'none';
		document.getElementById('ngretest2').style.display = 'none';
	}else if(name=='ng'){
		document.getElementById('initial').style.display = 'none';
		document.getElementById('ngretest').style.display = '';
		document.getElementById('ngretest2').style.display = 'none';
	}else if(name=='ng2'){
		document.getElementById('initial').style.display = 'none';
		document.getElementById('ngretest').style.display = 'none';
		document.getElementById('ngretest2').style.display = '';
	}else{
		document.getElementById('initial').style.display = '';
		document.getElementById('ngretest').style.display = '';
		document.getElementById('ngretest2').style.display = '';
	}
}

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
function addRowHandlers() {
    var table = document.getElementById("tableId");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var currentRow = table.rows[i];
        var createClickHandler = 
            function(row) 
            {
                return function() { 
                                        var cell = row.getElementsByTagName("td")[0];
                                        var id = cell.innerHTML;
                                        //alert("id:" + id);
										//alert(id);
										document.cookie = ("compid", id);
										document.getElementById("companyId").value = getcookie();
										document.getElementById("form").action = 'studundercomp.php';
										document.getElementById("form").submit();
                                 };
            };

        currentRow.onclick = createClickHandler(currentRow);
    }
}	
window.onload = addRowHandlers();

</script>
    </body>
</html>