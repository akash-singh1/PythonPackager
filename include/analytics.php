<?php
    if (!defined("ROOT")) {
        header("HTTP/1.0 404 Not Found");
        die();
    }
    
    function logPageView($extra) {
        /*if (NOANALYTICS) {
            return;
        }*/
        $ip = mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
        $uri = mysql_real_escape_string($_SERVER['REQUEST_URI']);
        $agent = mysql_real_escape_string($_SERVER['HTTP_USER_AGENT']);
        $player = mysql_real_escape_string($_SESSION['username']);
        
        $query = "INSERT INTO ".ANALYTICSTABLE." (time, IP, URI, userAgent, player) VALUES (";
        
        $query .= "'" . time() . "', ";
        $query .= "'" . $ip . "', ";
        $query .= "'" . $uri . "', ";
        $query .= "'" . $agent . "', ";
        $query .= "'" . $player . "'";
        
        $query .= ")";
        
        //echo $query . "<br>";
        
        $sucessful = mysql_query($query);
        if (!$sucessful) {
            log_error("Mysql Error: ".mysql_error());
        }
        
    }
    ?>
