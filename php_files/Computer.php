<?php
$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);


$query = "SELECT * FROM Product WHERE ProductStatus = 'No' ";

$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result)) {
  $datenow = date("Y-m-d");

  $duedate = $row['EndDate'];

  $prodid = $row['ProductID'];
  if ($datenow >= $duedate) {

    $buyer = $row['Buyer'];


    if ($buyer == "Null") {
      $seller = $row['UserName'];
      $ProductName = $row['ProductName'];

      $message = "Sorry Mr." . $seller . ", Your Product " . $ProductName . " Remain Unsold  No one bid your product";
      $query1 = "insert into Notification values('$seller','$message','No')";
      mysqli_query($connection, $query1);
    } else {
      $qry = "UPDATE Product SET ProductStatus = 'Yes' WHERE ProductID = '$prodid'";
      mysqli_query($connection, $qry);

      $seller = $row['UserName'];
      $buyer = $row['Buyer'];
      $ProductName = $row['ProductName'];

      $qry1 = "select * from User where UserName='$seller'";
      $result1 = mysqli_query($connection, $qry1);
      $row1 = mysqli_fetch_array($result1);
      $sname = $row1['Name'];
      $semail = $row1['Email'];
      $sphone = $row1['Phone'];

      $qry2 = "select * from User where UserName='$buyer'";
      $result2 = mysqli_query($connection, $qry2);
      $row2 = mysqli_fetch_array($result2);
      $bname = $row2['Name'];
      $bemail = $row2['Email'];
      $bphone = $row2['Phone'];

      $message = "Congratulation Mr." . $sname . ", Your Product " . $ProductName . " has been sold and Buyer is " . $bname . " You can contact with Buyer by Email:" . $bemail . " or You can use phone:" . $bphone . ".";
      $query1 = "insert into Notification values('$seller','$message','No')";
      mysqli_query($connection, $query1);

      $message = "Congratulation Mr." . $bname . ", Your are the final and highest bidder of  Product " . $ProductName . ". Now This is Your Product. Product Seller is " . $sname . ", You can contact with Seller by Email:" . $semail . " or You can use phone: " . $sphone . ".";
      $query2 = "insert into Notification values('$buyer','$message','No')";
      mysqli_query($connection, $query2);
    }
  }
}

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
    * {
      font: candara !important;
    }

    /* Page */
    body {
      background: #ffffff;
      margin: 0;
      font-family: Segoe UI, sans-serif;
      color: #000;
    }

    /* Main table */
    table {
      width: 95%;
      max-width: 1100px;
      margin: 40px auto;
      border-collapse: separate;
      border-spacing: 25px;
    }

    /* Make each row 2 equal columns */
    table tr {
      display: grid;
      grid-template-columns: 1fr 1fr;
      /* 50% – 50% */
      gap: 25px;
    }

    /* Each auction box */
    td {
      background: #ffffff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    /* Image cell */
    td:first-child {
      align-items: center;
    }

    /* Product image */
    td img {
      width: 100%;
      max-width: 420px;
      height: 260px;
      object-fit: contain;
      border-radius: 8px;
      /* border: 1px solid #ccc; */
    }

    /* Text cell */
    td:last-child {
      text-align: left;
    }

    /* Description heading */
    h2 {
      font-size: 18px;
      margin: 10px 0;
      color: #000;
    }

    /* Product name */
    h4 {
      font-size: 20px;
      margin: 8px 0;
    }

    /* Text */
    td {
      font-size: 14px;
      line-height: 1.6;
    }

    /* Button hover */
    a:hover {
      background: #333;
    }

    /* Horizontal line */
    hr {
      border: none;
      height: 1px;
      background: #ddd;
      margin-top: 15px;
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
        alert("Please Login in Your Account");

        window.location = 'BidProduct.php?bid=' + id
      }
    }
  </script>
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
        <li class="active1"><a href="Home.php">Running</a></li>
        <li class="active1"><a href="sold.php">Sold</a></li>
        <li class="active" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
            href="#"><b>&nbsp&nbspComputer</b><span class="caret"></span></a>
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

  <table>


    <?php
    $Server = "localhost";
    $username = "root";
    $psrd = "";
    $dbname = "Bidding";
    $connection = mysqli_connect($Server, $username, $psrd, $dbname);

    $query = "select * from product where CatagoryName='Computer' and ProductStatus='Available' ";
    $Result = mysqli_query($connection, $query);
    $break = 0;

    while ($row = mysqli_fetch_array($Result)) {

      if ($break == 2) {
        echo "<tr>";
        $break = 0;
      }
      $datenow = date("Y-m-d");

      $sdate = $row['StartDate'];
      if ($sdate <= $datenow) {
        echo '<td>';
        echo "<img src='../ProductPhoto/" . $row['Image'] . "' width='170px' height='220px'><br>";
        echo '</td>';
        echo '<td>';
        echo "<h2> Description</h2>";

        echo "<h4>";
        echo "<b>";
        $name = $row['ProductID'];
        echo $row['ProductName'];
        echo "</b>";
        echo "</h4>";

        echo $row['Description'];
        echo "<br>";
        echo "<b>";
        echo "Ending On: ";
        echo "</b>";
        echo date("d M Y", strtotime($row['EndDate']));
        echo "<br>";
        echo "<b>";
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
        echo '</td>';
      }
    }
    ?>

  </table>



</body>

</html>