<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../includes/list-users.inc.php';

$list_users = new ListUsers();
$all_users_info = $list_users->get_all_usernames_info();
