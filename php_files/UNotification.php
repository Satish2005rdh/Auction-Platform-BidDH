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
    /* Base Styles */
    body {
      font-family: 'Poppins', Candara, sans-serif;
      background: linear-gradient(to right, #ffffffff, #ffffffff);
      color: #000000ff;
      margin: 0;
      padding: 0;
    }

    /* Consistent font application */
    * {
      font-family: inherit;
    }

    /* Notification message */
    .msg {
      font-size: 28px;
      padding: 20px;
      margin: 30px auto;
      text-align: center;
      background: rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      max-width: 80%;
    }

    /* Modern Table Styling */
    .data-table {
      margin: 30px auto;
      width: 100%;
      max-width: 800px;
      border-collapse: collapse;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(5px);
    }

    .data-table thead {
      background-color: rgba(31, 41, 55, 0.8);
    }

    .data-table th,
    .data-table td {
      padding: 14px 20px;
      text-align: left;
      color: #000000ff;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .data-table tbody tr:nth-child(even) {
      background-color: rgba(255, 255, 255, 0.05);
    }

    .data-table tbody tr:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    /* Button Styles */
    .btn {
      display: block;
      background-color: #ff4b5c;
      color: #000000ff;
      border: none;
      padding: 12px 28px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
      margin: 30px auto;
      text-align: center;
      width: fit-content;
    }

    .btn:hover {
      background-color: #e03e4c;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    /* Success message */
    .success-message {
      font-size: 28px;
      text-align: center;
      margin-top: 60px;
      color: #000000ff;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
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
        <li><a href="MyBid.php"><b>MyBid</b></a></li>
        <li><a href="UUpdate.php"><b>Update Profile</b></a></li>
        <li><a href="Bidding.php"><b>Bidding</b></a></li>
        <li class="active"><a href="UNotification.php"><b>Notification</b></a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>

      </ul>
    </div>
  </nav>
  <?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Server = "localhost";
    $username = "root";
    $psrd = "";
    $dbname = "Bidding";
    $connection = mysqli_connect($Server, $username, $psrd, $dbname);


    $uname = $_SESSION['username'];


    $query = "delete from Notification where UserName='$uname'";

    mysqli_query($connection, $query);
  }

  ?>

  <?php


  $Server = "localhost";
  $username = "root";
  $psrd = "";
  $dbname = "Bidding";
  $connection = mysqli_connect($Server, $username, $psrd, $dbname);


  $uname = $_SESSION['username'];

  $count = 0;
  $query = "select * from Notification where UserName='$uname' and Seen='No'";
  $Rows = mysqli_query($connection, $query);
  $count = mysqli_num_rows($Rows);





  if ($count == 0) {
    echo "<br><br>";
    echo "<h1 style='font-size:30px;color:green;text-align:center;'>";
    echo "You Have Not Any New Notification Now";
    echo "</h1>";
  }

  if ($count > 0) {

    echo "<script> alert('You Have $count New Notification');</script>";

    echo "<form method='POST'>";
    echo '<table  style="width:7000px;height:100px;border:2px solid black" class="data-table">
     <thead>
     <tr>
           
      
       
       <th>Message</th>   
      
      
    </tr>
  </thead>

<tbody>';

    while ($row = mysqli_fetch_array($Rows)) {
      echo "<tr>";


      echo "<td>";
      echo $row['messege'];
      echo "</td>";

      /*  echo "<td>";
         $uname=$row[0];
      echo"<a href=javascript:del('$uname')> <img src='Image/Delete2.jpg'  width='50px' height='50px' alt='Bid'/> </a>";
       echo "</td>";*/
    }

    echo "<p style='align-items:left'>
<button type='submit' class='btn btn-primary' >Delete All Message</button>
</p>";

    echo "</form>";
    echo "</tbody>";
  }



  ?>

</body>

</html>