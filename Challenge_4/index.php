﻿<!DOCTYPE html>
<html lang="en">
<head>
    <title>Challenge 4</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/challenge4.css" />
    <link rel="stylesheet" href="css/assistant.css">
    <script type="text/javascript" src="js/assistant.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/sortable.complete.esm.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<?php include '../header2.php';?>
<?php include '../footer2.php';?>
<?php if($currentLevel<3){
  header("Location: ../index.php");
} ?>
<body>
    <div class="container">
        <div class="title">
            <h1>Challenge 4</h1>
        </div>
        <div class="sqlContainer">
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
                <input type="button" name='submit' value="↵" class="submit-button" onclick="submitAnswer()">
            </div>
        </div>
        <?php
        $output = checkAnswer();
        $rightAnswer = false;
        if(isset($output) && isset($output[0]) && isset($output[1])){
            if($output[0] == 1){
                $q = $output[1];
                //Execute query here
                $db = new mysqli('localhost', 'root', '', 'hackbox');
                if ($db->multi_query($q)) {
                    ?>
                    <table class="tableOfContent">
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
                                if(isset($output[2])){
                                    echo "<p class='errorTextSql'>'User ' $output[2] ' not found.'";
                                }else{
                                    echo "<p class='errorTextSql'>User not found.";
                                }
                            }
                            $i = 0;
                            while ($row = $result->fetch_row()) {
                                if($i>4){break;}
                                echo '<tr>';
                                echo '<td>' . $row[0] . '</td>';
                                echo '<td>' . $row[1] . '</td>';
                                echo '<td>' . $row[2] . '</td>';
                                if($row[2] == 2){
                                    $rightAnswer = true;
                                    echo '<td><a href="../story4.php">'. $row[3]. '</a></td>';
                                    if($currentLevel==3){
                                     $currentLevel=4;
                                     $SQLstring = "UPDATE " . $db_table . " SET currentlevel=".$currentLevel." WHERE userName='".$_SESSION['userName']."'";
                                     if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
                                       $QueryResult = mysqli_stmt_execute($stmt);
                                       if ($QueryResult === FALSE) {
                                         $errorMsg = "<span><p>Unable to execute the query.</p>"
                                           . "<p>Error code "
                                           . mysqli_errno($DBConnect)
                                           . ": "
                                           . mysqli_error($DBConnect)
                                           . "</p></span>";}
                                           else{
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
                                 }
                                }else{
                                    echo '<td>' . $row[3] . '</td>';
                                }

                                echo '</tr>';
                                $i++;
                            }
                            $result->free();
                        }


                    } while ($db->next_result());
                    echo '</table>';
                    if ($i>4) {
                        echo("<p>And 10.000 more rows</p>");
                    }
                }
            }
        }
    ?>
    </div>
    </div>

    <div id="hint"> </div>
    <div id="assistant">
        <img src="images/assist-sarcastic.png" alt="assistant" onclick="getHint()">
        <?php
        if(isset($output[0])){
            if($output[0] == -1){
                echo '<script>getHintWithInput("' . $output[1] . '"); </script>';
            }elseif($output[0] == 1){
                if($rightAnswer){
                    echo '<script>getHintWithInput("That&#39;s it! The hacker is online, go have a chat with him and see if you can find more about his plans");</script>';
                }else{
                    echo '<script>getHintWithInput("That query was valid");</script>';
                }

            }
        }
       ?>
    </div>
    <script type="text/javascript" src="js/item.js"></script>
    <script type="text/javascript" src="js/Challenge4.js"></script>
</body>
</html>

<?php
    function checkAnswer(){
    $error = "";
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
                $error = "Submited answer has to many entities";
                $isValidQuery = false;
               return array(-1, $error);
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
                        $error = "Submited answer has dublicate values";
                        return array(-1, $error);
					}

                }
                //check for invalid values like negative numbers
                if($inputArray[$i] > MAX_ENTITIES || $inputArray[$i] < 0)
                {
                    $error = "Submited answer has invalid values";
                    return array(-1, $error);
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
               $error = "One of the quotes is not properly closed, try adding more quotes or removing the last quote with ;--";
               $isValidQuery = false;
               return array(-1, $error);
			}
            //if the user inputted '"(' in the answer the query that is not commented out,  the query will always have an unclosed bracket
            $positionOfTwo = array_search(2, $inputArray);
            if($positionOfTwo !== false)
            {
                if($inputTypeArray[$positionOfTwo] == "quote")
                {
                    $error = "Unclosed bracket, try adding or removing one bracket";
                    $isValidQuery = false;
                    return array(-1, $error);
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
                        $searchQuery = htmlentities($searchQuery);
					}
                    //check if an operator appears twice
                    if($inputTypeArray[$i] == "operator")
                    {
                        if($isOperatorSet)
                        {
                            $error = "invalid query";
                            return array(-1, $error);
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
                            echo("invalid query");
                            //return -1;
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
                        $error = "invalid query";
                        return array(-1, $error);
				}
                return array(1, $q, $searchQuery);
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
    }
?>
