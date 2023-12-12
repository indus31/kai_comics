<?php
namespace App\Utils;
class DBConnect{
    public function connexion(){
        include './env.php';
        return new \PDO('mysql:host='.$host.';dbname='.$database.'', $login, $password, 
        array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
    }
}

?>