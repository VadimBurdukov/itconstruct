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
        $ctgs = $pdo->query( $sql )->fetchAll(PDO::FETCH_ASSOC);
        return $ctgs;  
    }
    function getAllNews()
    {  
        global $pdo;
        $sql = "SELECT * FROM news ORDER BY date DESC limit 6";
        $news = $pdo->query( $sql )->fetchAll(PDO::FETCH_ASSOC);
        return $news;  
    }
    function getProducst__Limited(){
        global $pdo;
        global $page;
        $sql = 'SELECT * 
                FROM product 
                LIMIT :start, :end';
        $products = $pdo->prepare($sql);
        $products->bindValue(':start', prodPerPage*($page -1), PDO::PARAM_INT);  
        $products->bindValue(':end', prodPerPage, PDO::PARAM_INT);  
        $products -> execute();
        $products = $products->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    function paginationCount(){
        global $pdo;
        $sql = 'SELECT * 
                FROM product 
                ';
        
        $pag =  $pdo->query( $sql)->rowCount();

        if( $pag%prodPerPage ==0 )
            return (int)$pag/prodPerPage;
        else
            return (int)($pag/prodPerPage) + 1;
    }
?>