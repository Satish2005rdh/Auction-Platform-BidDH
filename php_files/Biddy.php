<!DOCTYPE html>
<html lang="en">

<head>
  <title>BIDDY | Online Bidding Platform</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../CSS/navbar.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
  .hero-section {
    width: 100%;
    background: #ffffff;
    text-align: center;
    /* padding: 60px 20px 80px; */
    box-sizing: border-box;
  }

  /* Hero Image */
  .hero-section img {
    width: 100%;
    max-width: 1200px;
    height: 360px;
    object-fit: cover;
    border-radius: 40px;
    /* margin-bottom: 40px; */
  }

  /* Title */
  .hero-title {
    font-size: 42px;
    margin-bottom: 15px;
    color: #000;
  }

  /* Subtitle */
  .hero-subtitle {
    font-size: 18px;
    color: #000;
    max-width: 700px;
    margin: 0 auto 40px;
    line-height: 1.6;
  }

  /* Buttons */
  .cta-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
  }

  .cta-button {
    padding: 14px 35px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    transition: .3s;
  }

  /* Primary button */
  .cta-primary {
    background: #000;
    color: #fff;
  }

  /* Secondary button */
  .cta-secondary {
    background: #fff;
    color: #000;
    border: 2px solid #000;
  }

  /* Hover */
  .cta-button:hover {
    transform: translateY(-3px);
  }

  /* Mobile */
  @media(max-width:768px) {
    .hero-title {
      font-size: 30px;
    }

    .hero-section img {
      height: 220px;
      border-radius: 20px;
    }

    .cta-buttons {
      flex-direction: column;
    }
  }
</style>

<body class="landing-page">

  <!-- ================= NAVBAR ================= -->
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
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">Products <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Car.php">Car</a></li>
            <li><a href="Mobile.php">Mobile</a></li>
            <li><a href="Computer.php">Computer</a></li>
          </ul>
        </li>
      </ul>

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
        <li><a href="About Project.php">About</a></li>
        <li><a href="Contact Us.php">Contact</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">Login <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="UserLogin.php">User Login</a></li>
            <li><a href="AdminLogin.php">Admin Login</a></li>
          </ul>
        </li>
        <li><a href="Registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      </ul>
    </div>
  </nav>

  <!-- ================= HERO SECTION ================= -->

  <section class="hero-section">
    <img src="../Image/bidd.jpg" height="360px" width="100%" style="border-radius:200px; " />
    <h1 class="hero-title">View, Bid & Buy Online</h1>

    <p class="hero-subtitle">
      India’s most trusted online bidding platform with secure and fair auctions.
    </p>

    <div class="cta-buttons">
      <a href="UserLogin.php" class="cta-button cta-primary">Start Bidding</a>
      <a href="Registration.php" class="cta-button cta-secondary">Create Account</a>
    </div>
  </section>


  </section>

</body>

</html>