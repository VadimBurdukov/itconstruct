<?
    include ("includes/lib.php");
    $pdo = getDBConnection();
    
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    if (($ctgs)  && ($news))
        include ("application/views/index.php");

?>