<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../src/css/center-page.css">
        <style media="screen">
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
            }

            li {
                display: inline;
            }

            h2 {
                color: green;
            }
        </style>
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <body>

        <div class="container">
            <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
            ?>

            <?php
                include_once '../components/headers/loggedout-header.php';
            ?>

            <h2>Log in</h2>

            <form action="../logic/login.php" method="post">
                <input type="text" name="username" placeholder="username">
                <br><br>
                <input type="text" name="password" placeholder="password">
                <br><br>
                <input type="submit" name="login-submit" value="Log in">
            </form>

        </div>
    </body>
</html>
