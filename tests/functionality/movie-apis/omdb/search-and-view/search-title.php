<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="js/search-title.js"></script>
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }

            .container {
                width: 80%;
                max-width: 350px;
                margin: 0 auto;
                margin-top: 2%;
            }

            h3, h4 {
                text-align: center;
            }

            h3 + img, #title-web-link {
                display: block;
                margin: 0 auto;
                text-align: center;
            }

            h4 {
                color: blue;
            }
            .error {
                color: red;
            }

            /* Title search form (START)
            =============================================================== */

             form.search-title {
                 text-align: center;
                 margin-bottom: 4%;
             }

             form.search-title input[type="text"] {
                 width: 60%;
                 padding: 0.8% 1.5%;

                 display: block;
                 margin: 0 auto;
             }

             form.search-title input[type="submit"] {
                 margin-top: 2%;
             }

             form.title-results {
                 border: 1px solid red;
                 width: 100%;
                 margin: 0 auto;
                 height: 27vh;
                 overflow: scroll;
                 margin-bottom: 2%;
             }

             div.single-title {
                 background: #e8e9cc;
                 border-bottom: 1px solid red;
             }

             a.title-link {
                 display: inline-block;
                 width: 70%;
                 word-wrap: break-word;
                 cursor: pointer;
                 vertical-align: middle;
                 margin-left: 2%;
             }

             a:hover {
                 text-decoration: underline;
             }

             img.title-poster {
                 vertical-align: middle;
             }

             h4.title-search-error {
                 text-align: center;
                 color: red;
             }

             /* Title search form (END)
             =============================================================== */
        </style>
        <title>OMDB API</title>
    </head>
    <body>

        <div class="container">

        <form class="search-title" action="search-title.php" method="post">
            <input id="search-title-query" type="text" name="title-name" placeholder="add title" value="<?php echo isset($_POST['title-name']) ? $_POST['title-name'] : '' ?>">
            <input type="submit" name="search-film-submit" value="Search">
        </form>

        <div class="title-search-results">

        </div>

        <div class="title-details">

        </div>

        </div>

    </body>
</html>
