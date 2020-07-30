<?
    $paramString = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
    parse_str($paramString, $output);
    if (isset( $output['id']))
    {
        $id = (int)$output['id'];
    }
    include("application/models/news-detail.php"); 
?>