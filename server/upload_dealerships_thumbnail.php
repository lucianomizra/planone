<?php

$thumbnail = false;
 
if ( !empty($_FILES) && $_FILES['thumbnail']['name'] ) {

	$ds          = DIRECTORY_SEPARATOR;
	$storeFolder = PATH.'uploads/dealerships';
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
	$result_array = getimagesize($_FILES['thumbnail']['tmp_name']); 

	if ($result_array !== false) { 
		$mime_type = $result_array['mime']; 
		switch($mime_type) { 
			case "image/jpeg": 
				$ext = '.jpg';
				break; 
			case "image/gif": 
				$ext = '.gif';
				break; 
			case "image/png":
				$ext = '.png';
				break; 
		};
	} else { 
		echo "file is not a valid image file";
		die();
	};
	
	include_once(PATH.'objects/thumb.php'); 
	$mythumb = new thumb();
	
	$prefijo=substr(md5(uniqid(rand())),0,8);
	
	$thumbnail='thumbnail_'.$prefijo.$ext;
	$thumb_w=360;
	$thumb_h=360;
	$thumb_zc=1;
	$source=$_FILES['thumbnail']['tmp_name'];
	$crop="center";
	$name=$targetPath.$thumbnail;
	
	$mythumb->loadImage($source); 
	$mythumb->crop($thumb_w, $thumb_h,$crop); 
	$responseMythumb_1 = $mythumb->save($name, 100);

};

?>  