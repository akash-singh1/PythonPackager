<?php

if (!defined("ROOT")) {
    header("HTTP/1.0 404 Not Found");
    die();
}

//error_reporting(0);

DEFINE('WEBROOT', ROOT);  // define defalut values for webroot.  it may be changed after the include
DEFINE('CDN', 'https://pyrocket.objects.cdn.dream.io/');

date_default_timezone_set('America/Los_Angeles');


// init session
session_start();
if (session_cache_expire() == -1) {
    //session_cache_expire(time() + 1000);
}



//header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1


$GLOBALS["VERSION"] = "0.1";

$GLOBALS["time_start"] = microtime(true);

require_once "funcs.php";
require_once "errorLogger.php";
//include_once "db_con.php";
//include "analytics.php";


//logPageView("");




$project = Array();

if (isset($_SESSION['projectId'])) {
	$project['id'] = $_SESSION['projectId'];
	$project['folder'] = ROOT."uploads/".$project['id'];
	$project = load_project_data($project);
}

else {
	$_SESSION['projectId'] = rand();
	$project['id'] = $_SESSION['projectId'];
	$project['folder'] = "uploads/" . $project['id'];
	save_project_data($project);
}



function print_header($title = "PyRocket") {
    $titleText = $title;
    require_once("header.php");
}

function print_footer($project = Array(), $caption = "") {
    save_project_data($project);
    require_once("footer.php");
}


?>
