<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../CSS/navbar.css">
  <link rel="stylesheet" href="../CSS/about.css">

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
        <li class="active"><a href="#myModal" data-toggle="modal" data-target="#myModal"><b>About site</b></a></li>
        <li><a href="Contact Us.php"><b>Contact Us</b></a></li>
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




  <div class="about-container">

    <!-- About Section -->
    <div class="about">
      <h2>About the site</h2>
      <p>
        This project is developed to provide detailed information about the system.
        The objective of this project is to deliver a simple, effective and user-friendly solution.
      </p>

      <button type="button" class="btn-default" data-toggle="modal" data-target="#aboutModal">
        Read More
      </button>
    </div>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="aboutModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">About Us</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <h3>
            <h4>Mission</h4>
            At this site, our mission is to provide a dynamic and transparent marketplace where
            buyers and sellers can engage in exciting, fair, and seamless online auctions. Whether you're looking for
            rare collectibles, vintage antiques, cutting-edge electronics, or unique art pieces, our platform offers a
            diverse range of auction categories that cater to all interests and passions.

            We believe in creating an enjoyable auction experience that connects people from around the world and
            gives them the opportunity to acquire or sell items in an exciting competitive environment. Our goal is to
            empower both buyers and sellers with tools that make the auction process simple, secure, and efficient.

            With an unwavering commitment to customer satisfaction, we strive to foster a community where trust,
            transparency, and fairness guide every transaction. We are here to help you discover new treasures,
            achieve great deals, and build lasting connections.
          </h3>
          <h3>

            <h2><b>History</b></h2>
            Founded in 2024, Biddy started as a small online auction site aimed at connecting
            enthusiasts with unique, one-of-a-kind items in a niche market. What began as a small
            community of collectors soon grew into a thriving global platform.
            Over the years, we have expanded our offerings to include a wide range of auction categories, including
            [list major categories like art, antiques, electronics, sports memorabilia, etc.]. Our platform has seen
            consistent growth, with hundreds of thousands of users joining our auctions every year. Through continuous
            improvements in our website design, user interface, and auction tools, we have made bidding easier and
            more accessible
            to people of all experience levels. As we look to the future, we aim to further innovate in the world of
            online auctions by integrating advanced technologies such as AI-driven recommendations, personalized
            auction
            experiences, and improved payment security. Our journey is only just beginning, and we are
            excited to see how we can continue to evolve and
            meet the needs of our global community of buyers and sellers.
            <br><br>
            <h2><b>Team</b></h2>
            At Biddy, we are proud to have a passionate and diverse team that brings a wealth of
            expertise in various fields, from technology and design to customer service and auction management.
            <br><br>
            <h2><b>Satish & Rahul</b></h2>
            Satish founded Biddy with the vision of creating a user-friendly, fair, and
            transparent online auction experience. With a background in 15 years of experience,
            they has been instrumental in shaping the platform's mission and growth over the years.
            As our CTO, Rahul leads the technical development of the platform, ensuring that our systems run
            smoothly, securely, and efficiently. With extensive experience in [mention relevant skills or technology],
            [he/she/they] is dedicated to innovating the user experience and implementing cutting-edge technologies to
            keep us ahead in the market.
          </h3>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn-default" data-dismiss="modal">
            Close
          </button>
        </div>

      </div>
    </div>
  </div>

</body>

</html>