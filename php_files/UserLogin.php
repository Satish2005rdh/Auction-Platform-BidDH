<?php
session_start();

$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $uname = $_POST['uname'];
  $Pass = $_POST['Pass'];

  $query = "SELECT * FROM User WHERE UserName='$uname' AND Password='$Pass'";
  $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $row['UserID'];
    $_SESSION['username'] = $row['UserName'];

    header("Location: UserProfile.php");
    exit();
  } else {
    $login_error = "Wrong Username or Password";
  }
}
?>

<html>

<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" type="text/css" href="../CSS/userlogin.css"> -->
  <link rel="stylesheet" href="../CSS/navbar.css">

  <style>
    /* Modern CSS Stylesheet */
    :root {
      --primary-color: #ffffffff;
      /* Light purple */
      --secondary-color: #ffffff;
      --accent-color: #4a6bff;
      --error-color: #ff4a4a;
      --text-dark: #333333;
      --text-light: #ffffff;
      --border-radius-lg: 20px;
      --border-radius-md: 12px;
      --border-radius-sm: 8px;
      --shadow-sm: 0 2px 5px rgba(0, 0, 0, 0.1);
      --shadow-md: 0 4px 10px rgba(0, 0, 0, 0.15);
      --transition: all 0.3s ease;
    }

    /* Base Styles */
    body {
      font-family: 'Candara', 'Segoe UI', system-ui, sans-serif;
      background-color: var(--primary-color);
      color: var(--text-dark);
      margin: 0;
      padding: 0px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Layout Containers */
    .container {
      width: 100%;

    }

    .account-wall {
      width: 100%;
      max-width: 500px;
      /* margin: 40px auto; */
      padding: 30px;
      background-color: var(--secondary-color);
      border-radius: var(--border-radius-lg);
      box-shadow: var(--shadow-md);
      transition: var(--transition);
    }

    .account-wall:hover {
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .row {
      height: 150%;
      width: 100%;
    }

    /* Typography */
    .login-title {
      text-align: center;
      font-size: 2.5rem;
      color: var(--accent-color);
      margin-bottom: 30px;
      font-weight: 600;
    }

    /* Tables */
    table {
      border-spacing: 20px;
      margin: 40px auto;
      width: 80%;
      border-radius: var(--border-radius-lg);
      background-color: var(--secondary-color);
      box-shadow: var(--shadow-sm);
    }

    td {
      padding: 15px;
      font-size: 1.4rem;
      text-align: center;
      vertical-align: middle;
    }

    /* Form Elements */
    input,
    select,
    textarea {
      width: 100%;
      padding: 12px 15px;
      font-size: 1rem;
      font-family: 'Agency FB', 'Segoe UI', sans-serif;
      border: 1px solid #ddd;
      border-radius: var(--border-radius-sm);
      transition: var(--transition);
      text-align: center;
    }

    input:focus,
    select:focus,
    textarea:focus {
      outline: none;
      border-color: var(--accent-color);
      box-shadow: 0 0 0 3px rgba(74, 107, 255, 0.2);
    }

    .size {
      width: 350px;
      height: 40px;
      padding: 10px;
    }

    /* Buttons & Interactive Elements */
    .btn {
      display: inline-block;
      padding: 12px 24px;
      background-color: var(--accent-color);
      color: var(--text-light);
      border: none;
      border-radius: var(--border-radius-sm);
      font-size: 1rem;
      cursor: pointer;
      transition: var(--transition);
    }

    .btn:hover {
      background-color: #3a5bef;
      transform: translateY(-2px);
    }

    /* Utility Classes */
    .Error {
      color: var(--error-color);
      font-size: 0.9rem;
      margin-top: 5px;
    }

    .text-center {
      text-align: center;
    }

    .mx-auto {
      margin-left: auto;
      margin-right: auto;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      table {
        width: 95%;
        border-spacing: 10px;
        margin: 20px auto;
      }

      td {
        font-size: 1.1rem;
        padding: 10px;
      }

      .account-wall {
        width: 90%;
        padding: 20px;
      }

      .size {
        width: 100%;
      }
    }
  </style>


  <script type="text/javascript">
    function ValidUser() {
      var name = UserLogin.uname;
      var Password = UserLogin.Pass;

      if (name.value == "") {
        window.alert("Name Field Can Not Be Empty");
        name.focus();
        return false;
      }
      if (Password.value == "") {
        window.alert("Password Field Can Not Be Empty");
        Password.focus();
        return false;
      }
      return true;
    }
  </script>


</head>

<body>


  <?php

  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //   $Server = "localhost";
  //   $username = "root";
  //   $psrd = "";
  //   $dbname = "Bidding";
  //   $connection = mysqli_connect($Server, $username, $psrd, $dbname);
  //   $uname = $_POST['uname'];
  //   $Pass = $_POST['Pass'];
  //   $query = "select * from User where UserName='$uname' and Password='$Pass'";
  //   $Complete = mysqli_query($connection, $query) or die("unable to connect");
  //   $Rows = mysqli_fetch_array($Complete);
  // session_start();
  // if ($Rows['UserName'] == $uname && $Rows['Password'] == $Pass) {
  //   $_SESSION['uname'] = $uname;
  //   $_SESSION['Pass'] = $Pass;
  //   header("Location:UserProfile.php");
  //   exit();
  //   if (!isset($_SESSION['user_id'])) {
  //      header("Location: UserProfile.php");
  //      exit();
  //   } else {
  //     echo "<script>window.alert('Wrong User Name Or Password Try Again');</script>";
  //   }
  //   mysqli_close($connection);
  // }



  ?>



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
            <input type="text" class="form-control" name="search" placeholder="Search" size="45" style="height:40px">
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
        <li class="active" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>User
              Login</b><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="UserLogin.php"><b>User Login</b></a></li>
            <li><a href="AdminLogin.php"><b>Admin Login</b></a></li>
          </ul>
        </li>
        <li><a href="Registration.php"><span class="glyphicon glyphicon-user"></span> <b>Sign Up</b></a></li>

      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <h1 class="text-center login-title" style="color:black"><b>Sign in to continue</b></h1><br>
        <div class="account-wall">
          <img class="profile-img" src="Image/user.png " alt="">
          <form class="form-signin" action="" method="POST" name="UserLogin" onsubmit="return ValidUser();" style="font-size: 2rem;"><br>
            <input type="text" class="form-control" name="uname" placeholder="Enter User Name" style="font-size: 2rem;"><br>
            <input type="password" class="form-control" name="Pass" placeholder="Password" style="font-size: 2rem;"><br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <label class="checkbox pull-left" style="font-size: 1rem;"> &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp
              <input type="checkbox" value="remember-me"><br>Remember me</label>
            <a href="ForgotPass.php" class="pull-right need-help" style="font-size: 2rem;">Forgot Password?</a><span class="clearfix"></span>
          </form>
        </div>

      </div>
    </div>
  </div>

  </div>

</body>

</html>