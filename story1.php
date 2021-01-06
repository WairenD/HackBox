<!DOCTYPE html>
<html lang="en" dir="ltr">
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
      include("connection.php");
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
      session_start();
      $_SESSION['challStage'] = $currentLevel;
       ?>
        <nav>
            <div class="wrapper">
                <div class="logo"><a href="./">HACKBOX</a></div>
                <input type="radio" name="slider" id="menu-btn">
                <input type="radio" name="slider" id="close-btn">
                <ul class="nav-links">
                    <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="./about.php">About</a></li>
                    <li>
                        <a href="#" class="desktop-item">Challenges</a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">Challenges</label>
                        <ul class="drop-menu">
                          <?php
                          for($i = 0;$i<$_SESSION['challStage'];$i++){
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
    <img width="15%" height="15%" class="charImg1" src="images/assisstant_full_body.png" alt="char1">
    <div class="mainText">
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: Okay, let’s hear it. What were you able to find?</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Boss! Brainiac and I were able to get into a social media account we think belongs or belonged to our perpetrator. We managed to get the login info via some mumbo-jumbo Brainiac did with that note you left us, and found a profile that was blank save for a single link to a rather – interesting – website seemingly set up by our perp.</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: And what did you find there?</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Well we – </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="actionTextDiv">
        <p class="actionText">*Svenja’s phone rings*</p>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px; background-color: orange;" class="textLeft">Martin: DETECTIVE SCHMIT!!</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: Mr. van Braam, hello sir –</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px; background-color: orange;" class="textLeft">Martin: Don’t “hElLo sIR” me! Why have you not found and arrested that maniac yet?! Do you enjoy having terrorists running loose in the city.</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: Sir, we’re doing all we can… We’ve got our best people on the case.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px; background-color: orange;" class="textLeft">Martin: Well clearly your best isn’t good enough, otherwise that lunatic would already be behind bars! Just what Is taking so long?! I pay my taxes to keep your sorry behinds well-funded so you can do your jobs as efficiently as possible! WHY HAVE I NOT YET SEEN RESULTS?!</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: These things take time, sir. We’re working on figuring out who did this, then we’re going to find out where they are and bring them to justice. I understand things are a bit hectic and frightening right now, but you need to remain calm.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px; background-color: orange;" class="textLeft">Martin: Calm? CALM! You expect me to be calm after I’ve been attacked by a lunatic?! Nine dead and about three dozen critically injured! These people can’t work being dead or so badly injured that they might as well be. Add to that, the repairs needed for those facilities. Even if I cut a few corners, which I damn well intend to, I’m still losing money. Bleeding! I’m bleeding money! I can’t be bleeding money detective… I’m trying to run a business here!</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: Sir, I hardly think –</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px; background-color: orange;" class="textLeft">Martin: INDEED YOU HARDLY THINK!! You need to find out who did this as soon as possible or, I promise you, I will rain Hell down about your pathetic operation and you’ll be out of a job so fast that your head will spin! Good day!</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="actionTextDiv">
        <p class="actionText">*click*</p>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: That was… I don’t know, a lot. Are you okay?</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: I am perfectly fine. You two hack into that website and find me a lead, any lead. Now if you’ll excuse me, I’m needed elsewhere.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="actionTextDiv">
        <p class="actionText">*leaves*</p>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Well Brainiac, seems Mr. CEO (Van Braam, was it?) is a real handful right now.</p>
        <span class="textLeftSpace"></span>
      </div>
    </div>
    <img width="15%" height="15%" class="charImg2" src="images/detective_full_body.png" alt="char2">
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
