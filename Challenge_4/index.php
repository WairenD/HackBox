<!DOCTYPE html>
<html lang="en">
<head>
    <title>Challenge 4</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sortableTest.css" />
    <link rel="stylesheet" href="css/assistant.css">
    <script type="text/javascript" src="js/assistant.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/sortable.complete.esm.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <header>
        <nav>
            <div class="wrapper">
                <div class="logo"><a href="./">HACKBOX</a></div>
                <input type="radio" name="slider" id="menu-btn">
                <input type="radio" name="slider" id="close-btn">
                <ul class="nav-links">
                    <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                    <li><a href="./">Home</a></li>
                    <li><a href="./about.php">About</a></li>
                    <li>
                        <a href="#" class="desktop-item">Challenges</a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">Challenges</label>
                        <ul class="drop-menu">
                            <li><a href="./Challenge_1">Challenge 1</a></li>
                            <li><a href="./Challenge_2">Challenge 2</a></li>
                            <li><a href="./Challenge_3">Challenge 3</a></li>
                            <li><a href="">Challenge 4</a></li>
                            <li><a href="./Challenge_5">Challenge 5</a></li>
                        </ul>
                    </li>
                    <li><a href="./leaderboards.php">Leaderboards</a></li>
                    <?php
                    session_start();
                    if (isset($_SESSION['userName']))
                    {
                        echo '<li><a href="#" class="desktop-item">' . $_SESSION['userName'] . '</a>
                            <input type="checkbox" id="showDrop">
                            <label for="showDrop" class="mobile-item">' . $_SESSION['userName'] . '</label>
                            <ul class="drop-menu">
                              <li><a href="./logout.php">Log Out</a></li>
                            </ul></li>';
                    } else {
                        echo '<li><a href="./login.php">Login</a></li>
                      <li><a href="./register.php">Register</a></li>';
                    } ?>
                </ul>
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="title">
            <h1>Challenge 4</h1>
        </div>
        <div id="item-list"></div>
        <div id='search'>
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
            <input type="button" name='submit' value="↵" class="submit-button" onclick="submitAnswer()">
        </div>
    </div>
    <?php 
        define("MAX_ENTITIES", 6);
        //check if user submitted an answer
        if(isset($_COOKIE['submit']))
        {
            $input = (int) htmlentities($_COOKIE['submit']);
            $num_length = strlen((string)$input);
            $isValidQuery = true;
            //checks for length of answer
            if($num_length > MAX_ENTITIES)
            {
                echo("Submited answer has to many entities");
                $isValidQuery = false;
               return;
			}
            //Make the answer 6 digits long
            for($i = $num_length; $i < MAX_ENTITIES; $i++)
            {
                $input = $input * 10;     
			}
            //Cast the answer into an array and cast them as integers to make sure no other datatypes are in the answer
            $inputArray = array();
            $inputArray[0] = (int) ($input / 100000);
            $inputArray[1] = (int) ($input / 10000) % 10;
            $inputArray[2] = (int) ($input / 1000) % 10;
            $inputArray[3] = (int) ($input / 100) % 10;
            $inputArray[4] = (int) ($input / 10) % 10;
            $inputArray[5] = (int) $input % 10;

            $inputTypeArray = array();
            $inputIsString = true;
            $isCommentedOut = false;
            $amountOfQuotes = 2;
            for($i = 0; $i < MAX_ENTITIES; $i++)
            {
                //check for dublicate values
                if (count(array_keys($inputArray, $inputArray[$i])) > 1) 
                {
                    if($inputArray[$i] != 0)
                    {
                        echo("Submited answer has dublicate values");
                        $isValidQuery = false;
                        return;
					}
                    
                }
                //check for invalid values like negative numbers
                if($inputArray[$i] > MAX_ENTITIES || $inputArray[$i] < 0)
                {
                    echo("Submited answer has invalid values");
                    $isValidQuery = false;
                    continue;        
				}
                //check how each value will be read by the mock sql command
                if($inputArray[$i] == 0)
                {
                    $inputTypeArray[$i] = "empty";    
                    continue;
				}

                if($isCommentedOut)
                {
                    $inputTypeArray[$i] = "comment";
                    continue;
				}

                if($inputArray[$i] == 1 || $inputArray[$i] == 2)
                {
                    $inputIsString = !$inputIsString;
                    $amountOfQuotes++;
                    $inputTypeArray[$i] = "quote";
				}
                else
                {
                    if($inputIsString)
                    {
                        $inputTypeArray[$i] = "string";
                        continue;
					}

                    if($inputArray[$i] == 4)
                    {
                        $inputTypeArray[$i] = "comment";
                        $isCommentedOut = true;
                        $amountOfQuotes--;

				    }
                    elseif($inputArray[$i] == 5 || $inputArray[$i] == 6)
                    {
                        $inputTypeArray[$i] = "operator";
					}
                    elseif($inputArray[$i] == 3)
                    {
                        $inputTypeArray[$i] = "true";
                    }
                    else
                    {
                        $inputTypeArray[$i] = "unknown";
					}

				
				}
			}
            //check if the amount of quotes at the end of the query is even or uneven
            if($amountOfQuotes % 2 == 1)
            {
               echo("<br> One of the quotes is not properally closed");
               $isValidQuery = false;
               return;
			}
            //if the user inputted '"(' in the answer the query that is not commented out,  the query will always have an unclosed bracket
            $positionOfTwo = array_search(2, $inputArray);
            if($positionOfTwo !== false)
            {
                if($inputTypeArray[$positionOfTwo] == "quote")
                {
                    echo("<br> Unclosed bracket");    
                    $isValidQuery = false;
                    return;  
				}
               
			}

            $queryArray = array("&quot;)", "&quot;(", "1 = 1", ";--", "AND", "OR");
            $searchQuery = "";
            $queryCondition = "";
            $isOperatorSet = false;
            if($isValidQuery)
            {
                $queryConditionArray = "";
                for($i = 0; $i < MAX_ENTITIES; $i++)
                {
                    //create the string the query will search for in the database
                    if($inputTypeArray[$i] == "string")
                    {
                        $searchQuery = $searchQuery.$queryArray[$inputArray[$i] - 1];    
					}
                    //check if an operator appears twice
                    if($inputTypeArray[$i] == "operator")
                    {
                        if($isOperatorSet)
                        {
                            echo("<br> invalid query");    
                            return;
						}
                        else
                        {
                            $isOperatorSet = true;
                            $queryConditionArray = $inputArray[$i];
						}
					}
                    //check if the '1=1' part is put before the operator
                    if($inputTypeArray[$i] == "true")
                    {
                        if(!$isOperatorSet)
                        {
                            echo("<br> invalid query");    
                            //return;
						}
                        else
                        {
                            $queryConditionArray = $queryConditionArray.$inputArray[$i];          
						}           
					}
				}
                //
                switch($queryConditionArray)
                {
                    case "63":
                        $q = (
                            'SELECT userID, name, priviledge_level, chat_link FROM bb_users'
                        );
                        break;
                    case "53":
                    case "":
                        $q = (
                            //'SELECT userID, name, priviledge_level, chat_link FROM bb_users WHERE (priviledge_level = 1 && name LIKE "'.$search.'")'
                            'SELECT userID, name, priviledge_level, chat_link FROM bb_users WHERE (priviledge_level = 1 && name LIKE "'.$searchQuery.'")'
                        );
                        break;
                    default:
                        echo("<br> invalid query");
                        return;
				}
                //Execute query here
                $db = new mysqli('127.0.0.1', 'root', '', 'hackbox');
                $searchQuery = htmlentities($searchQuery);
               
                

                
                if ($db->multi_query($q)) {
                    ?>
                    <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Priviledge Level</th>
                        <th>chat_link</th>
                    </tr>
                    <?php
                    do {
                        if ($result = $db->store_result()) {
                            if(mysqli_num_rows($result)==0)
                            {
                                echo 'User "' . $searchQuery . '" not found.';
							}
                            $i = 0;
                            while ($row = $result->fetch_row()) {
                                if($i>4){break;}
                                echo '<tr>';
                                echo '<td>' . $row[0] . '</td>';
                                echo '<td>' . $row[1] . '</td>';
                                echo '<td>' . $row[2] . '</td>';
                                echo '<td>' . $row[3] . '</td>';
                                echo '</tr>';
                                $i++;
                            }
                            $result->free();
                        }
                        if ($i>4) {
                            printf("And 10.000 more rows \n");
                        }
                        
                    } while ($db->next_result());
                    ?>
                    </table>
                    <?php
                }
			}
            /**
            1: ")
            2: "(
            3: 1 = 1
            4: ;--
            5: AND
            6: OR
            **/

        }
    ?>

    <div class="hint"></div>
    <div id="assistant">
        <img src="images/assist-sarcastic.png" alt="assistant" onclick="getHint()">
    </div>

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
    <script type="text/javascript" src="js/item.js"></script>
    <script type="text/javascript" src="js/Challenge4.js"></script>
</body>
</html>