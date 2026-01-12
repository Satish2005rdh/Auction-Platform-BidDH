<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  /* ===== PAGE BACKGROUND ===== */
  body {
    margin: 0;
    background: white;
    font-family: Segoe UI, sans-serif;
  }

  /* ===== BACK IMAGE ===== */
  p img {
    border-radius: 50%;
    transition: .3s;
  }

  p img:hover {
    transform: scale(1.1);
    box-shadow: 0 0 15px rgba(0, 198, 255, .8);
  }

  /* ===== MAIN PRODUCT TABLE ===== */
  table {
    width: 900px;
    max-width: 95%;
    margin: auto;
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(202, 193, 193, 0.8);
    overflow: hidden;
  }

  /* Table cells */
  table td {
    padding: 30px;
    margin-left: 2%;
    vertical-align: middle;
  }

  /* Product image */
  table img {
    /* width: 100%; */
    /* max-width: 550px; */
    border-radius: 15px;
  }

  /* Product title */
  h2 {
    color: #000000ff;
    font-size: 26px;
    margin-bottom: 10px;
  }

  /* Description */
  h4 {
    color: #000000ff;
    font-weight: normal;
  }

  /* Current price */
  h4 b {
    color: #000000ff;
    font-size: 20px;
  }

  /* ===== HEADING ===== */
  #heading {
    text-align: center;
    color: white;
    font-size: 22px;
    margin-top: 30px;
  }

  /* ===== BID SELECT ===== */
  #Catagory {
    width: 300px;
    padding: 14px;
    border-radius: 30px;
    border: 1px solid black;
    background: rgba(255, 255, 255, .15);
    color: black;
    text-align: center;
    font-size: 16px;
  }

  /* ===== BID BUTTON ===== */
  .btn {
    background: linear-gradient(45deg, #2f3131ff, #0072ff);
    border: black;
    border-radius: 30px;
    padding: 12px 35px;
    font-size: 16px;
    font-weight: 600;
    color: black;
    box-shadow: 0 0 25px rgba(0, 198, 255, .6);
    transition: .3s;
  }

   .back{
    border-radius: 10%;
    margin-top:20px;
    transition: .3s;
    margin-left:25px;
    color:white;
    background:black;
    position: absolute;
    font-size: 20px;;
    padding: 5px;
  }

  .btn:hover {
    transform: scale(1.1);
    box-shadow: 0 0 40px rgba(0, 198, 255, 1);
  }

  /* ===== MOBILE FIX ===== */
  @media(max-width:768px) {
    table {
      width: 95%;
    }

    table td {
      display: block;
      text-align: center;
    }
  }
</style>

<body>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Server = "localhost";
    $username = "root";
    $psrd = "";
    $dbname = "Bidding";
    $connection = mysqli_connect($Server, $username, $psrd, $dbname);
    $id = $_GET['bid'];
    $price = $_POST['Catagory'];
    $buyer = $_SESSION['uname'];

    $qry = "select * from Product where ProductID='$id'";
    $Rslt = mysqli_query($connection, $qry);

    $rw = mysqli_fetch_array($Rslt);

    $postbuyer = $rw['Buyer'];
    $productname = $rw['ProductName'];
    //echo $productname;
    // echo $postbuyer;
    $message = $postbuyer . " Someone Bid higher than your Bid price on product " . $productname . '! , You Can Bid Again This Product ';

    $insert = "INSERT INTO Notification (UserName, messege, Seen)
           VALUES ('$postbuyer', '$message', 'No')";
    mysqli_query($connection, $insert);


    $query = "update Product set Price='$price',Buyer='$buyer' where ProductID='$id'";

    mysqli_query($connection, $query);

    header('Location:Home.php');
  }

  ?>

  <?php

  if (isset($_GET['bid'])) {

    $Server = "localhost";
    $username = "root";
    $psrd = "";
    $dbname = "Bidding";
    $connection = mysqli_connect($Server, $username, $psrd, $dbname);
    $uname = $_SESSION['uname'];
    $id = $_GET['bid'];

    $query = "select * from Product where ProductID ='$id'";

    $Result = mysqli_query($connection, $query);

    $row = mysqli_fetch_array($Result);

    $UserName = $row['UserName'];


    if ($UserName == $uname) {
      $message = "This Is Your Product, You Can Not Bid Your Own Product";

      header("Location: Home.php?message=" . urlencode($message));

      exit();
    } else {

      echo "<p>";
      echo '<a href="Home.php"> <h2 class="back"><i><-Back</i></h2> </a>';
      echo "</p>";
      $qry = "select * from Product where ProductID ='$id'";

      $Result = mysqli_query($connection, $qry);

      $row = mysqli_fetch_array($Result);

      $Price = $row['Price'];

      $price1 = $Price + 100;
      $price2 = $Price + 300;
      $price3 = $Price + 500;
      $query = "select * from product where ProductID='$id'";
      $Result = mysqli_query($connection, $query);
      $break = 0;

      $row = mysqli_fetch_array($Result);
      echo '<table align="center">';
      echo '<td>';
      echo "<img src='" . $row['Image'] . "' width='300px' height='300px'>";
      echo '</td>';
      echo '<td>';

      echo "<h2>";
      echo "<b>";
      echo $row['ProductName'];
      echo "</b>";
      echo "</h2>";

      echo "<h4>";
      echo $row['Description'];
      echo "</h4>";

      echo "<h4>";
      echo "<b>";
      echo "Current Price: ";
      echo $row['Price'];
      echo "</b>";
      echo "</h4>";
      echo '</table>';


      echo ' 
      
   <p id="heading">Choose Your Price</p>
<center>
<form method="POST" name="CatagoryForm"  onsubmit="return validform();">
<br><div align="center">

 <select name="Catagory" id="Catagory" onchange="fetch_select(this.value);">
 
  <option>' . $price1 . '</option>
  <option>' . $price2 . '</option>
  <option>' . $price3 . '</option>
 </select><br>

</div>   
</center>
<p style=" margin: -2.7% 10% 10% 62%">
<button type="submit" class="btn btn-primary">Bid Now</button>
</form>
';
    }
  }
  ?>

</body>

</html>