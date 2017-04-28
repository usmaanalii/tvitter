<?php require_once '../components/header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="../src/css/navigation/navigation.css">
        <link rel="stylesheet" href="../src/css/profile/main.css">
        <script src="../src/js/ajax/profile.js"></script>
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <body>

        <?php require_once '../components/navigation/navigation-links.php'; ?>

        <?php
            // If the user comes from the 'log in' page, then $_SESSION is used
            // If the user comes from the 'Users' (list of all users) paee, then $_GET is used
            $username = isset($_GET['username']) ? $_GET['username']: $_SESSION['username'];
        ?>
        <h4 id="welcome-user-message">Welcome <span><?php echo $username ?></span></h4>

        <img class="profile-image" src="../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

        <?php if ($_SESSION['username'] == $_GET['username']): ?>
            <form class="edit-profile-form" action="../logic/profile.php?username=<?php echo $username; ?>" method="post">
                <input class="edit-profile-button "type="submit" name="edit-profile" value="?">
            </form>
        <?php endif; ?>

        <div class="profile-bio">
            <p>
                <?php
                    require_once __DIR__ . "/../logic/profile.php";

                    echo $current_profile->bio;
                ?>

            </p>
        </div>

        <div class="container">

            <form class="search-movie" action="" method="post">
                <input type="hidden" name="username" value="<?php echo $username; ?>">
                <input id="search-movie-query" type="text" name="movie-name" placeholder="add title" value="<?php echo isset($_POST['movie-name']) ? $_POST['movie-name'] : '' ?>">
                <input type="submit" name="search-film-submit" value="Search">
            </form>

            <div class="title-search-results">

            </div>

        <div class="posts-section">
            <form id="tveet-form" action="../logic/profile.php?recipient=<?php echo $username ?>" method="post">
                <textarea name="post-message" size="140"></textarea>
                <br>
                <input type="hidden" name="movie-selection-post">
                <h6 id="character-count">0</h6>
                <input type="submit" name="post-message-submit" value="tveet">
            </form>

        <h2 id="posts-header">Posts</h2>

            <?php
                // individual posts
                require_once __DIR__ . "/../components/profile/posts.php";
            ?>
        </div>
    </div>
</body>
</html>
