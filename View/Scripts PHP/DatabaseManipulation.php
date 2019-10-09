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

        $querry = 'INSERT INTO `User` (`username`, `password`) VALUES (\'%s\', \'%s\');';
        error_log(sprintf($querry, $Username, $Password));
        $this->connection->query(sprintf($querry, $Username, $Password));
    }

    public function executeQuery($query){
        error_log(sprintf($query));
        $this->connection->query(sprintf($query));
    }
}