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
/*=======================================BREADCRUMB MENU=================================== */
function menu($itemToFill, $ctgs)
{
    global $topMenuItems;
    $items = $topMenuItems;
    foreach (array_keys($items) as $item)
    {   
        if($item== $itemToFill)
        {
            foreach ($ctgs as $cat) 
            {       
                $items[$itemToFill]['items'][$itemToFill."?catId=".$cat['id']] =  $cat['name'];
            }
        }
    }
    return $items;
} 
/*=======================================CONTACTS=================================== */
function addFeedbackData($pdo, $author,$email, $text,$phone)
{ 
    
}
/*=======================================404=================================== */
function error()
{ 
    http_response_code(404);
    header("Location: 404.php");
    exit();
}
?>