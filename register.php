<html>
    <head>
        <title>HackBox Main Page</title>
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    </head>
    <body>
      <?php
      if(isset($_POST['submit'])){
        if(!empty($_POST['password']) && !empty($_POST['passwordCheck']) && !empty($_POST['email'])){
          if($_POST['password']==$_POST['passwordCheck']){
            include("connection.php");
            $userName = htmlentities($_POST['username']);
            $userPass = password_hash(htmlentities($_POST['password']), PASSWORD_BCRYPT);
            $userEmail = htmlentities($_POST['email']);
            $SQLSelect = "SELECT userName,userEmail FROM ".$db_table;
            if($stmt = mysqli_prepare($DBConnect, $SQLSelect)) {
              mysqli_stmt_execute($stmt);
              mysqli_stmt_bind_result($stmt, $nametest,$emailtest);
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
                  if($nametest == $userName || $emailtest == $userEmail){
                    echo "<span class='fill'>This username or email already taken!</span>";
                    die();
                  }
                }
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
            $datetemp = '2012-03-06 17:33:07';
            $SQLstring = "INSERT INTO ". $db_table." VALUES(NULL,?, ?, ?,?,?,?,0)";
            if($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
              mysqli_stmt_bind_param($stmt, 'ssssss',$userEmail,$userName, $userPass,$datetemp,$datetemp,$datetemp);
              $QueryResult = mysqli_stmt_execute($stmt);
              if($QueryResult === FALSE) {
                echo "<p>Unable to execute the query.</p>"
                . "<p>Error code "
                . mysqli_errno($DBConnect)
                . ": "
                . mysqli_error($DBConnect)
                . "</p>";
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
            echo "<span>The passwords do not match!</span>";
          }
        }else{
          echo "<span>Please fill in all the details!</span>";
        }
      }
       ?>
       <form runat="server" action="" method="POST" enctype="multipart/form-data">
         <input type="email" name="email" placeholder="Email Address">
         <input type="text" name="username" placeholder="Username">
         <input type="password" name="password" placeholder="Password">
         <input type="password" name="passwordCheck" placeholder="Password">
         <input type="submit" name="submit" value="Submit">
       </form>
    </body>
</html>
