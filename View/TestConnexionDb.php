<?php
$server="http://la-myweb.univ-lemans.fr/phpMyAdmin/:3307";
$dbname="INF2_M3104_G2";
$user="i1821++";
$pass="yvv32tn";
$Database = new DbConnection($server,$dbname,$user,$pass);
$connec=$Database->getConnexion();
echo $connec->host_info;