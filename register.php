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
<?php include 'header.php';?>
<?php include 'footer.php';?>
<body>
  <h2 id="regTitle">Please fill in the form to register!</h2>
  <div class="registerDiv">
    <form runat="server" action="" method="POST" enctype="multipart/form-data">
      <label for="email">Email Address:</label>
      <input type="email" name="email">
      <br><label for="username">Username:</label>
      <input type="text" name="username">
      <br><label for="password">Password:</label>
      <input type="password" name="password">
      <br><label for="passwordCheck">Password again:</label>
      <input type="password" name="passwordCheck">
      <input class="btn" type="submit" name="submit" value="Submit">
    </form>
  </div>
  <?php
  $errorMsg = "";
//  include("connection.php");
  $DBConnect = mysqli_connect("localhost", "root", "",'hackbox');
  $taken = false;
  if (isset($_POST['submit'])) {
    if (!empty($_POST['password']) && !empty($_POST['passwordCheck']) && !empty($_POST['email'])) {
      if ($_POST['password'] == $_POST['passwordCheck']) {
        $userName = htmlentities($_POST['username']);
        $userPass = password_hash(htmlentities($_POST['password']), PASSWORD_BCRYPT);
        $userEmail = htmlentities($_POST['email']);
        $SQLSelect = "SELECT userName,userEmail FROM user";
        if ($stmt = mysqli_prepare($DBConnect, $SQLSelect)) {
          mysqli_stmt_execute($stmt);
          mysqli_stmt_bind_result($stmt, $nametest, $emailtest);
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
              if ($nametest == $userName || $emailtest == $userEmail) {
                $errorMsg = "<span>This username or email already taken!</span>";
                $taken = true;
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
        if (!$taken) {
          date_default_timezone_set('Europe/Amsterdam');
          $startTime = date("Y-m-d h:i:s");
          $endTime = "00:00:00";
          $bestTime = "00:00:00";
          $SQLstring = "INSERT INTO user VALUES(NULL,?, ?, ?,?,?,?,0)";
          if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
            mysqli_stmt_bind_param($stmt, 'ssssss', $userEmail, $userName, $userPass, $startTime, $endTime, $bestTime);
            $QueryResult = mysqli_stmt_execute($stmt);
            header("Location: login.php");
            if ($QueryResult === FALSE) {
              $errorMsg = "<span><p>Unable to execute the query.</p>"
                . "<p>Error code "
                . mysqli_errno($DBConnect)
                . ": "
                . mysqli_error($DBConnect)
                . "</p></span>";
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
        }
      } else {
        $errorMsg = "<span>The passwords do not match!</span>";
      }
    } else {
      $errorMsg = "<span>Please fill in all the details!</span>";
    }
  }
  ?>
  <div class="errorDiv"><?php echo $errorMsg ?></div>
</body>
</html>
