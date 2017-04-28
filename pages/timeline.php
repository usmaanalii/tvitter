<?php require_once '../components/header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="../src/css/navigation/navigation.css">
        <link rel="stylesheet" href="../src/css/timeline/main.css">
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <?php
        require_once __DIR__ . "/../logic/timeline.php";
    ?>

    <div class="container">

        <?php
            include_once '../components/navigation/navigation-links.php';
        ?>
        <br><br>
        <h2>Timeline</h2>

        <form class="search-posts" action="timeline.php?username=<?php echo $_SESSION['username']; ?>" method="post">
            <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
            <input type="text" name="search-input" placeholder="e.g. game of thrones">
        </form>

        <div class="posts-section">
            <?php
                // individual posts
                require_once __DIR__ . "/../components/timeline/posts.php";
            ?>
        </div>
    </div>
</html>
