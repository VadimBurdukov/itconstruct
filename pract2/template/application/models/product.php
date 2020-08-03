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
         $prodInfo = getProd($pdo, $id, $catId);
    }  
    else
         $prodInfo = getProd($pdo, $id, 0);


    
   
    if ($prodInfo)
    {
        $prod = $prodInfo[0];
       //var_dump($prod);
        $title = $prod['name'];
        include ("application/views/product.php");
    }
    else 
        include ("404.php");
        
?>