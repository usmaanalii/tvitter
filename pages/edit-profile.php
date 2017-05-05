<?php require_once '../header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../vendor/components/jquery/jquery.min.js"></script>
        <script src="../src/js/ajax/navigation.js"></script>
        <script src="../src/js/ajax/edit-profile.js"></script>
        <link rel="stylesheet" href="../src/sass/main.min.css">
        <title>Registration Page</title>
    </head>
    <body>
        <div class="container-fluid">

            <?php require_once 'components/navigation/navigation-links.php'; ?>

            <!--
                - If the user comes from the 'log in' page, then $_SESSION is used
                - If the user comes from the 'Users' (list of all users) paee, then $_GET is used
                - @var [string]
            -->
            <?php $username = isset($_GET['username']) ? $_GET['username']: $_SESSION['username']; ?>
            <?php require_once __DIR__ . "/../logic/profile.php"; ?>

            <h4 id="welcome-user-message">
                Welcome <span><?php echo $username ?></span>
            </h4>

            <img class="profile-image" src="../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

                <form class="form-group add-info-form" action="../logic/edit-profile.php" method="post">
                    <textarea class="form-control" name="bio"><?php echo $current_profile->bio; ?></textarea>
                    <input class="form-control" type="text" name="email" value="<?php echo $current_profile->email; ?>">
                    <div id="ajax-response" class="ajax-response-container"></div>
                    <input class="form-control" type="text" name="website" value="<?php echo $current_profile->website; ?>">
                    <input class="btn btn-default" type="submit" name="add-info-submit" value="Add">
                </form>

        </div>
    </body>
</html>
