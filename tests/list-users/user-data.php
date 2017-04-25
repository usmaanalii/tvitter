<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style media="screen">

            * {
                border: 1px solid black;
            }

            .container {
                width: 80%;
                max-width: 350px;
                margin: 0 auto;
                margin-top: 5%;
            }

            h2#users-header {
                text-align: center;
            }

            ul#users-list {
                list-style-type: none;
                padding: 0;
            }

            li.user-list-item {
                background-color: rgb(192, 199, 201);
                height: 6em;
                overflow: scroll;
                padding: 1% 0 0 1%;
                border: 1px solid black;
            }

            li.user-list-item:not(:first-child) {
                margin-top: 1.5%;
            }

            li.user-list-item a {
                display: block;
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
                margin-bottom: 1%;
            }
        </style>
        <title>List Users</title>
    </head>
    <body>

        <?php
        require_once __DIR__ . '/../../includes/sql-helper.inc.php';

        /**
         * ListUsers Class
         *
         * @param object $db_connection
         *
         * @method array get_all_usernames (Returns array of all usernames)
         */
        class ListUsers
        {
            private $db_connection;

            function __construct()
            {
                $sql_helper = new SqlHelper();
                $this->db_connection = $sql_helper->get_db_connection();
            }
            /**
            * @method get_all_usernames
            *
            * goals of the function include...
            *   1. Return all usernames in the users table
            *   2. Will be used to list all users in the 'list-users' page
            *   3. The usernames will be listed using a foreach loop
            *
            *
            * @return array (Containing all usernames)
            */

            public function get_all_usernames_info()
            {
                $db_connection = $this->db_connection;
                $statement = $db_connection->prepare("SELECT `username`, `bio`, `email`, `website` FROM users");
                $statement->execute();
                $returned_usernames = $statement->get_result();

                $all_usernames_info = array();

                while ($row = $returned_usernames->fetch_array()) {
                    $username_info =  array();
                    $username_info['bio'] = $row['bio'];
                    $username_info['email'] = $row['email'];
                    $username_info['website'] = $row['website'];
                    $all_usernames_info[$row['username']] = $username_info;
                }

                return $all_usernames_info;
            }
        }

        $list_users = new ListUsers();
        $all_users_info = $list_users->get_all_usernames_info();
        ?>

        <div class="container">

        <h2 id="users-header">Users</h2>

        <ul id="users-list">
            <?php foreach($all_users_info as $username => $username_info): ?>

                    <li class="user-list-item">
                        <!-- passing the username in the url -->
                        <a href="../../pages/profile.php?username=<?php echo $username ?>"><?php echo $username; ?></a>

                        <img class="profile-image" src="../../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

                        <p>
                            <span>
                                <?php if (!empty($username_info['email'])): ?>
                                    <?php echo $username_info['email'] . ' || '; ?>
                                <?php endif; ?>
                                <?php if (!empty($username_info['website'])): ?>
                                    <?php echo $username_info['website']; ?>
                                <?php endif; ?>
                            </span>

                            <?php if (!empty($username_info['bio'])): ?>
                                <?php echo $username_info['bio']; ?>
                                <br>
                            <?php endif; ?>

                        </p>
                    </li>

            <?php endforeach; ?>
        </ul>
    </div>
    </body>
</html>
