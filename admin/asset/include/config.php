<?php
    $url='localhost';
    $username='root';
    $password='';
    $conn=mysqli_connect($url,$username,$password,"isesadb");

    define('DBINFO', 'mysql:host=localhost;dbname=isesadb');
    define('DBUSER','root');
    define('DBPASS','');

    if(!$conn){
        die('Could not Connect My Sql:' .mysql_error());
    }

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
?>