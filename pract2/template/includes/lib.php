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
    function getAllCtgrs($pdo)
    {  
        $sql = "SELECT * FROM categories ORDER BY rang";
        $ctgs = $pdo->query( $sql )->fetchAll(PDO::FETCH_ASSOC);
        return $ctgs;  
    }
    function getAllNews($pdo)
    {  
        $sql = "SELECT * FROM news ORDER BY date DESC limit 6";
        $news = $pdo->query( $sql )->fetchAll(PDO::FETCH_ASSOC);
        return $news;  
    }
    function getProducst__Limited($pdo, $page, $startPrice, $finalPrice){
        if (($startPrice==0)&&($finalPrice==0)) 
        {
            $sql = ' SELECT * 
                     FROM product 
                     LIMIT :start, :end
                   ';
            $products = $pdo->prepare($sql);
        }
        else 
        {
            $sql = ' SELECT * 
                     FROM product 
                     WHERE price >= :startPrice AND
                           price <= :finalPrice
                     LIMIT :start, :end
                    ';
            $products = $pdo->prepare($sql);
            $products->bindValue(':startPrice', $startPrice, PDO::PARAM_INT);  
            $products->bindValue(':finalPrice', $finalPrice, PDO::PARAM_INT);  
        }
        $sql = 'SELECT * 
                FROM product 
                LIMIT :start, :end';
        $products->bindValue(':start', prodPerPage*($page -1), PDO::PARAM_INT);  
        $products->bindValue(':end', prodPerPage, PDO::PARAM_INT);  
        $products -> execute();
        $products = $products->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    function paginationCount($pdo, $startPrice,$finalPrice)
    {
        if (($startPrice==0)&&($finalPrice==0)) 
        {
            $sql = ' SELECT * 
                     FROM product 
                   ';
            $maxPage =  $pdo->query( $sql)->rowCount();
        }
        else 
        {
            $sql = ' SELECT * 
                     FROM product 
                     WHERE price >= :startPrice AND
                           price <= :finalPrice
                    ';
            $maxPage = $pdo->prepare($sql);
            $maxPage->bindValue(':startPrice', $startPrice);  
            $maxPage->bindValue(':finalPrice', $finalPrice);  
            $maxPage-> execute();
            $maxPage = $maxPage->rowCount();
        }
       
        if( $maxPage%prodPerPage ==0 )
            return $maxPage/prodPerPage;
        else
            return (int)($maxPage/prodPerPage) + 1;
    }
?>