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
    :root {
      --primary-gradient-start: #6a11cb;
      --primary-gradient-end: #2575fc;
      --danger-color: #ff4f70;
      --danger-hover: #ff3050;
      --text-primary: #ffffff;
      --text-secondary: #ffffffdd;
      --nav-bg: rgba(255, 255, 255, 0.1);
      --nav-border: rgba(255, 255, 255, 0.2);
      --transition-speed: 0.3s;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', 'Segoe UI', sans-serif;
    }

    body {
      background: linear-gradient(135deg, var(--primary-gradient-start), var(--primary-gradient-end));
      color: var(--text-primary);
      min-height: 100vh;
      line-height: 1.6;
    }

    /* Enhanced Glass Navigation */
    nav {
      width: 100%;
      background: var(--nav-bg);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      padding: 1rem 2.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid var(--nav-border);
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }

    .logo {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--text-primary);
      text-decoration: none;
      letter-spacing: 1px;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .logo-icon {
      font-size: 1.8rem;
    }

    .nav-links {
      display: flex;
      list-style: none;
      gap: 2rem;
      align-items: center;
    }

    .nav-links li a {
      position: relative;
      text-decoration: none;
      color: var(--text-secondary);
      font-weight: 500;
      font-size: 1rem;
      transition: color var(--transition-speed) ease;
      padding: 0.5rem 0;
    }

    .nav-links li a::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: var(--text-primary);
      transition: width var(--transition-speed) ease;
    }

    .nav-links li a:hover {
      color: var(--text-primary);
    }

    .nav-links li a:hover::after {
      width: 100%;
    }

    .nav-links li a.active {
      color: var(--text-primary);
      font-weight: 600;
    }

    .nav-links li a.active::after {
      width: 100%;
    }

    .logout-btn {
      font-weight: 600;
      background: var(--danger-color);
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      color: var(--text-primary);
      text-decoration: none;
      transition: all var(--transition-speed) ease;
      border: none;
      cursor: pointer;
      font-size: 1rem;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }

    .logout-btn:hover {
      background: var(--danger-hover);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(255, 48, 80, 0.3);
    }

    /* Mobile Navigation */
    .menu-toggle {
      display: none;
      cursor: pointer;
      font-size: 1.5rem;
      color: var(--text-primary);
      transition: transform 0.3s ease;
    }

    .menu-toggle:hover {
      transform: scale(1.1);
    }

    @media (max-width: 768px) {
      nav {
        padding: 1rem;
        flex-wrap: wrap;
      }

      .menu-toggle {
        display: block;
        order: 1;
      }

      .logo {
        order: 2;
        flex-grow: 1;
        text-align: center;
      }

      .nav-links {
        display: none;
        flex-direction: column;
        width: 100%;
        gap: 1rem;
        padding: 1rem 0;
        order: 3;
      }

      .nav-links.active {
        display: flex;
        animation: slideDown 0.4s ease-out;
      }

      .logout-btn {
        width: 100%;
        justify-content: center;
        order: 4;
        margin-top: 1rem;
      }

      @keyframes slideDown {
        from {
          opacity: 0;
          transform: translateY(-20px);
        }

        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
    }

    /* Additional Modern Elements */
    .notification-badge {
      position: absolute;
      top: -8px;
      right: -8px;
      background: var(--danger-color);
      color: white;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.7rem;
      font-weight: 700;
    }

    /* Dark Mode Toggle (optional) */
    .theme-toggle {
      background: transparent;
      border: none;
      color: var(--text-primary);
      font-size: 1.2rem;
      cursor: pointer;
      padding: 0.5rem;
      border-radius: 50%;
      transition: all var(--transition-speed) ease;
    }

    .theme-toggle:hover {
      background: rgba(255, 255, 255, 0.1);
    }
  </style>
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
        <li><a href="ANotification.php"><b>Notification</b></a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>

      </ul>
    </div>
  </nav>


</body>

</html>