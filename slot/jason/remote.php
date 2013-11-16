<html><head>
 


	<link type="text/javascript" href="/css/jquery-1.10.2.js">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript"></script>
	<style>
	body, html {
  height: 100%;
  position: relative;
  padding: 0px;
  margin: 0px;
}
#remote {height: 100%; width: 100%; font-size: 5em;}
	.col-3-3 { width:100%; }
.col-2-3 { width:65%;}
.col-1-3 {width:32%;}
#remote { background:#EA6045; font-weight:100;}
body { width: 100%;}
button { border:none; overflow:hidden; width:100%; margin:0px; padding:5% 0px; background:none; font-family:lato; color:#2F3440; font-size:2em; line-height:2em;  }

.left {float:left; f}
#play { background:#2F3440; padding:40% 0px;
  display:block ;border-radius:100%; text-align:center; float:left; border:0; line-height:1em; font-size:1em; margin:0; color:#EA6045; font-weight:100;}
#back { background:#2F3440;; color:#EA6045; font-weight:100; font-size:1.5em}
#play:hover { background:#F8CA4D; color:#2F3440; font-weight:400;}
#back:hover { background:#F8CA4D}
button:hover { background:#F8CA4D; color:#2F3440}
		</style>
	
<script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script></head>

<body cz-shortcut-listen="true" style="">



	
<div id="remote" class="col-3-3">
  
  <div class="col-3-3"><button class="left" onclick="left()">  &and; </button></div>
  <div class="col-1-3 left"><button class="left" onclick="right()">  &lt;</button></div>
  <div class="col-1-3 left"><button id="play" onclick="play()">OK</button>
   
  </div>
  <div class="col-1-3 left"><button class="right" onclick="right()"> &gt; </button></div>
  <div class="col-3-3"> <button class="right" onclick="right()"> &or;</button></div>
  <button id="back" onclick="back()">&crarr;</button>
  
 
   
  
 
  
</div>
  

	


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


</body></html>