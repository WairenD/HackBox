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
      if($currentLevel==0){
        $currentLevel=1;
        $SQLstring = "UPDATE " . $db_table . " SET currentlevel=".$currentLevel.", startTime='".date("Y-m-d h:i:s")."' WHERE userName='".$_SESSION['userName']."'";
        if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
          $QueryResult = mysqli_stmt_execute($stmt);
          if ($QueryResult === FALSE) {
            $errorMsg = "<span><p>Unable to execute the query.</p>"
              . "<p>Error code "
              . mysqli_errno($DBConnect)
              . ": "
              . mysqli_error($DBConnect)
              . "</p></span>";}
              else{
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
    <img width="15%" height="15%" class="charImg1" src="images/assisstant_full_body.png" alt="char1">
    <div class="mainText">
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: Alright you two, welcome to the team. I’m the detective Svenja Schmit, in charge of the “Neo Genesis” case that’s currently ongoing. I trust you’re already up to speed on what’s going on, but I think it’s best I go over it with you real quick to be sure. Okay? </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Okay!</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: …About 12 hours ago, a vicious attack was carried out across a number of large facilities owned and operated by Shiny Tech, inc. We understand it to have been an act of terror remotely executed by one person with unclear motives. The only thing we were able to find were an image we believe to be their chosen calling card, as well as what some of us have been considering a manifesto note of sorts. We’ve provided this note for you. We’re hoping you’ll be able to garner some useful information from it. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: I’m sure we will.</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: In any case, I’m not exactly thrilled to have been assigned a couple of newbies for such a potentially critical role in solving this case, but you’re all the higher-ups were able to get us. That Said, I and the rest of my unit are counting on you to do your utmost to help solve this case. The sooner we can figure out who this lowlife is, the sooner we can stop worrying about a repeat attack.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Don’t worry Boss, We’ll get to the bottom of this. </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: Dimitri Valentine, was it? I’ve read your file… if I remember correctly, there were notes left that described you as “, chatty, inappropriately boisterous, has no regard for personal space, and overly confident in his abilities.” </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: What? Who wrote that? Was it Brenda in administration? I bet it was her. She never liked me.</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: It doesn’t matter who wrote it. But the fact that these notes exist does not instill me with very much confidence in you. Now our friend here… the notes on them indicate that they might actually have some potential. Not enough to put me at ease, but enough to know that at least one of you may actually produce results. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Boss, let me assure you that I am positive this Brainiac and I will get the job done before you even know it. I bet we’ll find out who did this heinous act in no time.</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px;" class="textRight">Svenja: “Overly confident in his abilities”</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="actionTextDiv">
        <a href="Challenge_1/index.php"><input class="actionText" style="margin-top:20px; background-color:#3a3b3d; border:none; cursor:pointer; color:white;" type="submit" name="end" value="Next Challenge"></a>
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
