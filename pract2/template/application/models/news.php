<?
    include ("includes/lib.php");
    $pdo = getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    $title = "Новости";
    if (($ctgs) && ($news)) 
    {
        include("application/views/news.php"); 
    }
    else
        include("404.php"); 

?>