<?php
require_once __DIR__ . '/../includes/list-users.inc.php';

$list_users = new ListUsers();

$usernames = $list_users->get_all_usernames();

// No closing php tag according to php style guide
