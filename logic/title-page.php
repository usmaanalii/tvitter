<?php
require_once __DIR__ . "/../includes/title-page.inc.php";
require_once __DIR__ . "/../includes/profile.inc.php";

if (isset($_GET['film-id'])) {
    $movie_data = Title::movie_details($_GET['film-id']);

    require_once __DIR__ . '/../components/title-page/title-details.php';
}

if (isset($_GET['title'])) {
    $movie_data = Title::get_movie_details_by_name($_GET['title']);

    require_once __DIR__ . '/../components/title-page/title-details.php';
}

if (isset($_POST['title_id'])) {
    $movie_data = Title::movie_details($_POST['title_id']);

    require_once __DIR__ . '/../components/title-page/title-details.php';
}

if (isset($_POST['movie-name'])) {
    $search_results = UserProfile::search_title($_POST['movie-name']);

    require_once __DIR__ . '/../components/title-page/title-search-results.php';
}
