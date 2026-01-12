<?php session_start() ?>
<?php
$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);

?>

<!DOCTYPE html>
<html>

<head>

  <title>Bidding System</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../CSS/Contact.css">
  <link rel="stylesheet" href="../CSS/navbar.css">

  <script type="text/javascript">
    function validmessage() {
      var name = UserMessage.name;
      var email = UserMessage.email;
      var message = UserMessage.message;

      if (name.value == "") {
        alert("Need Your Name");
        name.focus();
      }
      if (email.value == "") {
        alert("Need Your Email");
        email.focus();
      }

    }
  </script>
</head>
<style>
  body {
    font-family: 'Poppins', 'Segoe UI', sans-serif;
  }
</style>
<div class="container-fluid">

  <body>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


      $name = $_POST['name'];
      $email = $_POST['email'];
      $message = $_POST['message'];
      $seen = "No";

      // $query = "insert into ANotification values('$UserName','$email','$message','$seen','','')";
      $query = "INSERT INTO ANotification values('', '$name', '$seen', '$message', '', '$email')";

      mysqli_query($connection, $query);
    }
    ?>
    <nav class="navbar navbar-inverse" data-offset-top="197">
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
              <input type="text" class="form-control" name="search" placeholder="Search" size="40" style="height:35px">
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
          <li class="active"><a href="Contact Us.php"><b>Contact Us</b></a></li>
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


    <div class="container-fluid">
      <div>
      </div>

      <h3 style="font-size: 2rem;"> If You have any question,comment or if you would like to contact with me please use the form , alternatively
        you can use one of the links below:</h3>
      <main class="main2">
        <div class="main3">
          <div class="body_1">
            <div class="box_1" style="height: 500px; width: 500px">
              <h2>Satish</h2>
              <div class="image_Satish"> </div>
              <div class="name">
                <p style="margin-bottom: 1px;font-size: 2rem;"><b>Name: </b> S.K. Dhurva</p>
              </div>
              <div class="about">
                <h3 style="margin-top:5px;font-size: 2rem;">About</h3>
                <p style="font-size: 1.5rem;">I am a person who is positive about every aspect of life.
                  There are many things I like to do, to see, and to experience.</p>
              </div>
              <div><button data-toggle="modal" data-target="#squarespaceModal"
                  class="btn btn-success center-block">Click Here
                  To Text Message</button></div>
            </div>

            <div class="box_1" style="height: 500px; width: 500px">
              <h2>Rahul</h2>
              <div class="image_Rahul"> </div>
              <div class="name">
                <p style="margin-bottom: 1px;font-size: 2rem;"><b>Name: </b> Rahul Shah</p>
              </div>
              <div class="about">
                <h3 style="margin-top:5px ;font-size: 2rem;">About</h3>
                <p style="font-size: 1.5rem;">I am a person who is positive about every aspect of life.
                  There are many things I like to do, to see, and to experience.</p>
              </div>
              <div><button data-toggle="modal" data-target="#squarespaceModal"
                  class="btn btn-success center-block">Click Here
                  To Text Message</button></div>
            </div>
          </div>

        </div>
    </div>
    </main>
    <br><br>


    <!-- line modal -->
    <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                class="sr-only">Close</span></button>
            <h3 style="text-align: center;" class="modal-title" id="lineModalLabel">Send Your Message</h3>
          </div>
          <div class="modal-body">

            <!-- content goes here -->
            <form method="POST" name="UserMessage" onsubmit=" return  validmessage();">
              <div class="form-group">
                <label for="Name">Your Name</label>
                <input type="text" class="form-control" id="Name" name="name" placeholder="Enter Your Name">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                  placeholder="Enter Your Email">
              </div>
              <div class="form-group">
                <label for="Meggase">Text</label><br>
                <textarea rows="3" cols="68" name="message" placeholder="Enter Your Comment"></textarea><br />
              </div>

              <button type="submit" class="btn btn-info">Submit</button>
            </form>

          </div>

        </div>
      </div>
    </div>

  </body>

</html>