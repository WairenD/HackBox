<header>
    <?php
    session_start();
    $errorMsg = "";
    include("connection.php");
    if (isset($_SESSION['userName'])) {
        $SQLstring = "SELECT currentLevel FROM " . $db_table . " WHERE userName='" . $_SESSION['userName'] . "'";
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
    }else{
      header("Location: index.php");
    }
    ?>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="index.php">HACKBOX</a></div>
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
                        <?php
                        if (isset($currentLevel)) {
                            for ($i = 0; $i < $currentLevel + 1 && $i < 5 ; $i++) {
                                echo '<li><a href="./Challenge_' . ($i + 1) . '">Challenge ' . ($i + 1) . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="./leaderboards.php">Leaderboards</a></li>
                <?php
                if (isset($_SESSION['userName'])) {
                    echo '<li><a href="#" class="desktop-item">' . $_SESSION['userName'] . '</a>
                     <input type="checkbox" id="showDrop">
                     <label for="showDrop" class="mobile-item">' . $_SESSION['userName'] . '</label>
                     <ul class="drop-menu">
                      <li><a href="logout.php">Log Out</a></li>
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
