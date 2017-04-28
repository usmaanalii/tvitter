<?php require_once '../components/header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="../src/js/ajax/title-page.js"></script>
        <link rel="stylesheet" href="../src/css/navigation/navigation.css">
        <link rel="stylesheet" href="../src/css/title-page/main.css">
        <title><?php echo $_GET['username']; ?></title>
    </head>
    <body>

        <div class="container">

        <?php require_once '../components/navigation/navigation-links.php'; ?>

        <form class="search-movie" action="title-page.php" method="post">
            <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
            <input id="search-movie-query" type="text" name="movie-name" placeholder="search title" value="<?php echo isset($_POST['movie-name']) ? $_POST['movie-name'] : '' ?>">
            <input type="submit" name="search-film-submit" value="Search">
        </form>

        <div class="title-search-results">

        </div>

        <div class="title-details">

            <?php require_once '../logic/title-page.php'; ?>

        </div>

        </div>
    </div>

</body>
</html>
