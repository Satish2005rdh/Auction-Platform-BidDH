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
      font-family: 'Poppins', 'Segoe UI', sans-serif;
    }

    :root {
      --primary: #ffffffff;
      --secondary: #ffffffff;
      --accent: #00ffd5;
      --danger: #ff4f70;
      /* --text-light: #ffffff; */
      /* --text-dark: #333333; */
      --bg-dark: rgba(0, 0, 0, 0.25);
      --bg-light: rgba(255, 255, 255, 0.1);
      --border-light: rgba(255, 255, 255, 0.2);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Rubik', sans-serif;
    }

    body {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: black;
      min-height: 100vh;
      line-height: 1.6;
    }

    .data-table {
      width: 95%;
      max-width: 1200px;
      margin: 30px auto;
      border-collapse: separate;
      border-spacing: 0;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    /* Main Content */
    .main-title {
      text-align: center;
      margin: 2rem 0;
      font-size: 2.2rem;
      font-weight: 700;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    /* Glass Table Container */
    .table-container {
      margin: 2rem auto;
      width: 90%;
      max-width: 1200px;
      background: var(--bg-light);
      border-radius: 20px;
      padding: 2rem;
      backdrop-filter: blur(15px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
      border: 1px solid var(--border-light);
      animation: fadeIn 0.8s ease-in;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(40px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Modern Table Styling */
    .table-wrapper {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 1rem;
      color: var(--text-light);
    }

    thead {
      background: var(--bg-dark);
      border-radius: 12px 12px 0 0;
      overflow: hidden;
    }

    th,
    td {
      padding: 1rem 1.5rem;
      text-align: center;
      border-bottom: 1px solid var(--border-light);
    }

    th {
      font-weight: 600;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      font-size: 0.9rem;
    }

    tbody tr {
      transition: all 0.3s ease;
    }

    tbody tr:hover {
      background: rgba(255, 255, 255, 0.15);
      transform: translateY(-2px);
    }

    /* Action Buttons */
    .action-btns {
      display: flex;
      gap: 0.8rem;
      justify-content: center;
    }

    .action-btn {
      cursor: pointer;
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      transition: all 0.3s ease;
      border: none;
      font-size: 0.9rem;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }

    .reply-btn {
      background: var(--accent);
      color: var(--text-dark);
    }

    .delete-btn {
      background: var(--danger);
      color: var(--text-light);
    }

    .action-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    /* No Data Message */
    .no-data {
      text-align: center;
      padding: 2rem;
      color: var(--text-light);
      font-size: 1.1rem;
      opacity: 0.8;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .navbar {
        flex-direction: column;
        padding: 1rem;
      }

      .nav-links {
        margin-top: 1rem;
        flex-wrap: wrap;
        justify-content: center;
      }

      .table-container {
        padding: 1rem;
        width: 95%;
      }

      th,
      td {
        padding: 0.8rem;
      }

      .action-btns {
        flex-direction: column;
        gap: 0.5rem;
      }

      .action-btn {
        width: 100%;
        justify-content: center;
      }
    }

    /* Loading Animation */
    @keyframes pulse {

      0%,
      100% {
        opacity: 0.6;
      }

      50% {
        opacity: 1;
      }
    }

    .loading-row td {
      animation: pulse 1.5s infinite ease-in-out;
      background: rgba(255, 255, 255, 0.1);
    }
  </style>

  <script type="text/javascript">
    function reply(name) {
      if (confirm('Sure To Reply?')) {


        window.location = 'ANotificationReply.php?reply=' + name
      }
    }

    function del(email) {
      if (confirm('Sure Delete?')) {


        window.location = 'ANotificationDelete.php?del=' + email
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
        <li><a href="AdminMagane.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
        <li><a href="AddAdmin.php"><b>Add Admin</b></a></li>

        <li><a href="ADeleteUser.php"><b>Delete User</b></a></li>
        <li><a href="ADeletePost.php"><b>Delete Post</b></a></li>
        <li class="active"><a href="ANotification.php"><b>Notification</b></a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>

      </ul>
    </div>
  </nav>
  <form action="" method="POST">



    <?php





    $Server = "localhost";
    $username = "root";
    $psrd = "";
    $dbname = "Bidding";
    $connection = mysqli_connect($Server, $username, $psrd, $dbname);

    $query = "select * from ANotification";
    $Result = mysqli_query($connection, $query);
    if (mysqli_num_rows($Result) > 0) {
      $not = mysqli_num_rows($Result);
      echo "<script> alert('Your Have $not New Notification'); </script>";
      echo '<table class="data-table">
 <thead>
     <tr>
           
       <th>Name</th>   
       <th>Email</th>
       <th>Message</th>
       <th>Reply</th>
       <th>Delete</th>
      
    </tr>
  </thead>

<tbody>';

      while ($row = mysqli_fetch_array($Result)) {
        echo "<tr>";

        echo "<td>";
        echo $row['UserName'];
        echo "</td>";
        echo "<td>";
        echo $row['email'];
        echo "</td>";
        echo "<td>";
        echo $row['Message'];
        echo "</td>";
        echo "<td>";
        $email = $row[1];
        $name = $row[0];
        echo "<a href=javascript:reply('$name')> <h6>Click to Reply</h6> </a>";
        echo "</td>";

        echo "<td>";
        $email = $row[1];
        echo "<a href=javascript:del('$email')> <h6>Click to delete</h6> </a>";
        echo "</td>";
      }
    } else {
      echo "<script> alert('Your Have Not Any Notification'); </script>";
    }
    ?>

    </tbody>
    </table>
  </form>

</body>

</html>