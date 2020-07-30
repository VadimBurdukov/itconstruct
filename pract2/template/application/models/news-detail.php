<?
    include ("includes/lib.php");
    getDBConnection();
    
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    $newsById = getNewsById($pdo, $id);
    include("application/views/news-detail.php"); 
?>