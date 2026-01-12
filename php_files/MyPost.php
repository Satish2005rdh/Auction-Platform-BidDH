<?php session_start() ?>


<?php

$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);

?>


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
    /* ===== CATEGORY HEADING ===== */
    #heading {
      font-size: 26px;
      font-weight: 600;
      text-align: center;
      margin: 30px 0 15px;
      color: black;
      letter-spacing: 1px;
    }

    /* ===== CATEGORY BOX ===== */
    .category-box {
      width: 100%;
      display: flex;
      justify-content: center;
      margin-bottom: 25px;
      color: #000;
    }

    /* ===== SELECT DROPDOWN ===== */
    #Catagory {
      width: 320px;
      padding: 14px 20px;
      border-radius: 30px;
      border: none;
      outline: none;
      background: rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(10px);
      color: black;
      font-size: 16px;
      text-align: center;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
      transition: .3s;
      appearance: none;
    }

    #Catagory option {
      color: black;
    }

    /* Hover & Focus */
    #Catagory:hover,
    #Catagory:focus {
      box-shadow: 0 0 30px rgba(0, 198, 255, .7);
      transform: scale(1.03);
    }

    /* ===== VIEW BUTTON ===== */
    .view-btn {
      margin-top: 20px;
      padding: 12px 35px;
      border: none;
      border-radius: 30px;
      font-size: 16px;
      font-weight: 600;
      background: linear-gradient(45deg, #00c6ff, #0072ff);
      color: white;
      cursor: pointer;
      transition: .3s;
      box-shadow: 0 0 25px rgba(0, 198, 255, .6);
    }

    .view-btn:hover {
      transform: scale(1.1);
      box-shadow: 0 0 40px rgba(0, 198, 255, 1);
    }

    /* ===== TABLE WRAPPER ===== */
    .table-wrapper {
      width: 100%;
      /* margin-top:40px; */
      overflow-x: auto;
      background: rgba(255, 255, 255, 0.06);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 20px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.6);
      align-items: center;
    }

    /* ===== TABLE ===== */
    .data-table {
      width: 70%;
      border-collapse: collapse;
      color: black;
      border-radius: 16px;
      box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.1);
      align-items: center;
      margin-left: 15%;
    }

    /* ===== HEAD ===== */
    .data-table thead {
      background: linear-gradient(45deg, #00c6ff, #0072ff);
    }

    .data-table th {
      padding: 16px;
      font-size: 15px;
      font-weight: 600;
      text-align: center;
    }

    /* ===== BODY ===== */
    .data-table td {
      padding: 14px;
      text-align: center;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      font-size: 14px;
    }

    /* ===== ROW HOVER ===== */
    .data-table tbody tr {
      transition: .3s;
    }

    .data-table tbody tr:hover {
      background: rgba(255, 255, 255, 0.08);
      transform: scale(1.01);
    }

    /* ===== PRODUCT IMAGE ===== */
    .data-table img {
      width: 70px;
      height: 60px;
      border-radius: 10px;
      object-fit: cover;
      box-shadow: 0 0 10px rgba(0, 0, 0, .6);
    }

    /* ===== STATUS ===== */
    .status-active {
      color: #00ffcc;
      font-weight: 600;
    }

    .status-expired {
      color: #ff6b6b;
      font-weight: 600;
    }

    /* ===== ACTION BUTTONS ===== */
    .table-btn {
      padding: 7px 15px;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      font-size: 13px;
      font-weight: 600;
      transition: .3s;
    }

    .btn-edit {
      background: #00c6ff;
      color: white;
    }

    .btn-delete {
      background: #ff4b2b;
      color: white;
    }

    .table-btn:hover {
      transform: scale(1.1);
      box-shadow: 0 0 20px rgba(255, 255, 255, .5);
    }

    /* ===== MOBILE ===== */
    @media(max-width:768px) {

      .data-table th,
      .data-table td {
        font-size: 12px;
        padding: 10px;
      }
    }
  </style>


  <script>
    function validform() {


      if (document.getElementById("Catagory").value == "Select Catagory") {
        alert("Please select Product Catagory"); // prompt user
        // document.getElementById("election").focus(); //set focus back to control
        return false;
      }
      // return true;
    }
  </script>


</head>

<body>


  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $catagory = $_POST['Catagory'];


    $uname = $_SESSION['username'];



    if ($catagory == 'All') {
      $query = "select * from Product where UserName='$uname'";
      $Rows = mysqli_query($connection, $query);

      if (mysqli_num_rows($Rows) > 0) {
        echo '<table class="data-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Catagory </th>';
        echo '<th>Photo </th>';
        echo '<th>Product Name</th>';
        echo '<th>Price</th>';
        echo '<th>Sold or Not?</th>';
        echo '<th>Start Date</th>';
        echo '<th>End Date</th>';
        echo '</tr>';
        echo '</thead>';

        echo '<tbody>';

        while ($row = mysqli_fetch_array($Rows)) {

          echo '<tr>
        <td>' . $row['CatagoryName'] . '</td>
        <td><img style="width:100px;height:100px" src="../ProductPhoto/' . $row['Image'] . '"></td>
        <td>' . $row['ProductName'] . '</td>
        <td>' . $row['Price'] . '</td>
        <td>' . $row['ProductStatus'] . '</td>
        <td>' . $row['StartDate'] . '</td>
        <td>' . $row['EndDate'] . '</td>
      </tr>';
        }
      } else {
        echo "<script> window.alert('You Have Not Any Post Yet');</script>";
      }
    } else {

      $query = "select * from Product where UserName='$uname' and CatagoryName='$catagory'";
      $Rows = mysqli_query($connection, $query);

      if (mysqli_num_rows($Rows) > 0) {
        echo '<table class="data-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Catagory </th>';
        echo '<th>Photo </th>';
        echo '<th>Product Name</th>';
        echo '<th>Price</th>';
        echo '<th>Sold or Not?</th>';
        echo '<th>Start Date</th>';
        echo '<th>End Date</th>';
        echo '</tr>';
        echo '</thead>';

        echo '<tbody>';

        while ($row = mysqli_fetch_array($Rows)) {

          echo '<tr>
        <td>' . $row['CatagoryName'] . '</td>
        <td><img style="width:100px;height:100px" src="../ProductPhoto/' . $row['Image'] . '"></td>
        <td>' . $row['ProductName'] . '</td>
        <td>' . $row['Price'] . '</td>
        <td>' . $row['ProductStatus'] . '</td>
        <td>' . $row['StartDate'] . '</td>
        <td>' . $row['EndDate'] . '</td>
      </tr>';
        }
      } else {
        echo "<script> window.alert('You Have Not Any Post Yet On this Catagory');</script>";
      }
    }

    echo '</tbody>';
  }
  ?>
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
        <li class="active"><a href="MyPost.php"><b>MyPost</b></a></li>
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


  <p id="heading">Select Product Catagory</p>
  <center>
    <form method="POST" name="CatagoryForm" onsubmit="return validform();">
      <br>
      <div align="center">

        <select name="Catagory" id="Catagory" onchange="fetch_select(this.value);">
          <option>Select Catagory</option>
          <option>Mobile</option>
          <option>Computer</option>
          <option>Car</option>
          <option>All</option>
        </select><br>

      </div>
  </center>
  <p style=" margin: -2.7% 10% 10% 68%">
    <button type="submit" class="btn btn-primary">View</button>
    </form>


</body>

</html>