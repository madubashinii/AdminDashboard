<?php
require 'dbconnection.php';
?>

<?php
$sql = "SELECT * FROM user ORDER BY UID ASC";
$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Accounts Details</title>
    <link rel="stylesheet" type="text/css" href="styles/dashboardstyle.css">
</head>

<body>
    <div class="managedetails">
        <h2>Manage User Accounts</h2>
        <div>
            <a id="add" href="addUser.php">Add User</a>
        </div>

    </div>
    <hr>
    <div class="centered">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                while ($rows = $result->fetch_assoc()) {

                    echo "<tr>
                    <td>{$rows['UID']}</td>
                    <td>{$rows['first_name']}</td>
                    <td>{$rows['last_name']}</td>
                    <td>{$rows['email']}</td>
                    <td>{$rows['address']}</td>
                    <td>{$rows['contact']}</td>
                    <td>
                        <a href='updateUser.php?userId={$rows['UID']}'><button id='editButton'>Edit</button></a>
                        <a href='deleteUser.php?userId={$rows['UID']}' 
               onclick=\"return confirm('Are you sure you want to delete this user?');\"><button id='deleteButton'>Delete</button></a>
                    </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>