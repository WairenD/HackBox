<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Challenge 4</title>
        <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    </head>
    <body>
        <div id="container">
            <div id="title">
                <h1>Challenge 4</h1>
            </div>
            <div id='search'>
                <form action='index.php' method='post'>
                    <p>
                        <input type='text' name='search' placeholder='Search'>
                        <input type="submit" name='submit' value="Search">
                    </p>
                </form>
                <?php 
                if(isset($_POST['submit'])){
                    $db = new mysqli('127.0.0.1', 'root', '', 'test');
                    $search = $_POST['search'];
                    $q = (
                        'SELECT * FROM hacker WHERE HackerName LIKE "%'.$search.'%" '
                    );
                    //1"; DELETE FROM hacker; --
                    if ($db->multi_query($q)) {
                        ?>
                        <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>PrivilageLevel</th>
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
                                    echo '<td>'.$row[4].'</td>';
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
                }
                ?>
            </div>
            <div id="delete">
                <p>Write: 1"; DELETE FROM hacker; --</p>
            </div>
        </div>
    </body>
</html>