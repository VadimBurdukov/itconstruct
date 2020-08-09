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
    function paginationCount($pdo, $page,$startPrice,$finalPrice, $catId)
    {
        $sql = ' SELECT count(id) 
                     FROM product';
        $sqlProd = 'SELECT * 
                    FROM product';
        if ($catId) 
        {
            $add= ' JOIN productcategories
                      ON  product.id = productcategories.product_id 
                    WHERE cat_id = '.$catId; 
            $sql.=$add;
            $sqlProd.=$add;
            if (($startPrice)||($finalPrice))
            {
                $sql .= ' AND';
                $sqlProd.= ' AND';
            }
        }
        elseif(($startPrice)||($finalPrice))
        {
            $sql .= ' WHERE';
            $sqlProd.= ' WHERE';
        }
       
        if($startPrice)
        {
            $sql .= ' price >= '.$startPrice;
            $sqlProd.= ' price >= '.$startPrice;
            if($finalPrice)
            {
                
                $sql .= ' AND';
                $sqlProd .= ' AND';
            }
            
        }
        if($finalPrice)
        {
                $sql .= ' price <= '.$finalPrice;
                $sqlProd .= ' price <= '.$finalPrice;            
        }
        $start = (int)prodPerPage*($page -1);
        $end = (int)prodPerPage;
        $sqlProd .= ' LIMIT '.$start.','. $end ;
        $maxPage = $pdo->query( $sql)->fetch(PDO::FETCH_ASSOC);
        $products = $pdo->query( $sqlProd)->fetchAll(PDO::FETCH_ASSOC);
        
        if( (int)$maxPage['count(id)']%prodPerPage ==0 )
            $countRes = (int)$maxPage['count(id)']/prodPerPage;   
        else
            $countRes =  (int)((int)$maxPage['count(id)']/prodPerPage) + 1;
        return  array('count' => $countRes, 'products' =>$products);
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
        $prod = $pdo->query( $sql)->fetchAll(PDO::FETCH_ASSOC); 
        
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