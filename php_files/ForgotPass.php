<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    body {
      background: white;
      font-family: "Segoe UI", sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Center container */
    .container {
      width: 100%;
      max-width: 420px;
      padding: 15px;
    }

    /* Card */
    .login {
      background: #020617;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(175, 166, 166, 0.7);
      overflow: hidden;
      animation: fade .6s ease;
    }

    /* Top triangle accent */
    .login-triangle {
      width: 0;
      height: 0;
      border-left: 40px solid transparent;
      border-right: 40px solid transparent;
      border-bottom: 40px solid #979797ff;
      margin: 0 auto;
    }

    /* Header */
    .login-header {
      color: white;
      font-size: 22px;
      padding: 20px;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 15px;
    }

    .login-header img {
      filter: invert(1);
    }

    /* Form */
    .login-container {
      padding: 25px;
    }

    /* Inputs */
    .login-container input {
      width: 100%;
      padding: 14px 18px;
      border: none;
      border-radius: 50px;
      margin-bottom: 18px;
      background: #0f172a;
      color: white;
      font-size: 15px;
      outline: none;
      box-shadow: inset 0 0 0 1px #1e293b;
      transition: .3s;
    }

    .login-container input:focus {
      box-shadow: 0 0 0 2px #0ea5e9;
    }

    /* Button */
    .login-container input[type=submit] {
      background: linear-gradient(135deg, #0ea5e9, #38bdf8);
      color: white;
      font-weight: 600;
      border: none;
      cursor: pointer;
      box-shadow: 0 10px 30px rgba(14, 165, 233, .6);
    }

    .login-container input[type=submit]:hover {
      transform: scale(1.03);
    }

    /* Animation */
    @keyframes fade {
      from {
        opacity: 0;
        transform: translateY(20px)
      }

      to {
        opacity: 1;
        transform: translateY(0)
      }
    }
  </style>

  <script type="text/javascript">
    function ValidateContactForm() {


      var Email = ContactForm.email;
      var Pass = ContactForm.Password1;
      var conpass = ContactForm.Password2;


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
      if (Pass.value == "") {
        window.alert("Enter Password");
        Pass.focus();
        return false;
      }

      if (conpass.value == "") {
        window.alert("Confirm Password");
        conpass.focus();
        return false;
      }

      if (Pass.value != conpass.value) {
        window.alert("Password Miss match");
        Pass.focus();
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
<style type="text/css">
  body {
    font-family: 'Poppins', 'Segoe UI', sans-serif;
    background-color: rgb(170, 170, 230);
  }

  * {
    font: candara !important;
  }
</style>

<body>

  <?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $Pass = $_POST['Password1'];

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "Bidding";


    $connection = mysqli_connect($server, $username, $password, $db);

    $search = "select * from User where Email='$email'";

    $execute = mysqli_query($connection, $search);


    if (mysqli_num_rows($execute) > 0) {

      $query = "update User set Password='$Pass' where Email='$email'";

      mysqli_query($connection, $query);
      echo "<script> alert('Update Successfully') </script>";
      header("Location:UserLogin.php");
    } else {

      echo "<script> alert('Email Does not Exist') </script>";
      echo "<script> Pass.focus();</script>";
    }
  }
  ?>

  <div class="container">
    <div class="row">
      <div class="login">
        <div class="login-triangle"></div>

        <h2 class="login-header"><a href="UserLogin.php"><img src="../Image/Back.png" width="50px" height="50px"></a>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbspChange Password</h2>

        <form class="login-container" method="POST" name="ContactForm" onsubmit=" return ValidateContactForm();">
          <p><input type="email" name="email" placeholder="Email"></p>
          <p><input type="password" name="Password1" placeholder="New Password"></p>
          <p><input type="password" name="Password2" placeholder="Confirm Password"></p>

          <p><input type="submit" value="Change"></p>
        </form>
      </div>
    </div>
  </div>

</body>

</html>