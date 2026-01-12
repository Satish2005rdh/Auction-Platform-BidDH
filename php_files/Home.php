<?php
$connection = mysqli_connect("localhost", "root", "", "Bidding");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>BIDDY | Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../CSS/navbar.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* ===== HERO ===== */
    .templete {
      width: 100%;
    }

    .mainsection {
      padding: 30px 0;
    }

    .hero-banner {
      background: #ffffff;
      color: #000000;
      text-align: center;

    }

    .hero-banner h1 {
      font-size: 40px;
      margin-bottom: 10px;
    }

    .hero-banner p {
      font-size: 18px;
    }

    /* ===== PRODUCT TABLE ===== */
    table {
      width: 90%;
      max-width: 1200px;
      margin: auto;
      border-collapse: separate;
      border-spacing: 40px 30px;
    }

    /* Each product row */
    table tr {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 30px;
    }

    /* Card */
    table tr td {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, .15);
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    /* IMAGE SIDE */
    table tr td:first-child {
      align-items: center;
      justify-content: center;
    }

    table tr td:first-child img {
      width: 100%;
      max-width: 420px;
      height: 300px;
      object-fit: contain;
      border-radius: 10px;
      /* border: 1px solid #ddd; */
    }

    /* TEXT SIDE */
    table tr td:last-child {
      text-align: left;
    }

    /* Titles */
    h1 {
      font-size: 16px;
      margin: 5px 0;
    }

    h3 {
      font-size: 22px;
      margin: 8px 0 12px;
    }

    /* Content */
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

    /* ===== MOBILE ===== */
    @media(max-width:768px) {
      table tr {
        grid-template-columns: 1fr;
      }

      table tr td {
        text-align: center;
      }

      table tr td:last-child {
        align-items: center;
      }

      table tr td:first-child img {
        height: 220px;
      }
    }
  </style>
  <script>
    function bid(id) {
      if (confirm('Sure Participate?')) {
        alert('You Are Not Signed In. Please Login First.');
        window.location = 'BidProduct.php?bid=' + id;
      }
    }
  </script>
</head>

<body>

  <!-- ================= NAVBAR ================= -->
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

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">Products <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Car.php">Car</a></li>
            <li><a href="Mobile.php">Mobile</a></li>
            <li><a href="Computer.php">Computer</a></li>
          </ul>
        </li>
      </ul>

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
        <li><a href="About Project.php">About</a></li>
        <li><a href="Contact Us.php">Contact</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">Login <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="UserLogin.php">User Login</a></li>
            <li><a href="AdminLogin.php">Admin Login</a></li>
          </ul>
        </li>
        <li><a href="Registration.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
      </ul>
    </div>
  </nav>

  <!-- ================= HERO BANNER ================= -->
  <div class="templete">

    <div class="mainsection">

      <div class="hero-banner">
        <h1>View, Bid & Buy Online</h1>
        <p>India’s most trusted and secure online bidding platform</p>
      </div>

      <!-- ================= PRODUCT LIST ================= -->
      <table>
        <tbody>

          <?php
          $Server = "localhost";
          $username = "root";
          $psrd = "";
          $dbname = "Bidding";
          $connection = mysqli_connect($Server, $username, $psrd, $dbname);

          $search = $_POST['search'] ?? '';

          $query = "
SELECT * FROM Product 
WHERE EndDate IS NULL OR EndDate >= CURDATE();
";

          $result = mysqli_query($connection, $query);

          $break = 0;

          if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

              if ($break == 2) {
                echo "<tr>";
                $break = 0;
              }

              echo "<td>";
              echo "<img src='../ProductPhoto/" . $row['Image'] . "' width='100%' height='100%'>";
              echo "</td>";

              echo "<td>";
              echo "<h1>Description</h1>";
              echo "<h3>" . $row['ProductName'] . "</h3>";
              echo $row['Description'] . "<br>";
              echo "<b>";
              echo "Ending On: ";
              echo "</b>";
              echo date("d M Y", strtotime($row['EndDate']));
              echo "<br>";
              echo "<b>Price: ₹" . $row['Price'] . "</b><br>";
          ?>

              <a href="javascript:bid(<?php echo $row['ProductID']; ?>)">
                <img src="../Image/bidnow.png" width="50px" height="50px" alt="Bid" />
                <span style="color:lime;font-size:18px"><b>Running</b></span>
              </a>

          <?php
              $break++;
              echo "<hr><hr>";
              echo "</td>";
            }
          } else {
            echo "<script>alert('No matching auction found');</script>";
          }
          ?>


        </tbody>
      </table>

    </div>
  </div>

</body>

</html>