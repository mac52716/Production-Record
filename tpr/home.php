<?php
session_start();
?>	
<!DOCTYPE html>
<html>
    <head>
		<!--Programmer: Victor Nacino-->
		<meta http-equiv="X-UA-Compatible" content="IE=Edge;IE=9;IE=8;IE=7">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="jquery.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <title>TESTING PRODUCTION RECORD</title>
    </head>
    
	<div class="navigationbar">
	<div class="navibutton">
	<button class="mybutton" onclick="location.href='http://10.153.214.200:81/Default.aspx'">PROMIS</button>
	<button class="mybutton" onclick="location.href='/psir/index.php'">PSIR</button>
	<button class="mybutton" onclick="location.href='/gonogo/index.php'">GONOGO</button>
	<button class="mybutton" onclick="location.href='search.php'">SEARCH</button>
	</div>
	</div>
	

	<body>
	<div class="maincontent">

				<div class="formcontainer">
				<h2>TESTING PRODUCTION RECORD</h2><p style="width: 500px; position: relative; bottom: 50px; left: 500px; text-align: right;">
				<?php
				if(!empty($_SESSION["login_user"])) //check if session exists
				{
				   echo $_SESSION["login_user"];
				}
				else{
					header("Location:index.php");
					exit;
				}
				?>
				<button style="position: relative; bottom: 10px;" class="mybutton" onclick="location.href='logout.php'">Logout</button></p>
			<form id="formsubmit" action="" method="post">
						<?php
						include('indexselection.php');
						?>
				
			</form>
			</div>
		<div id="footer"><p style="text-align: center; color: white; padding: 15px;">&#9400; TEST APPLICATIONS ENGG.</p></div>
		</div>

<script>		
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function isNumberKey2(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && charCode > 46 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function startTime() {
	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	m = checkTime(m);
	s = checkTime(s);
	document.getElementById('txt').innerHTML =
	h + ":" + m + ":" + s;
	var t = setTimeout(startTime, 500);
}

function checkTime(i) {
	if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
	return i;
}

function checkqtyinit(){
	
	var ttlqty = document.getElementById('ttlqty').value|0;
	var Nrnk2b = document.getElementById('initactnrank2b').value|0;
	var Srnk1a = document.getElementById('initactsrank1a').value|0;
	var Charac = document.getElementById('initactccc1c9').value|0;
	var Osc10 = document.getElementById('initactosc10').value|0;
	
	var ItLanebox = document.getElementById('initlanebox').value|0;
	var ItDrop = document.getElementById('initdropped').value|0;
	var Itmiss = document.getElementById('initimiss').value|0;
	var ItIy = document.getElementById('inityield').value|0;
	
	var stdQty = document.getElementById('stdQty').value|0;
	var tubes = document.getElementById('tubes').value|0;
	var quantity = document.getElementById('quantity').value|0;
	var frctn1 = document.getElementById('frctn1').value|0;
	var frctn2 = document.getElementById('frctn2').value|0;
	var frctn3 = document.getElementById('frctn3').value|0;
	var frctn4 = document.getElementById('frctn4').value|0;
	var frctn5 = document.getElementById('frctn5').value|0;
	var frctn6 = document.getElementById('frctn6').value|0;
	var frctn7 = document.getElementById('frctn7').value|0;
	var frctn8 = document.getElementById('frctn8').value|0;
	var frctn9 = document.getElementById('frctn9').value|0;
	var frctn10 = document.getElementById('frctn10').value|0;
	
	if (ttlqty == ""){
		alert('Please input Total Qty.');
		document.getElementById('inityield').value = 0;
		return;
	}
	
		var gu = parseInt(Nrnk2b) + parseInt(Srnk1a) + parseInt(Charac) + parseInt(Osc10) + parseInt(ItLanebox) +
		parseInt(ItDrop) + parseInt(Itmiss);
		var iy = (parseInt(Nrnk2b) + parseInt(Srnk1a))/ttlqty * 100;
		var decimal = iy.toFixed(2);
		
		var ttlfrctn = quantity + frctn1 + frctn2 + frctn3 + frctn4 + frctn5 + frctn6 + frctn7 + frctn8 + frctn9 + frctn10;
		
	document.getElementById('inityield').value = decimal;
	//var act = parseInt(Rrnk2b) + parseInt(Srnk1a) + parseInt(Charac) +
	//parseInt(Osc10) + parseInt(ItLanebox) + parseInt(ItDropmiss);
	if (gu != ttlqty){
		alert('Your INPUT is not equal to TOTAL QUANTITY');
		document.getElementById('formsubmit').action = "";
		document.getElementById('submit').type = "button";
		
	}else{
		//var txtInput2 = document.getElementById('txtInput2').value;
		if (stdQty > 0 || tubes > 0 || quantity > 0 || frctn1 > 0 || frctn2 > 0 || frctn3 > 0 || frctn4 > 0 || frctn5 > 0 || frctn6 > 0 || frctn7 > 0 || frctn8 > 0 ||
			frctn9 > 0 || frctn10 > 0){
			if (ttlqty != ttlfrctn){
				alert("The total quantity is not equal on total quantity of fractions.");
				document.getElementById('stdQty').required = true;
				document.getElementById('tubes').required = true;
				document.getElementById('quantity').required = true;
				document.getElementById('submit').type = "button";
				document.getElementById('formsubmit').action = "";
				return;
			}else{
				document.getElementById('stdQty').required = true;
				document.getElementById('tubes').required = true;
				document.getElementById('quantity').required = true;
			}
		}else{
			document.getElementById('stdQty').removeAttribute("required");
			document.getElementById('tubes').removeAttribute("required");
			document.getElementById('quantity').removeAttribute("required");
		}
		document.getElementById('submit').type = "submit";
		document.getElementById('formsubmit').action = "submit_inittest.php";
		document.getElementById('initstart').required = true;
		document.getElementById('initactnrank2b').required = true;
		document.getElementById('inithdnrank2b').required = true;
		document.getElementById('inittsnrank2b').required = true;
		document.getElementById('initstop').required = true;
		document.getElementById('procname').required = true;
		document.getElementById('handlerno').required = true;
		document.getElementById('famname').required = true;
		document.getElementById('testerno').required = true;
		document.getElementById('ttlqty').required = true;
		document.getElementById('shift').required = true;
		document.getElementById('plteno').required = true;
		document.getElementById('progname').required = true;
		
		var stdQty = document.getElementById('stdQty').required = true;
		var tubes = document.getElementById('tubes').required = true;
		var quantity = document.getElementById('quantity').required = true;
		var frctn1 = document.getElementById('frctn1').required = true;
		var frctn2 = document.getElementById('frctn2').required = true;
		var frctn3 = document.getElementById('frctn3').required = true;
		var frctn4 = document.getElementById('frctn4').required = true;
		var frctn5 = document.getElementById('frctn5').required = true;
		var frctn6 = document.getElementById('frctn6').required = true;
		var frctn7 = document.getElementById('frctn7').required = true;
		var frctn8 = document.getElementById('frctn8').required = true;
		var frctn9 = document.getElementById('frctn9').required = true;
		var frctn10 = document.getElementById('frctn10').required = true;
		
		//document.getElementById('user').required = true;
		//document.getElementById('pass').required = true;

	}
}

function checkqtyng(){
	
	var ttlqty = document.getElementById('ttlqty').value|0;
	var Nrnk2b = document.getElementById('ngactnrank2b').value|0;
	var Srnk1a = document.getElementById('ngactsrank1a').value|0;
	var Charac = document.getElementById('ngactccc1c9').value|0;
	var Osc10 = document.getElementById('ngactosc10').value|0;
	
	var ItLanebox = document.getElementById('nglanebox').value|0;
	var ItDrop = document.getElementById('ngdropped').value|0;
	var Itmiss = document.getElementById('ngimiss').value|0;
	var ItIy = document.getElementById('ngyield').value|0;
	
	var stdQty = document.getElementById('stdQty').value|0;
	var tubes = document.getElementById('tubes').value|0;
	var quantity = document.getElementById('quantity').value|0;
	var frctn1 = document.getElementById('frctn1').value|0;
	var frctn2 = document.getElementById('frctn2').value|0;
	var frctn3 = document.getElementById('frctn3').value|0;
	var frctn4 = document.getElementById('frctn4').value|0;
	var frctn5 = document.getElementById('frctn5').value|0;
	var frctn6 = document.getElementById('frctn6').value|0;
	var frctn7 = document.getElementById('frctn7').value|0;
	var frctn8 = document.getElementById('frctn8').value|0;
	var frctn9 = document.getElementById('frctn9').value|0;
	var frctn10 = document.getElementById('frctn10').value|0;
	
	if (ttlqty == ""){
		alert('Please input Total Qty.');
		document.getElementById('ngyield').value = 0;
		return;
	}

		var gu = parseInt(Nrnk2b) + parseInt(Srnk1a) + parseInt(Charac) + parseInt(Osc10) + parseInt(ItLanebox) +
		parseInt(ItDrop) + parseInt(Itmiss);
		var iy = (parseInt(Nrnk2b) + parseInt(Srnk1a))/ttlqty * 100;
		var decimal = iy.toFixed(2);
		
		var ttlfrctn = quantity + frctn1 + frctn2 + frctn3 + frctn4 + frctn5 + frctn6 + frctn7 + frctn8 + frctn9 + frctn10;
		
	document.getElementById('ngyield').value = decimal;
	//var act = parseInt(Rrnk2b) + parseInt(Srnk1a) + parseInt(Charac) +
	//parseInt(Osc10) + parseInt(ItLanebox) + parseInt(ItDropmiss);
	if (gu != ttlqty){
		alert('Your INPUT is not equal to TOTAL QUANTITY');
		document.getElementById('formsubmit').action = "";
		document.getElementById('submit').type = "button";
		
	}else{
		//var txtInput2 = document.getElementById('txtInput2').value;
		if (stdQty > 0 || tubes > 0 || quantity > 0 || frctn1 > 0 || frctn2 > 0 || frctn3 > 0 || frctn4 > 0 || frctn5 > 0 || frctn6 > 0 || frctn7 > 0 || frctn8 > 0 ||
			frctn9 > 0 || frctn10 > 0){
			if (ttlqty != ttlfrctn){
				alert("The total quantity is not equal on total quantity of fractions.");
				document.getElementById('stdQty').required = true;
				document.getElementById('tubes').required = true;
				document.getElementById('quantity').required = true;
				document.getElementById('submit').type = "button";
				return;
			}else{
				document.getElementById('stdQty').required = true;
				document.getElementById('tubes').required = true;
				document.getElementById('quantity').required = true;
			}
		}else{
			document.getElementById('stdQty').removeAttribute("required");
			document.getElementById('tubes').removeAttribute("required");
			document.getElementById('quantity').removeAttribute("required");
		}
		document.getElementById('submit').type = "submit";
		document.getElementById('formsubmit').action = "ng_retest.php";
		document.getElementById('ngstart').required = true;
		document.getElementById('ngactnrank2b').required = true;
		document.getElementById('nghdnrank2b').required = true;
		document.getElementById('ngtsnrank2b').required = true;
		document.getElementById('ngstop').required = true;
		document.getElementById('procname').required = true;
		document.getElementById('handlerno').required = true;
		document.getElementById('famname').required = true;
		document.getElementById('testerno').required = true;
		document.getElementById('ttlqty').required = true;
		document.getElementById('shift').required = true;
		document.getElementById('plteno').required = true;
		document.getElementById('ngprogname').required = true;
		
		var stdQty = document.getElementById('stdQty').required = true;
		var tubes = document.getElementById('tubes').required = true;
		var quantity = document.getElementById('quantity').required = true;
		var frctn1 = document.getElementById('frctn1').required = true;
		var frctn2 = document.getElementById('frctn2').required = true;
		var frctn3 = document.getElementById('frctn3').required = true;
		var frctn4 = document.getElementById('frctn4').required = true;
		var frctn5 = document.getElementById('frctn5').required = true;
		var frctn6 = document.getElementById('frctn6').required = true;
		var frctn7 = document.getElementById('frctn7').required = true;
		var frctn8 = document.getElementById('frctn8').required = true;
		var frctn9 = document.getElementById('frctn9').required = true;
		var frctn10 = document.getElementById('frctn10').required = true;
		//document.getElementById('user').required = true;
		//document.getElementById('pass').required = true;
	}
}

function checkqtyng2(){
	
	var ttlqty = document.getElementById('ttlqty').value|0;
	var Nrnk2b = document.getElementById('ng2actnrank2b').value|0;
	var Srnk1a = document.getElementById('ng2actsrank1a').value|0;
	var Charac = document.getElementById('ng2actccc1c9').value|0;
	var Osc10 = document.getElementById('ng2actosc10').value|0;
	
	var ItLanebox = document.getElementById('ng2lanebox').value|0;
	var ItDrop = document.getElementById('ng2dropped').value|0;
	var Itmiss = document.getElementById('ng2imiss').value|0;
	var ItIy = document.getElementById('ng2yield').value|0;
	
	var stdQty = document.getElementById('stdQty').value|0;
	var tubes = document.getElementById('tubes').value|0;
	var quantity = document.getElementById('quantity').value|0;
	var frctn1 = document.getElementById('frctn1').value|0;
	var frctn2 = document.getElementById('frctn2').value|0;
	var frctn3 = document.getElementById('frctn3').value|0;
	var frctn4 = document.getElementById('frctn4').value|0;
	var frctn5 = document.getElementById('frctn5').value|0;
	var frctn6 = document.getElementById('frctn6').value|0;
	var frctn7 = document.getElementById('frctn7').value|0;
	var frctn8 = document.getElementById('frctn8').value|0;
	var frctn9 = document.getElementById('frctn9').value|0;
	var frctn10 = document.getElementById('frctn10').value|0;
	
	
	if (ttlqty == ""){
		alert('Please input Total Qty.');
		document.getElementById('ng2yield').value = 0;
		return;
	}

		var gu = parseInt(Nrnk2b) + parseInt(Srnk1a) + parseInt(Charac) + parseInt(Osc10) + parseInt(ItLanebox) +
		parseInt(ItDrop) + parseInt(Itmiss);
		var iy = (parseInt(Nrnk2b) + parseInt(Srnk1a))/ttlqty * 100;
		var decimal = iy.toFixed(2);
		
		var ttlfrctn = quantity + frctn1 + frctn2 + frctn3 + frctn4 + frctn5 + frctn6 + frctn7 + frctn8 + frctn9 + frctn10;
		
	document.getElementById('ng2yield').value = decimal;
	//var act = parseInt(Rrnk2b) + parseInt(Srnk1a) + parseInt(Charac) +
	//parseInt(Osc10) + parseInt(ItLanebox) + parseInt(ItDropmiss);
	if (gu != ttlqty){
		alert('Your INPUT is not equal to TOTAL QUANTITY');
		document.getElementById('formsubmit').action = "";
		document.getElementById('submit').type = "button";
		
	}else{
		//var txtInput2 = document.getElementById('txtInput2').value;
		if (stdQty > 0 || tubes > 0 || quantity > 0 || frctn1 > 0 || frctn2 > 0 || frctn3 > 0 || frctn4 > 0 || frctn5 > 0 || frctn6 > 0 || frctn7 > 0 || frctn8 > 0 ||
			frctn9 > 0 || frctn10 > 0){
			if (ttlqty != ttlfrctn){
				alert("The total quantity is not equal on total quantity of fractions.");
				document.getElementById('stdQty').required = true;
				document.getElementById('tubes').required = true;
				document.getElementById('quantity').required = true;
				document.getElementById('submit').type = "button";
				document.getElementById('formsubmit').action = "";
				return;
			}else{
				document.getElementById('stdQty').required = true;
				document.getElementById('tubes').required = true;
				document.getElementById('quantity').required = true;
			}
		}else{
			document.getElementById('stdQty').removeAttribute("required");
			document.getElementById('tubes').removeAttribute("required");
			document.getElementById('quantity').removeAttribute("required");
		}
		document.getElementById('submit').type = "submit";
		document.getElementById('formsubmit').action = "ng2_retest.php";
		document.getElementById('ng2start').required = true;
		document.getElementById('ng2actnrank2b').required = true;
		document.getElementById('ng2hdnrank2b').required = true;
		document.getElementById('ng2tsnrank2b').required = true;
		document.getElementById('ng2stop').required = true;
		document.getElementById('procname').required = true;
		document.getElementById('handlerno').required = true;
		document.getElementById('famname').required = true;
		document.getElementById('testerno').required = true;
		document.getElementById('ttlqty').required = true;
		document.getElementById('shift').required = true;
		document.getElementById('plteno').required = true;
		document.getElementById('ng2progname').required = true;
		
		var stdQty = document.getElementById('stdQty').required = true;
		var tubes = document.getElementById('tubes').required = true;
		var quantity = document.getElementById('quantity').required = true;
		var frctn1 = document.getElementById('frctn1').required = true;
		var frctn2 = document.getElementById('frctn2').required = true;
		var frctn3 = document.getElementById('frctn3').required = true;
		var frctn4 = document.getElementById('frctn4').required = true;
		var frctn5 = document.getElementById('frctn5').required = true;
		var frctn6 = document.getElementById('frctn6').required = true;
		var frctn7 = document.getElementById('frctn7').required = true;
		var frctn8 = document.getElementById('frctn8').required = true;
		var frctn9 = document.getElementById('frctn9').required = true;
		var frctn10 = document.getElementById('frctn10').required = true;
		
		document.getElementById('flaUser').required = true;
		document.getElementById('flaPass').required = true;
		//document.getElementById('user').required = true;
		//document.getElementById('pass').required = true;
	}
}

var delay = (function(){
   var timer = 0;
   return function(callback, ms){
      clearTimeout (timer);
      timer = setTimeout(callback, ms);
   };
})();

//Family number scan //LOT number scan
$(".txtInput").on("input", function() {
   delay(function(){
      if ($(".txtInput").val().length < 9) {
          $(".txtInput").val("");
      }
   }, 25 );
});

$("#mlot").on("input", function() {
   delay(function(){
      if ($("#mlot").val().length < 9) {
          $("#mlot").val("");
      }
   }, 25 );
});



/*// register jQuery extension
jQuery.extend(jQuery.expr[':'], {
    focusable: function (el, index, selector) {
        return $(el).is('[tabindex]');
    }
});

$(document).on('keypress', 'input,select', function (e) {
    if (e.which == 13) {
        e.preventDefault();
        // Get all focusable elements on the page
        var $canfocus = $(':focusable');
        var index = $canfocus.index(this) + 1;
        if (index >= $canfocus.length) index = 0;
        $canfocus.eq(index).focus();
    }
});*/

// register jQuery extension
jQuery.extend(jQuery.expr[':'], {
    focusable: function (el, index, selector) {
        return $(el).is('[tabindex]');
    }
});
//press enter to move to other field
$(document).on('keypress', 'input,select', function (e) {
    if (e.which == 13) {
        e.preventDefault();
        var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
        console.log($next.length);
        if (!$next.length) {
            $next = $('[tabIndex=1]');
        }
        $next.focus();
    }
});

function chkd(){
	var chk = document.getElementById('100%yld');
	if (chk.checked){
		window.open('/gonogo/index.php');
	}else{
		
	}
}

function chkd2(){
	var chk = document.getElementById('psidis');
	if (chk.checked){
		window.open('/gonogo/index.php');
	}else{
		
	}
}

function query(){
	var quer = document.getElementById('subquery');
	quer.click();
}

function showfield(){
		document.getElementById('initial').style.display = '';
		document.getElementById('ng').style.display = 'none';
		document.getElementById('ng2').style.display = 'none';
		document.getElementById('fla').style.display = 'none';
		
		document.getElementById('famname').removeAttribute('readonly');
		document.getElementById('famname').style = 'width: 180px;';
		document.getElementById('ttlqty').removeAttribute('readonly');
		document.getElementById('ttlqty').style = 'width: 50px';
		document.getElementById('plteno').removeAttribute('readonly');
		document.getElementById('plteno').style = 'width: 50px';
		document.getElementById('procname').removeAttribute('disabled');
		document.getElementById('procname').style = 'width: 125px';
		document.getElementById('shift').removeAttribute('disabled');
		document.getElementById('shift').style = 'width: 125px';
		document.getElementById('testerno').removeAttribute('readonly');
		document.getElementById('testerno').style = 'width: 125px';
		document.getElementById('handlerno').removeAttribute('readonly');
		document.getElementById('handlerno').style = 'width: 125px';		
		document.getElementById('mlotchk').removeAttribute('disabled');
		
		document.getElementById('submit').setAttribute('onclick','checkqtyinit()');
		
$('#mlotchk').click(function(){	
   $('#mlot').attr('readonly',!this.checked)
   document.getElementById('mlot').value = '';
   document.getElementById('mlot').removeAttribute('style');
});

$("#famname").on("input", function() {
   delay(function(){
      if ($("#famname").val().length < 9) {
          $("#famname").val("");
      }
   }, 25 );
});

}

function showfield2(){
		document.getElementById('ng').style.display = '';
		document.getElementById('initial').style.display = 'none';
		document.getElementById('ng2').style.display = 'none';
		document.getElementById('fla').style.display = 'none';
		document.getElementById('submit').setAttribute('onclick','checkqtyng()');
		showUser(document.getElementById('txtInput2').value)
}

function showUser(str) {
    if (str == "") {
        //document.getElementById("txtHint").innerHTML = "";
		alert('NO INITIAL TEST RECORD FOUND.')
		location.href = 'home.php'
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","lotid.php?q="+str,true);
        xmlhttp.send();
    }
}

function showfield3(){
		document.getElementById('ng2').style.display = '';
		document.getElementById('ng').style.display = 'none';
		document.getElementById('initial').style.display = 'none';
		document.getElementById('fla').style.display = '';
		document.getElementById('submit').setAttribute('onclick','checkqtyng2()');
		showUser2(document.getElementById('txtInput2').value);
}

function showUser2(str) {
    if (str == "") {
        //document.getElementById("txtHint").innerHTML = "";
		alert('NO INITIAL TEST RECORD FOUND.')
		location.href = 'home.php'
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","lotid2.php?q="+str,true);
        xmlhttp.send();
    }
}

function initshowtxtbx(){
	var initchkbx63 = document.getElementById('initcbx63').checked;
	var initchkbx64 = document.getElementById('initcbx64').checked;
	var initchkbx65 = document.getElementById('initcbx65').checked;
	var initchkbx75 = document.getElementById('initcbx75').checked;
	var initchkbx77 = document.getElementById('initcbx77').checked;
	var initchkbx95 = document.getElementById('initcbx95').checked;
	
	if(initchkbx63 == true){
		document.getElementById('initvalcbx63').style.display = '';
	}else{
		document.getElementById('initvalcbx63').style.display = 'none';
		document.getElementById('initvalcbx63').value = '0';
		
	}
	if(initchkbx64 == true){
		document.getElementById('initvalcbx64').style.display = '';
	}else{
		document.getElementById('initvalcbx64').style.display = 'none';
		document.getElementById('initvalcbx64').value = '0';
		
	}
	if(initchkbx65 == true){
		document.getElementById('initvalcbx65').style.display = '';
	}else{
		document.getElementById('initvalcbx65').style.display = 'none';
		document.getElementById('initvalcbx65').value = '0';
		
	}
	if(initchkbx75 == true){
		document.getElementById('initvalcbx75').style.display = '';
	}else{
		document.getElementById('initvalcbx75').style.display = 'none';
		document.getElementById('initvalcbx75').value = '0';
		
	}
	if(initchkbx77 == true){
		document.getElementById('initvalcbx77').style.display = '';
	}else{
		document.getElementById('initvalcbx77').style.display = 'none';
		document.getElementById('initvalcbx77').value = '0';
		
	}
	if(initchkbx95 == true){
		document.getElementById('initvalcbx95').style.display = '';
	}else{
		document.getElementById('initvalcbx95').style.display = 'none';
		document.getElementById('initvalcbx95').value = '0';
		
	}
}

function tryload(){
	var run = document.getElementById('txtInput2').value;
	if (run != ''){
		showfield();
	}
}

window.onload = startTime();tryload();
</script>
    </body>
</html>