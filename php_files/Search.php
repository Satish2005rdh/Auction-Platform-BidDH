<!DOCTYPE html>
<html>

<head>
  <title>Search</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../CSS/navbar.css">
  <style>
    /* Page */
    body {
      background: #ffffff;
      margin: 0;
      font-family: Segoe UI, sans-serif;
      color: #000;
    }

    /* Product table */
    table {
      width: 95%;
      max-width: 1200px;
      margin: 40px auto;
      border-collapse: separate;
      border-spacing: 30px;
    }

    /* Each product row */
    table tr {
      display: grid;
      grid-template-columns: 1fr 1fr;
      /* 50% - 50% */
      gap: 30px;
    }

    /* Product cards */
    td {
      background: #ffffff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    /* Image column */
    td:first-child {
      align-items: center;
    }

    /* Product image */
    td img {
      width: 100%;
      max-width: 420px;
      height: 280px;
      object-fit: contain;
      border-radius: 10px;
      /* border: 1px solid #ddd; */
    }

    /* Text column */
    td:last-child {
      text-align: left;
    }

    /* Headings */
    h1 {
      font-size: 16px;
      margin: 5px 0;
    }

    h3 {
      font-size: 22px;
      margin: 8px 0 12px;
    }

    /* Text */
    td {
      font-size: 14px;
      line-height: 1.6;
    }

    /* Price & date */
    b {
      font-size: 16px;
    }


    /* Divider */
    hr {
      border: none;
      height: 1px;
      background: #ddd;
      margin: 20px 0;
    }

    /* Mobile */
    @media(max-width:768px) {
      table tr {
        grid-template-columns: 1fr;
      }

      td {
        text-align: center;
      }

      td img {
        height: 220px;
      }
    }
  </style>

  <script type="text/javascript">
    function bid(id) {
      if (confirm('Sure Participate?')) {
        alert('You Are Not Sign in, Please Sign In For Bid');
        window.location = 'BidProduct.php?bid=' + id
      }
    }
  </script>

</head>

<body>

  <div>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="Biddy.php">
            <img src="../Image/lg.png" alt="Bid" height="25px" width="70px" style="border-radius: 10px; padding:0px;">
          </a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active1"><a href="Home.php">Running</a></li>
          <li class="active1"><a href="sold.php">Sold</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>&nbsp&nbspProducts</b><span
                class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Car.php"><b>Car</b></a></li>
              <li><a href="Mobile.php"><b>Mobile</b></a></li>
              <li><a href="Computer.php"><b>Computer</b></a></li>
            </ul>

          </li>


          <form class="navbar-form navbar-left" action="Search.php" method="POST">
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Search" size="40">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
          </form>
        </ul>


        <ul class="nav navbar-nav navbar-right">
          <li><a href="About Project.php"><b>About site</b></a></li>
          <li><a href="Contact Us.php"><b>Contact Us</b></a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Login</b><span
                class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="UserLogin.php"><b>User Login</b></a></li>
              <li><a href="AdminLogin.php"><b>Admin Login</b></a></li>
            </ul>
          </li>
          <li><a href="Registration.php"><span class="glyphicon glyphicon-user"></span> <b>Sign Up</b></a></li>

        </ul>
      </div>
    </nav>
  </div>


  <table align="center">

    <?php

    $Server = "localhost";
    $username = "root";
    $psrd = "";
    $dbname = "Bidding";
    $connection = mysqli_connect($Server, $username, $psrd, $dbname);

    $search = $_POST['search'];

    $query = "select * from Product where ProductName like '%" . $search . "%' OR CatagoryName like '%" . $search . "%' ";


    $result = mysqli_query($connection, $query);
    $break = 0;

    if (mysqli_num_rows($result) > 0) {

      while ($row = mysqli_fetch_array($result)) {
        if ($break == 2) {
          echo "<tr>";
          $break = 0;
        }


        echo '<td>';
        echo "<img src='../ProductPhoto/" . $row['Image'] . "' width='100%' height='100%'>";
        echo '</td>';
        echo '<td>';
        echo "<h1> Description</h1>";
        echo "<h3>";
        echo $row['ProductName'];
        echo "</h3>";

        echo $row['Description'];
        echo "<br>";
        echo "<b>";
        echo "Ending On: ";
        echo "</b>";
        echo date("d M Y", strtotime($row['EndDate']));
        echo "<br>";
        echo "Price: ";
        echo $row['Price'];
        echo "</b>";
        echo "<br>";

    ?>
        <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="../Image/bidnow.png" style="width:50px;height:50px;"
            alt="Bid" /> <span style="color: green;font-size: 20px"><b>Running</b></span> </a>
    <?php

        $break++;
        echo "<hr>";
        echo "<hr>";
        echo '</td>';
      }
    } else {
      echo "<script>window.alert('Data Not Found');</script>";
    }



    ?>

</body>

</html>