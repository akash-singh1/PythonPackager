<?php

define('ROOT', '../');

require_once(ROOT.'include/main.php');

$id = $project['id'];

$projectFolder = $project['folder'];

// print_r($_POST);

$startupFile = '#/bin/bash


cd "$( dirname "$0" )"

curl "http://happitopia.net/stats/appStart?dir=`pwd`"

python '.escapeshellarg($_POST['mainFile']).'
';

$project['launchScript'] = escapeshellarg($_POST['mainFile']);


// echo "<br><br>";
// echo nl2br($startupFile);
file_put_contents($projectFolder."/mac/Application.app/Contents/MacOS/run.sh", $startupFile);



// print_r($project);
header("Location: " . ROOT . "manage/index.php?id=" . $_SESSION['projectId']);


save_project_data($project);