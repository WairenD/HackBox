<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>HACKBOX MAIN</title>
  </head>
  <body>
  <header>
        <nav>
            <div class="wrapper">
                <div class="logo"><a href="#">HACKBOX</a></div>
                <input type="radio" name="slider" id="menu-btn">
                <input type="radio" name="slider" id="close-btn">
                <ul class="nav-links">
                    <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li>
                        <a href="#" class="desktop-item">Dropdown Menu</a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">Dropdown Menu</label>
                        <ul class="drop-menu">
                            <li><a href="#">Instructions</a></li>
                            <li><a href="#">Challenge 0</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Feedback</a></li>
                </ul>
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            </div>
        </nav>
    </header>
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
