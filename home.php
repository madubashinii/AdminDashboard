<?php
require 'dbconnection.php';
// get user count
$sql = 'SELECT COUNT(*) AS user_count FROM user';
$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {
  $userCount = $row['user_count'];
} else {
  $userCount = 0;
}

//get booking count
// $sql = 'SELECT COUNT(*) AS booking_count FROM booking';
// $result = $conn->query($sql);

// if ($result && $row = $result->fetch_assoc()) {
//     $bookingCount = $row['booking_count'];
// } else {
//     $bookingCount = 0;
// }


//get packages count
$sql = 'SELECT COUNT(*) AS package_count FROM package';
$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {
  $packageCount = $row['package_count'];
} else {
  $packageCount = 0;
}

// admin details loaded
$sql = "SELECT * FROM Administrator WHERE adminId = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $admin = $result->fetch_assoc();
} else {
  echo "No admin found.";
}

// Close the connection
$conn->close();
?>

<div class="profile-container">
  <div class="additional-text">
    <h3>Admin Dashboard</h3>
  </div>
  <div class="right-content">
    <div class="profile-info">
      <i class="fas fa-user" id="profile-img"></i>
      <div class="profile-name">Administrator</div>
    </div>
  </div>
</div>

<h2 id="message">Welcome to the Admin Dashboard </h2>

<div class="adminprofile-box">

  <h2>Hello <?php echo $admin['AdminName']; ?></h2>
  <p>Email: <?php echo $admin['Email']; ?></p>
  <p>Contact: <?php echo $admin['Contact']; ?></p>
  <p>Password: <?php echo $admin['Password']; ?></p>
</div>

<p id="para">
  This is where you can monitor activities, access important information, and manage different parts of the system.
  To explore the various features, use the navigation menu.
</p>

<div class="card-container">
  <div class="card">
    <div class="info">
      <h2>USERS</h2>
      <p><?php echo $userCount; ?></p>
    </div>
    <div class="icon">
      <i class="fas fa-users"></i>
    </div>
  </div>

  <div class="card">
    <div class="info">
      <h2>BOOKINGS</h2>
      <p>0</p>
    </div>
    <div class="icon">
      <i class="fas fa-clipboard-list"></i>
    </div>
  </div>

  <div class="card">
    <div class="info">
      <h2>PACKAGES</h2>
      <p><?php echo $packageCount ?></p>
    </div>
    <div class="icon">
      <i class="fas fa-box"></i>
    </div>
  </div>