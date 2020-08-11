<?
/*=============================ФУНКЦИЯ ЗАПРОСА К БД===================================*/
    function getProd($pdo, $id, $catId)
    {
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
        $prod = $pdo->query( $sql)->fetchAll(PDO::FETCH_ASSOC); 
        return $prod;
    }
/*=============================ФОРМИРОВАНИЕ ДАННЫХ===================================*/
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
        if(isset($curCategoryName))
        {              
            $breadCrumbs["catalog.php?catId=$catId"] = $curCategoryName;
        }
        $breadCrumbs[$curHref] = $title;
        $items = menu("catalog.php", $ctgs);
        include ("application/views/product.php");
    }
    else 
    {
        include ("404.php");
    }      
?>