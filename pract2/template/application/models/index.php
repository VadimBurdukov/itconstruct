<?
    include ("includes/lib.php");
    getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    if ($ctgs != NULL && $news!= NULL)
        include ("application/views/index.php");

?>