<?php
require_once __DIR__  . '/../../includes/sql-helper.inc.php';

if ($_POST) {
    $sql_helper = new SqlHelper();

    $sql_helper->delete_post($_POST['post-time']);
}

// No closing php tag according to php style guide
