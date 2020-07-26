<?
  include ("includes/lib.php");
  getDBConnection();
  global $pdo;
  $ctgs = getAllCtgrs();
  $news = getAllNews();
  $products = getProducstLimited(); 
  if ($ctgs != NULL && $news!= NULL)
    include ("application/views/catalog.php");

?>