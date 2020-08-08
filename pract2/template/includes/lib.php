<?php

include ("config.php");
/*=======================================DB_CONECT=================================== */
 function getDBConnection()
    {  
        $dsn = "mysql:host=".host."; dbname=".db;
        try
        {  
            $pdoobj = new PDO ($dsn, user, pass);  
            $pdoobj ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            return $pdoobj;
        }   
        catch (PDOException $e)
        {
            return "При подключении произошла ошибка: ". $e->getMessage();
            die();
        }         
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
        $sql = "SELECT * 
                FROM news
                ORDER BY date DESC 
                LIMIT :count";
       // $news = $pdo->query( $sql )->fetchAll(PDO::FETCH_ASSOC);
        $news = $pdo->prepare($sql);
        $news->bindValue(':count', newsPerPage, PDO::PARAM_INT);   
        $news -> execute();
        $news = $news->fetchAll(PDO::FETCH_ASSOC);
        return $news;  
    }
/*=======================================CATALOG=================================== */
    function getProducst__Limited($pdo, $page, $startPrice, $finalPrice, $catId)
    {
        if((!$catId) && (!$startPrice)&&(!$finalPrice)) 
        {
            $sql = 'SELECT * 
                    FROM product 
                    LIMIT :start, :end
                   ';
            $products = $pdo->prepare($sql);
        }
        elseif ((!$startPrice)&&(!$finalPrice)) 
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
        elseif((!$catId) && (($startPrice)&&($finalPrice)))
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
        elseif((!$finalPrice)&& (!$catId))
        {
            $sql = 'SELECT * 
                    FROM product 
                WHERE price >= :startPrice
                LIMIT :start, :end                
                    ';
            $products = $pdo->prepare($sql);
            $products->bindValue(':startPrice', $startPrice, PDO::PARAM_INT);  
            
        }
        elseif((!$startPrice) && (!$catId))
        {
            
            $sql = 'SELECT * 
                    FROM product 
                WHERE price <= :finalPrice
                LIMIT :start, :end                
                    ';
            $products = $pdo->prepare($sql);
            $products->bindValue(':finalPrice', $finalPrice, PDO::PARAM_INT);  
            
            
        }
        elseif((!$finalPrice)&& ($catId))
        {
            $sql = 'SELECT * 
                    FROM categories 
                    JOIN productcategories
                    ON categories.id = productcategories.cat_id 
                    JOIN product 
                    ON productcategories.product_id = product.id 
                 WHERE categories.id = :cat_id AND
                       price >= :startPrice 
                LIMIT :start, :end    
                    ';
            $products = $pdo->prepare($sql);   
            $products->bindValue(':cat_id', $catId, PDO::PARAM_INT);   
            $products->bindValue(':startPrice', $startPrice, PDO::PARAM_INT);  
             
        }
        elseif((!$startPrice)&& ($catId))
        {
            $sql = 'SELECT * 
                    FROM categories 
                    JOIN productcategories
                    ON categories.id = productcategories.cat_id 
                    JOIN product 
                    ON productcategories.product_id = product.id 
                 WHERE categories.id = :cat_id AND
                       price <= :finalPrice 
                LIMIT :start, :end    
                    ';
            $products = $pdo->prepare($sql);   
            $products->bindValue(':cat_id', $catId, PDO::PARAM_INT);   
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
        if ((!$catId) &&(!$startPrice)&&(!$finalPrice)) 
        {
            $sql = ' SELECT * 
                     FROM product 
                   ';
            $maxPage =  $pdo->query( $sql);
        }
         elseif((!$startPrice)&&(!$finalPrice))
        {
             $sql = ' SELECT * 
                      FROM product 
                      JOIN productcategories
                      ON  product.id = productcategories.product_id 
                    WHERE cat_id = :cat_id 
                    ';
            $maxPage = $pdo->prepare($sql);   
            $maxPage->bindValue(':cat_id', $catId, PDO::PARAM_INT);   
            $maxPage-> execute();
        }
        elseif((!$catId) && (($startPrice)&&($finalPrice)))
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
        elseif((!$finalPrice)&& (!$catId))
        {
            $sql = ' SELECT * 
                     FROM product 
                     WHERE price >= :startPrice
                    ';
            $maxPage = $pdo->prepare($sql);
            $maxPage->bindValue(':startPrice', $startPrice);  
            $maxPage-> execute();
            
        }
        elseif((!$startPrice)&& (!$catId))
        {
            $sql = ' SELECT * 
                     FROM product 
                     WHERE price <= :finalPrice
                    ';
            $maxPage = $pdo->prepare($sql);
            $maxPage->bindValue(':finalPrice', $finalPrice);  
            $maxPage-> execute();
            
        }
        elseif((!$finalPrice)&& ($catId))
        {
            $sql = ' SELECT * 
                     FROM product 
                     JOIN productcategories
                      ON  product.id = productcategories.product_id 
                    WHERE cat_id = :cat_id AND
                          price >= :startPrice
                    ';
            $maxPage = $pdo->prepare($sql);
            $maxPage->bindValue(':startPrice', $startPrice);  
            $maxPage->bindValue(':cat_id', $catId, PDO::PARAM_INT);   
            $maxPage-> execute();
            
        }
         elseif((!$startPrice)&& ($catId))
        {
            $sql = ' SELECT * 
                     FROM product 
                     JOIN productcategories
                      ON  product.id = productcategories.product_id 
                    WHERE cat_id = :cat_id AND
                          price <= :finalPrice
                    ';
            $maxPage = $pdo->prepare($sql);
            $maxPage->bindValue(':finalPrice', $finalPrice);  
            $maxPage->bindValue(':cat_id', $catId, PDO::PARAM_INT);   
            $maxPage-> execute();
            
        }
        else
        {
            $sql = '  SELECT * 
                      FROM product 
                      JOIN productcategories
                      ON product.id = productcategories.product_id 
                    WHERE cat_id = :cat_id AND 
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
   function getProd($pdo, $id, $catId)
   {
       if ($catId) 
       {
             $sql = ' SELECT product.id,  product.name, product.description, product.price, product.img
                     FROM product 
                     JOIN productcategories
                     ON  product.id = product_id
                     JOIN categories
                     ON cat_id = categories.id
                     WHERE product.id = :id AND
                           categories.id = :catId
                ';
            $prod = $pdo->prepare($sql);
            $prod -> bindValue(':catId', $catId, PDO::PARAM_INT);
            
       }
       else
       {
            $sql = ' SELECT * 
                     FROM product 
                     WHERE product.id = :id 
                   ';
            $prod = $pdo->prepare($sql);
       }
        
        $prod -> bindValue(':id', $id, PDO::PARAM_INT);
        $prod-> execute(); 
        $prod = $prod-> fetchAll(PDO::FETCH_ASSOC); 
        
        return $prod;
   }
 
/*=======================================CONTUCTS=================================== */
function addToSql($pdo, $author,$email, $text,$phone)
   { 
        $sql = ' INSERT INTO feedback 
                 (name, email, tel,request) 
                 VALUES (:author, :email, :text, :phone)
                ';
        $req = $pdo->prepare($sql);
        $req -> bindValue(':author', $author, PDO::PARAM_INT);
        $req -> bindValue(':email', $email, PDO::PARAM_INT);
        $req -> bindValue(':text', $text, PDO::PARAM_INT);
        $req -> bindValue(':phone', $phone, PDO::PARAM_INT);
        $req-> execute(); 
   }
?>