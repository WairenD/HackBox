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
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Just how is Big Brain, Inc involved in this? I know Big Brain and Shiny Tech used to have a bit of a rivalry back in the day, but Shiny Tech is always encountering new rivals. However, Big Brain’s fall from grace was messier than most others. It was crazy, back then –</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="actionTextDiv">
        <p class="actionText">*Phone rings*</p>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: You two, have you found anything? Anything at all? Things have gotten worse. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Worse how?</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p class="textRight">Svenja: Another attack. This time only two facilities, but they were among the largest. Can’t quite say how many deceased or injured just yet, but it’s already grim.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px; background-color: orange;" class="textRight">Martin: DETECTIVE SCHMIT!! MY BUSINESS IS UNDER ATTACK AND YOU’RE ON THE PHONE?!</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: Mr. Van Braam sir, I am doing my job. I’m checking in with a couple of my investigators, and they’re doing the best that they can. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px; background-color: orange;" class="textRight">Martin: CLEARLY THEIR BEST ISN’T GOOD ENOUGH! Listen, you bunch of dolts, I just need you to give me a name, and maybe a last known location and I can sort this mess out myself.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: Just how do you intend to do that, sir?  </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px; background-color: orange;" class="textRight">Martin: Don’t you worry about that. I have my methods, and they’re more effective than yours.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: …in any case sir, we haven’t any information on the perp’s identity. Isn’t that right, Dimitri? </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px; background-color: orange;" class="textRight">Martin: INDEED YOU HARDLY THINK!! You need to find out who did this as soon as possible or, I promise you, I will rain Hell down about your pathetic operation and you’ll be out of a job so fast that your head will spin! Good day!</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Well, that’s true, but we think we have something worth looking in to. Big Brain, inc appears to be associated with the attacker somehow.</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px; background-color: orange;" class="textRight">What is he saying? What do they know, detective? Do they have a name? any kind of lead?</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: …n-no, they’ve nothing much yet, other than a couple theories.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px; background-color: orange;" class="textRight">Martin: BAH!! YOU GOOD FOR NOTHING –  </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px; background-color: lightblue;" class="textLeft">Officer: Sir, we need you to calm down and clear out this area. It’s potentially dangerous for you to be this out in public. You may be a target. Please, come with me. </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px; background-color: orange;" class="textRight">Martin: What? Very well. Detective, I highly suggest you do your job and figure this out quickly, or there will be consequences. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="actionTextDiv">
        <p class="actionText">*Martin is escorted away*</p>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Well, that was ominous. I don’t quite like or trust that man.</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: Me neither, but that’s hardly our concern right now. I need you to investigate Big Brain. Find a way in to their system or whatever, and gain access to as much information as possible. This could be crucial.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: You got it Boss! Brainiac and I will contact you if we find anything of note.</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: Right.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="actionTextDiv">
        <p class="actionText">*click*</p>
      </div>
    </div>
      <img width="6%" height="6%" style="margin-left: 0;margin-top:30vh;" class="charImg2" src="images/detective_full_body.png" alt="char2">
      <img width="11%" height="11%" style="margin-top:30vh;" class="charImg2" src="images/magnate_full_body.png" alt="char2">
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
