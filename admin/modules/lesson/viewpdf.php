<?php 
if(!isset($_SESSION['USERID'])){
  redirect(web_root."admin/index.php");
} 
  @$id = $_GET['id'];
    if($id==''){
  redirect("index.php");
}
  $lesson = New Lesson();
  $res = $lesson->single_lesson($id);

?> 
<h2><?php echo $title ; ?></h2>
<p style="font-size: 18px;font-weight: bold;">Chapter : <?php echo $res->LessonChapter;?> | Title : <?php echo $res->LessonTitle;?></p>
<div class="container">
	Downloading....
	<!-- <embed src="<?php echo web_root.'admin/modules/lesson/'.$res->FileLocation; ?>" type="application/pdf" width="100%" height="400px" /> -->

</div> 
<?php 
	$filename = basename($res->FileLocation);
	$filepath = "https://edu.cyeko.com/admin/modules/lesson/".$res->FileLocation;
	
	
	echo (!empty($filename));
	echo "/";
	echo file_exists($filepath);
	if(!empty($filename) && file_exists($filepath)){

// //Define Headers
// 		header("Cache-Control: public");
// 		header("Content-Description: FIle Transfer");
// 		header("Content-Disposition: attachment; filename=$filename");
// 		header("Content-Type: application/zip");
// 		header("Content-Transfer-Emcoding: binary");

// 		readfile($filepath);
// 		exit;

	}
	else{
		echo "This File Does not exist.";
	}
 ?>