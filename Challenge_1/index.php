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
  <?php include '../header.php';?>
  <?php include '../footer.php';?>
  <body>
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
  </body>
</html>
