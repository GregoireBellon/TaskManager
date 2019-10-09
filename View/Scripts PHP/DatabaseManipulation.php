<?php


class DatabaseManipulation
{
    private $connection;

    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "simpleb0t";
        $dbpass = "S1Mpl€bOOt";
        $db = "TD_GROUPE_PHP";
        $this->connection=new mysqli($dbhost, $dbuser,$dbpass,$db);
        error_log($this->connection->error);
    }

    public function addUser($Username, $Password){

        $query = 'INSERT INTO `Utilisateur` (`nom_user`, `mdp_user`) VALUES (\'%s\', \'%s\');';
        error_log(sprintf($query, $Username, $Password));
        $result=$this->connection->query(sprintf($query, $Username, $Password));

        return $result;
    }

    public function executeQuery($query){
        error_log($query);
        $this->connection->query($query);
    }
}