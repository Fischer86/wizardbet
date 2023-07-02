<?php
    $con = new mysqli("", "root", "", "wizardbet");
    
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
    