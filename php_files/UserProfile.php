<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bidding System - User Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../CSS/navbar.css">

  <style>
    :root {
      --primary: #4361ee;
      --primary-dark: #3a56d4;
      --secondary: #3f37c9;
      --accent: #4cc9f0;
      --dark: #1a1a2e;
      --light: #f8f9fa;
      --success: #4bb543;
      --danger: #ff3333;
      --gray: #6c757d;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
      color: #212529;
      line-height: 1.6;
      min-height: 100vh;
      margin: 0;
    }

    /* Profile Container */
    .container {
      max-width: 800px;
      margin: 40px auto;
      padding: 2%;
      /* background: transparent; */
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      border-radius: 16px;

    }

    .profile-card {
      background: white;
      border-radius: 16px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin-bottom: 30px;
    }

    .profile-header {
      background: linear-gradient(to right, var(--primary), var(--secondary));
      padding: 40px 20px 30px;
      text-align: center;
      color: white;
      position: relative;
    }

    .profile-img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid white;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease;
      margin-bottom: 15px;
    }

    .profile-img:hover {
      transform: scale(1.05);
    }

    .profile-header h1 {
      font-weight: 700;
      margin: 15px 0 5px;
      font-size: 2rem;
    }

    .username {
      font-size: 1.1rem;
      opacity: 0.9;
      margin-bottom: 0;
    }

    .profile-details {
      padding: 30px;
    }

    .profile-details h3 {
      color: var(--primary);
      font-size: 1.5rem;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 2px solid #f0f0f0;
    }

    .detail-row {
      display: flex;
      margin-bottom: 15px;
      align-items: center;
    }

    .detail-label {
      font-weight: 600;
      color: var(--dark);
      width: 120px;
      flex-shrink: 0;
    }

    .detail-value {
      color: var(--gray);
      flex-grow: 1;
    }

    .btn-edit {
      display: inline-block;
      background: linear-gradient(to right, var(--primary), var(--secondary));
      color: white;
      padding: 12px 30px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      margin-top: 20px;
      box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
    }

    .btn-edit:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(67, 97, 238, 0.4);
      color: white;
    }

    /* Stats Section */
    .profile-stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 15px;
      margin-top: 30px;
    }

    .stat-card {
      background: white;
      border-radius: 12px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-5px);
    }

    .stat-number {
      font-size: 2rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 5px;
    }

    .stat-label {
      color: var(--gray);
      font-size: 0.9rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .profile-stats {
        grid-template-columns: 1fr;
      }

      .detail-row {
        flex-direction: column;
        align-items: flex-start;
      }

      .detail-label {
        margin-bottom: 5px;
        width: auto;
      }

      .navbar-brand {
        font-size: 1.5rem;
      }
    }

    * {
      font: candara !important;
    }

    /* Animations */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .profile-card {
      animation: fadeIn 0.6s ease-out forwards;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="Biddy.php">
          <img src="../Image/lg.png" alt="Bid" height="25px" width="70px" style="border-radius: 10px; padding:0px;">
        </a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="UserProfile.php"><b>Home</b></a></li>
        <li><a href="UserPost.php"><b>Post</b></a></li>
        <li><a href="MyPost.php"><b>MyPost</b></a></li>
        <li><a href="MyBid.php"><b>MyBid</b></a></li>
        <li><a href="UUpdate.php"><b>Update Profile</b></a></li>
        <li><a href="Bidding.php"><b>Bidding</b></a></li>
        <li><a href="UNotification.php"><b>Notification</b></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <?php
    // Database connection
    $DATABASE = "localhost";
    $username = "root";
    $psrd = "";
    $dbname = "Bidding";
    $connection = mysqli_connect($DATABASE, $username, $psrd, $dbname);

    // Check if connection is successful
    if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Get the username from session
    $uname = $_SESSION['username'];

    // Query to fetch user details from the database
    $query = "SELECT * FROM User WHERE UserName='$uname'";
    $result = mysqli_query($connection, $query);

    // If user exists
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);

      // Setting default values if some data is missing
      $photo = !empty($row['Photo']) ? $row['Photo'] : 'path/to/default-profile.png';
      $name = htmlspecialchars($row['Name']);
      $email = htmlspecialchars($row['Email']);
      $address = htmlspecialchars($row['Address']);
      $phone = htmlspecialchars($row['Phone'] ?? 'Not provided');
      $dob = htmlspecialchars($row['DOB'] ?? 'Not provided');
      // $join_date = htmlspecialchars($row['JoinDate']);

      // Display user profile
      echo "<div class='profile-container'>";
      echo "<div class='profile-header text-center'>";
      echo "<img class='profile-img' src='" . htmlspecialchars($photo) . "' alt='Profile Image'>";
      echo "<h1>" . $name . "</h1>";
      echo "<p class='username'>@" . htmlspecialchars($row['UserName']) . "</p>";
      echo "</div>";

      echo "<div class='profile-details'>";
      echo "<h3>Profile Details</h3>";
      echo "<p><strong>Email:</strong> " . $email . "</p>";
      echo "<p><strong>Address:</strong> " . $address . "</p>";
      echo "<p><strong>Phone:</strong> " . $phone . "</p>";
      echo "<p><strong>Date of Birth:</strong> " . $dob . "</p>";
      // echo "<p><strong>Member Since:</strong> " . date('F j, Y', strtotime($join_date)) . "</p>";
      echo "</div>";

      // Option to edit profile
      echo "<div class='profile-actions'>";
      echo "<a href='UUpdate.php?username=" . $uname . "' class='btn-edit'>Edit Profile</a>";
      echo "</div>";

      // Displaying the user's activity or other details (optional)
      // For example, user's recent posts, orders, etc.
      // Example: echo "<h3>Recent Activity</h3>";
      // Example: echo "<p>Recent post: [Post Title]</p>";
      echo "</div>";
    } else {
      echo "<p>No user found.</p>";
    }

    // Close the database connection
    mysqli_close($connection);
    ?>
  </div>

</body>

</html>