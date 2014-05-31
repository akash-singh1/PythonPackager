<?php

define('ROOT', './');

require_once(ROOT.'include/main.php');

$id = $project['id'];

$projectFolder = $project['folder'];


$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

$fileName = preg_replace('/[^A-Za-z0-9_.\-]/', '_', $_FILES["file"]["name"]);

if (($_FILES["file"]["size"] < 20000000)) {
	if ($_FILES["file"]["error"] > 0) {
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	} else {
		echo $projectFolder;
		//echo "Id: " . $id . "<br>";


		//echo "Name: " . $_FILES["file"]["name"] . "<br>";
		//echo "Type: " . $_FILES["file"]["type"] . "<br>";
		//echo "Size: " . ($_FILES["file"]["size"] / 1024 / 1024) . " MB<br>";
		//echo "Stored in: " . $_FILES["file"]["tmp_name"];

		if ($_FILES["file"]["type"] == "application/zip") {
			
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $projectFolder."/".$fileName)) {
				$zip = new ZipArchive();
				$x = $zip->open($projectFolder."/".$fileName);
				if ($x === true) {
					$zip->extractTo($projectFolder."/src"); //change this to the correct site path
					$zip->close();
					$message = "Your .zip file was uploaded and unpacked.";
					echo("Uploaded Successfully!");
				}
			}
		} else {
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $projectFolder."/src/".$fileName)) {
				echo("Uploaded Successfully!");
			}
		}
		
		
		// Keep uploaded file just because
		//unlink($_FILES["file"]["tmp_name"]);
	}
}

save_project_data($project);

?>