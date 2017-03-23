<?php
    require_once __DIR__ . "/sql-helper.inc.php";

    /**
     * UserProfile class
     *
     * @param integer id
     * @param string username
     * @param string password
     * @param string bio
     *
     * // TODO: Add all new methods
     *
     *
     *
     */
    class UserProfile
    {
        public $id;
        public $username;
        private $password;
        public $bio;

        public $sql_helper;


        function __construct($username)
        {
            $sql_helper = new SqlHelper();

            $this->sql_helper = $sql_helper;
            $user_data = $sql_helper->get_user_data($username);

            $this->id = $user_data["id"];
            $this->username = $username;
            $this->password = $user_data["password"];
            $this->bio = $user_data["bio"];
        }

        /**
         * TODO: DOCBLOCK
         * [insert_post_data description]
         * @param  [type]  $post [description]
         * @return {[type]       [description]
         */
        public function insert_post_data($sender_id, $recipient_id, $post)
        {
            $sql_helper = new SqlHelper();

            $sql_helper->insert_post($sender_id, $recipient_id, $post);
        }

        public function display_posts()
        {
            $sql_helper = new SqlHelper();

            $sql_helper->get_user_posts($this->id);
        }
    }

?>
