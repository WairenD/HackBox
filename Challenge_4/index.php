<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Challenge 4</title>
        <link href="css/sortableTest.css" type="text/css" rel="stylesheet"/>
        <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
        <script src="js/sortable.complete.esm.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="title">
                <h1>Challenge 4</h1>
            </div>
            <div id="item-list"></div>
            <div id='search'>
                <form action='index.php' method='post'>
                        <div class="search-input">
                            <div id="target-group-slot" class="target-group-slot">
                                <div class='empty-item item' id="target-slot"></div>
                            </div>
                            <div id="target-group-slot" class="target-group-slot">
                                <div class='empty-item item' id="target-slot"></div>
                            </div>
                            <div id="target-group-slot" class="target-group-slot">
                                <div class='empty-item item' id="target-slot"></div>
                            </div>
                            <div id="target-group-slot" class="target-group-slot">
                                <div class='empty-item item' id="target-slot"></div>
                            </div>
                            <div id="target-group-slot" class="target-group-slot">
                                <div class='empty-item item' id="target-slot"></div>
                            </div>
                            <div id="target-group-slot" class="target-group-slot">
                                <div class='empty-item item' id="target-slot"></div>
                            </div>
                            <div id="target-group-slot" class="target-group-slot">
                                <div class='empty-item item' id="target-slot"></div>
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
            <!--
            SELECT * FROM bb_users WHERE (priviledge_level  == 1 && name LIKE "[INPUT]");
            SELECT * FROM bb_users WHERE (priviledge_level  == 1 && name LIKE "") OR 1 = 1;--");
            ") OR 1 = 1;--
            -->
            <script type="text/javascript" src="js/item.js"></script>
             <script type="text/javascript" src="js/Challenge4.js"></script>
        </div>
    </body>
</html>