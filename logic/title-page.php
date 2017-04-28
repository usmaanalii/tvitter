<?php
require_once __DIR__ . "/../includes/title-page.inc.php";

if (isset($_POST['title-name'])) {
    $search_results = Title::search_title($_POST['title-name']);

    require_once '../pages/components/title-page/title-search-results.php';
}

if (isset($_GET['film-id'])) {
    $movie_data = Title::get_title_details_by_id($_GET['film-id']);

    require_once '../pages/components/title-page/title-details.php';
}

if (isset($_GET['title'])) {
    $movie_data = Title::get_title_details_by_name($_GET['title']);

    require_once '../pages/components/title-page/title-details.php';
}

if (isset($_POST['title_id'])) {
    $movie_data = Title::get_title_details_by_id($_POST['title_id']);

    require_once '../pages/components/title-page/title-details.php';
}
