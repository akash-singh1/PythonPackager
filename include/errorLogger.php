<?php
    if (!defined("ROOT")) {
        header("HTTP/1.0 404 Not Found");
        die();
    }
    

    function log_error($string) {
        $fh = fopen(ROOT."include/error.log", 'a') or die("<p>An error occured logging your error.</p>");
        fwrite($fh, time().", ".$string."\n");
        fclose($fh);
    }
    ?>
