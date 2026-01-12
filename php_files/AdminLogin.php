<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../CSS/navbar.css">

  <script type="text/javascript">
    function validadmin() {
      var name = AdminLogin.uName;
      var Password = AdminLogin.Pass;

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
<style>
  body {
    font-family: 'Candara', 'Segoe UI', system-ui, sans-serif;
    background-color: rgb(245, 245, 245, 1);
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

  .panel-body {
    width: 100%;
    max-width: 500px;
    /* margin: 40px auto; */
    padding: 30px;
    background-color: var(--secondary-color);
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow-md);
    transition: var(--transition);
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
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $Server = "localhost";
  $username = "root";
  $psrd = "";
  $dbname = "Bidding";
  $connection = mysqli_connect($Server, $username, $psrd, $dbname);

  $aname = $_POST['uName'];
  $Pass = $_POST['Pass'];

  $query = "select * from Admin where AdminName='$aname' and AdminPassword='$Pass'";



  $Complete = mysqli_query($connection, $query) or die("unable to connect");


  $Rows = mysqli_fetch_array($Complete);

  if ($Rows['AdminName'] == $aname && $Rows['AdminPassword'] == $Pass) {
    session_start();
    $_SESSION['uName'] = $aname;
    $_SESSION['Pass'] = $Pass;
    header("Location:AdminMagane.php");
    exit();
  } else {

    echo "<script>alert('Wrong User Name Or Password Try Again');</script>";
  }

  mysqli_close($connection);
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
      <li class="active" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Admin
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

<div class="container" style="margin-top:40px">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Sign in to continue</strong>
        </div>
        <div class="panel-body">
          <form role="form" action="#" method="POST" name="AdminLogin" onsubmit=" return validadmin();">
            <fieldset>
              <div class="row">
                <div class="center-block">
                  <img class="profile-img" src="iMAGE/admin.png" alt="">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                      </span>
                      <input class="form-control" placeholder="Username" name="uName" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock"></i>
                      </span>
                      <input class="form-control" placeholder="Password" name="Pass" type="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
                  </div>
                </div>
              </div>
            </fieldset>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>


</body>

</html>