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
  /* Page */
  body {
    margin: 0;
    background: #ffffff;
    font-family: Segoe UI, sans-serif;
    color: #000000;
  }

  /* Back button image */
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

  /* Product container table */
  table {
    width: 900px;
    max-width: 95%;
    /* margin:50px auto 20px; */
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    border-collapse: collapse;
  }

  /* Cells */
  table td {
    padding: 30px;
    vertical-align: middle;
    text-align: center;
  }

  /* Product image */
  table img {
    width: 300px;
    height: 100%;
    max-width: 350px;
    border-radius: 10px;
    border: 1px solid #ddd;
  }

  /* Product name */
  h3 {
    font-size: 26px;
    margin-bottom: 10px;
    color: #000;
  }

  /* Description */
  table td {
    font-size: 15px;
    line-height: 1.6;
  }

  /* Price */
  b {
    font-size: 20px;
    color: #000;
  }

  /* Choose price heading */
  #heading {
    text-align: center;
    font-size: 22px;
    margin: 25px 0 10px;
    color: #000;
  }

  /* Dropdown */
  #Catagory {
    width: 320px;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    background: #fff;
    color: #000;
    font-size: 16px;
  }

  /* Bid button */
  .btn {
    padding: 12px 35px;
    border-radius: 8px;
    border: none;
    background: #000;
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: .3s;
  }

  .btn:hover {
    background: #333;
  }

  /* Mobile */
  @media(max-width:768px) {
    table {
      width: 95%;
    }

    table td {
      display: block;
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
    $buyer = $_SESSION['username'];

    $qry = "select * from Product where ProductID='$id'";
    $Rslt = mysqli_query($connection, $qry);

    $rw = mysqli_fetch_array($Rslt);

    $postbuyer = $rw['Buyer'];
    $productname = $rw['ProductName'];

    $message = $postbuyer . " Someone Bid heigher than your Bid price on product" . $productname . '! , You Can Bid Again This Product ';

    // $insert = "insert into Notification values('$postbuyer','$message','No')";
    $insert = "INSERT INTO Notification (UserName, messege, Seen)
           VALUES ('$postbuyer', '$message', 'No')";
    mysqli_query($connection, $insert);


    $query = "update Product set Price='$price',Buyer='$buyer' where ProductID='$id'";

    mysqli_query($connection, $query);

    header('Location:Bidding.php');
  }

  ?>

  <?php



  if (isset($_GET['bid'])) {

    $Server = "localhost";
    $username = "root";
    $psrd = "";
    $dbname = "Bidding";
    $connection = mysqli_connect($Server, $username, $psrd, $dbname);
    $uname = $_SESSION['username'];
    $id = $_GET['bid'];


    $query = "select * from Product where ProductID ='$id'";

    $Result = mysqli_query($connection, $query);

    $row = mysqli_fetch_array($Result);

    $Buyer = $row['UserName'];

    if ($Buyer == $uname) {
      echo "<script>alert('This Is Your Product, You Can Not Bid Your Own Product');</script>";
    } else {
      echo '<a href="Bidding.php"><h2 class="back"><i><-Back</i></h2></a>';

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
      echo "<img src='" . $row['Image'] . "' width='350px' height='250px'>";
      echo '</td>';
      echo '<td>';

      echo "<h3>";
      echo $row['ProductName'];
      echo "</h3>";

      echo $row['Description'];
      echo "<br>";
      echo "<b>";
      echo "Corrent Price: ";
      echo $row['Price'];
      echo "</b>";
      echo "<br><br>";
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