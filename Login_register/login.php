<html>
    <head>
        <title>HackBox Main Page</title>
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    </head>
    <body>
      <form runat="server" method="post">
        <input type="email" name="email">
        <input type="password" name="password">
        <input type="submit" name="submit" value="Submit">
      </form>
      <?php
      if(isset($_POST['submit'])){
          if(!empty($_POST['email']) && !empty($_POST['password'])){
              mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
              $db_name = "hackbox";
              $db_table = "user";
              //assign the connection and selected database to a variable
              $DBConnect = mysqli_connect("localhost", "root", "");
              if ($DBConnect === FALSE){
                  echo "<p>Unable to connect to the database server.</p>"
                      . "<p>Error code " . mysqli_connect_errno($DBConnect) . ": "
                      . mysqli_connect_error($DBConnect) . "</p>";
              } else{
                  //select the database
                  $db = mysqli_select_db($DBConnect, $db_name);
                  if ($db === FALSE){
                      echo "<p>Unable to connect to the database server.</p>"
                          . "<p>Error code " . mysqli_errno($DBConnect) . ": "
                          . mysqli_error($DBConnect) . "</p>";
                      mysqli_close($DBConnect);
                      $DBConnect = FALSE;
                  }
              }
              $SQLstring = "SELECT userEmail,userPassword FROM ". $db_table;
              if($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
                  mysqli_stmt_execute($stmt);
                  mysqli_stmt_bind_result($stmt,$userEmail,$userPassword);
                  mysqli_stmt_store_result($stmt);
                  if($stmt === FALSE) {
                      echo "<p>Unable to execute the query.</p>"
                          . "<p>Error code "
                          . mysqli_errno($DBConnect)
                          . ": "
                          . mysqli_error($DBConnect)
                          . "</p>";
                  }else{
                      while (mysqli_stmt_fetch($stmt)) {
                          if($userEmail == htmlentities($_POST['email']) && $userPassword = $_POST['password']){
                              header("Location: secondPage.php");
                          }
                      }
                      echo 'incorrect login details';
                  }
                  //Clean up the $stmt after use
                  mysqli_stmt_close($stmt);
              }else{
                  echo "<p>Unable to execute the query.</p>"
                      . "<p>Error code "
                      . mysqli_errno($DBConnect)
                      . ": "
                      . mysqli_error($DBConnect)
                      . "</p>";
              }
              mysqli_close($DBConnect);

          }else{
              echo "Please fill in all the details!";
          }
      }
       ?>
    </body>
</html>
