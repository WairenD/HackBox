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
        if(!empty($_POST['password'])){
            if($_POST['password']=="123"){
              //header('Location: '.$nextPage);
            }
            else{

                echo "<span>Login details are incorrect!</span>";
              }

        }else{
          echo "<span>Please fill in all the details!</span>";
        }
      }
       ?>
    </body>
</html>
