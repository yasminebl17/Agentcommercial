<?php
    
    $conn = mysqli_connect("localhost","root","","algerie_telecom") or die("Couldn't connect");

    // Create DB Connection


    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
   
?>