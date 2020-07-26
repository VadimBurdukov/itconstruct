<?
   
  include ("includes/lib.php");
  getDBConnection();
  global $pdo;
  global $page;
  $ctgs = getAllCtgrs($pdo);
  $news = getAllNews($pdo);
  $products = getProducst__Limited($pdo, $page); 
  if ($ctgs != NULL && $news!= NULL && $products!= NULL) 
    include ("application/views/catalog.php");

?>