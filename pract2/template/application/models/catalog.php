<?
  include ("includes/lib.php");
  $pdo = getDBConnection();
  $ctgs = getAllCtgrs($pdo);
  $news = getAllNews($pdo);
  if (!isset($catId))
    $catId = 0;
  if(!isset( $startPrice))
    $startPrice = 0;
  if(!isset( $finalPrice))
    $finalPrice = 0;

  $maxPage = (int)paginationCount($pdo,$startPrice,$finalPrice,$catId);
  $products = getProducst__Limited($pdo, $curPage, $startPrice,$finalPrice,$catId); 

  if (isset($startPrice) && $startPrice > 0)
    $outputFilt['cost-from'] = $startPrice;             
  if (isset($finalPrice) && $finalPrice > 0)
    $outputFilt['cost-to'] = $finalPrice;  

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
    }
    foreach ($topMenuItems as $item => $lvl2Item)
    {
        if($item=="catalog.php")
        {
            foreach ($ctgs as $cat) 
            {
              $topMenuItems['catalog.php']['items']["catalog.php?catId=".$cat['id']] =  $cat['name'];
            }
            
        }
    }
    include ("application/views/catalog.php");
  }
    
  else 
    include ("404.php");
?>