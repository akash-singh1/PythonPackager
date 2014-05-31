<?php

define('ROOT', './');

require_once(ROOT.'include/main.php');


$projectFolder = $project['folder'];


header("Location: " . ROOT . "manage/index.php?id=" . $_SESSION['projectId']);


mkdir($projectFolder."/mac");
mkdir($projectFolder."/lin");
mkdir($projectFolder."/win");

//echo ROOT."app/Application.app";
//echo " folder:";
//echo $projectFolder."/mac";

recursive_copy(ROOT."app/Application.app/", $projectFolder."/mac");

recurse_copy($projectFolder."/src/", $projectFolder."/mac/Application.app/Contents/MacOS");


