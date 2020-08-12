<?
/*=============================ФОРМИРОВАНИЕ ДАННЫХ===================================*/
    $pdo = getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    if (isset($catId) && ($catId))
    {
        $curCategoryName = $ctgs[$catId-1]['name'];
    }  
    $sql = 'SELECT *    
                FROM product ';
    if ($catId) 
    {
        $sql.= 'JOIN productcategories
                ON  product.id = product_id
                WHERE cat_id ='.$catId.' AND ';
    }
    else
    {
        $sql .= ' WHERE';
    }
    $sql.=' product.id ='. $id;
    $prodInfo = $pdo->query( $sql)->fetchAll(PDO::FETCH_ASSOC); 
    if ($prodInfo)
    {
        $prod = $prodInfo[0];
        $title = $prod['name'];
        $curHref="";
        $breadCrumbs = array("index.php" => "Главная", "catalog.php"=> "Каталог" ); 
        if(isset($curCategoryName))
        {              
            $breadCrumbs["catalog.php?catId=$catId"] = $curCategoryName;
        }
        $breadCrumbs[$curHref] = $title;
        $items = extendMenu("catalog.php", $ctgs);
        include ("application/views/product.php");
    }
    else 
    {
        error();
    }      
?>