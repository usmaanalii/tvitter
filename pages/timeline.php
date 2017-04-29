<?php require_once '../header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../vendor/components/jquery/jquery.min.js"></script>
        <link rel="stylesheet" href="../src/sass/main.min.css">
        <title>Tvitter</title>
    </head>
    <body>
        <?php require_once __DIR__ . "/../logic/timeline.php"; ?>

        <div class="container">

            <?php require_once 'components/navigation/navigation-links.php'; ?>

            <h2 id="timeline-header">
                Timeline
            </h2>

            <form class="search-posts" action="timeline.php?username=<?php echo $_SESSION['username']; ?>" method="post">
                <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
                <input type="text" name="search-input" placeholder="e.g. game of thrones">
            </form>

            <div class="posts-section">

                <?php require_once "components/timeline/posts.php"; ?>

            </div>
        </div>
    </body>
</html>
