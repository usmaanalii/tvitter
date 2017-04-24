<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../src/css/navigation.css">
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

            h4 {
                color: blue;
            }
            .error {
                color: red;
            }
        </style>
        <title>OMDB API</title>
    </head>
    <body>

        <div class="container">

        <?php require_once '../components/navigation/loggedin-navigation.php'; ?>

        <?php require_once '../logic/title-page.php'; ?>
    </div>

</body>
</html>
