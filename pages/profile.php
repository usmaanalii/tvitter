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

        <div class="container-fluid">

            <?php require_once 'components/navigation/navigation-links.php'; ?>

            <!--
                - If the user comes from the 'log in' page, then $_SESSION is used
                - If the user comes from the 'Users' (list of all users) paee, then $_GET is used
                - @var [string]
            -->
            <?php $username = isset($_GET['username']) ? $_GET['username']: $_SESSION['username']; ?>

            <div class="profile-details-section">

                <h4 id="welcome-user-message">Welcome <strong><?php echo $username ?></strong></h4>

                <img class="profile-image" src="../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

                <?php if ($_SESSION['username'] == $_GET['username']): ?>

                <form class="form-group edit-profile-form" action="../logic/profile.php?username=<?php echo $username; ?>" method="post">
                    <input class="btn btn-default form-control edit-profile-button "type="submit" name="edit-profile" value="Edit profile">
                </form>

                <?php endif; ?>

                <p id="profile-bio">
                <?php require_once __DIR__ . "/../logic/profile.php"; ?>

                <?php echo $current_profile->bio; ?>
                </p>

            </div>

            <div class="tveet-forms-section">

                <form class="form-group search-title" action="" method="post">
                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                    <input class="form-control" id="search-title-query" type="text" name="title-name" placeholder="add title" value="<?php echo isset($_POST['title-name']) ? $_POST['title-name'] : '' ?>">
                     <input class="btn btn-default" type="submit" name="search-film-submit" value="Search">
                </form>

                <div class="title-search-results">

                </div>

                <form class="form-group" id="tveet-form" action="../logic/profile.php?recipient=<?php echo $username ?>" method="post">
                    <textarea class="form-control" name="tveet-text" size="140"></textarea>
                    <br>
                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                    <input type="hidden" name="title-selection">
                    <h6 id="character-count">0</h6>
                    <input class="btn btn-default" type="submit" name="tveet-form-submit" value="tveet">
                </form>

            </div>

                <h2 id="posts-header">
                    Posts
                </h2>

                <?php require_once "components/profile/posts.php"; ?>

        </div>
    </body>
</html>
