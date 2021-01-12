<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>HACKBOX MAIN</title>
</head>

<header>
  <?php
  session_start();
  $errorMsg = "";
  include("./connection.php");
  if(isset($_SESSION['userName'])){
  $SQLstring = "SELECT currentLevel FROM " . $db_table." WHERE userName='".$_SESSION['userName']."'";
  if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt, $currentLevel);
      mysqli_stmt_store_result($stmt);
      if ($stmt === FALSE) {
          $errorMsg = "<span><p>Unable to execute the query.</p>"
              . "<p>Error code "
              . mysqli_errno($DBConnect)
              . ": "
              . mysqli_error($DBConnect)
              . "</p></span>";
      } else {
          while (mysqli_stmt_fetch($stmt)) {
              $challenge = $currentLevel;
          }
      }
      //Clean up the $stmt after use
      mysqli_stmt_close($stmt);
  } else {
      $errorMsg = "<span><p>Unable to execute the query.</p>"
          . "<p>Error code "
          . mysqli_errno($DBConnect)
          . ": "
          . mysqli_error($DBConnect)
          . "</p></span>";
  }
}
   ?>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="./">HACKBOX</a></div>
            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./about.php">About</a></li>
                <li>
                    <a href="#" class="desktop-item">Challenges</a>
                    <input type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item">Challenges</label>
                    <ul class="drop-menu">
                      <?php
                      if(isset($_SESSION['userName'])){
                        for($i = 0;$i<$currentLevel;$i++){
                          echo '<li><a href="./Challenge_'. ($i+1) .'">Challenge '. ($i+1) .'</a></li>';
                        }
                      }
                      ?>
                    </ul>
                </li>
                <li><a href="./leaderboards.php">Leaderboards</a></li>
                <?php
                if (isset($_SESSION['userName'])) {
                    echo '<li><a href="#" class="desktop-item">' . $_SESSION['userName'] . '</a>
                     <input type="checkbox" id="showDrop">
                     <label for="showDrop" class="mobile-item">' . $_SESSION['userName'] . '</label>
                     <ul class="drop-menu">
                      <li><a href="./logout.php">Log Out</a></li>
                     </ul></li>';
                } else {
                    echo '<li><a href="./login.php">Login</a></li>
                <li><a href="./register.php">Register</a></li>';
                }
                mysqli_close($DBConnect);
                ?>
            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav>
</header>

<body>
    <div class="aboutContainer">
        <h1>About the team</h1>
    </div>
    <div class="aboutMainContainer">
        <div class="aboutUs">
            <h2>We are HackBox</h2>
            <p>We are students from NHL Stenden in Emmen,The Netherlands.We wanted to create project which involves around ethical hacking.The main idea about HackBox is to introduce to newcomers ethical hacking and its basics.
                For the team,the user is the most important part of this project,that is why we decided to introduce the world of ethical hacking in the face of intractable website with challenges which the further you progress the harder they get.
            </p>
        </div>
        <div class="contactList">
            <h2>Contact List</h2>
            <p>Robert Murcsek - <a href="mailto:robert.murcsek@student.nhlstenden.com">robert.murcsek@student.nhlstenden.com</a></p>
            <p>Kareem Glasgow - <a href="mailto:kareem.glasgow@student.nhlstenden.com">kareem.glasgow@student.nhlstenden.com</a></p>
            <p>Jonathan Mohamed - <a href="mailto:jonathan.mohamed@student.nhlstenden.com">jonathan.mohamed@student.nhlstenden.com</a></p>
            <p>Georgi Dimitrov - <a href="mailto:georgi.dimitrov@student.nhlstenden.com">georgi.dimitrov@student.nhlstenden.com</a></p>
            <p>Nish Marovanidze - <a href="mailto:nish.marovanidze@student.nhlstenden.com">nish.marovanidze@student.nhlstenden.com</a></p>
            <p>Thomas Koops - <a href="mailto:thomas.koops@student.nhlstenden.com">thomas.koops@student.nhlstenden.com</a></p>
            <p>Xuan Đo - <a href="mailto:xuan.do@student.nhlstenden.com">xuan.do@student.nhlstenden.com</a></p>
        </div>
    </div>
</body>

<footer>
    <div class="main-content">
        <div class="center box">
            <h2>Location</h2>
            <div class="content">
                <div class="place">
                    <span class="fas fa-map-marker-alt"></span>
                    <span class="text">NHL Stenden</span>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <span class="credit">Created By <a href="#">HACKBOX 2.0</a> | </span>
        <span class="far fa-copyright"></span> 2020 All rights reserved.
        <span><a href="./privacy_policy.php">Privacy Policy</a></span>
    </div>
</footer>

</html>
