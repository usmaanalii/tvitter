<?php
require_once __DIR__ . '/../../tvitter-config/config.php';

// Create the connection
$db_connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection, and output an error message if unsuccessful
if ($db_connection->connect_error) {
    die("Connection failed: " . $db_connection->connect_error);
}
