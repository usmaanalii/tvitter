<?php require_once 'database-connection.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="src/css/center-page.css">
        <link rel="stylesheet" href="src/css/header.css">
        <meta charset="utf-8">
        <style media="screen">

        </style>
        <title><?php echo $web_app; ?></title>
    </head>
    <body>

        <div class="container">

            <?php include_once 'components/headers/registration-header.php'; ?>

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
