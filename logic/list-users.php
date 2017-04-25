<?php
require_once __DIR__ . '/../includes/list-users.inc.php';

$list_users = new ListUsers();
$all_users_info = $list_users->get_all_usernames_info();

// No closing php tag according to php style guide
