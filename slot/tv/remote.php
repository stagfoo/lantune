<html>
<head>
<?php require('/var/www/media/function.php'); ?>
	<link type="text/javascript" href="/css/jquery-1.10.2.js">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript"></script>
	<style>
	body,html {height: 100%;}
	button {width: 20%; height:100%; border:0px; font-size:2em; text-transform: capitilize; color: #fff; font-family: Raleway;}
	.left { float:left; background-color: #425055; font-size: 5em;}
	.right { float:left; background-color: #425055; font-size: 5em;}
	#play {float:left; width: 60%; height: 50%; background: #47BB9A}
	#back {float:left; width: 60%; height: 50%; background: #EE436C;}
		</style>
	
</head>

<body>



	<button class="left" onclick='left()' > < </button>
	<button class="right" onclick='right()' > > </button>
	<button id="play" onclick='play()' >play</button>
	<button id="back" onclick='back()' >back</button>

	


	<script>

// 	var onscreen = document.getElementById('onscreen');

// var lis = onscreen.children;
// for(var i = 0; i < lis.length; i++) {

   // console.log(lis[i].innerHTML);
// }


//


function getplace() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
         if (request.readyState == 4 && request.status == 200) {
            // gets the data from link
            
            //gets the number from remote and checks the array
            }

         }
     
    request.open('GET', 'http://localhost/media/slot/tv/link.php', true);
    request.send();
   
 }
var place = request.responseText;

function right() {
	var n = "r"
	move(n);
}


function left() {
var n = "l"
	move(n);
}
function play() {
var n = "p"
	move(n);
}
function back() {
var n = "b"
	move(n);
}


function move(movePlace) {
	var data = new FormData();
	data.append("data" , movePlace);
	var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
	xhr.open( 'post', 'createxml.php', true );
	xhr.send(data);
}

</script>

</body>
</html>