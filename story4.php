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
      if($currentLevel<4){
        header("Location: index.php");
      }else if($currentLevel==4){
        $currentLevel=5;
        $SQLstring = "UPDATE " . $db_table . " SET currentlevel=".$currentLevel." WHERE userName='".$_SESSION['userName']."'";
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
      <div class="actionTextDiv">
        <p class="actionText" style="margin-top:20px;">*phone rings* </p>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Hello?</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px; background-color:darkblue" class="textRight">Manifest: Good evening. I’m the one called Manifest, and I’ve been in contact with detective Schmit.  </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Y-Yeh, what can I do for you? </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px; background-color:darkblue" class="textRight">Manifest: I’m just calling to let you know that Oblivion, your terrorist, has likely got something major planned for her next move. It would put an immediate stop to it if you want to save hundreds, maybe thousands of lives.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: What? What is she planning? What do you know? I need you to tell me everything!</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px; background-color:darkblue" class="textRight">Manifest: Sorry, that’s all I got for you. I just thought you should know so that you and your partner would hurry things along.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Wo are you? How are you involved in this?</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px; background-color:darkblue" class="textRight">Manifest: Listen, Oblivion… no, Minerva is something of a colleague of mine. I’m a major part of why this is even happening, and I intend to help put a stop to it. You guys are on the right track, I know it. However, you need to hurry up or many more are going to suffer because of us. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: “Us”? </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:-40px; background-color:darkblue" class="textRight">Manifest: Yes, us. I helped make Minerva in to the monster she is today. It makes sense though. I’m also a monster created by another, nastier monster. But I and my monster are not your concern. Minerva is your concern. Please, find and stop her. While you do that, I’m going to put a more permanent end to the creation of monsters like Minerva and I.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="actionTextDiv">
        <p class="actionText" style="margin-top:20px;">*click* </p>
      </div>
      <div class="actionTextDiv">
        <p class="actionText" style="margin-top:20px;">*Svenja rushes in to the room*</p>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: You two!</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Boss!</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: What’s going on here? You look like you’ve seen a ghost. Never mind that. I came by to give you explicit orders to use cross site scripting to find Minerva’s location. We have enough to bag her, we just need to find her.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Boss! Manifest just called here. He says Minerva is likely planning to do something that will harm hundreds if not thousands of people. Also, he’s a lot more involved than we originally theorized. He says he helped turn her into the monster known as Oblivion. You don’t suppose he was the one responsible for her disappearance years ago, do you?</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: You might be on to something Dimitri, but given what he says about Minerva’s next move, we need to focus on stopping her immediately. Meanwhile, I’m going to pay Mr, Van Braam a surprise visit. I’ve a feeling he knows far more about this than he’s letting on. He’s currently bunkered down at his uptown office.  </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Boss?</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: I think Mr. van Braam may have something to do with the Dewitt murders and now their daughter who went missing has returned to exact some twisted form of justice. I checked the case files on the Dewitt murders, and there’s just enough evidence there that implicates Van Braam. How none of it was ever brought up before is astounding to me. I suppose when you’re rich and powerful, you can make certain things pass beneath many people’s radars.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Boss, this could be a huge news story if true. The press will be all over this, for the accusation alone. Are we prepared for that kind of attention?</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: Don’t worry about that. We’ve had the press’ attention this entire time. A few more questions and cameras shouldn’t be too much of an issue. Anyway, get to work you two. I’m going to request an audience with that vile monster. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: …Vile monster indeed.</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="actionTextDiv">
        <a href="Challenge_5/index.php"><input class="actionText" style="margin-top:20px; background-color:#3a3b3d; border:none; cursor:pointer; color:white;" type="submit" name="end" value="Next Challenge"></a>
      </div>
    </div>
    <img width="17%" height="18%" style="margin-top: 20px;" class="charImg2" src="images/assassin_full_body.png" alt="char2">
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
