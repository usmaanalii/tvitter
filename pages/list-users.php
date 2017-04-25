<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

            #navigation, #user-list {
                list-style-type: none;
                margin-right: 2px;
                padding: 0;
            }

            #navigation {
                text-align: center;

            }

            #navigation li {
                display: inline;
            }

            /* li + li selects all but first element since '+' is a sibling selector*/
            #user-list li + li {
                margin-top: 2%;
            }

            /* Users List (START)
            =============================================================== */

            h2#users-header {
                text-align: center;
            }

            ul#users-list {
                list-style-type: none;
                padding: 0;
            }

            li.user-list-item {
                background-color: rgb(192, 199, 201);
                height: 5em;
                overflow: scroll;
                padding: 1% 0 0 1%;
                border: 1px solid black;
            }

            li.user-list-item:not(:first-child) {
                margin-top: 1.5%;
            }

            li.user-list-item .username-link {
                display: block;
                margin-left: 1%;
            }

            li.user-list-item img.profile-image {
                width: 40px;
                height: 40px;
                border-radius: 20%;
                border: 2px solid black;
                display: inline-block;
                vertical-align: top;
                margin-top: 2%;
            }

            li.user-list-item p {
                width: 80%;
                padding: 0;
                display: inline-block;
                vertical-align: top;
                margin: 2% 0 0 1%;
            }

            li.user-list-item p span {
                font-size: 0.8em;
                font-style: italic;
                display: block;
                margin-bottom: 2%;
            }

            /* Users List (END)
            =============================================================== */

        </style>
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
