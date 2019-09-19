<?php


class DbConnection
{
   public function Connect($serveur, $base, $user, $pass){

       $mysqli = new mysqli($serveur, $user, $pass, $base);
       $mysqli ->set_charset("utf8");

       if($mysqli->connect_error) {
           die('Erreur de connection : '.$mysqli->connect_errno);
       }
       else{
           echo "Connected : ".$mysqli->host_info;
       }
}
}