<?
    include ("includes/lib.php");
    getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    $errorParam = 0;
    
     if (isset($_SESSION['author']) && (isset($_SESSION['email']))&& (isset($_SESSION['text'])))
    {
        $errorParam = 1;
    }


    include ("application/views/contacts.php");
?>