<?php

define('ROOT', '../');

require_once(ROOT.'include/main.php');






$allowedExts = array("gif", "jpeg", "jpg", "png", "zip");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "application/zip")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 20000000)
	&& in_array($extension, $allowedExts)) {
	if ($_FILES["file"]["error"] > 0) {
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	}
	else {

		$id = rand();
		$projectFolder = ROOT . "uploads/" . $id;
		mkdir($projectFolder);
		mkdir($projectFolder."/src");
		mkdir($projectFolder."/mac");
		mkdir($projectFolder."/lin");
		mkdir($projectFolder."/win");



		//echo "Id: " . $id . "<br>";


		//echo "Name: " . $_FILES["file"]["name"] . "<br>";
		//echo "Type: " . $_FILES["file"]["type"] . "<br>";
		//echo "Size: " . ($_FILES["file"]["size"] / 1024 / 1024) . " MB<br>";
		//echo "Stored in: " . $_FILES["file"]["tmp_name"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $projectFolder."/uploaded.zip")) {
			$zip = new ZipArchive();
			$x = $zip->open($projectFolder."/uploaded.zip");
			if ($x === true) {
				$zip->extractTo($projectFolder."/src"); // change this to the correct site path
				$zip->close();
			}
			// Keep uploaded file just because
			//unlink($_FILES["file"]["tmp_name"]);
		}
		$message = "Your .zip file was uploaded and unpacked.";
		header("Location: " . ROOT . "manage/index.php?id=" . $id);


	}
}
