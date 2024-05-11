<?php 
    //create connection
    $conn = new mysqli("localhost","root","","wildwaves",3307);

    //check connection
    if($conn->connect_error){
        die("Data base connection error : ". $conn->connect_error);
    }
?>