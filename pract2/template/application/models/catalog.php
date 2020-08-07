<?
  include ("includes/lib.php");
  $pdo = getDBConnection();
  $ctgs = getAllCtgrs($pdo);
  $news = getAllNews($pdo);

  if ((isset($catId)) && (isset( $startPrice) || isset($finalPrice)))
  {
    if ( (isset( $startPrice)) && (isset($finalPrice) ))
    {
      $maxPage = (int)paginationCount($pdo, $startPrice, $finalPrice,$catId);
      $products = getProducst__Limited($pdo, $curPage, $startPrice, $finalPrice,$catId); 
    }
    elseif(isset( $startPrice))
    {
      $maxPage = (int)paginationCount($pdo, $startPrice, 0,$catId);
      $products = getProducst__Limited($pdo, $curPage, $startPrice, 0,$catId); 
    }
    else 
    {
      $maxPage = (int)paginationCount($pdo, 0, $finalPrice,$catId);
      $products = getProducst__Limited($pdo, $curPage, 0, $finalPrice,$catId); 
    }
    
  }
  elseif ((isset($startPrice)) || (isset($finalPrice)))
  {
    
    if ( (isset( $startPrice)) && (isset($finalPrice) ))
    {
      $maxPage = (int)paginationCount($pdo, $startPrice, $finalPrice,0);
      $products = getProducst__Limited($pdo, $curPage, $startPrice, $finalPrice,0); 
    }
    elseif(isset( $startPrice))
    {
      $maxPage = (int)paginationCount($pdo, $startPrice, 0,0);
      $products = getProducst__Limited($pdo, $curPage, $startPrice, 0,0); 
    }
    else 
    {
      $maxPage = (int)paginationCount($pdo, 0, $finalPrice,0);
      $products = getProducst__Limited($pdo, $curPage, 0, $finalPrice,0); 
    }
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

  if (isset($startPrice))
    $outputFilt = array('cost-from' => $startPrice);             
  if (isset($finalPrice))
    $outputFilt = array('cost-to' => $finalPrice);
  
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
    var_dump($breadCrumbs);
    include ("application/views/catalog.php");
  }
    
  else 
    include ("404.php");
?>