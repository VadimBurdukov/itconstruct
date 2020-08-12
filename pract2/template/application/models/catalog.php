<?
/*=============================ФОРМИРОВАНИЕ ДАННЫХ===================================*/
  $pdo = getDBConnection();
  $ctgs = getAllCtgrs($pdo);
  $news = getAllNews($pdo);   
  $sqlCount ='SELECT count(id) 
              FROM product';
  $sqlProd = 'SELECT id, name, price, img
              FROM product';
  $sql='';
  if ($catId) 
  {
    $sql= ' JOIN productcategories
            ON  product.id = productcategories.product_id 
            WHERE cat_id = '.$catId; 
    if (($startPrice)||($finalPrice))
    {
      $sql .= ' AND';
    }
  }
  elseif(($startPrice)||($finalPrice))
  {
    $sql .= ' WHERE';
  }
  if($startPrice)
  {
    $sql .= ' price >= '.$startPrice;
    if($finalPrice)
    {       
      $sql .= ' AND';
    }  
  }
  if($finalPrice)
  {
    $sql .= ' price <= '.$finalPrice;        
  }
  $start = (int)prodPerPage*($curPage -1);
  $end = (int)prodPerPage;
  $sqlCount.= $sql;
  $sqlProd.=$sql;
  $sqlProd .= ' LIMIT '.$start.','. $end ;
  $max = $pdo->query( $sqlCount)->fetch(PDO::FETCH_ASSOC);
  $products = $pdo->query( $sqlProd)->fetchAll(PDO::FETCH_ASSOC);
  $maxPage = (int)$max['count(id)']/prodPerPage;  
  if( (int)$max['count(id)']%prodPerPage != 0 )
  {
    $maxPage =  (int)((int)$max['count(id)']/prodPerPage) + 1;
  }
    
/*=============================ДАННЫЕ СФОРМИРОВАНЫ===================================*/
  if ( $maxPage) 
  {
    $title = "Каталог";
    $breadCrumbs = array("index.php" => "Главная"); 
    if (isset($catId)&& $catId) 
    {
      $title = $ctgs[$catId]['name'];  
      $breadCrumbs['catalog.php'] = "Каталог";
      $breadCrumbs[''] = $ctgs[$catId-1]['name'];
    }
    else 
    {
      $breadCrumbs[''] = "Каталог";
    }
    $items = extendMenu("catalog.php", $ctgs);
    include ("application/views/catalog.php");
  }  
  else 
  {
    error ();
  }  
?>