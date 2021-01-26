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
      session_start();
      $errorMsg = "";
      include("connection.php");
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
      if($currentLevel<3 || !isset($_SESSION['userName'])){
        header("Location: index.php");
      }
       ?>
        <nav>
            <div class="wrapper">
                <div class="logo"><a href="">HACKBOX</a></div>
                <input type="radio" name="slider" id="menu-btn">
                <input type="radio" name="slider" id="close-btn">
                <ul class="nav-links">
                    <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
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
                    <li><a href="leaderboards.php">Leaderboards</a></li>
                    <?php
                    if (isset($_SESSION['userName'])) {
                        echo '<li><a href="#" class="desktop-item">' . $_SESSION['userName'] . '</a>
                         <input type="checkbox" id="showDrop">
                         <label for="showDrop" class="mobile-item">' . $_SESSION['userName'] . '</label>
                         <ul class="drop-menu">
                          <li><a href="logout.php">Log Out</a></li>
                         </ul></li>';
                    } else {
                        echo '<li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>';
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
        <p style="margin-top:20px;" class="textLeft">Dimitri: Now that’s a funny thing, isn’t it? There’s logged data for Minerva Dewitt in here. You know Minerva Dewitt, don’t you? She was the daughter of Big Brain’s founders. Tragic story really. Her parents’ met a sudden and brutal end one evening, and then Minerva went missing and was never found. After a few years of searching and coming up empty-handed, they declared her legally dead. Spooky they have data for her here, don’t you think?</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Okay… hear me out. You remember that manifesto note Boss left us? That, added with the circumstances of Minerva’s disappearance and her parents’ deaths… Do you think it’s Minerva doing this? She could’ve survived and somehow escaped all attempts to find her, and now she’s back… but then why launch an attack on Shiny Tech and its employees? You don’t think Shiny Tech or Mr. CEO could’ve been involved in… no, that’s… then again, that man gives me major bad vibes. </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: Good evening you two. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Boss? You look troubled, what’s up? </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: …Not too long ago, I got an odd phone call from a man calling himself “Manifest”, he said he knew what Oblivion was after then left me a somewhat cryptic message. “Sometimes the dead comes back to punish the living,” he said. Any idea what he could’ve meant by that? Other than ghosts running amuck downtown, obviously.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Ghosts running amuck uptown?</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: This is serious Dimitri! This must be some sort of clue, right? I’m so exhausted that I’m having trouble thinking clearly. That horrible man has been berating me at every step I make</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Boss! I think I have an idea on what that Manifest guy might be hinting at. </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: So you think Minerva Dewitt is our terrorist here? </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Yes ma’am. </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: And you think she’s out to get Martin van Braam, who you believe to be responsible for the deaths of her parents? </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Yes ma’am. </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: Alright, I’ll cosign this theory of yours. Get whatever data you’ve found concerning Minerva on a flash drive for me, then expunge her from Big Brain’s databases. If she’s the one we’re after, she’s likely siphoning some sort of resource from Big Brain, and I’d rather she be cut off from that resource. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Whatever you say boss. Brainiac is on it. </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: Thanks, you two. I’ve got to go speak with the folks running Big Brain, but I’ll be sure to keep in touch </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="actionTextDiv">
        <a href="Challenge_4/index.php"><input class="actionText" style="margin-top:20px; background-color:#3a3b3d; border:none; cursor:pointer; color:white;" type="submit" name="end" value="Next Challenge"></a>
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
            <span><a href="privacy_policy.php">Privacy Policy</a></span>
        </div>
    </footer>
  </body>
</html>
