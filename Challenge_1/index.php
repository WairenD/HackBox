<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/assistant.css">
    <script src="js/assistant.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Challenge 1</title>
    <link rel="stylesheet" href="css/challenge1style.css">
  </head>
  <body>
    <header>
      <?php
      $errorMsg = "";
      include("../connection.php");
      session_start();
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
      if(!isset($_SESSION['userName'])){
        header("Location: ../index.php");
      }
      if($currentLevel!=1){
        $SQLstring = "UPDATE " . $db_table . " SET startTime='".date("Y-m-d h:i:s")."' WHERE userName='".$_SESSION['userName']."'";
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
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../about.php">About</a></li>
                    <li>
                        <a href="#" class="desktop-item">Challenges</a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">Challenges</label>
                        <ul class="drop-menu">
                          <?php
                          for($i = 0;$i<$currentLevel;$i++){
                            echo '<li><a href="../Challenge_'. ($i+1) .'">Challenge '. ($i+1) .'</a></li>';
                          }
                          ?>
                        </ul>
                    </li>
                    <li><a href="../leaderboards.php">Leaderboards</a></li>
                    <?php
                    if (isset($_SESSION['userName'])) {
                        echo '<li><a href="#" class="desktop-item">' . $_SESSION['userName'] . '</a>
                         <input type="checkbox" id="showDrop">
                         <label for="showDrop" class="mobile-item">' . $_SESSION['userName'] . '</label>
                         <ul class="drop-menu">
                          <li><a href="../logout.php">Log Out</a></li>
                         </ul></li>';
                    }
                    ?>
                </ul>
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            </div>
        </nav>
    </header>
    <div class="fullpage">
      <a href="profile.php"><img style="margin: 10px; margin-left:82%;" src="images/minervaimg.png" alt=""></a>
      <h1 id="mainHeader">Please enter you login details!</h1>
      <div id="logoDiv"><img id="logo" src="images/nhltwitter.png" alt="logo"></div>
      <div class="formDiv">
      <form runat="server" action="" method="POST">
        <input class="inputStyle" type="email" name="email" placeholder="Email" maxlength="30">
        <input class="inputStyle" type="password" name="password" placeholder="Password" maxlength="30">
        <div class="login">
            <input class="buttonStyle" type="submit" name="login" value="Log in">
        </div>
      </form>
      </div>
    </div>
    <?php
    if(isset($_POST['login'])){
      if(!empty($_POST['password'])){
          if($_POST['password']=="19950525" && $_POST['email']=="minerva.dewitt@oblivion.com"){
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
            header('Location: ../story1.php');
          }
          else{
              $errorMsg = "<span>Login details are incorrect!</span>";
            }

      }else{
        $errorMsg = "<span>Please fill in all the details!</span>";
      }
    }
     ?>
     <div class="errorDiv"><?php echo $errorMsg ?></div>
    <div id="hint"> </div>
    <div id="assistant">
        <img src="images/assist-sarcastic.png" alt="assistant" onclick="getHint()">
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
