<?php
require 'dbconnection.php';
?>

<?php 
    if (!isset($_GET['packageId'])) {
       die("Invalid Package Id");
    }
    $packageId   = $_GET['packageId'];

    $sql = "DELETE  FROM package WHERE packageId='{$packageId}'";
    $res = $conn->query($sql) ;

    if($res){
        echo "<script>alert('Package {$packageId} deleted successfully');</script>";
        echo "<script>setTimeout(() => { window.location.href = 'adminDashboard.php?content=managePackage'; }, 1000);</script>";
        
    }else{
        echo "<script>alert('Error deleting Package.');</script>";
    }
    $conn->close();
?>