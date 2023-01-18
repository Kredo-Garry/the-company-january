<?php
    class Database{
        private $server_name = "localhost"; // 127.0.0.1
        private $username = "root";
        private $password = ""; //MAMP - "root"
        private $database_name = "the_company_january";
        protected $conn;

        public function __construct()
        {
            $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->database_name);

            if ($this->conn->connect_error) {
                die("Unable to connect to the database: " . $this->conn->connect_error);
            }
        }
    }
?>