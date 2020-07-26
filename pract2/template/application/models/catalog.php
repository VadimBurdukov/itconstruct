<?
   
  include ("includes/lib.php");
  getDBConnection();
  global $pdo;
  global $page;
  $ctgs = getAllCtgrs();
  $news = getAllNews();
  $products = getProducst__Limited(); 
  if ($ctgs != NULL && $news!= NULL && $products!= NULL) 
    include ("application/views/catalog.php");

?>