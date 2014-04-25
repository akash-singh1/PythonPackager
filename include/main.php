<?php

if (!defined("ROOT")) {
    header("HTTP/1.0 404 Not Found");
    die();
}

//error_reporting(0);

DEFINE('WEBROOT', ROOT);  // define defalut values for webroot.  it may be changed after the include
DEFINE('CDN', 'https://pyrocket.objects.cdn.dream.io/');


// init session
session_start();
if (session_cache_expire() == -1) {
    //session_cache_expire(time() + 1000);
}

if (!isset($_SESSION['projectId'])) {
	$_SESSION['projectId'] = rand();
}

//header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1


$GLOBALS["VERSION"] = "0.1";

$GLOBALS["time_start"] = microtime(true);

include "funcs.php";
include "errorLogger.php";
//include_once "db_con.php";
//include "analytics.php";


//logPageView("");


date_default_timezone_set('America/Los_Angeles');


function print_header($title = "PyRocket") {
    $titleText = $title;
    include_once("header.php");
}

function print_footer($caption = "") {
    include_once("footer.php");
}


?>
