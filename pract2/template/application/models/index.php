<?
    include ("includes/lib.php");
    $pdo = getDBConnection();
    $seo_article = ("include_areas/index_seo.php");
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    $title = "Company";
    include ("application/views/index.php");
    
?>