<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . "/../includes/title-page.inc.php";

if (isset($_POST['title-name'])) {
    $search_results = Title::search_title(trim($_POST['title-name']));

    require_once '../pages/components/title-page/title-search-results.php';
}

if (isset($_GET['film-id'])) {
    $title_data = Title::get_title_details_by_id($_GET['film-id']);

    require_once '../pages/components/title-page/title-details.php';
}

if (isset($_GET['title'])) {
    $title_data = Title::get_title_details_by_name(trim($_GET['title']));

    require_once '../pages/components/title-page/title-details.php';
}

if (isset($_POST['title_id'])) {
    $title_data = Title::get_title_details_by_id($_POST['title_id']);

    require_once '../pages/components/title-page/title-details.php';
}

if (isset($_POST['imdb_id'])) {
    $long_plot = Title::get_long_plot($_POST['imdb_id']);

    echo $long_plot;
}
