<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../CSS/UserUpdate.css">
  <link rel="stylesheet" href="../CSS/navbar.css">
  <style type="text/css">
    body {

      font-family: candara;
      background-color: rgba(255, 255, 255, 1);
    }

    /* ===== PAGE CENTER ===== */
    .container {
      /* min-height: 100vh; */
      display: flex;
      justify-content: center;
      align-items: center;
      background: rgba(255, 255, 255, 1);
    }

    /* ===== CARD ===== */
    .login {
      width: 380px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.7);
      padding: 30px 25px;
      color: black;
      position: relative;
    }

    /* ===== TOP TRIANGLE ===== */
    .login-triangle {
      width: 0;
      height: 0;
      border-left: 25px solid transparent;
      border-right: 25px solid transparent;
      border-bottom: 25px solid #00c6ff;
      margin: auto;
    }

    /* ===== HEADER ===== */
    .login-header {
      text-align: center;
      font-size: 24px;
      /* margin: 15px 0 25px; */
      color: black;
      letter-spacing: 1px;
    }

    /* ===== FORM ===== */
    .login-container p {
      margin-bottom: 15px;
    }

    /* ===== INPUT ===== */
    .login-container input {
      width: 100%;
      padding: 12px 18px;
      border-radius: 30px;
      border: none;
      outline: none;
      background: rgba(255, 255, 255, 0.12);
      color: black;
      font-size: 15px;
      box-shadow: inset 0 0 10px rgba(0, 0, 0, .6);
      transition: .3s;
    }

    .login-container input::placeholder {
      color: rgba(0, 0, 0, 0.7);
    }

    /* ===== INPUT FOCUS ===== */
    .login-container input:focus {
      box-shadow: 0 0 15px rgba(0, 198, 255, .9);
      background: rgba(255, 255, 255, 0.18);
    }

    /* ===== BUTTON ===== */
    .login-container input[type="submit"] {
      background: linear-gradient(45deg, #00c6ff, #0072ff);
      color: white;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 0 20px rgba(0, 198, 255, .6);
      transition: .3s;
    }

    .login-container input[type="submit"]:hover {
      transform: scale(1.05);
      box-shadow: 0 0 35px rgba(0, 198, 255, 1);
    }

    /* ===== MOBILE ===== */
    @media(max-width:480px) {
      .login {
        width: 90%;
      }
    }
  </style>


  <script>
    function ValidateContactForm() {


      var Name = ContactForm.Name;
      var Pass = ContactForm.Password;
      var Email = ContactForm.Email;
      var Phone = ContactForm.Phone;
      var Address = ContactForm.Address


      if (Name.value == "") {
        window.alert("Enter Your Name");
        Email.focus();
        return false;
      }

      if (Pass.value == "") {
        window.alert("Enter Password");
        Pass.focus();
        return false;
      }


      if (Email.value == "") {
        window.alert("Enter Your Email");
        Email.focus();
        return false;
      }

      if (!validateCaseSensitiveEmail(Email.value)) {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
      }
      if (Phone.value == "") {
        window.alert("Enter Your Phone Number");
        Email.focus();
        return false;
      }

      return true;

    }

    function validateCaseSensitiveEmail(email) {
      var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
      if (reg.test(email)) {
        return true;
      } else {
        return false;
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
        <li><a href="UserProfile.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>

        <li><a href="UserPost.php"><b>Post</b></a></li>
        <li><a href="MyPost.php"><b>MyPost</b></a></li>
        <li><a href="MyBid.php"><b>MyBid</b></a></li>
        <li class="active"><a href="UUpdate.php"><b>Update Profile</b></a></li>
        <li><a href="Bidding.php"><b>Bidding</b></a></li>
        <li><a href="UNotification.php"><b>Notification</b></a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>

      </ul>
    </div>
  </nav>

  <?php
  $uName = $_SESSION['username'];
  // $Pass = $_SESSION['password'];

  $Server = "localhost";
  $username = "root";
  $psrd = "";
  $dbname = "Bidding";
  $connection = mysqli_connect($Server, $username, $psrd, $dbname);
  // $query = "select * from User where UserName='$uName' and Password='$Pass'";
  // $Complete = mysqli_query($connection, $query) or die("unable to connect");

  // $Rows = mysqli_fetch_array($Complete);

  // $name = $Rows['Name'];
  // $email = $Rows['Email'];
  // $phone = $Rows['Phone'];
  // $address = $Rows['Address'];

  $query = "SELECT * FROM User WHERE UserName = ?";
  $stmt = mysqli_prepare($connection, $query);
  mysqli_stmt_bind_param($stmt, "s", $uName);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
  } else {
    die("No user found");
  }

  /* Safe variables */
  $UserID   = $row['UserID'];
  $name = $row['UserName'];
  $email    = $row['Email'];
  $phone    = $row['Phone'] ?? "";
  $address  = $row['Address'] ?? "";
  ?>


  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uName = $_SESSION['username'];

    $Server = "localhost";
    $username = "root";
    $psrd = "";
    $dbname = "Bidding";
    $connection = mysqli_connect($Server, $username, $psrd, $dbname);

    $name = $_POST['Name'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];

    $query = "update User set Name='$name',Password='$Password',Email='$Email',Phone='$Phone', Address='$Address' where UserName='$uName'";

    $Complete = mysqli_query($connection, $query) or die("unable to connect");

    echo "<script>alert('Update Successfully');</script>";
  }
  ?>




  <div class="container">
    <div class="row">
      <div class="login">
        <div class="login-triangle"></div>

        <h2 class="login-header">Update Profile</h2>
        <form class="login-container" method="post" action="" name="ContactForm"
          onsubmit="return ValidateContactForm();">

          <p><input type="text" name="Name" placeholder="Your Name" value="<?php echo $name; ?>"></p>
          <p><input type="password" placeholder="New Password" name="Password"></p>
          <p><input type="Email" name="Email" placeholder="Your Email" value="<?php echo $email; ?>"></p>
          <p><input type="text" name="Phone" placeholder="Your Phone Number" value="<?php echo $phone; ?>"></p>
          <p><input type="text" name="Address" placeholder="Your Address" value="<?php echo $address; ?>"></p>
          <p><input type="submit" value="Update Now"></p>
        </form>
      </div>
    </div>
  </div>


</body>

</html>