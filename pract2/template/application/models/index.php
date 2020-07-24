<?
    include ("includes/lib.php");
    getDBConnection();
    $ctgs = getAllCtgrs();
    $news = getAllNews();
    if ($ctgs != NULL && $news!= NULL)
        include ("application/views/index.php");

?>