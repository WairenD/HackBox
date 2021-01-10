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

<body>
  <header>
    <?php
    session_start();
    $errorMsg = "";
    include("./connection.php");
    $SQLstring = "SELECT currentLevel FROM " . $db_table;
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
                        for($i = 0;$i<$currentLevel;$i++){
                          echo '<li><a href="./Challenge_'. ($i+1) .'">Challenge '. ($i+1) .'</a></li>';
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
    <div class="insertChallengeHere">
        <h1>LEADERBOARDS</h1>
        <table>
            <tr>
                <th>Username</th>
                <th>Time to finish(hh/mm/ss)</th>
            </tr>
            <?php
            include("connection.php");
            $SQLstring = "SELECT userName,TIMEDIFF(endTime, startTime) FROM " . $db_table;
            if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $userName,$bestTime);
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
                        echo '<tr>
                    <td>' . $userName . '</td>
                    <td>' . $bestTime . '</td>
                  </tr>';
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
            mysqli_close($DBConnect);
            ?>
        </table>
    </div>
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
</body>

</html>
