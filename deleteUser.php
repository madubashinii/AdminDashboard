<?php
require 'dbconnection.php';
?>

<?php 
    if (!isset($_GET['userId'])) {
       die("Invalid User Id");
    }
    $userId   = $_GET['userId'];

    $sql = "DELETE  FROM user WHERE UID='{$userId}'";
    $res = $conn->query($sql) ;

    if($res){
        echo "User {$userId} deleted successfully";
        echo "<script>setTimeout(() => { window.location.href = 'adminDashboard.php?content=manageUser'; }, 1000);</script>";
        
    }else{
        echo "<script>alert('Error deleting user.');</script>";
    }
    
?>