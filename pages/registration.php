<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../src/css/navigation.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <meta charset="utf-8">
        <style media="screen">

            * {
                /*border: 1px solid black;*/
            }

            .container {
                width: 80%;
                max-width: 350px;
                margin: 0 auto;
                margin-top: 5%;
            }

            a#login-page-link {
                color: black;
                font-size: 0.9em;
                margin-bottom: 0.5%;
                display: block;
            }

            .ajax-response-container {
                display: inline;
                padding: 0;
                margin: 0;
            }

            #empty-input-ajax-response {
                display: block;
                font-size: 0.9em;
            }

            input[type="submit"] {
                margin-top: 4%;
            }
        </style>
        <title>Register for tvitter</title>
    </head>
    <body>

        <div class="container">

            <h2 id="register-header">Register for <b> tvitter</b></h2>

            <a id="login-page-link" href="../index.php">Log in here!</a>
        <form id="reg-form" action="../logic/registration.php" method="post">
            <input id="username-input" type="text" name="username" placeholder="username">
            <div id="username-ajax-response" class="ajax-response-container"></div>
            <br><br>
            <input id="password-input" type="text" name="password" placeholder="password">
            <div id="password-ajax-response" class="ajax-response-container"></div>
            <br>
            <div id="empty-input-ajax-response" class="ajax-response-container"></div>

            <input type="submit" name="register-submit" value="Sign up">
        </form>

        <br>

        </div>

        <script src="../src/js/ajax/registration.js"></script>
    </body>
</html>
