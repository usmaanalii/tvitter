<?php require_once 'components/header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../src/css/navigation/navigation.css">
        <link rel="stylesheet" href="../src/css/list-users/main.css">
        <title>Tvitter users</title>
    </head>
    <body>

        <div class="container">

            <?php require_once 'components/navigation/navigation-links.php'; ?>

            <?php require_once __DIR__ . '/../logic/list-users.php'; ?>

            <h2 id="users-header">
                Users
            </h2>

            <ul id="users-list">
                <?php require_once 'components/list-users/user-list.php'; ?>
            </ul>

        </div>
    </body>
</html>
