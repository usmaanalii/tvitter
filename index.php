<?php require_once 'database-connection.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="src/css/navigation.css">
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
        </style>
        <title><?php echo $web_app; ?></title>
    </head>
    <body>

        <div class="container">
            <?php include_once 'components/navigation/registration-navigation.php'; ?>

            <h2>Register for <b> <?php echo $web_app; ?></b></h2>

            <form action="logic/registration.php" method="post">
                <input type="text" name="username" placeholder="username">
                <br><br>
                <input type="text" name="password" placeholder="password">
                <br><br>
                <input type="submit" name="register-submit" value="Sign up">
            </form>
        </div>

    </body>
</html>
