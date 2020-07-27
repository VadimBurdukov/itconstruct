<?
   
  include ("includes/lib.php");
  getDBConnection();
  $ctgs = getAllCtgrs($pdo);
  $news = getAllNews($pdo);
 
  $startPrice =   $_SESSION['startPrice'];
  $finalPrice =   $_SESSION['finalPrice'];
  
  if (isset($startPrice) && isset($finalPrice))
  {
    $maxPage = (int)paginationCount($pdo, $startPrice, $finalPrice);
    $products = getProducst__Limited($pdo, $curPage, $startPrice, $finalPrice); 
  }
    
  else
  {
    $maxPage = (int)paginationCount($pdo,0,0);
    $products = getProducst__Limited($pdo, $curPage, 0, 0); 
  }
    
  if ($ctgs != NULL && $news!= NULL && $products!= NULL) 
    include ("application/views/catalog.php");
?>