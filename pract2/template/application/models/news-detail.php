<?
    include ("includes/lib.php");
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
        $breadCrumbs = array("Главная" => "index.php", "Новости"=> "news.php", $title=>""); 
        include("application/views/news-detail.php");
    }         
    else
        include("404.php"); 
?>