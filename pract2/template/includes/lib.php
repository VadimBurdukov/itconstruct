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
    $news = $pdo->prepare($sql);
    $news->bindValue(':count', newsPerPage, PDO::PARAM_INT);   
    $news -> execute();
    $news = $news->fetchAll(PDO::FETCH_ASSOC);
    return $news;  
}

/*=======================================CONTACTS=================================== */
function addToSql($pdo, $author,$email, $text,$phone)
{ 
    $sql =  'INSERT INTO feedback 
             (name, email, tel,request) 
             VALUES (:author, :email, :text, :phone)
            ';
    $req = $pdo->prepare($sql);
    $req -> bindValue(':author', $author, PDO::PARAM_INT);
    $req -> bindValue(':email', $email, PDO::PARAM_INT);
    $req -> bindValue(':text', $text, PDO::PARAM_INT);
    $req -> bindValue(':phone', $phone, PDO::PARAM_INT);
    $req-> execute(); 
}?>