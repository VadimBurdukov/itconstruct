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
  if (!isset($catId))
    $catId = 0;
  if (isset($startPrice) && $startPrice > 0)
  {
    $outputFilt['cost-from'] = $startPrice;    
  }     
  elseif(!isset( $startPrice))
  {
    $startPrice = 0;
  } 
  if (isset($finalPrice) && $finalPrice > 0)
  {
    $outputFilt['cost-to'] = $finalPrice;    
  }     
  elseif(!isset( $finalPrice))
  {
    $finalPrice = 0;
  }
  $pageNprods = requests($pdo,$curPage,$startPrice,$finalPrice,$catId);
  $products = $pageNprods['products'];
  $maxPage =  $pageNprods['count'];
/*=============================ДАННЫЕ СФОРМИРОВАНЫ===================================*/
  if (($ctgs) && ($news) && ($products) && ($maxPage)) 
  {
    $curHref="";
    $title = "Каталог";
    $breadCrumbs = array("index.php" => "Главная", "$curHref"=> "Каталог"); 
    if (isset($catId)) 
    {
      foreach ($ctgs as $cat) 
      {
        if($cat['id'] == $catId)
        {
          $title = $cat['name'];  
          unset($breadCrumbs[$curHref]);
          $breadCrumbs['catalog.php'] = "Каталог";
          $breadCrumbs[$curHref] = $title;
        }
           
      }
      $items = menu("catalog.php", $ctgs);
      //var_dump($items);
    }
    include ("application/views/catalog.php");
  }  
  else 
  {
    header("Location: 404.php");
    http_response_code(404);
  }
    
?>