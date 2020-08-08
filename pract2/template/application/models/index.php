<?
    include ("includes/lib.php");
    $pdo = getDBConnection();
    $seo_article = ("include_areas/index_seo.php");
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    $title = "Company";

    foreach ($topMenuItems as $item => $lvl2Item)
    {
        if($item=="catalog.php")
        {
            foreach ($ctgs as $cat) 
            {
              //var_dump($cat);
              $topMenuItems['catalog.php']['items'][$cat['name']] = "catalog.php?catId=".$cat['id'];
               //var_dump( $lvl2Item['items'][$cat['name']]);
            }
            
        }
    }
    var_dump($topMenuItems);
    include ("application/views/index.php");
    
?>