<?php
require_once __DIR__ . "/../includes/title-page.inc.php";

if (isset($_GET['film-id'])) {
    $movie_data = Title::movie_details($_GET['film-id']);

    require_once __DIR__ . '/../components/title-page/title-details.php';
}
