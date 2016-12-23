<meta charset="utf-8">
<title>GIGA project | Maasvlakte 2</title>
<link rel="icon" href='img/favicon.ico' size="16x16"/>
<link rel="stylesheet" type="text/css" href="/css/main.css">
<link rel="stylesheet" href="/css/jquery-ui.css">

<!-- include hier de bestanden van jquery -->
<script src="/jq/jquery-1.11.3.min.js"></script>
<script src="/js/jquery-1.10.2.js"></script>
<script src="/js/jquery-ui.js"></script>

<!-- Meta tekst -->
<meta http-equiv="X-UA-Compatible" content="requiresActiveX=true">
<meta content="text/html; charset=windows-1252" http-equiv=Content-Type>
<meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
<meta HTTP-EQUIV="Expires" CONTENT="-1">
<script>
//---------------------------------------------------
//---------Code voor positie a.d.h.v de muis---------
//---------------------------------------------------
var IE = document.all?true:false

if (!IE) document.captureEvents(Event.MOUSEMOVE)

document.onmousemove = getMouseXY;

var tempX = 0
var tempY = 0

function getMouseXY(e) {
	if (IE) { 
	tempX = event.clientX + document.body.scrollLeft
	tempY = event.clientY + document.body.scrollTop
	} 
	else {  
	 tempX = e.pageX - 19
	 tempY = e.pageY - 70
	}
	document.Show.MouseX.value = tempX
	document.Show.MouseY.value = tempY
	return true
	}
//------------------------------------
//--------------eind------------------
//---------------muis-----------------
//----------------positie-------------

// legen van database tabel 'ritgegevens' na afsluiten applicatie.
window.onbeforeunload = closingCode;

function closingCode(){
   "<?php 
  // $query1=mysql_query( "TRUNCATE TABLE ritgegevens" );
   ?>"
   return null;
}

  $(function() {
    // run the currently selected effect
    function runEffect() {
      // get effect type from
      var selectedEffect = $( "#effectTypes" ).val();
 
      // most effect types need no options passed by default
      var options = {};
      // some effects have required parameters
      if ( selectedEffect === "scale" ) {
        options = { percent: 0 };
      } else if ( selectedEffect === "size" ) {
        options = { to: { width: 200, height: 60 } };
      }
 
      // run the effect
      $( "#effect" ).toggle( selectedEffect, options, 500 );
    };
 
    // set effect from select menu value
    $( "#button" ).click(function() {
      runEffect();
    });
  });
  
function opvragen()
{
     $.ajax({
         url: "/php/loop.php",
         type: "POST",
         cache: false,
         success: function (response) {
			console.log(response);
			document.getElementById("trein").innerHTML = response;        
         }
     }).fail(function(){
	 
	console.log(response);

	 });
}

var seconds = 0;
var random = 0;
var minutes = 0;
var remainingSeconds = 0;
var countdownTimer;

function timer() {
	<!-- random getal ophalen --> 
	random = Math.floor((Math.random() * 30) + 20);
	<!-- random getal opslaan -->
	seconds = random;
	countdownTimer = setInterval('secondPassed()', 1000);
}

function secondPassed() {
    minutes = Math.round((seconds - 30)/60);
    remainingSeconds = seconds % 60;
	
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;  
    }
    document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
	
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "start inkomst trein !";
		<!-- hier moet een var worden aangemaakt dat de timer klaar is -->
		opvragen();
    } else {
        seconds--;
	}
}
 </script> 