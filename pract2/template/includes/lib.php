<?php
    include ("config.php");
    $pdo;
    function getDBConnection()
    {
        $host = host;
        $db = db;
        $charset = charset;
        $dsn = "mysql:host=$host; dname=$db";
        try
        {
            global $pdo;
            $pdo = new PDO ($dsn, user, pass);         
            return $pdo;
        }   
        catch (PDOException $e)
        {
            return "При подключении произошла ошибка: ". $e->getMessage();
            die();
        }       
    }
    function getheader()
    {
        return include(srcHF['headerSrc']);  
    }
    function getfooter()
    {
        return include(srcHF['footerSrc']);  
    }
    function getAllCtgrs()
    {  
        global $pdo;
        $sql = 'SELECT * FROM categories';
        $ctgs = $pdo->query( 'SELECT * FROM categories' );
        foreach ($ctgs->fetch( PDO::FETCH_ASSOC )  as $c) {
            echo $c;
        }
        return $ctgs;  
    }
?>