<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style media="screen">
            /** {
                border: 1px solid black;
            }*/

            .container {
                width: 80%;
                max-width: 350px;
                margin: 0 auto;
                margin-top: 5%;
            }

            #header, #user-list {
                list-style-type: none;
                margin-right: 2px;
                padding: 0;
            }

            #header {
                text-align: center;

            }

            #header li {
                display: inline;
            }

            /* li + li selects all but first element since '+' is a sibling selector*/
            #user-list li + li {
                margin-top: 2%;
            }

        </style>
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <body>

        <div class="container">

            <?php
                include_once __DIR__ . '/../components/navigation/loggedin-navigation.php';

                require_once __DIR__ . '/../logic/list-users.php';
            ?>
            <br><br>

            <h2>Users</h2>

            <ul id="user-list">
                <?php foreach($usernames as $username): ?>

                        <!-- passing the username in the url -->
                        <a style="display: block;" href="profile.php?username=<?php echo $username ?>"><?php echo $username; ?></a>

                <?php endforeach; ?>
            </ul>


        </div>
    </body>
</html>
