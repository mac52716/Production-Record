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
	<button class="mybutton" onclick="location.href='index.php'">TPR</button>
	</div>
	<div class="">

	<body>

				<div class="formcontainer">
				<h2>SEARCH</h2>
			<form action="" method="post">
				<div class="text">
					Lot number:<input type="text" name="lotnumber" onkeypress="return isNumberKey(event)" maxlength="10" style="width: 100px; margin-left:20px;" placeholder="search">
					<button id='submit' type="submit" class="search" name="search" style="width:50px;height:40px; margin-left:5px; margin-top:-10px;"/><img src="img/search.png" style="width:37px;height:33px; margin-left:-3px; margin-top:-5px;"/></button>
					
					<span style='margin-left: 50px;'>Category:<select name='categ' onchange="showfield(this.options[this.selectedIndex].value)">
					<option value='all'>All</option>
					<option value='initial'>Initial Test</option>
					<option value='ng'>NG Retest</option>
					<option value='ng2'>NG Retest 2</option>
					</select></span>
					<br>
				</div>
				<br>
				<div>
				<table id='initial' style="width: 500px;" class="tablesearch">
				  <tr>
					<td><b>LOT NUMBER</b></td>
					<td><b>INITIAL YIELD</b></td>
					<td><b>RETEST YIELD</b></td>
					<td><b>RETEST 2 YIELD</b></td>
					<td><b>FINAL YIELD</b></td>
				  </tr>
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
</script>
    </body>
</html>