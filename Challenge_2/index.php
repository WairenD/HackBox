<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../main.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Challenge 2</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
</head>

<body>
    <main>
        <header>
            <nav>
                <div class="wrapper">
                    <div class="logo"><a href="#">HACKBOX</a></div>
                    <input type="radio" name="slider" id="menu-btn">
                    <input type="radio" name="slider" id="close-btn">
                    <ul class="nav-links">
                        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                        <li><a href="../">Home</a></li>
                        <li><a href="../about.php">About</a></li>
                        <li>
                            <a href="#" class="desktop-item">Dropdown Menu</a>
                            <input type="checkbox" id="showDrop">
                            <label for="showDrop" class="mobile-item">Dropdown Menu</label>
                            <ul class="drop-menu">
                                <li><a href="../Challenge_1">Challenge 1</a></li>
                                <li><a href="">Challenge 2</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Feedback</a></li>
                    </ul>
                    <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="loginBox">
                <div class="imgContainer">
                    <img src="images/logo.png" alt="logo" class="logo">
                </div>
                <div class="loginPage">
                    <form action="index.php" method="POST" class="form-inline">
                        <p class="formContent">Username:<input type="text" name="username"></p>
                        <p class="formContent">Password:<input type="password" name="password"></p>
                        <p><input type="submit" name="submit"></p>
                        <?php
                        if (isset($_POST['submit'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            if (!empty($username) && !empty($password)) {
                                if ($username == "bruteforce" && $password == "1234") {
                                    header("Location:secondPage.php");
                                } else {
                                    echo '<p class="errorText">Incorrect username or password!</p>';
                                }
                            } else {
                                echo '<p class="errorText">The fields are empty !</p>';
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
            <div class="textInfo">
                <h2>Note 1 - "Neo Genesis"</h2>
                <p class="text">
                    That day, my world was shattered <span class="finding">b</span>efo<span class="finding">r</span>e my
                    eyes. Everything was taken from me.
                    Everything. The path that remained before me was m<span class="finding">u</span>ddled wi<span class="finding">t</span>h unease and unc<span class="finding">e</span>rtainty.
                    The system tried to erase what had happened.
                    They succeeded to some degree, but I still managed to slip through their hands. Because of them, I had
                    long since <span class="finding">f</span>org<span class="finding">o</span>tten my past self, befo<span class="finding">r</span>e then.
                    I never forgot the <span class="finding">c</span>hronic trauma though, the f<span class="finding">e</span>ar, the grief, and the unbridled rage
                </p>
            </div>
            <div class="aboutBox">
                <div class="toDoList">
                    <h2>To do List:</h2>
                    <p class="text">find the missing username</p>
                    <p class="text">find the missing password</p>
                </div>
                <div class="images">
                    <img src="images/logo.png" alt="a key ?" id="img-box">
                    <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var modal = document.getElementById("myModal");

            var img = document.getElementById("img-box");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
            };

            var span = document.getElementsByClassName("close")[0];

            span.onclick = function() {
                modal.style.display = "none";
            };
        </script>

        <footer>
            <div class="main-content">
                <div class="left box">
                    <h2>
                        About us</h2>
                    <div class="content">
                        <p>
                            LOL</p>
                    </div>
                </div>
                <div class="center box">
                    <h2>
                        Location</h2>
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
                <span><a href="#">Privacy Policy</a></span>
            </div>
        </footer>
    </main>
</body>

</html>