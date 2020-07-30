<?
    include ("includes/lib.php");
    getDBConnection();
    
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    include("application/views/news.php"); 
?>