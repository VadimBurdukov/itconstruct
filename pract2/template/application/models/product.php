<?
    include ("includes/lib.php");
    getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);

    global $catId;
    global $id; 

    $prodInfo = getProd($pdo, $id);
   
    if ($prodInfo != NULL)
    {
        $prod = $prodInfo[0];
        include ("application/views/product.php");
    }
        
?>