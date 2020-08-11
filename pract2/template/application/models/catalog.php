<?
/*=============================ФУНКЦИЯ ЗАПРОСА К БД===================================*/
  function requests($pdo, $page,$startPrice,$finalPrice, $catId)
  {
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
      $start = (int)prodPerPage*($page -1);
      $end = (int)prodPerPage;
      $sqlCount.= $sql;
      $sqlProd.=$sql;
      $sqlProd .= ' LIMIT '.$start.','. $end ;
      $maxPage = $pdo->query( $sqlCount)->fetch(PDO::FETCH_ASSOC);
      $products = $pdo->query( $sqlProd)->fetchAll(PDO::FETCH_ASSOC);
      if( (int)$maxPage['count(id)']%prodPerPage ==0 )
          $countRes = (int)$maxPage['count(id)']/prodPerPage;   
      else
          $countRes =  (int)((int)$maxPage['count(id)']/prodPerPage) + 1;
      return  array('count' => $countRes, 'products' =>$products);
  }
/*=============================ФОРМИРОВАНИЕ ДАННЫХ===================================*/
  include ("includes/lib.php");
  $pdo = getDBConnection();
  $ctgs = getAllCtgrs($pdo);
  $news = getAllNews($pdo);   
  $pageNprods = requests($pdo,$curPage,$startPrice,$finalPrice,$catId);
  $products = $pageNprods['products'];
  $maxPage =  $pageNprods['count'];
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
     $items = menu("catalog.php", $ctgs);
    include ("application/views/catalog.php");
  }  
  else 
  {
    http_response_code(404);
    header("Location: 404.php");
    exit();
  }
    
?>