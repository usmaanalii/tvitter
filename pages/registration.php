<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../src/sass/main.min.css">
        <script src="../vendor/components/jquery/jquery.min.js"></script>
        <script src="../src/js/ajax/registration.js"></script>
        <title>Register for tvitter</title>
    </head>
    <body>

        <div class="container-fluid">

            <h2>Register for tvitter</h2>

            <a id="login-page-link" href="../index.php">Log in here!</a>
            <form class="form-group" id="registration-form" action="../logic/registration.php" method="post">
                <input class="form-control" id="username-input" type="text" name="username" placeholder="username">
                <div id="username-ajax-response" class="ajax-response-container"></div>
                <br>
                <input class="form-control" id="password-input" type="text" name="password" placeholder="password">
                <div id="password-ajax-response" class="ajax-response-container"></div>
                <br>
                <div id="empty-input-ajax-response" class="ajax-response-container"></div>

                <input class="btn btn-default" type="submit" name="register-submit" value="Sign up">
            </form>

        <br>

        </div>

    </body>
</html>
