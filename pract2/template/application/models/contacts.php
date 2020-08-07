<?
    include ("includes/lib.php");
    $pdo = getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    $errorParam = 0;
    
     if (isset($_SESSION['author']) && (isset($_SESSION['email']))&& (isset($_SESSION['text'])))
    {
        $errorParam = 1;
        addToSql($pdo, $_SESSION['author'], $_SESSION['email'],$_SESSION['text'],0);
        if (isset($_SESSION['phone']))
        {
             addToSql($pdo, $_SESSION['author'], $_SESSION['email'],$_SESSION['text'],$_SESSION['phone']);
        }
    }

    $title = "Контакты";
    $breadCrumbs = array("index.php" => "Главная", "" => $title ); 
    include ("application/views/contacts.php");
?>