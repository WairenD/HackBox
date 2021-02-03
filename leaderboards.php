<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>HACKBOX MAIN</title>
</head>
<?php include 'header3.php';?>
<?php include 'footer.php';?>
<body>
    <h1>LEADERBOARDS</h1>
    <?php
    include("connection.php");
    if(isset($_SESSION['userName'])){
    ?>
    <div style="text-align:center;">
    <form method="post">
        <input class="playAgainBtn" type="submit" name="play" value="Play">
        <p>This will reset your progress, your best time will be kept.</p>
        <?php
        if(isset($_POST['play'])){
        $SQLstring = "UPDATE " . $db_table . " SET currentlevel='0',endTime='0000-00-00 00:00:00' WHERE userName='".$_SESSION['userName']."'";
        if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
            $QueryResult = mysqli_stmt_execute($stmt);
            if ($QueryResult === FALSE) {
            $errorMsg = "<span><p>Unable to execute the query.</p>"
                . "<p>Error code "
                . mysqli_errno($DBConnect)
                . ": "
                . mysqli_error($DBConnect)
                . "</p></span>";}
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
        header("Location: story0.php");
        }
    }
        ?>
    </form>
    </div>
    <table>
    <tr>
        <th>Username</th>
        <th>Best Time(hh/mm/ss)</th>
    </tr>
    <?php
    $SQLstring = "SELECT userName,bestTime,TIMEDIFF(endTime, startTime) FROM " . $db_table;
    if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$userName,$bestTime,$tempTime);
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
                $SQLstring = "UPDATE " . $db_table . " SET bestTime='".max($tempTime,$bestTime)."' WHERE userName='".$userName."'";
                if ($stmtup = mysqli_prepare($DBConnect, $SQLstring)) {
                $QueryResult = mysqli_stmt_execute($stmtup);
                if ($QueryResult === FALSE) {
                    $errorMsg = "<span><p>Unable to execute the query.</p>"
                    . "<p>Error code "
                    . mysqli_errno($DBConnect)
                    . ": "
                    . mysqli_error($DBConnect)
                    . "</p></span>";}
                //Clean up the $stmt after use
                mysqli_stmt_close($stmtup);
                } else {
                $errorMsg = "<span><p>Unable to execute the query.</p>"
                    . "<p>Error code "
                    . mysqli_errno($DBConnect)
                    . ": "
                    . mysqli_error($DBConnect)
                    . "</p></span>";
                }
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
    $SQLstring = "SELECT userName,bestTime FROM " . $db_table." ORDER BY bestTime ASC";
    if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $userName,$bestTime);
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
                if($bestTime!="00:00:00"){
                    echo '<tr>
                <td>' . $userName . '</td>
                <td>' . $bestTime . '</td>
                </tr>';
                }
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
    mysqli_close($DBConnect);
    ?>
    </table>
    <div class="errorDiv"><?php echo $errorMsg ?></div>
</body>

</html>
