<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "Bidding");
if (!$connection) {
    die("Database connection failed");
}

/* Get all sold products */
$query = "
SELECT ProductID, ProductName, Image, Price, Buyer, UserName, EndDate 
FROM Product 
WHERE ProductStatus IN ('Discontinued', 'Out of Stock')
ORDER BY EndDate DESC
";

$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sold Auctions</title>
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
    body {
        background: #ffffff;
        font-family: Segoe UI, sans-serif;
        color: #000;
    }

    h1 {
        text-align: center;
    }

    .sold-table {
        width: 90%;
        max-width: 1100px;
        margin: 40px auto;
        border-collapse: collapse;
    }

    .sold-table th {
        background: #000;
        color: #fff;
        padding: 15px;
    }

    .sold-table td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    .sold-table img {
        width: 80px;
        height: 60px;
        object-fit: contain;
        border-radius: 5px;
    }

    .sold-table tr:hover {
        background: #f2f2f2;
    }
</style>
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

<body>

    <h1 style="text-align:center;margin-top:30px;">Sold Auctions</h1>

    <table class="sold-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Seller</th>
                <th>Winner</th>
                <th>Sold Price</th>
                <th>End Date</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
            <td><img src='../Upload/" . $row['Image'] . "'></td>
            <td>" . $row['ProductName'] . "</td>
            <td>" . $row['UserName'] . "</td>
            <td>" . $row['Buyer'] . "</td>
            <td>₹ " . $row['Price'] . "</td>
            <td>" . date("d M Y", strtotime($row['EndDate'])) . "</td>
        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No sold items yet</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>