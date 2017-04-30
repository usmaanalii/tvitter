<?php require_once '../header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../src/sass/main.min.css">
        <script src="../vendor/components/jquery/jquery.min.js"></script>
        <script src="../src/js/ajax/profile.js"></script>
        <title><?php echo $_SESSION['username']; ?> | Tvitter</title>
    </head>
    <body>

        <div class="container">

            <?php require_once 'components/navigation/navigation-links.php'; ?>

            <!--
                - If the user comes from the 'log in' page, then $_SESSION is used
                - If the user comes from the 'Users' (list of all users) paee, then $_GET is used
                - @var [string]
            -->
            <?php $username = isset($_GET['username']) ? $_GET['username']: $_SESSION['username']; ?>

            <h4 id="welcome-user-message">Welcome <span><?php echo $username ?></span></h4>

            <img class="profile-image" src="../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

            <?php if ($_SESSION['username'] == $_GET['username']): ?>

            <form class="navbar-form edit-profile-form" action="../logic/profile.php?username=<?php echo $username; ?>" method="post">
                <input class="edit-profile-button "type="submit" name="edit-profile" value="?">
            </form>

            <?php endif; ?>

            <p id="profile-bio">
                <?php require_once __DIR__ . "/../logic/profile.php"; ?>

                <?php echo $current_profile->bio; ?>
            </p>

            <form class="navbar-form search-title" action="" method="post">
                <input type="hidden" name="username" value="<?php echo $username; ?>">
                <input id="search-title-query" type="text" name="title-name" placeholder="add title" value="<?php echo isset($_POST['title-name']) ? $_POST['title-name'] : '' ?>">
                 <input type="submit" name="search-film-submit" value="Search">
            </form>

            <div class="title-search-results">

            </div>

                <form class="navbar-form" id="tveet-form" action="../logic/profile.php?recipient=<?php echo $username ?>" method="post">
                    <textarea name="tveet-text" size="140"></textarea>
                    <br>
                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                    <input type="hidden" name="title-selection">
                    <h6 id="character-count">0</h6>
                    <input type="submit" name="tveet-form-submit" value="tveet">
                </form>

            <h2 id="posts-header">
                Posts
            </h2>

                <?php require_once "components/profile/posts.php"; ?>

        </div>
    </body>
</html>
