<?php
require_once __DIR__ . "/../includes/title-page.inc.php";

if (isset($_GET['film-id'])) {
    $movie_data = Title::movie_details($_GET['film-id']);

    require_once __DIR__ . '/../components/title-page/title-details.php';
}

if (isset($_GET['title'])) {
    $movie_data = Title::get_movie_details_by_name($_GET['title']);

    require_once __DIR__ . '/../components/title-page/title-details.php';
}

// assigns the static method to a variable for use in the posts retrieval
