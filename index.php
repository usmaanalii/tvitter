<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="vendor/components/jquery/jquery.min.js"></script>
        <link rel="stylesheet" href="src/css/login/main.css">
        <script src="src/js/ajax/login.js"></script>
        <title>Tvitter. What's your show?</title>
    </head>
    <body>

        <div class="container">

            <h2>Log in</h2>

            <form id="reg-form" action="logic/login.php" method="post">
                <a id="register-page-link" href="pages/registration.php">Click here to register!</a>

                <input id="username-input" type="text" name="username" placeholder="username">
                <div id="username-ajax-response" class="ajax-response-container"></div>
                <br>
                <input id="password-input" type="text" name="password" placeholder="password">
                <div id="password-ajax-response" class="ajax-response-container"></div>
                <br>
                <input type="submit" name="login-submit" value="Log in">
            </form>

        </div>
    </body>
</html>
