<?php

    class DB {
	    private $host;
	    private $user;
	    private $password;
        private $dbname;

        function __construct() {
            $this->host = "localhost";
            $this->user = "root";
            $this->password = "";
            $this->dbname = "bibliotech";
        }

        protected function connect() {
            $connect = new mysqli($this->host, $this->user, $this->password);
            $connect->select_db($this->dbname);
            return $connect;
        }
    }
?>