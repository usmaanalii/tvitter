<?php require_once '../components/header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../src/css/navigation/navigation.css">
        <link rel="stylesheet" href="../src/css/list-users/main.css">
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <body>

        <div class="container">

            <?php
                require_once __DIR__ . '/../components/navigation/navigation-links.php';

                require_once __DIR__ . '/../logic/list-users.php';
            ?>
            <br><br>

            <h2 id="users-header">Users</h2>

            <ul id="users-list">
                <?php require_once __DIR__ . '/../components/list-users/user-list.php'; ?>
            </ul>
        </div>
    </body>
</html>
