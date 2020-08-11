<?
    $pdo = getDBConnection();
    $newsId = 0;
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    foreach ($news as $n) 
    {
        if ($n['id'] == $id)
        {
            $newsId = $n['id'];
            $newsTitle = $n['title'];
            $date = $n['date'];
            $desc = $n['description'];
        }
    }
    
    if (($ctgs) && ($news )  && ($newsId )) 
    {
        $title = $newsTitle;
        $breadCrumbs = array("index.php" => "Главная", "news.php"=> "Новости", "" => $title); 
        $items = menu("catalog.php", $ctgs);
        include("application/views/news-detail.php");
    }         
    else
    {
       error();
    }   
?>