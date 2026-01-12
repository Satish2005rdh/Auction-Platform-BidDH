<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    body {
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      background-color: rgba(255, 255, 255, 1);
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
        <li class="active"><a href="AdminMagane.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>

        <li><a href="AddAdmin.php"><b>Add Admin</b></a></li>
        <li><a href="ADeleteUser.php"><b>Delete User</b></a></li>
        <li><a href="ADeletePost.php"><b>Delete Post</b></a></li>
        <li><a href="ANotification.php"><b>Notification</b></a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>

      </ul>
    </div>
  </nav>

  <div class="admin-welcome-card">
    <div class="icon">🛡️</div>
    <div class="content">
      <h2>Welcome back, Admin 👋</h2>
      <p>Your auction dashboard is ready. Manage auctions, users, and bids securely.</p>
    </div>
  </div>

  <style>
    .admin-welcome-card {
      display: flex;
      gap: 18px;
      background: linear-gradient(135deg, #1e293b, #0f172a);
      color: white;
      padding: 22px 28px;
      border-radius: 14px;
      align-items: center;
      box-shadow: 0 15px 35px rgba(0, 0, 0, .4);
      margin-left: 20%;
      margin-right: 20%;
      margin-top: 5%;
    }

    .admin-welcome-card .icon {
      background: #0ea5e9;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 28px;
    }

    .admin-welcome-card h2 {
      margin: 0;
      font-size: 22px;
    }

    .admin-welcome-card p {
      margin-top: 6px;
      font-size: 14px;
      opacity: .85;
    }
  </style>


</body>

</html>