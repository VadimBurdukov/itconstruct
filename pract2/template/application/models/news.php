<?
    include ("includes/lib.php");
    $pdo = getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    $title = "Новости";
    if (($ctgs) && ($news)) 
    {
        $items = extendMenu("catalog.php", $ctgs);
        $breadCrumbs = array("index.php" => "Главная", "" => $title ); 
        include("application/views/news.php"); 
    }
    else
    {
       error();
    }
?>