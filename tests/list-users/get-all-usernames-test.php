<?php
require_once __DIR__ . '/../../includes/list-users.inc.php';

$list_users = new ListUsers();

$test = $list_users->get_all_usernames();

print_r($test);
