<?php
require 'dbconnection.php';

// store user details

if (isset($_POST["submit"])) {
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];


    $query = "INSERT INTO  user (first_name ,last_name ,address ,email , contact) VALUES ('{$first_name}',' {$last_name}','{$address}','{$email}','{$contact}')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script> alert('data inserted successfully')</script>";
        echo "<script>setTimeout(() => { window.location.href = 'adminDashboard.php?content=manageUser'; }, 1000);</script>";
    } else {
        echo "<script>alert('something went wrong')</script>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add User Details</title>
    <link rel="stylesheet" type="text/css" href="styles/usercommon.css">
</head>

<body>

    <div class="userForm">
        <h2>Add User Details</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off">
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first-name" placeholder="Enter First Name" required>

            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last-name" placeholder="Enter Last Name" required>

            <label for="address">Address</label>
            <textarea id="address" name="address" rows="3" placeholder="Enter Address" required></textarea>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"required>

            <label for="contact">Contact Number</label>
            <input type="text" id="contact" name="contact" placeholder="Enter Contact Number" pattern="[0-9]{10}"required>

            <div class="submit-btn">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>


</body>

</html>