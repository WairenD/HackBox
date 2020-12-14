<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Big Brain Inc.</title>
    <link href="css/BigBrainStyle.css" type="text/css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="header">
        <div class="logo"><img src="images/BigBrainLogo.png" class="mainLogo" /></div>
        <div class="name">
            <h1>Big Brain Inc.</h1>
        </div>
    </div>
    <div class="Container">
        <h2>Select one</h2>
        <div class="signInChoice">
            <p class="optionLogin"><input type="button" value="Sign in as guest" /></p>
        </div>
        <form action="RoleSelect.php" method="POST" class="signInChoice">
            <div class="forms">
                <p class="formDetail">Username</p>
                <input type="text" placeholder="Username" />
                <p class="formDetail">Password</p>
                <input type="password" placeholder="Password" />
                <p class="formDetail"><input type="submit" value="Sign in as admin" /></p>
            </div>
        </form>
    </div>
</body>

</html>