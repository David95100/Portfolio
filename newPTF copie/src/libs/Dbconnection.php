<?php

namespace Ptfolio;




class Dbconnection {
    public static function getConnection(){
        try{
            $pdo = new \PDO("mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=Portfolio","root","root");
            return $pdo;
        }catch( \PDOException $err){  
            exit($err);
           
        }
     

    }
}

?>