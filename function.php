<?php
//ini_set ("display_errors", "1");
//error_reporting(E_ALL);
 //path to directory to scan
// $tv_dir = "/tv_show";
//--------------functions---------------------
$error_bucket = NULL;
function ptag($code){
$an_error = "<p class='error'>".$code."</p><br>";
echo $an_error;
}
 function url_encode($string){
 return rawurlencode(utf8_encode($string));
}   
function url_decode($string){
 return utf8_decode(urldecode($string));
}
//----------------FUNCKS---------------


$url = "http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
// $dir = substr($_SERVER[REQUEST_URI],1);
$dir = '/var/www/media';
$url_front = "http://".$_SERVER[HTTP_HOST];
$url_back = "http://".$_SERVER[REQUEST_URI];
function remote_slot($url_dirt) {
    $url_dirt = "http://".$_SERVER[REQUEST_URI];
}

// ptag($dir);
// ptag($url_front);
// ptag($url_back);
$open_fold = strstr($url, '?');
if ($open_fold != false){
	$dir .= "/".substr($open_fold,1);	 
}
function nice_name($ugly){
$nice = str_replace('_', ' ', $ugly);
return $nice; 	
}
function html_name($old_name){
$html_name = str_replace(' ', '_', $old_name);
return $html_name;   
}
function remove_space($unclean){
$clean = str_replace(' ', '_', $unclean);
rename($unclean, $clean);
return $clean;
 }
function remove_jpeg($unclean_cover){
$clean_cover = str_replace('.jpeg', '.jpg', $unclean_cover);
rename($unclean_cover, $clean_cover);
return $clean_cover;
 }




//excomanion makes
//-----------------------------------
//echo strstr($url, '?')."<br>";
//echo basename($dir)."<br>";;
//echo substr(strstr($url, '?'),1)."<br>";

//echo $_SERVER['REMOTE_ADDR']; - get IP sometime


$show_all_files = "/*";
$show_tv_files = "/tv_shows/*";
$show_movie_files = "/movies/*";
function getcontent($dir, $search_files) 
{

//$files = glob($dir . "/*");
$files = glob($dir . $search_files);

echo "<ol id='onscreen' type='a' >";
foreach($files as $obj)
{//check to see if the file is a folder/directory
	
if(is_dir($obj) || is_link($obj))
 { 
 
 $folder = remove_space($obj);
 
// get parent folder 
 $url = "http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];

 $parent = substr(strstr($url, '?'),1);
if ($parent != false){
 //fixes parent / issue
 $slash = "/";
} 
//get name of folder 
 $fold_name = basename($folder);
 //displays everything
 $fold_output = "<li class='folder' id='".html_name($fold_name)."'><a href='?".url_encode($parent).$slash.url_encode($fold_name)."'>".nice_name($fold_name)."</a>";
 $fold_output .= "<div class='cover' style='background-image:url(/media/".$parent.$slash.$fold_name."/cover.jpg)'>"."</div>";

//----------------------------GET TEXT FROM FILE-------------------------------------
 $urls="http://".$_SERVER[HTTP_HOST]."/media/".$parent.$slash.$fold_name."/info.txt";
 //echo ptag(file_get_contents("http://".$_SERVER[HTTP_HOST]."/media/".$parent.$slash.$fold_name."/info.txt"));
$page = join("",file("$urls"));
$kw = explode("\n", $page);

//---------------------------------------------------------------------------

 $fold_output .= "<div class='eps'>".$kw[1]."</div><div class='video_info'><ol class='video_info'>";

 $fold_output .= "<li class='tag'>".$kw[2]."</li>";
  $fold_output .= "<li class='tag'>".$kw[3]."</li>";
 $fold_output .= "</ol></div></li>";


 
 if($fold_name == 'css'){ $fold_output = NULL; }
if($fold_name == 'slot'){ $fold_output = NULL; }
if($fold_name == 'cover'){ $fold_output = NULL; }
if($fold_name == 'extrafanart'){ $fold_output = NULL; }
 else echo $fold_output; 
 } else 
 {
//-------------------------------------------
$file = $obj;
$name = basename($file);
$url = "http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
 $parent_fold = substr(strstr($url, '?'),1);
if ($parent_fold != false){
 //fixes parent / issue
 $slash = "/";
}
 $file_name = basename($file);

 switch ($file_name) {
    case "cover.jpeg":
    rename($parent_fold."/".$file_name, $parent_fold."/cover.jpg");
            $display = false;
        break;
        default:
    }

//------------check video tag------------------------
$ext_end = substr($name, -4);
 $video_ext = strstr($ext_end, '.');
 
 switch ($video_ext) {
 	case ".mp4":
 			$video_info = "<li class='"; 
 			$video_info .= "red tag";
 			$video_info .= "'>MP4";
 			$video_info .= "</li>";
            $video_info .= $video_tags;
 			$display = true;
    break;
 	case ".avi":
 $video_info = "<li class='"; 
 			$video_info .= "blue tag";
 			$video_info .= "'>avi";
 			$video_info .= "</li>";
 			$display = true;
    break;
    case ".mkv":
 $video_info = "<li class='"; 
 			$video_info .= "red tag";
 			$video_info .= "'>mkv";
 			$video_info .= "</li>";
 			$display = true;
    break;
    default:
    $display = false;

 $hidden = ""; 	
 }
//-------------------------------------------

//get name of file



//---------------rename and get info-----------------------


//-------------------------------------------



//create link to file
 $file_url = $_SERVER[REQUEST_URI];
 // echo ptag($file_url);
 // echo ptag($parent_fold);
 $file_link = $file_url."/".$file_name;
 $file_display_name = NULL;
$short_file_name = substr($file_name,0,25);

 //displays everything
 $file_output = "<li class='file' id='".html_name($file_name)."'>";
 $cover_file  = "<div class='cover' style='background-image:url(/media/".$parent_fold.$slash."cover.jpg)'></div>";
$file_output .= "<a href='/media/".$parent_fold.'/'.$file_name."'>".$short_file_name."</a>";
 $file_output .= $cover_file."<div class='video_info'><ul>".$video_info.$video_tags;


 //$file_output .= $parent_fold.$slash."cover.jpeg);'><a href='video.php".$file_link."'>".$file_name."</a>";

//remove localhost replace with var/www/    
 // $file_output .= "/media/".$parent_fold.$slash."cover.jpeg);'><a href='/media/video.php".$file_link."'>".$file_name."</a>";
 $file_output .= "</ul></div>";
 $file_output .= "</li>";
 if($display == true){
 echo $file_output;
 } else $display = false;
}
 
 
 

}
echo "</ol>";
if($display == false);{
echo $hidden;

}
}

?> 


