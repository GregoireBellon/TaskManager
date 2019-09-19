<?php


class DbConnection
{
/*
 * @var : server, dbname, user, pass
 */
private $connection;
   public function __construct($serveur, $base, $user, $pass){


       $connection = new mysqli($serveur, $user, $pass, $base);
//     $connection ->set_charset("utf8");
       $this->connection=$connection;
       if($connection->connect_error) {
           die('Erreur de connection : '.$connection->connect_errno);
       }
       else{
           echo "Connected : ".$connection->host_info;
       }
}


    public function getConnexion()
    {
        return $this->connection;
    }


}