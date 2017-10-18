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
				<h2>SEARCH</h2>
			<form id="" action="" method="POST">
				<div class="text">
					Lot number:<input type="text" name="lotnumber" onkeypress="return isNumberKey(event)" maxlength="10" style="width: 100px; margin-left:20px;" placeholder="search">
					<button id='submit' type="submit" class="search" name="search" style="width:50px;height:40px; margin-left:5px; margin-top:-10px;"/><img src="img/search.png" style="width:37px;height:33px; margin-left:-3px; margin-top:-5px;"/></button>
					
					<br>
				</div>
				<br>
				<div class="tooltip">
				<span class="tooltiptext">Click each row to view data</span>
				<table id='initial'>
					<tr>
					<td id='tdsearch'><b>LOT NUMBER</b></td>
					<td id='tdsearch'><b>PROCESS NAME</b></td>
					<td id='tdsearch'><b>HANDLER NO</b></td>
					<td id='tdsearch'><b>TESTER NO</b></td>
					<td id='tdsearch'><b>DATE / TIME</b></td>
					<td id='tdsearch'><b>SHIFT</b></td>
					<td id='tdsearch'><b>OPERATOR</b></td>
					<td id='tdsearch'><b>FAMILY NAME</b></td>
					<td id='tdsearch'><b>TOTAL QTY</b></td>
					<td id='tdsearch'><b>PLATE NO</b></td>
					<td id='tdsearch'><b>INITIAL YIELD</b></td>
					<td id='tdsearch'><b>PROGRAM NAME</b></td>
					<td id='tdsearch'><b>REMARKS</b></td>
				 	</tr>		  
					<?php
					include('summary.php');

					?>
				</table>
				
				</div>
				<br>
				</form>
				<form id="form" action="" method="POST">
				<input type="text" id="lotSummID" name="lotSummID" style="display: none;"/>
				</form>
			</div>
		
		<div style="width: 1040px;" id="footer"><p style="text-align: center; color: white; padding: 15px; width:auto;">&#9400; TEST APPLICATIONS ENGG.</p></div>
	</div>
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
    var table = document.getElementById("initial");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var currentRow = table.rows[i];
        var createClickHandler = 
            function(row) 
            {
                return function() { 
                                        var cell = row.getElementsByTagName("td")[0];
                                        var id = cell.innerHTML;
										if (id == "<b>LOT NUMBER</b>"){
											return "";
										}else{
											document.cookie = ("lotID", id);
											document.getElementById("lotSummID").value = getcookie();
											document.getElementById("form").action = 'lotinfo.php';
											document.getElementById("form").submit();
										}
                                        //alert("id:" + id);
										//alert(id);
										
                                 };
            };

        currentRow.onclick = createClickHandler(currentRow);
    }
}	
window.onload = addRowHandlers();

</script>
    </body>
</html>