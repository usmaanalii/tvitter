<?php require_once '../header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../src/sass/main.min.css">
        <script src="../vendor/components/jquery/jquery.min.js"></script>
        <title>Tvitter users</title>
    </head>
    <body>

        <div class="container-fluid">

            <?php require_once 'components/navigation/navigation-links.php'; ?>

            <?php require_once __DIR__ . '/../logic/list-users.php'; ?>

            <h2 id="users-header">
                Users
            </h2>

            <?php require_once 'components/list-users/user-list.php'; ?>

        </div>
    </body>
</html>
