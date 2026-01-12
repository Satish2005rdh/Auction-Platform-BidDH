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
  <link rel="stylesheet" href="../CSS/navbar.css">

  <style>
    /* ===== PAGE ===== */
    body {
      background: white;
      margin: 0;
      font-family: Segoe UI, sans-serif;
      color: black;
    }

    /* ===== TABLE CONTAINER ===== */
    .data-table {
      width: 90%;
      max-width: 900px;
      margin: 60px auto;
      border-collapse: collapse;
      background: rgba(225, 217, 217, 0.9);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 20px 40px rgba(198, 191, 191, 0.8);
    }

    /* ===== HEADER ===== */
    .data-table thead {
      background: linear-gradient(45deg, #00c6ff, #0072ff);
    }

    .data-table th {
      padding: 16px;
      text-align: center;
      font-size: 15px;
      font-weight: 600;
    }

    /* ===== BODY ===== */
    .data-table td {
      padding: 14px;
      text-align: center;
      font-size: 14px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.15);
    }

    /* ===== ROW HOVER ===== */
    .data-table tbody tr {
      transition: .3s;
    }

    .data-table tbody tr:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: scale(1.01);
    }

    /* ===== PRICE ===== */
    .data-table td:last-child {
      color: black;
      font-weight: 600;
    }

    /* ===== EMPTY ALERT ===== */
    .alert-box {
      width: 400px;
      margin: 80px auto;
      background: rgba(255, 255, 255, 0.1);
      padding: 25px;
      border-radius: 20px;
      text-align: center;
      box-shadow: 0 0 25px rgba(0, 198, 255, .6);
    }

    /* ===== MOBILE ===== */
    @media(max-width:768px) {
      .data-table {
        width: 95%;
      }

      .data-table th,
      .data-table td {
        font-size: 12px;
        padding: 10px;
      }
    }


    /* Animation */
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

    .container {
      animation: fadeIn 0.6s ease-out;
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
        <li><a href="UserProfile.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>

        <li><a href="UserPost.php"><b>Post</b></a></li>
        <li><a href="MyPost.php"><b>MyPost</b></a></li>
        <li class="active"><a href="MyBid.php"><b>MyBid</b></a></li>
        <li><a href="UUpdate.php"><b>Update Profile</b></a></li>
        <li><a href="Bidding.php"><b>Bidding</b></a></li>
        <li><a href="UNotification.php"><b>Notification</b></a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>

      </ul>
    </div>
  </nav>


  <?php


  $Server = "localhost";
  $username = "root";
  $psrd = "";
  $dbname = "Bidding";
  $connection = mysqli_connect($Server, $username, $psrd, $dbname);


  $uname = $_SESSION['username'];

  $query = "select * from Product where Buyer='$uname' and ProductStatus='Available'";
  $Rows = mysqli_query($connection, $query);

  if (mysqli_num_rows($Rows) > 0) {
    echo '<table class="data-table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Product Name</th>';
    echo '<th>Catagory</th>';
    echo '<th>SellerName</th>';
    echo '<th>Sold Price</th>';

    echo '</tr>';
    echo '</thead>';

    echo '<tbody>';

    while ($row = mysqli_fetch_array($Rows)) {

      echo '<tr>
           <td>' . $row['ProductName'] . '</td>

            <td>' . $row['CatagoryName'] . '</td>
             <td>' . $row['UserName'] . '</td>
             <td>' . $row['Price'] . '</td>
        </tr>';
    }
  } else {
    echo "<script> window.alert('You Are Not Participate Any Bid Yet');</script>";
  }

  ?>
</body>

</html>