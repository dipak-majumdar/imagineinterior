<?php
require_once '../../inc/constants.inc.php';

require_once ABSPATH . '_config/dbconnect.php';

require_once ABSPATH . 'classes/services.class.php';
require_once ABSPATH . 'classes/utilityImage.class.php';
require_once ABSPATH . 'classes/utility.class.php';



$Services           = new Services();
$UtilityImage		= new UtilityImage();
$Utility			= new Utility();

$added_by           = 'admin';

if(isset($_POST['serviceId'])){

	if ($_POST['serviceId'] > 0) {
		$serviceId 	=  $_POST['serviceId'];
		$added 		= 'false';
		$targetDir 		= "../../images/services/";


		if($_FILES['file']['name'] != ''){

			$file_names = '';

			$total = count($_FILES['file']['name']);

			for($i=0; $i<$total; $i++){
				$filename 			= $_FILES['file']['name'][$i]; // Get the Uploaded file Name.
				$fileNameOnly 		= pathinfo($filename, PATHINFO_FILENAME);
				$fileExtension 		= pathinfo($filename,PATHINFO_EXTENSION); //Get the Extension of uploded file

				$new_name 			= $fileNameOnly.'-'.rand();
				$new_full_name 		= $new_name.'.'. $fileExtension;
				$path 				= "../../images/services/" . $new_full_name;

				$fileWebpName 		= $new_name . '.webp';
				$fileWebpDir		= $targetDir . $fileWebpName;

				$valid_extensions = array("png","jpg","jpeg","webp");

				if(in_array($fileExtension, $valid_extensions)){ // check if upload file is a valid image file.

					if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $path)){

						$UtilityImage->convert($path, $fileWebpDir, 100);

						$imageAdded = $Services->addToGallery($serviceId, $new_full_name, TIME);
						if ($imageAdded === true) {
							echo $added = 'true';
						}
					}else {
						echo 'can\'t upload image';
					}
				}else{
					echo 'false';
				}
			}
			
		}else {
			echo 'No image exists';
		}

		// echo $added;
	}else {
		echo 'Project Id not avilable';
	}
}else {
	echo 'No Request';
}
?>