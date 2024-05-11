<?php
require 'dbconnection.php';
?>

<?php
$id = $_GET['userId'];
$sql = "SELECT * FROM user WHERE UID = $id";
$result = mysqli_query($conn,$sql);
$rows = mysqli_fetch_assoc($result);
$first_name = $rows['first_name'];
$last_name = $rows['last_name'];
$address = $rows['address'];
$email = $rows['email'];
$contact = $rows['contact'];

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $sql = "UPDATE user 
        SET first_name = '$first_name', last_name = '$last_name', address = '$address', email = '$email' , 
        contact = '$contact' WHERE UID = '$id' ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:adminDashboard.php?content=manageUser');
    } else {
        die(mysqli_error($conn));
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update User Details</title>
    <link rel="stylesheet" type="text/css" href="styles/usercommon.css">
</head>

<body>

    <div class="userForm">
        <h2>Update User Details</h2>
        <form method="post">
            <label for="userId">User ID:</label>
            <input type="text" id="userId" name="userId" value="<?php echo $id; ?>" readonly>

            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="3"> <?php echo $address; ?> </textarea>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" value="<?php echo $contact; ?>" required>

            
            <div class="submit-btn">
                
                <?php
                echo "<button type='submit'  name='submit' onclick='editUser(".$id.")'>Update</button>";
                ?>
            </div>

        </form>
    </div>
<script>
    function editUser(userId) {
        alert(` User with ID : ${userId} updated successfully`);
    }
</script>
</body>

</html>
