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
                        if(isset($currentLevel)){
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
        <h1>LEADERBOARDS</h1>
        <?php
        include("connection.php");
        if(isset($_SESSION['userName'])){
         ?>
        <div style="text-align:center;">
          <form method="post">
              <input class="playAgainBtn" type="submit" name="play" value="Play">
              <p>This will reset your progress, your best time will be kept.</p>
              <?php
              if(isset($_POST['play'])){
                $SQLstring = "UPDATE " . $db_table . " SET currentlevel='0',endTime='0000-00-00 00:00:00' WHERE userName='".$_SESSION['userName']."'";
                if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
                  $QueryResult = mysqli_stmt_execute($stmt);
                  if ($QueryResult === FALSE) {
                    $errorMsg = "<span><p>Unable to execute the query.</p>"
                      . "<p>Error code "
                      . mysqli_errno($DBConnect)
                      . ": "
                      . mysqli_error($DBConnect)
                      . "</p></span>";}
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
                header("Location: story0.php");
              }
            }
               ?>
          </form>
        </div>
        <table>
            <tr>
                <th>Username</th>
                <th>Best Time(hh/mm/ss)</th>
            </tr>
            <?php
            $SQLstring = "SELECT userName,bestTime,TIMEDIFF(endTime, startTime) FROM " . $db_table;
            if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt,$userName,$bestTime,$tempTime);
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
                      $SQLstring = "UPDATE " . $db_table . " SET bestTime='".max($tempTime,$bestTime)."' WHERE userName='".$userName."'";
                      if ($stmtup = mysqli_prepare($DBConnect, $SQLstring)) {
                        $QueryResult = mysqli_stmt_execute($stmtup);
                        if ($QueryResult === FALSE) {
                          $errorMsg = "<span><p>Unable to execute the query.</p>"
                            . "<p>Error code "
                            . mysqli_errno($DBConnect)
                            . ": "
                            . mysqli_error($DBConnect)
                            . "</p></span>";}
                        //Clean up the $stmt after use
                        mysqli_stmt_close($stmtup);
                      } else {
                        $errorMsg = "<span><p>Unable to execute the query.</p>"
                          . "<p>Error code "
                          . mysqli_errno($DBConnect)
                          . ": "
                          . mysqli_error($DBConnect)
                          . "</p></span>";
                      }
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
            $SQLstring = "SELECT userName,bestTime FROM " . $db_table." ORDER BY bestTime ASC";
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
           <div class="errorDiv"><?php echo $errorMsg ?></div>
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
