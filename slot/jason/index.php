<html>
<head>
<link href="/media/css/main.css" rel="stylesheet" type="text/css">
<link href="/media/css/icon-font/css/fontello.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,800' rel='stylesheet' type='text/css'>
<?php require('/var/www/media/function.php'); ?>
<link type="text/javascript" href="">
<link type="text/javascript" href="/css/jquery-1.10.2.js">
<?php 
$url_bg = "http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
 $parent_fold = substr(strstr($url, '?'),1);
if ($parent_fold != false){
 //fixes parent / issue
 $slash = "/";
}
?>
<style>

	#button_press {width: 110%; height: 50px;  bottom:0px; position: fixed; left: 0px;}
  html { background-image:url( <?php echo "/media/".$parent_fold.$slash."wallpaper.jpg" ?> )}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<?php
//ini_set ("display_errors", "1");
//error_reporting(E_ALL);
$filename = 'link.php';

if (file_exists($filename)) {
   // echo "<p class='error'>"."The link was already created"."</p>";
} else {
$fname = "link" . ".php";//generates random name
$dir = getcwd()."/";
fopen($dir .$fname, 'c+');
$file = fopen($dir .$fname, 'c+');//creates new file
fwrite($file, "");
echo "Link was created";
$page = $_SERVER['PHP_SELF'];
$sec = "10";
header("Refresh: $sec; url=$page");
}
?>





<script>

</script>

<title><?php echo  $dir ?></title>
</head>
<body >
<div id="wrap"></div>
<header>
	
</header>
 <div id='video_area'>

 <?php getcontent($dir, $show_all_files);  ?>
 <ol id="links"></ol>
</div>


<div class='error_bucket'><?php if($error_bucket != NULL){ echo $error_bucket; } ?></div>
<div id="button_press"></div>
<script>
killlink();
function killlink() {
var theLink = " ";
var data = new FormData();
data.append("data" , theLink);
var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
xhr.open( 'post', 'createxml.php', true );
xhr.send(data);
}
var link_tags = document.getElementsByTagName("a");
var link_array = [];
var title_array = [];
var file_list;
var n = link_tags.length;

for(i = 0; i <= (n-1); i++){
  link_array.push(link_tags[i]);
  console.log(link_tags[i]);


}

var count = 0; 
setInterval(function() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
         if (request.readyState == 4 && request.status == 200) {
            console.log(request.responseText);
            var theDiv = document.getElementById("button_press");
            // gets the data from link
            var link = request.responseText;
           
            switch(link)
            {
           case "r":
          
          count++;
          console.log(count);

          killlink();
           return count;
           case "l":
          
          count--;
          console.log(count);

          killlink();
           return count;

            case "p":
          
          var current_select = link_tags[count];
          window.location.href = current_select;
          //console.log(count);
          killlink();
          break;
           case "b":
          
          window.history.back();
          break;

            }
            
            var place = link_tags[count];
           
            console.log(count);
            
            //if they go too far the go to the top
            if(!place){place = link_tags[0]; count = 0; }
            //this gets the name of the li
            var place_name = place.innerHTML;
            var selected = place_name //.replace(/ /g,"_");
            

            


           
           
            // var show = objs[i].innerHTML;
            //console.log(show);
            // "'"+"#"+selected+"'"
            //if(selected == show){$("#"+selected).addClass('hightlight');}
            //    else { $("#"+selected).removeClass('hightlight');} 
                    

           //theDiv.innerHTML = place;
          theDiv.innerHTML = selected;
         }
      }
    request.open('GET', '/media/slot/tv/link.php', true);
    request.send();

}, 100);
</script>
</body>

</html>
