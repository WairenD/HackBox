<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>HACKBOX MAIN</title>
    </head>
  </head>
  <body>
    <header>
        <nav>
            <div class="wrapper">
                <div class="logo"><a href="./index.php">HACKBOX</a></div>
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
                            <li><a href="./Challenge_1/index.php">Challenge 1</a></li>
                            <li><a href="./Challenge_2/index.php">Challenge 2</a></li>
                            <li><a href="./Challenge_3/index.php">Challenge 3</a></li>
                            <li><a href="./Challenge_4/index.php">Challenge 4</a></li>
                            <li><a href="./Challenge_5/index.php">Challenge 5</a></li>
                        </ul>
                    </li>
                    <li><a href="./leaderboards.php">Leaderboards</a></li>
                    <?php
                    session_start();
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
                    ?>
                </ul>
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            </div>
        </nav>
    </header>
    <img width="15%" height="15%" class="charImg1" src="images/Detectivefull.png" alt="char1">
    <div class="mainText">
      <div class="leftTextDiv">
        <p style="margin-top:20px;" class="textLeft">Alright you two, welcome to the team. I’m the detective Svenja Schmit, in charge of the “Neo Genesis” case that’s currently ongoing. I trust you’re already up to speed on what’s going on, but I think it’s best I go over it with you real quick to be sure. Okay?</p>
        <p class="textLeft">…About 12 hours ago, a vicious attack was carried out across a number of large facilities owned and operated by Shiny Tech, inc. We understand it to have been an act of terror remotely executed by one person with unclear motives. The only thing we were able to find were an image we believe to be their chosen calling card, as well as what some of us have been considering a manifesto note of sorts. We’ve provided this note for you. We’re hoping you’ll be able to garner some useful information from it.</p>
        <p class="textLeft">In any case, I’m not exactly thrilled to have been assigned a couple of newbies for such a potentially critical role in solving this case, but you’re all the higher-ups were able to get us. That Said, I and the rest of my unit are counting on you to do your utmost to help solve this case. The sooner we can figure out who this lowlife is, the sooner we can stop worrying about a repeat attack. </p>
        <p class="textLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit vitae nibh et lobortis. Ut elit magna, auctor quis eros vitae, imperdiet tincidunt risus. Maecenas mollis lobortis consequat</p>
        <p class="textLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit vitae nibh et lobortis. Ut elit magna, auctor quis eros vitae, imperdiet tincidunt risus. Maecenas mollis lobortis consequat</p>
        <p class="textLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit vitae nibh et lobortis. Ut elit magna, auctor quis eros vitae, imperdiet tincidunt risus. Maecenas mollis lobortis consequat</p>

      </div>
      <div class="rightTextDiv">
        <p style="margin-top:100px;" class="textRight">Okay!</p>
        <p class="textRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit vitae nibh et lobortis. Ut elit magna, auctor quis eros vitae, imperdiet tincidunt risus. Maecenas mollis lobortis consequat</p>
        <p class="textRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit vitae nibh et lobortis. Ut elit magna, auctor quis eros vitae, imperdiet tincidunt risus. Maecenas mollis lobortis consequat</p>
        <p class="textRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit vitae nibh et lobortis. Ut elit magna, auctor quis eros vitae, imperdiet tincidunt risus. Maecenas mollis lobortis consequat</p>
        <p class="textRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit vitae nibh et lobortis. Ut elit magna, auctor quis eros vitae, imperdiet tincidunt risus. Maecenas mollis lobortis consequat</p>
        <p class="textRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit vitae nibh et lobortis. Ut elit magna, auctor quis eros vitae, imperdiet tincidunt risus. Maecenas mollis lobortis consequat</p>
      </div>
    </div>
    <img width="15%" height="15%" class="charImg2" src="images/Detectivefull.png" alt="char2">
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
