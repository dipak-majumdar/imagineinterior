<?php
require_once '../../_config/dbconnect.php';
require_once '../../inc/constants.inc.php';

require_once '../../classes/projects.class.php';


$Projects           = new Projects();
$added_by           = 'admin';

if(isset($_POST['projectId'])){

	if ($_POST['projectId'] > 0) {
		$projectId 	=  $_POST['projectId'];
		$added 		= 'false';

		if($_FILES['file']['name'] != ''){

			$file_names = '';

			$total = count($_FILES['file']['name']);

			for($i=0; $i<$total; $i++){
				$filename = $_FILES['file']['name'][$i]; // Get the Uploaded file Name.
				$extension = pathinfo($filename,PATHINFO_EXTENSION); //Get the Extension of uploded file

				$valid_extensions = array("png","jpg","jpeg");

				if(in_array($extension, $valid_extensions)){ // check if upload file is a valid image file.
					$new_name = $_FILES['file']['name'][$i].'-'.rand().'.'. $extension;
					$path = "../../images/projects/" . $new_name;

					if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $path)){
						$imageAdded = $Projects->addProjectImage($projectId, $new_name, 'admin');
						// echo var_dump($imageAdded);
						if ($imageAdded == true) {
							$added = 'true';
						}
					}

					// $file_names .= $new_name . " , ";
				}else{
					echo 'false';
				}
			}
			
			
		}else {
			echo 'No image exists';
		}

		echo $added;
	}else {
		echo 'Project Id not avilable';
	}
}else {
	echo 'No Request';
}


?>