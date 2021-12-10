<?php 
        //database info
        $dbhost = "localhost";
        $dbuser = "test";
        $dbpass = "test";
        $db = "inkoopsysteem";

        //database connection 
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
?>