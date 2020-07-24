<?php
    include ("config.php");
    $pdo;
    function getDBConnection()
    {
         global $pdo;   
        $host = host;
        $db = db;
        $charset = charset;
        $dsn = "mysql:host=$host; dbname=$db";
        try
        {
             
            $pdo = new PDO ($dsn, user, pass);  
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
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
        $sql = "SELECT * FROM categories ORDER BY rang";
        $ctgs = $pdo->query( $sql )->fetchAll();
        return $ctgs;  
    }
    function getAllNews()
    {  
        global $pdo;
        $sql = "SELECT * FROM news ORDER BY date DESC limit 6";
        $news = $pdo->query( $sql )->fetchAll();
        return $news;  
    }
?>