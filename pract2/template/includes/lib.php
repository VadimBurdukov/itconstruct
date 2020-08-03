<?php
include ("config.php");
include ("dbconn.php");

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
        elseif ((!$catId)) 
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
                      JOIN categories 
                      ON productcategories.cat_id = categories.id 
                    WHERE categories.id = :cat_id 
                    ';
            $maxPage = $pdo->prepare($sql);   
            $maxPage->bindValue(':cat_id', $catId, PDO::PARAM_INT);   
            $maxPage-> execute();
        }
        elseif(!$catId)
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