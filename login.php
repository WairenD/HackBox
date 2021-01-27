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
<?php include 'header.php';?>
<?php include 'footer.php';?>
<body>
    <h2 id="regTitle">Please enter your login details!</h2>
    <div class="loginDiv">
        <form runat="server" method="post">
            <label for="email">Email Address:</label>
            <input type="email" name="email">
            <br><label for="email">Password:</label>
            <input type="password" name="password">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    <?php
    $errorMsg = "";
    if (isset($_POST['submit'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $db_name = "hackbox";
            $db_table = "user";
            //assign the connection and selected database to a variable
            $DBConnect = mysqli_connect("localhost", "hackbox", "Hckxo_1711");
            if ($DBConnect === FALSE) {
                $errorMsg = "<span><p>Unable to connect to database.</p>"
                    . "<p>Error code "
                    . mysqli_errno($DBConnect)
                    . ": "
                    . mysqli_error($DBConnect)
                    . "</p></span>";
            } else {
                //select the database
                $db = mysqli_select_db($DBConnect, $db_name);
                if ($db === FALSE) {
                    $errorMsg = "<span><p>Unable to connect to database.</p>"
                        . "<p>Error code "
                        . mysqli_errno($DBConnect)
                        . ": "
                        . mysqli_error($DBConnect)
                        . "</p></span>";
                    $DBConnect = FALSE;
                }
            }
            $SQLstring = "SELECT userEmail,userPassword,userName FROM " . $db_table;
            if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $userEmail, $userPassword, $userName);
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
                        if ($userEmail == htmlentities($_POST['email']) && $userPassword = $_POST['password']) {
                            $_SESSION['userName'] = $userName;
                            header("Location: story0.php");
                        } else {
                            $errorMsg = "<span>Incorrect login details</span>";
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
        } else {
            $errorMsg = "<span>Please fill in all the details!</span>";
        }
    }
    ?>
    <div class="errorDiv"><?php echo $errorMsg ?></div>
</body>


</html>
