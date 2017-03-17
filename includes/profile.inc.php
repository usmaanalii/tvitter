<?php
    require_once __DIR__ . "/sql-helper.inc.php";

    /**
     * UserProfile Class
     */
    class UserProfile
    {
        public $id;
        public $username;
        private $password;
        public $bio;


        function __construct($username)
        {
            $sql_helper = new SqlHelper();
            $user_data = $sql_helper->get_user_data($username);

            $this->id = $user_data["id"];
            $this->username = $username;
            $this->password = $user_data["password"];
            $this->bio = $user_data["bio"];
        }
    }


?>
