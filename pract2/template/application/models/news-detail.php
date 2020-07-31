<?
    include ("includes/lib.php");
    getDBConnection();
    $newsId = 0;
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    foreach ($news as $n) 
    {
        if ($n['id'] == $id)
            $newsId = $n['id'];
            $newsTitle = $n['title'];
            $date = $n['date'];
            $desc = $n['description'];
    }
    if (($ctgs != NULL) && ($news != NULL)  && ($newsId != NULL) ) 
        include("application/views/news-detail.php"); 
    else
        include("404.php"); 
?>