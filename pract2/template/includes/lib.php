<?php

/*=======================================DB_CONECT=================================== */
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
/*=======================================INCLUDES=================================== */
    function getheader()
    {
        return include(srcHF['headerSrc']);  
    }
    function getfooter()
    {
        return include(srcHF['footerSrc']);  
    }
/*=======================================SIDEBAR=================================== */
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
/*=======================================CATALOG=================================== */
    function getProducst__Limited($pdo, $page, $startPrice, $finalPrice, $catId)
    {
        if(($catId==0) && ($startPrice==0)&&($finalPrice==0)) 
        {
            $sql = 'SELECT * 
                    FROM product 
                    LIMIT :start, :end
                   ';
            $products = $pdo->prepare($sql);
        }
        elseif (($startPrice==0)&&($finalPrice==0)) 
        {
            $sql = 'SELECT * 
                    FROM categories
                    JOIN productcategories
                    ON categories.id = productcategories.cat_id
                    JOIN product
                    ON productcategories.product_id = product.id 
                WHERE categories.id = :cat_id
                LIMIT :start, :end 
                    ';
            $products = $pdo->prepare($sql);
            $products->bindValue(':cat_id', $catId, PDO::PARAM_INT);   
        }
        elseif (($catId==0)) 
        {
            $sql = 'SELECT * 
                    FROM product 
                WHERE price >= :startPrice AND
                      price <= :finalPrice
                LIMIT :start, :end                
                    ';
            $products = $pdo->prepare($sql);
            $products->bindValue(':startPrice', $startPrice, PDO::PARAM_INT);  
            $products->bindValue(':finalPrice', $finalPrice, PDO::PARAM_INT);     
        }
        else 
        {
            $sql = 'SELECT * 
                    FROM categories 
                    JOIN productcategories
                    ON categories.id = productcategories.cat_id 
                    JOIN product 
                    ON productcategories.product_id = product.id 
                 WHERE categories.id = :cat_id AND
                       price >= :startPrice AND
                       price <= :finalPrice
                LIMIT :start, :end    
                    ';
            $products = $pdo->prepare($sql);   
            $products->bindValue(':cat_id', $catId, PDO::PARAM_INT);   
            $products->bindValue(':startPrice', $startPrice, PDO::PARAM_INT);  
            $products->bindValue(':finalPrice', $finalPrice, PDO::PARAM_INT);  
        }
        $products->bindValue(':start', prodPerPage*($page -1), PDO::PARAM_INT);  
        $products->bindValue(':end', prodPerPage, PDO::PARAM_INT);  
        $products -> execute();
        $products = $products->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    function paginationCount($pdo, $startPrice,$finalPrice, $catId)
    {
        if (($catId==0) &&($startPrice==0)&&($finalPrice==0)) 
        {
            $sql = ' SELECT * 
                     FROM product 
                   ';
            $maxPage =  $pdo->query( $sql);
        }
         elseif(($startPrice==0)&&($finalPrice==0))
        {
             $sql = ' SELECT * 
                      FROM product 
                      JOIN productcategories
                      ON  product.id = productcategories.product_id 
                      JOIN categories 
                      ON productcategories.cat_id = categories.id 
                    WHERE categories.id = :cat_id 
                    ';
            $maxPage = $pdo->prepare($sql);   
            $maxPage->bindValue(':cat_id', $catId, PDO::PARAM_INT);   
            $maxPage-> execute();
        }
        elseif($catId==0)
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
            
        }
        else
        {
            $sql = '  SELECT * 
                      FROM product 
                      JOIN productcategories
                      ON product.id = productcategories.product_id 
                      JOIN categories 
                      ON productcategories.cat_id = categories.id 
                    WHERE categories.id = :cat_id AND 
                    price >= :startPrice AND
                    price <= :finalPrice
                    ';
            $maxPage = $pdo->prepare($sql);
            $maxPage->bindValue(':cat_id', $catId, PDO::PARAM_INT); 
            $maxPage->bindValue(':startPrice', $startPrice);  
            $maxPage->bindValue(':finalPrice', $finalPrice);  
            $maxPage-> execute();
        }
        $maxPage = $maxPage->rowCount();
        
        if( $maxPage%prodPerPage ==0 )
            return $maxPage/prodPerPage;
        else
            return (int)($maxPage/prodPerPage) + 1;
    }

/*=======================================PRODUCT=================================== */
   function getProd($pdo, $id)
   { 
        $sql = ' SELECT * 
                 FROM product 
                 WHERE product.id = :id
                ';
        $prod = $pdo->prepare($sql);
        $prod -> bindValue(':id', $id, PDO::PARAM_INT);
        $prod-> execute(); 
        $prod = $prod-> fetchAll(PDO::FETCH_ASSOC);
        return $prod;
   }
?>