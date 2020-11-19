<!--
NOTE FROM JONATHAN MARVIN MOHAMED
This Website is for a school project.
No copyright infringement intended
THIS Page in inspired fromt the Official NHL Stenden log in page...
NO Rights can be derived from this, this is in no way meant
This Website is for 100% educational purpose.
-->

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1">
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="./challenge0style.css">
    <style>
    .illustrationClass {
        background-image: url("./images/people.jpg");
    }
    </style>

</head>

<body dir="ltr" class="body">
    <div id="fullPage">
        <div id="brandingWrapper" class="float">
            <div id="branding" class="illustrationClass"></div>
        </div>
        <div id="contentWrapper" class="float">
            <div id="content">
                <div id="header">
                    <img class="logoImage" id="companyLogo" src="./images/logo.png" alt="NHL Stenden">
                </div>
                <div id="workArea">

                    <div id="authArea" class="groupMargin">

                        <div id="loginArea">
                            <div id="loginMessage" class="groupMargin">Sign in with your organizational account</div>

                            <form method="post" id="loginForm" autocomplete="off" novalidate="novalidate"
                                onkeypress="if (event &amp;&amp; event.keyCode == 13) Login.submitLoginRequest();"
                                action="https://signon.nhlstenden.com/adfs/ls/?SAMLRequest=lZJPT8JAEMW%2FSrN3um35pxtKgnCQBIVA9eBt2Q6wyXYWd6aK395KNeKFxOvMvN%2FMe5kR6cod1aTmA67htQbi6FQ5JHVu5KIOqLwmSwp1BaTYqM3kYaGyOFHH4Nkb78SF5LpCE0Fg61FE81kupst1sdRZ3yRZFwa6Oywz6PUHWzAlpKkpbxMzHOpu0huU3b6IniFQo81Fg2oARDXMkVgjN6UkSzrJbSftF2miekOV3ryIaNb4saj5rDowH0lJSXaPHmM8OGLAEjA2vpK63JF0JEU0%2BTly6pHqCsIGwps18LRe%2FEIA9xYhpjrsjEc4cYxO6iZGQLbmvFHSUZoW0bkwvvpO7c5iaXF%2FPbBtO0TqvihWndVyU4jx6CtndbYfxv%2B8pwLWpWY9kpeQUfsFj836%2BWzlnTUf0cQ5%2Fz4NoBlywaEGIcet6u%2B7jD8B&amp;client-request-id=289e7cbf-9627-4f93-5c3f-0080020000dc">
                                <div id="error" class="fieldMargin error smallText" style="display: none;">
                                    <span id="errorText" for=""></span>
                                </div>

                                <div id="formsAuthenticationArea">
                                    <div id="userNameArea">
                                        <label id="userNameInputLabel" for="userNameInput" class="hidden">User
                                            Account</label>
                                        <input id="userNameInput" name="UserName" type="email" value="" tabindex="1"
                                            class="text fullWidth" spellcheck="false" placeholder="someone@example.com"
                                            autocomplete="off">
                                    </div>

                                    <div id="passwordArea">
                                        <label id="passwordInputLabel" for="passwordInput"
                                            class="hidden">Password</label>
                                        <input id="passwordInput" name="Password" type="password" tabindex="2"
                                            class="text fullWidth" placeholder="Password" autocomplete="off">
                                    </div>

                                    <div id="submissionArea" class="submitMargin">
                                        <span id="submitButton" class="submit" tabindex="4" role="button"
                                            onkeypress="if (event &amp;&amp; event.keyCode == 32) Login.submitLoginRequest();"
                                            onclick="return Login.submitLoginRequest();">Sign in</span>
                                    </div>
                                </div>

                            </form>

                            <div id="introduction" class="groupMargin">
                                <p>Sign-in to NHL Stenden. <a href="#">Forgot your password?</a></p>
                            </div>


                        </div>

                    </div>
                </div>
                <div id="footerPlaceholder"></div>
            </div>
            <div id="footer">
                <div id="footerLinks" class="floatReverse">
                    <div><span id="copyright">© 2121 Microsoft</span></div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>