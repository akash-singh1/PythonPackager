<?php

define('ROOT', './');

require_once(ROOT.'include/main.php');


header("Location: " . ROOT . "manage/index.php?id=" . $_SESSION['projectId']);



mkdir($projectFolder."/mac");
mkdir($projectFolder."/lin");
mkdir($projectFolder."/win");

// Mac app
mkdir($projectFolder."/mac/Application.app");
mkdir($projectFolder."/mac/Application.app/Contents");
mkdir($projectFolder."/mac/Application.app/Contents/MacOS");

recurse_copy($projectFolder."/src", $projectFolder."/mac/Application.app/Contents/MacOS");