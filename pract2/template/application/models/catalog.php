<?
  include ("includes/lib.php");
  getDBConnection();
 
  global $curPage;
  global $startPrice;
  global $finalPrice;
  global $catId;

  $ctgs = getAllCtgrs($pdo);
  $news = getAllNews($pdo);
  


  if ((isset($catId)) && isset( $startPrice) && isset($finalPrice))
  {
   // print(1);
    $maxPage = (int)paginationCount($pdo, $startPrice, $finalPrice,$catId);
    $products = getProducst__Limited($pdo, $curPage, $startPrice, $finalPrice,$catId); 
  }
  elseif (isset($startPrice) && isset($finalPrice))
  {
  //  print(2);
    $maxPage = (int)paginationCount($pdo, $startPrice, $finalPrice,0);
    $products = getProducst__Limited($pdo, $curPage, $startPrice, $finalPrice,0); 
  }
  elseif (isset($catId))
  {
  //  print(3);
    $maxPage = (int)paginationCount($pdo, 0, 0,$catId);
    $products = getProducst__Limited($pdo, $curPage, 0, 0,$catId); 
  }
  else
  {
  //  print(4);
    $maxPage = (int)paginationCount($pdo,0,0,0);
    $products = getProducst__Limited($pdo, $curPage, 0,0,0); 
  }
    
  if ($ctgs != NULL && $news!= NULL && $products!= NULL) 
   // ПО ИДЕЕ ЗДЕСЬ НУЖНО ЗАДАВАТЬ URL ПАРАМЕТРЫ СТРАНИЦЫ
    include ("application/views/catalog.php");
?>