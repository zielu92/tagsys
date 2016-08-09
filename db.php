<?php

    $mysqli = new mysqli("localhost", "dbuser", "pass", "tagsys");

    global $mysqli;
    
    if(mysqli_connect_error()) {
    
        die("Problem with db connection");
    
    }

?>