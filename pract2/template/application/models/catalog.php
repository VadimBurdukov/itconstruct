<?
  include ("includes/lib.php");
  $pdo = getDBConnection();
  $ctgs = getAllCtgrs($pdo);
  $news = getAllNews($pdo);

  if ((isset($catId)) && isset( $startPrice) && isset($finalPrice))
  {
    $maxPage = (int)paginationCount($pdo, $startPrice, $finalPrice,$catId);
    $products = getProducst__Limited($pdo, $curPage, $startPrice, $finalPrice,$catId); 
  }
  elseif (isset($startPrice) && isset($finalPrice))
  {
    $maxPage = (int)paginationCount($pdo, $startPrice, $finalPrice,0);
    $products = getProducst__Limited($pdo, $curPage, $startPrice, $finalPrice,0); 
  }
  elseif (isset($catId))
  {
    $maxPage = (int)paginationCount($pdo, 0, 0,$catId);
    $products = getProducst__Limited($pdo, $curPage, 0, 0,$catId); 
  }
  else
  {
    $maxPage = (int)paginationCount($pdo,0,0,0);
    $products = getProducst__Limited($pdo, $curPage, 0,0,0); 
  } 


  if (($ctgs) && ($news) && ($products) && ($maxPage)) 
    include ("application/views/catalog.php");
  else 
    include ("404.php");
?>