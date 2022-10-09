<?php
 function getImagesFromDir($path) {
	$images = array();

	if($img_dir = @opendir($path)) {
		while(false !== ($img_file = readdir($img_dir))) {
			if(preg_match("/(\.gif|\.jpg|\.png)$/", $img_file)) {
				$images[] = $img_file;
			}
		}
		closedir($img_dir);
	}
	return $images;
 }

 function getRandomFromArray($ar) {
	$num = array_Rand($ar);
	return $ar[$num];
 }

 function showAllImagesFromDir($path) {
	if($img_dir = @opendir($path)) {
		while(false !== ($img_file = readdir($img_dir))) {
			if(preg_match("/(\.gif|\.jpg|\.png)$/", $img_file)) {
				echo "<a href='".$path.$img_file."'><img src='".$path.$img_file."' width='15%' height='200'/></a>&nbsp";
			}
		}
		closedir($img_dir);
	}
 }

 function sortImagesByDateFromDir($path) {
	$file_array = glob($path."*");
	$file_array = array_combine($file_array, array_map("filemtime", $file_array));
	arsort($file_array);

	foreach($file_array as $file => $date) {
		if(preg_match("/(\.gif|\.jpg|\.png)$/", $file)) {
			echo "<a href='".$file."'><img src='".$file."' width='15%' height='200'/></a>&nbsp";
		}
	}
 }

 function sortAsImageFromDB($table_name) {
	$connection = mysqli_connect("localhost", "wowcat", "wow8253mpW", "wowdb");
	$result = mysqli_query($connection, "SELECT * FROM $table_name");
	$array = array();

	while($row = $result->fetch_assoc()) {
		$array[] = $row;
	}

	arsort($array);
	foreach($array as $pic) {
		echo "<a href='/imgdb/imginfo.php?q=".$pic['id']."'><img src='/imgdb/uploads/".$pic[file_name]."' width='15%' height='200'/></a>&nbsp";
	}
	mysqli_close($connection);
 }
?>
