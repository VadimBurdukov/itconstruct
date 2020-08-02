<?
    $paramString = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
    parse_str($paramString, $output);
    if (isset( $output['id']) && $output['id'] != NULL)
    {
        $id = (int)$output['id'];
        include("application/models/news-detail.php"); 
    }
    else
         include("404.php"); 
?>