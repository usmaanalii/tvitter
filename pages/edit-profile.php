<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="../src/css/navigation.css">
        <link rel="stylesheet" href="../src/css/center-page.css">
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

            ul {
                text-align: center;
            }

            #welcome-user-message {
                text-align: center;
            }

            #welcome-user-message span {
                color: rgb(97, 242, 61);
            }

            .profile-image {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 3px solid black;
                display: block;
                margin: 0 auto;
                margin-bottom: 2%;
            }

            .profile-bio {
                width: 75%;
                display: block;
                margin: 0 auto;
            }

            .profile-bio p {
                padding: 0;
                margin: 0;
                font-size: 1,1em;
                text-align: center;
                color: red;
            }

            form.add-bio-form {
                width: 60%;
                margin: 0 auto;
            }

            form.add-bio-form textarea {
                margin-left: 1.8%;
                width: 93%;
                height: 10vh;
            }

            form.add-bio-form input[type="text"] {
                display: block;
                margin: 2%;
                width: 94%
            }

            form.add-bio-form input[type="submit"] {
                margin-left: 1.5%;
            }

        </style>
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <body>

        <?php
            include_once '../components/navigation/loggedin-navigation.php';
        ?>

        <?php
            if (!isset($_SESSION)) {
                session_start();
            }
        ?>
        <?php
            // If the user comes from the 'log in' page, then $_SESSION is used
            // If the user comes from the 'Users' (list of all users) paee, then $_GET is used
            $username = isset($_GET['username']) ? $_GET['username']: $_SESSION['username'];
        ?>
        <h4 id="welcome-user-message">Welcome <span><?php echo $username ?></span></h4>

        <img class="profile-image" src="../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

        <div class="profile-bio">
            <p>
                <?php
                    require_once __DIR__ . "/../logic/profile.php";
                    echo $current_profile->bio;
                ?>
            </p>
        </div>

        <div class="container">
            <form class="add-bio-form" action="../logic/edit-profile.php" method="post">
                <textarea name="bio" placeholder="Bio"></textarea>
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="website" placeholder="Website">
                <br>
                <input type="submit" name="bio-message-submit" value="Add">
            </form>
        </div>
    </body>
</html>
