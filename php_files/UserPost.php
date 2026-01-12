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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../CSS/navbar.css">

  <style>
    /* Modern CSS Stylesheet */
    :root {
      /* Color Palette */
      --primary-bg: linear-gradient(135deg, #ffffff 0%, rgb(255, 255, 255) 100%);
      --navbar-dark: #2c3e50;
      --navbar-border: #1a242f;
      --text-light: #ecf0f1;
      --accent-color: #1abc9c;
      --input-focus: #3498db;
      --button-primary: #3498db;
      --button-hover: #2980b9;
      --panel-bg: rgba(255, 255, 255, 0.85);

      /* Spacing & Sizing */
      --border-radius-md: 12px;
      --border-radius-sm: 8px;
      --shadow-md: 0 10px 25px rgba(0, 0, 0, 0.1);
      --transition: all 0.3s ease;
    }

    /* Base Styles */
    body {
      background: var(--primary-bg);
      font-family: 'Candara', 'Segoe UI', system-ui, sans-serif;
      color: #333;
      min-height: 100vh;
      line-height: 1.6;
      padding-bottom: 40px;
    }

    /* Panel & Form Container */
    .panel-primary {
      border: none;
      border-radius: var(--border-radius-md);
      box-shadow: var(--shadow-md);
      background-color: var(--panel-bg);
      backdrop-filter: blur(8px);
      overflow: hidden;
      margin-top: 30px;
    }

    .panel-primary>.panel-body {
      padding: 30px;
    }

    .container {
      max-width: 600px;
      margin: 30px auto;
      padding: 0 20px;
    }

    /* Form Elements */
    form .form-group {
      margin-bottom: 20px;
    }

    form .form-group label {
      font-weight: 600;
      margin-bottom: 8px;
      display: block;
      color: #2c3e50;
    }

    form input[type="text"],
    form input[type="date"],
    form select,
    form textarea {
      border: 2px solid #e0e0e0;
      border-radius: var(--border-radius-sm);
      padding: 12px 15px;
      width: 100%;
      transition: var(--transition);
      font-family: inherit;
      background-color: rgba(255, 255, 255, 0.8);
    }

    form input[type="text"]:focus,
    form input[type="date"]:focus,
    form select:focus,
    form textarea:focus {
      border-color: var(--input-focus);
      box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
      outline: none;
      background-color: white;
    }

    /* Dropdown Specific */
    #catagory {
      appearance: none;
      background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right 15px center;
      background-size: 16px;
      padding-right: 40px;
    }

    /* Buttons */
    button[type="submit"] {
      background-color: var(--button-primary);
      color: white;
      border: none;
      padding: 14px 24px;
      font-size: 16px;
      font-weight: 600;
      border-radius: var(--border-radius-sm);
      transition: var(--transition);
      width: 100%;
      cursor: pointer;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }

    button[type="submit"]:hover {
      background-color: var(--button-hover);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(41, 128, 185, 0.3);
    }

    button[type="submit"]:active {
      transform: translateY(0);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {

      .navbar-inverse .navbar-brand,
      .navbar-inverse .navbar-nav>li>a {
        padding: 12px 15px;
      }

      .panel-primary>.panel-body {
        padding: 20px;
      }

      button[type="submit"] {
        padding: 12px 20px;
      }
    }

    /* Accessibility Improvements */
    *:focus-visible {
      outline: 3px solid var(--input-focus);
      outline-offset: 2px;
    }
  </style>


  <script>
    function ValidateBidForm() {


      var name = BidForm.name;
      var price = BidForm.price;
      var description = BidForm.description;
      var Quantity = BidForm.qty;
      var sdate = BidForm.sdate;
      var edate = BidForm.edate;


      if (name.value == "") {
        window.alert("Please Enter Product Name.");
        name.focus();
        return false;
      }



      if (document.getElementById("catagory").value == "Select Catagory") {
        alert("Please select Catagory"); // prompt user
        document.getElementById("catagory").focus(); //set focus back to control
        return false;
      }


      if (price.value == "") {
        window.alert("Need Product Base Price.");
        price.focus();
        return false;
      }


      if (description.value == "") {
        window.alert("Please Give Pruduct Description");
        description.focus();
        return false;
      }

      if (Quantity.value == "") {
        window.alert("Please Enter Product Quantity");
        Quantity.focus();
        return false;
      }
      if (sdate.value == "") {
        window.alert("Please Enter Start Date For Bid");
        Quantity.focus();
        return false;
      }

      if (edate.value == "") {
        window.alert("Please Enter End Date For Bid");
        Quantity.focus();
        return false;
      }
      $datenow = date("Y-m-d");

      if (sdate < datenow) {
        window.alert("wrong date format");
        Quantity.focus();
        return false;
      }
      if (edate < datenow || edate < sdate) {
        window.alert("wrong date format");
        Quantity.focus();
        return false;
      }

      return true;
    }
  </script>

</head>

<body>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $uname = $_SESSION['username'];
    //echo $uname;
    $name = $_POST['name'];
    //echo $name;
    $catagory = $_POST['catagory'];
    // echo $catagory;
    $price = $_POST['price'];
    //echo $price;
    $description = $_POST['description'];
    // echo $description;
    $Quantity = $_POST['qty'];
    //echo $Quantity;
    $today = date("Y-m-d");
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    // $ProductStatus = 'Available';
    if ($today <= $edate) {
      $ProductStatus = 'Available';
    } else {
      $ProductStatus = 'Discontinued';
    }

    mysqli_query($connection, "UPDATE Product SET ProductStatus='Available' WHERE EndDate >= '$today'");

    mysqli_query($connection, "UPDATE Product SET ProductStatus='Discontinued' WHERE EndDate < '$today'");

    $destination = "../ProductPhoto/" . $_FILES['Cpicture']['name'];
    $filename = $_FILES['Cpicture']['tmp_name'];
    move_uploaded_file($filename, $destination);

    $query = "insert into Product(ProductName,CatagoryName,UserName,Price,Description,ProductStatus,Quantity,StartDate,EndDate,Buyer,Image)      values('$name','$catagory','$uname','$price','$description','$ProductStatus','$Quantity','$sdate','$edate','Null','$destination')";
    $exe = mysqli_query($connection, $query);
    if (!$exe) {
      echo '<script language="javascript">';
      echo 'alert("insertion Problem")';
      echo '</script>';
      echo "Error creating database: " . mysqli_error($connection);
    } else {
      echo '<script language="javascript">';
      echo 'alert("successfull")';
      echo '</script>';
    }
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

        <li class="active"><a href="UserPost.php"><b>Post</b></a></li>
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
    <div class="row">
      <div class="panel panel-primary">
        <div class="panel-body">
          <form action="" method="POST" enctype="multipart/form-data" role="form" name="BidForm">
            <div class="form-group">
              <h2>Add New Product</h2>
            </div>
            <div class="form-group">
              <label class="control-label" for="signupName">Product Name</label>
              <input type="text" name="name" maxlength="50" class="form-control" required>
            </div>

            <div class="form-group">
              <label class="control-label" for="signupName">Product Catagory</label>
              <select name="catagory" id="catagory" onchange="fetch_select(this.value);">
                <option>Select Catagory</option>
                <option>Mobile</option>
                <option>Computer</option>
                <option>Car</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label" for="signupEmail">Priduct Price</label>
              <input type="text" name="price" maxlength="50" class="form-control" required>
            </div>
            <div class="form-group">
              <label class="control-label">Product Description</label>
              <textarea rows="2" cols="62" name="description" style="width:100%"> </textarea>
            </div>

            <div class="form-group">
              <label class="control-label">Product Quantity</label>
              <input type="text" name="qty" maxlength="50" class="form-control" required>
            </div>
            <div class="form-group">
              <label class="control-label">Start Date</label>
              <input type="date" name="sdate" maxlength="50" class="form-control" required>
            </div>


            <div class="form-group">
              <label class="control-label">End Date</label>
              <input type="date" name="edate" maxlength="50" class="form-control" required>
            </div>
            <div class="form-group">
              <label class="control-label">Product Picture</label>
              <input type="file" name="Cpicture">
            </div>



            <div class="form-group">

              <button id="signupSubmit" type="submit" class="btn btn-info btn-block"
                onclick="return ValidateBidForm();">Add Now</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>