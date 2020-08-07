<?
    include ("includes/lib.php");
    $pdo = getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    if (isset($catId))
    {
        foreach ($ctgs as $ct) 
        {
            
            if ($ct['id'] == $catId)
                $curCategoryName = $ct['name'];
        }
         $prodInfo = getProd($pdo, $id, $catId);
    }  
    else
         $prodInfo = getProd($pdo, $id, 0);


    
   
    if ($prodInfo)
    {
        $prod = $prodInfo[0];
        $title = $prod['name'];
        $curHref="";
        $breadCrumbs = array("index.php" => "Главная", "catalog.php"=> "Каталог" ); 
        //$breadCrumbs = array("Главная" => "index.php", "Каталог"=> "catalog.php", $title=>""); 
        if(isset($curCategoryName))
        {              
            
            $breadCrumbs["catalog.php?catId=$catId"] = $curCategoryName;
        }
        $breadCrumbs[$curHref] = $title;
        include ("application/views/product.php");
    }
    else 
    {
        include ("404.php");
    }
        
        
?>