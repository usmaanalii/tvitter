<!DOCTYPE html>
<html>
    <head>
        <!-- <link rel="stylesheet" href="../src/css/header.css"> -->
        <link rel="stylesheet" href="../src/css/center-page.css">
        <style media="screen">
            /** {
                border: 1px solid black;
            }*/

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
                include_once '../components/headers/loggedin-header.php';
            ?>
            <br><br>

            <h2>Users</h2>

            <ul id="user-list">
                <li>User 1</li>
                <li>User 1</li>
                <li>User 1</li>
                <li>User 1</li>
                <li>User 1</li>
            </ul>


        </div>
    </body>
</html>