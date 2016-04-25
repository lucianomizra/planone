<?php
session_start();

$ds          = DIRECTORY_SEPARATOR;
 
$storeFolder = '../../uploads/cars';
 
if (!empty($_FILES)) {
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
	$result_array = getimagesize($_FILES['file']['tmp_name']); 

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
	
	include_once('../../objects/thumb.php'); 
	$mythumb = new thumb();
	
	$prefijo=substr(md5(uniqid(rand())),0,8);
	
	$thumb='thumbnail_'.$prefijo.$ext;
	$thumb_w=550;
	$thumb_h=350;
	$thumb_zc=1;
	$source=$_FILES['file']['tmp_name'];
	$crop="center";
	$name=$targetPath.$thumb;
	
	$mythumb->loadImage($source); 
	$mythumb->crop($thumb_w, $thumb_h,$crop); 
	$responseMythumb_1 = $mythumb->save($name, 100);


    echo $thumb;

    $_SESSION['thumb'] = $thumb;
};
?>  