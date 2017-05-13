<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="vendor/components/jquery/jquery.min.js"></script>
        <link rel="stylesheet" href="src/sass/main.min.css">
        <script src="src/js/ajax/login.js"></script>
        <title>Tvitter. What's your show?</title>
    </head>
    <body>

        <div class="container-fluid">

            <h2 id="log-in-header">Log in</h2>

            <form class="form-group" id="login-form" action="logic/login.php" method="post">
                <a id="register-page-link" href="pages/registration.php">Click here to register!</a>

                <input class="form-control" id="username-input" type="text" name="username" placeholder="username">
                <div id="username-ajax-response" class="ajax-response-container"></div>
                <br>
                <input class="form-control" id="password-input" type="password" name="password" placeholder="password">
                <div id="password-ajax-response" class="ajax-response-container"></div>
                <br>
                <input class="btn btn-default" type="submit" name="login-submit" value="Log in">
            </form>

        </div>
    </body>
</html>
