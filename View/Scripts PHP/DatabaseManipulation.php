<?php


class DatabaseManipulation
{

    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "simpleb0t";
        $dbpass = "S1Mpl€bOOt";
        $db = "TD_PHP";
        $this->connection=new mysqli($dbhost, $dbuser,$dbpass,$db);
        error_log($this->connection->error);
    }

    public function addUser($Username, $Password){

        $query = 'INSERT INTO `User` (`username`, `password`) VALUES (\'%s\', \'%s\');';
        error_log(sprintf($query, $Username, $Password));
        $this->connection->query(sprintf($query, $Username, $Password));
    }

    public function executeQuery($query){
        error_log($query);
        $this->connection->query($query);
    }
}