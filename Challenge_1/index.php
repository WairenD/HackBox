<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      <form runat="server" method="post">
        <input class="txtinput" type="password" name="password" >
        <input class="btn" type="submit" name="submit" value="Submit">
      </form>
    </div>
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
