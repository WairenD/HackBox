<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Challenge 4</title> 
        <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/sortableTest.css" />
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/sortable.complete.esm.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>

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
                            <li><a href="#">Drop menu 1</a></li>
                            <li><a href="#">Drop menu 2</a></li>
                            <li><a href="#">Drop menu 3</a></li>
                            <li><a href="#">Drop menu 4</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Feedback</a></li>
                </ul>
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            </div>
        </nav>
    </header>

    <body>
        <div class="container">
            <div class="title">
                <h1>Challenge 4</h1>
            </div>
            <div id="item-list"></div>
            <div id='search'>
                <form action='index.php' method='post'>
                        <div class="search-input">
                            <div class="target-group-slot">
                                <div class="target-slot item"></div>
                            </div>
                            <div class="target-group-slot">
                                <div class="target-slot item"></div>
                            </div>
                            <div class="target-group-slot">
                                <div class="target-slot item"></div>
                            </div>
                            <div class="target-group-slot">
                                <div class="target-slot item"></div>
                            </div>
                            <div class="target-group-slot">
                                <div class="target-slot item"></div>
                            </div>
                            <div class="target-group-slot">
                                <div class="target-slot item"></div>
                            </div>
                        </div>
                        <input type="submit" name='submit' value="↵" class="submit-button">
                </form>
                <?php 
                /**if(isset($_POST['submit'])){
                    $db = new mysqli('127.0.0.1', 'root', '', 'hackbox');
                    $search = $_POST['search'];
                    $q = (
                        'SELECT userID, name, email, priviledge_level FROM bb_users WHERE (priviledge_level = 1 && name LIKE "'.$search.'")'
                    );
                    if ($db->multi_query($q)) {
                        ?>
                        <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Priviledge Level</th>
                        </tr>
                        <?php
                        do {
                            if ($result = $db->store_result()) {
                                while ($row = $result->fetch_row()) {
                                    echo '<tr>';
                                    echo '<td>'.$row[0].'</td>';
                                    echo '<td>'.$row[1].'</td>';
                                    echo '<td>'.$row[2].'</td>';
                                    echo '<td>'.$row[3].'</td>';
                                    echo '</tr>';
                                }
                                $result->free();
                            }
                            if ($db->more_results()) {
                                printf("-----------------\n");
                            }
                        } while ($db->next_result());
                        ?>
                        </table>
                        <?php
                    }
                }**/
                ?>
            </div>
        </div>
    </body>
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
        <!--
        SELECT * FROM bb_users WHERE (priviledge_level  == 1 && name LIKE "[INPUT]");
        SELECT * FROM bb_users WHERE (priviledge_level  == 1 && name LIKE "") OR 1 = 1;--");
        ") OR 1 = 1;--
        -->
        <script type="text/javascript" src="js/item.js"></script>
        <script type="text/javascript" src="js/Challenge4.js"></script>
    </footer>
</html>