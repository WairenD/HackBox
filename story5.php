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
      if($currentLevel!=5 || !isset($_SESSION['userName'])){
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

                    $SQLstring = "UPDATE " . $db_table . " SET endTime='".date("Y-m-d h:i:s")."' WHERE userName='".$_SESSION['userName']."'";
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
                    mysqli_close($DBConnect);
                    ?>
                </ul>
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            </div>
        </nav>
    </header>
    <?php

     ?>
       <div class="errorDiv"><?php echo $errorMsg ?></div>
    <img width="15%" height="15%" class="charImg1" src="images/assisstant_full_body.png" alt="char1">
    <div class="mainText">
      <div class="rightTextDiv">
        <p style="margin-top:20px; background-color:#CC10BC" class="textRight">Samira: Samira Grace reporting live from just outside Shiny Tech Towers where the scene is something of a chaos. We have confirmation that Mr. Martin Maurice van Braam, CEO of Shiny Tech inc, owner of Shiny Tech Labs and president of Shiny Tech Industries has in fact been murdered this day. The individual responsible for this violent act was found at the scene of the crime and willingly went into police custody. This individual initially identified themselves as Manifest, but later gave the name Addison Blue. This is significant due to Addison Blue being the son of the late Mr. Elliott Blue. Mr. Blue and his wife were found dead in their luxury apartment, an assassination it had seemed, and young Addisson Blue, then only 6 years old, had gone missing… </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Can you believe this? This is wild. That guy killed Van Braam. That’s what he meant when he said he was going to put an end to making of monsters. He took out the head monster.</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px; background-color:#CC10BC" class="textRight">Samira: Sources say the Van Braam family was involved in a number of unsolved murders and child abductions over the past few decades. It is currently being speculated that they were eliminating competition while silently paying off law enforcement so that they may overlook any evidence that may lead back to them.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: What a vile man. I’d have preferred he stand trial and face the full brunt of the law, but given his track record, he’d probably just buy his way out of facing justice again. I don’t condone it, but I’d say Maninest- er… Addison gave him what he deserved. Could you imagine having your parents murdered and being abducted? Only to be trained into a killer meant to repeat the same cycle all so that one greedy family could have a monopoly on the world market…</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px; background-color:#CC10BC" class="textRight">Samira: Breaking News! This just in… the terrorist responsible for the chaos that has wrought across the nation these past couple of weeks has been apprehended by authorities. Detective Svenja Schmit was apparently en route to question  Mr. Van Braam about his less than honorable history when her intelligence was able to provide her a name and location that led her and her unit to cornering and detaining this twisted individual…</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: We’re the Boss’ intelligence, ha! She better be beaming with pride at what a great job we did. I lost a lot of sleep working on this case.</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px; background-color:#CC10BC" class="textRight">Samira: …Well, it seems many ghosts of the past have returned. Minerva Dewitt, once also an abductee and legally declared dead, has been arrested  for orchestrating and executing the attacks on major Shiny Tech facilities these past couple of weeks. Her identity is undergoing confirmation but Detective Schmit claims she is certain that this person is in fact Minerva Dewitt. According to Detective Schmitt, she and Mr. Blue were abducted and trained as assassins and integrated into Shiny Tech’s massive security detail. She believes there are many more like them and will go about finding every last one of them. When asked for further information concerning the murder of Van Braam, Schmit refused to comment. That is all for now, Samira Grace signing off. Back to you John.</p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Woah.. it seems the entire cat is out the bag, huh Brainiac? But we did it! We solved the case and helped Boss catch Oblivion.</p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="actionTextDiv">
        <p class="actionText" style="margin-top:20px;">*Svenja enters room*</p>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: And I’d say congratulations are in order. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Boss! congratulations… for us? </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: Of course! We wouldn’t have caught Minerva without you two. Good timing too, because we found what she was planning to do next and it would’ve ended with hundreds, maybe even thousands dead in the dirt. You two helped save many people today. You deserve more than just congratulations, but unfortunately that’s all I’ve got to offer you right now. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Well, wow, thanks Boss. Brainiac and I really appreciate it. </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: Well, I can offer one more thing… </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: What’s that? </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: How would you two like a more permanent position on my team? I can talk to the chief and make it so. If you want of, course. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Are you kidding me? Obviously we want that. We’d love that. We didn’t do all this work just to refuse such an opportunity. Call up the chief right now and tell him what’s what! </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: Haha! That’s not quite how it works, but I appreciate the enthusiasm. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: …but Boss, the news, it said you were going to track down any others like Minerva and Addison. Is that what we’ll be focusing on, as a proper team? </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: Yup! Over a dozen unsolved cases like Minerva’s… over a dozen children and teenagers turned into killers. While their story is tragic, I fear they’re too  dangerous to let roam free. But enough of that for now. I may have one final thing to offer you two as thanks for your help on this case. Who’s up for some coffee and treats? On me. </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Can mine be hot chocolate? </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="rightTextDiv">
        <p style="margin-top:20px;" class="textRight">Svenja: O-Of course! </p>
        <span class="textRightSpace"></span>
      </div>
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Dimitri: Well then, what are we waiting for?! C’mon Brainiac! Hot chocolate and treats! Free hot chocolate and treats! Let’s go! </p>
        <span class="textLeftSpace"></span>
      </div>
      <div class="actionTextDiv">
        <a href="leaderboards.php"><input class="actionText" style="margin-top:20px; background-color:#3a3b3d; border:none; cursor:pointer; color:white;" type="submit" name="end" value="END"></a>
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
