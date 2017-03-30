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
        $statement->bind_result($id, $username, $password, $bio, $email, $website);

        while ($statement->fetch()) {
            $db_id = $id;
            $db_username = $username;
            $db_password = $password;
            $db_bio = !empty($bio) ? $bio: "No bio";
            $db_email = !empty($email) ? $email: "No email";
            $db_website = !empty($website) ? $website: "No website";
        }

        $statement->close();

        return array(
            "id" => $db_id,
            "username" => $db_username,
            "password" => $db_password,
            "bio" => $db_bio,
            "email" => $db_email,
            "website" => $db_website
        );
    }

    $test = get_user_data("jav");

    print_r($test);


?>
