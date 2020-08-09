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
                    FROM product
                    JOIN productcategories
                    ON product.id = productcategories.product_id
   				WHERE cat_id = :cat_id
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
                    FROM product
                    JOIN productcategories
                    ON product.id = productcategories.product_id
   				WHERE cat_id = :cat_id AND
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
                    FROM product
                    JOIN productcategories
                    ON product.id = productcategories.product_id
   				WHERE cat_id = :cat_id AND
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
                    FROM product
                    JOIN productcategories
                    ON product.id = productcategories.product_id
   				WHERE cat_id = :cat_id AND
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
         $sql = ' SELECT count(id) 
                     FROM product';
        
        if ($catId) 
        {
            $sql .= ' JOIN productcategories
                      ON  product.id = productcategories.product_id 
                    WHERE cat_id = '.$catId; 
            if (($startPrice)||($finalPrice))
            {
                $sql .= 'AND';
            }
        }
        elseif(($startPrice)||($finalPrice))
        {
            $sql .= ' WHERE';
        }
        if($startPrice)
        {
            $sql .= ' price >= '.$startPrice;
            if($finalPrice)
            {
                $sql .= ' and price <= '.$finalPrice;
            }
            
        }
        if($finalPrice)
        {
                $sql .= ' and price <= '.$finalPrice;       
        }
        $maxPage = $pdo->query( $sql)->fetch(PDO::FETCH_ASSOC);
        if( (int)$maxPage['count(id)']%prodPerPage ==0 )
            return  (int)$maxPage['count(id)']/prodPerPage;
        else
            return (int)((int)$maxPage['count(id)']/prodPerPage) + 1;
    }

/*=======================================PRODUCT=================================== */
   function getProd($pdo, $id, $catId)
   {
       $sql = 'SELECT *
                     FROM product ';
       if ($catId) 
       {
             $sql.= ' JOIN productcategories
                     ON  product.id = product_id
                     WHERE cat_id ='.$catId.' AND ';
       }
       else
       {
            $sql .= ' WHERE';
       }
        $sql.=' product.id ='. $id;
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