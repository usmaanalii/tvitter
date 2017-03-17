<?php
    require_once __DIR__ . '/../../../includes/sql-helper.inc.php';
    require_once __DIR__ . '/../../../database-connection.php';

    $sql_helper = new SqlHelper();
?>

<?php
    // Add a default bio message if not set
    function get_user_data($username)
    {
        global $db_connection;
        $statement = $db_connection->prepare("SELECT * FROM `users` WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $statement->store_result();
        $statement->bind_result($id_returned, $username_returned, $password_returned, $bio_returned);

        while ($statement->fetch()) {
            $db_id = $id_returned;
            $db_username = $username_returned;
            $db_password = $password_returned;
            $db_bio = !empty($bio_returned) ? $bio_returned: "No bio";
        }

        $statement->close();

        return array(
            "id" => $db_id,
            "username" => $db_username,
            "password" => $db_password,
            "bio" => $db_bio
        );
    }

    $test = get_user_data("jav");

    echo $test["id"];
    echo "<br>";
    echo $test["username"];
    echo "<br>";
    echo $test["password"];
    echo "<br>";
    echo $test["bio"];


?>
