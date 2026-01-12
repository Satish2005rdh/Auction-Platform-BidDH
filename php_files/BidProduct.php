<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" type="text/css" href="../CSS/Bidproduct.css"> -->
</head>

<style type="text/css">
  body {
    font-family: 'Poppins', 'Segoe UI', sans-serif;
    background-color: rgba(255, 255, 255, 1);
  }

  * {
    font: candara !important;
  }

  /* ===== FULL PAGE ===== */
  body {

    /* min-height: 100vh; */
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Segoe UI", sans-serif;
    margin: 10%;
    margin-left: 1%;
  }

  /* ===== LOGIN CARD ===== */
  .form-login {
    background: rgba(255, 255, 255, 0.08);
    /* backdrop-filter: blur(15px); */
    border-radius: 20px;
    padding: 35px 30px;
    width: 150%;
    margin-left: 0;
    max-width: 460px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.7);
    text-align: center;
  }

  /* ===== BACK BUTTON IMAGE ===== */
  .form-login img {
    border-radius: 50%;
    transition: .3s;
  }

  .form-login img:hover {
    transform: scale(1.1);
    box-shadow: 0 0 15px rgba(0, 198, 255, .8);
  }

  /* ===== TITLE ===== */
  .form-login b {
    color: #000000ff;
    font-size: 24px;
  }

  /* ===== INPUTS ===== */
  .chat-input {
    width: 100%;
    padding: 12px 18px;
    border-radius: 30px;
    border: none;
    outline: none;
    background: rgba(255, 255, 255, 0.12);
    color: black;
    font-size: 15px;
    margin-bottom: 15px;
    box-shadow: inset 0 0 10px rgba(0, 0, 0, .6);
    transition: .3s;
  }

  .chat-input::placeholder {
    color: rgba(0, 0, 0, 0.7);
  }

  .chat-input:focus {
    background: rgba(255, 255, 255, 0.18);
    box-shadow: 0 0 15px rgba(0, 198, 255, 1);
  }

  /* ===== BUTTON ===== */
  .group-btn button {
    background: linear-gradient(45deg, #00c6ff, #0072ff);
    border: none;
    border-radius: 30px;
    padding: 12px 30px;
    font-weight: 600;
    font-size: 15px;
    color: black;
    cursor: pointer;
    box-shadow: 0 0 25px rgba(0, 198, 255, .6);
    transition: .3s;
  }

  .group-btn button:hover {
    transform: scale(1.1);
    box-shadow: 0 0 40px rgba(0, 198, 255, 1);
  }

  /* ===== MOBILE ===== */
  @media(max-width:480px) {
    .form-login {
      width: 90%;
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

<body>



  <?php
  if (isset($_GET['bid'])) {
    $id = $_GET['bid'];

  ?>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $Server = "localhost";
      $username = "root";
      $psrd = "";
      $dbname = "Bidding";
      $connection = mysqli_connect($Server, $username, $psrd, $dbname);

      $uname = $_POST['uname'];
      $Pass = $_POST['Pass'];
      $id = $_GET['bid'];
      $query = "select * from User where UserName='$uname' and Password='$Pass'";



      $Complete = mysqli_query($connection, $query) or die("unable to connect");


      $Rows = mysqli_fetch_array($Complete);

      if ($Rows['UserName'] == $uname && $Rows['Password'] == $Pass) {
        session_start();
        $_SESSION['uname'] = $uname;
        $_SESSION['Pass'] = $Pass;

        header("Location:UserBidLogin.php?bid=$id");
        exit();
      } else {
        $loginmessage = "Wrong User Name Or Password Try Again";

        header("Location: Home.php?message=" . urlencode($loginmessage));

        exit();
      }

      mysqli_close($connection);
    }



    ?>
    <form method="POST">

      <div class="container">
        <div class="row">
          <div class="col-md-offset-5 col-md-3">
            <div class="form-login">

              <a href="Home.php"> <img src="../Image/back.jpg" width="20px" height="20px" alt="Bid" /> </a><span
                style="text-align: center;color: #286090;font-size: 25px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Enter
                  Information</b></span><br><br><br>

              <input type="text" id="userName" name="uname" class="form-control input-sm chat-input"
                placeholder="Username" name="UserLogin" onsubmit="return ValidUser();" />
              </br>
              <input type="Password" name="Pass" id="userPassword" class="form-control input-sm chat-input"
                placeholder="Password" />
              </br>
              <div class="wrapper">
                <span class="group-btn">
                  <button type="submit" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></button>

                </span>
              </div>
            </div>

          </div>
        </div>
      </div>
    </form>

  <?php
  }


  ?>

</body>

</html>