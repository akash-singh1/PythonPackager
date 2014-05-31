<?php

if (!defined("ROOT")) {
    header("HTTP/1.0 404 Not Found");
    die();
}

function save_project_data($project) {
	mkdir($project['folder']);
	mkdir($project['folder']."/src");
	// unlink($project['folder']."/info.dat");
	file_put_contents($project['folder']."/info.dat", json_encode($project));
}

function load_project_data($project) {
	$project = json_decode(file_get_contents($project['folder']."/info.dat"), true);
	$project['folder'] = ROOT."uploads/".$project['id'];
	return $project;
}

/*
 * Remove newlines from string
 * Modified from Stack Overflow
 */

function remove_newline($string) {
    return (string) str_replace(array("\r", "\r\n", "\n"), '', $string);
}

/*
 * Escape MySQL string
 */

function escape_mysql($unescaped_string) {
    // call standard MySQL escape function
    return mysql_real_escape_string($unescaped_string);
}

/*
 * Escape filenames
 * Rewritten from Stack Overflow
 */

function escape_filename($unescaped_filename) {
    // Replace all weird characters with dashes
    $string = preg_replace('/[^\w\-' . ($unescaped_filename ? '~_\.' : '') . ']+/u', '-', $unescaped_filename);

    // Only allow one dash separator at a time (and make string lowercase)
    $string = mb_strtolower(preg_replace('/--+/u', '-', $string), 'UTF-8');
    echo $string;
    return $string;
}

function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
}


/*
 * Query MySQL server
 */

function query_mysql($query) {
    $successful = mysql_query($query);

    if (!$successful) {
        log_error("Mysql Error: " . mysql_error() . " on query : " . $query);
        die("A MySQL error occured.  This has been logged.");
    }
    return $successful;
}

