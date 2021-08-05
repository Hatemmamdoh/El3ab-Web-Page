<?php

    class mySQL{
        var $host = "localhost";
        var $username = "root";
        var $password = "";
        var $database = "el3ab";
        public $dbc;

        public function connect()
        {
            $this->dbc = new mysqli("localhost" , "root" , "");
            if ( $this->dbc->connect_error ){
                die("Database connection failed");
            }
            $this->dbc->select_db($this->database);
        }

        public function query($sql)
        {
            return mysqli_query($this->dbc, $sql);
        }

        public function fetch($sql)
        {    
            return mysqli_fetch_row($sql);
        }

        public function close()
        {
            return mysqli_close($this->dbc);
        }
    }
?>