<?
    include ("includes/lib.php");
    $pdo = getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    if (isset($catId))
    {
        foreach ($ctgs as $breadCrumbs) 
        {
            if ($breadCrumbs['id'] == $catId)
                $curCategoryName = $breadCrumbs['name'];
        }
    }
   
    $prodInfo = getProd($pdo, $id, $catId);
   
    if ($prodInfo)
    {
        $prod = $prodInfo[0];
        include ("application/views/product.php");
    }
    else 
        include ("404.php");
        
?>