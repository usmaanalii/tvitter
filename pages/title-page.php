<?php require_once '../header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../src/sass/main.min.css">
        <script src="../vendor/components/jquery/jquery.min.js"></script>
        <script src="../src/js/ajax/navigation.js"></script>
        <script src="../src/js/ajax/title-page.js"></script>
        <title>Title - Get the details</title>
    </head>
    <body>

        <div class="container-fluid">

            <?php require_once 'components/navigation/navigation-links.php'; ?>

            <form class="form-group search-title on-title-page" action="title-page.php" method="post">
                <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
                <input class="form-control" id="search-title-query" type="text" name="title-name" placeholder="search title" value="<?php echo isset($_POST['title-name']) ? $_POST['title-name'] : '' ?>">
                <button type="submit" name="search-film-submit"><i class="fa fa-search fa-2x" aria-hidden="true"></i></button>
            </form>

            <div class="title-search-results">

            </div>

            <div class="title-details">

                <?php require_once '../logic/title-page.php'; ?>

            </div>
        </div>
    </body>
</html>
