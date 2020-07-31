<?
    include ("includes/lib.php");
    getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);

    global $catId;
    global $id; 

    foreach ($ctgs as $breadCrumbs) 
    {
       if ($breadCrumbs['id'] == $catId)
         $curCategoryName = $breadCrumbs['name'];
    }
    $prodInfo = getProd($pdo, $id);
   
    if ($prodInfo != NULL)
    {
        $prod = $prodInfo[0];
        include ("application/views/product.php");
    }
    else 
        include ("404.php");
        
?>