<?php require_once '../components/header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="../src/css/navigation/navigation.css">
        <link rel="stylesheet" href="../src/css/edit-profile/main.css">
        <title>Registration Page</title>
    </head>
    <body>

        <?php include_once '../components/navigation/navigation-links.php'; ?>

        <!--
            - If the user comes from the 'log in' page, then $_SESSION is used
            - If the user comes from the 'Users' (list of all users) paee, then $_GET is used
            - @var [string]
        -->
        <?php $username = isset($_GET['username']) ? $_GET['username']: $_SESSION['username']; ?>

        <h4 id="welcome-user-message">
            Welcome <span><?php echo $username ?></span>
        </h4>

        <img class="profile-image" src="../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

        <div class="profile-bio">

            <p>
                <?php require_once __DIR__ . "/../logic/profile.php"; ?>
                <?php echo $current_profile->bio; ?>
            </p>

        </div>

        <div class="container">

            <form class="add-bio-form" action="../logic/edit-profile.php" method="post">
                <textarea name="bio" placeholder="<?php echo $current_profile->bio; ?>"></textarea>
                <input type="text" name="email" placeholder="<?php echo $current_profile->email; ?>">
                <input type="text" name="website" placeholder="<?php echo $current_profile->website; ?>">
                <input type="submit" name="bio-message-submit" value="Add">
            </form>

        </div>
    </body>
</html>
