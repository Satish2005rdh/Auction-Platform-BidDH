<?php session_start() ?>

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
    * {
      font: candara !important;
    }

    :root {
      --primary: #4361ee;
      --primary-dark: #3a56d4;
      --secondary: #3f37c9;
      --accent: #4cc9f0;
      --dark: #1a1a2e;
      --light: #f8f9fa;
      --success: #4bb543;
      --danger: #ff3333;
      --gray: #6c757d;
      --light-gray: #e9ecef;
    }

    body {
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      background: #f5f7fa;
      color: #212529;
      line-height: 1.6;
      min-height: 100vh;
      margin: 0;
      padding: 0;
    }

    /* Modern Navbar */
    .navbar {
      background: rgba(0, 0, 0, 0.9);
      backdrop-filter: blur(10px);
      border: none;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 0.8rem 1rem;
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.8rem;
      color: white !important;
      letter-spacing: 1px;
    }

    .navbar-nav>li>a {
      color: rgba(255, 255, 255, 0.9) !important;
      font-weight: 500;
      padding: 0.5rem 1.2rem;
      transition: all 0.3s ease;
    }

    .navbar-nav>li>a:hover,
    .navbar-nav>li.active>a {
      color: white !important;
      background-color: rgba(255, 255, 255, 0.15);
      border-radius: 4px;
      transform: translateY(-2px);
    }

    /* Table Styling */
    .data-table {
      width: 95%;
      max-width: 1200px;
      margin: 30px auto;
      border-collapse: separate;
      border-spacing: 0;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      background: white;
    }

    .data-table thead th {
      background: linear-gradient(to right, var(--primary), var(--secondary));
      color: white;
      padding: 15px;
      text-align: left;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.9rem;
      letter-spacing: 0.5px;
      position: sticky;
      top: 0;
    }

    .data-table tbody td {
      padding: 15px;
      border-bottom: 1px solid #e0e0e0;
      transition: all 0.3s ease;
    }

    .data-table tbody tr {
      background-color: white;
    }

    .data-table tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .data-table tbody tr:hover td {
      background-color: rgba(67, 97, 238, 0.05);
      transform: translateX(2px);
    }

    .data-table tbody td img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 50%;
      transition: transform 0.3s ease;
      border: 3px solid #e0e0e0;
    }

    .data-table tbody td img:hover {
      transform: scale(1.05);
      border-color: var(--primary);
    }

    .data-table tbody td a img {
      width: 40px;
      height: 40px;
      transition: all 0.3s ease;
      border-radius: 8px;
    }

    .data-table tbody td a img:hover {
      transform: scale(1.1);
      filter: brightness(0.8);
    }

    /* Gender Badges */
    .data-table tbody td:nth-child(4) {
      font-weight: 600;
      text-transform: capitalize;
    }

    .data-table tbody td:nth-child(4):contains("male") {
      color: var(--primary);
    }

    .data-table tbody td:nth-child(4):contains("female") {
      color: #ff6b9d;
    }

    /* Responsive Table */
    @media (max-width: 992px) {
      .data-table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
      }

      .navbar-brand {
        font-size: 1.5rem;
      }
    }

    /* Delete Button Styling */
    .delete-btn {
      background: none;
      border: none;
      cursor: pointer;
      padding: 0;
      transition: all 0.3s ease;
    }

    .delete-btn:hover {
      transform: scale(1.1);
      opacity: 0.8;
    }

    /* Animations */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .data-table {
      animation: fadeIn 0.6s ease-out forwards;
    }

    /* Confirmation Dialog Styling */
    .swal2-popup {
      border-radius: 12px !important;
      font-family: 'Poppins', sans-serif !important;
    }

    .swal2-title {
      color: var(--dark) !important;
    }

    .swal2-confirm {
      background-color: var(--danger) !important;
      border: none !important;
      border-radius: 8px !important;
      padding: 10px 24px !important;
    }

    .swal2-cancel {
      border-radius: 8px !important;
      padding: 10px 24px !important;
    }
  </style>

  <!-- <script type="text/javascript">
    function delete(id){
      if (confirm('Are Your Sure Delete This User?')) {

        window.location = 'AUserDelete.php?delete=' + id
      }
    }
  </script> -->
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
        <li><a href="AdminMagane.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>

        <li><a href="AddAdmin.php"><b>Add Admin</b></a></li>
        <li class="active"><a href="ADeleteUser.php"><b>Delete User</b></a></li>
        <li><a href="ADeletePost.php"><b>Delete Post</b></a></li>
        <li><a href="ANotification.php"><b>Notification</b></a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>

      </ul>
    </div>
  </nav>


  <form action="" method="POST">
    <table class="data-table">
      <thead>
        <tr>
          <th>Photo</th>
          <th>Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Delete</th>
        </tr>
      </thead>

      <tbody>

        <?php





        $Server = "localhost";
        $username = "root";
        $psrd = "";
        $dbname = "Bidding";
        $connection = mysqli_connect($Server, $username, $psrd, $dbname);

        $query = "select * from User";
        $Result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($Result)) {
          echo "<tr>";
          echo "<td>";
          echo "<img style='width:100px;height:100px' src='../UserPhoto/" . $row['Photo'] . "'>";
          echo "</td>";
          echo "<td>";
          echo $row['Name'];
          echo "</td>";
          echo "<td>";
          echo $row['Email'];
          echo "</td>";
          echo "<td>";
          echo $row['Gender'];
          echo "</td>";
          echo "<td>";
          echo $row['Address'];
          echo "</td>";
          echo "<td>";
          $name = $row[1];

          echo "<a href=javascript:delete('$name')> <h6>Click to delete</h6> </a>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </form>

</body>

</html>