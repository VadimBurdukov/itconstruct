<?
   
  include ("includes/lib.php");
  getDBConnection();
  $ctgs = getAllCtgrs($pdo);
  $news = getAllNews($pdo);
  


  if ((isset($catId)) && isset( $_SESSION['startPrice']) && isset($_SESSION['finalPrice']))
  {
    print(1);
    $maxPage = (int)paginationCount($pdo, $_SESSION['startPrice'], $_SESSION['finalPrice'],$_SESSION['catId']);
    $products = getProducst__Limited($pdo, $curPage, $_SESSION['startPrice'], $_SESSION['finalPrice'],$_SESSION['catId']); 
  }
  elseif (isset($_SESSION['startPrice']) && isset($_SESSION['finalPrice']))
  {
    print(2);
    $maxPage = (int)paginationCount($pdo, $_SESSION['startPrice'], $_SESSION['finalPrice'],0);
    $products = getProducst__Limited($pdo, $curPage, $_SESSION['startPrice'], $_SESSION['finalPrice'],0); 
  }
  elseif (isset($_SESSION['catId']))
  {
    print(3);
    $maxPage = (int)paginationCount($pdo, 0, 0,$_SESSION['catId']);
    $products = getProducst__Limited($pdo, $curPage, 0, 0,$_SESSION['catId']); 
  }
  else
  {
    print(4);
    $maxPage = (int)paginationCount($pdo,0,0,0);
    $products = getProducst__Limited($pdo, $curPage, 0,0,0); 
  }
    
  if ($ctgs != NULL && $news!= NULL && $products!= NULL) 
   // ПО ИДЕЕ ЗДЕСЬ НУЖНО ЗАДАВАТЬ URL ПАРАМЕТРЫ СТРАНИЦЫ
    include ("application/views/catalog.php");
?>