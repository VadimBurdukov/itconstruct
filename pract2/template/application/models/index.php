<?
    include ("includes/lib.php");
    getDBConnection();
    $ctgs = getAllCtgrs();
    /*
    foreach ($ctgs as $cat) 
    {
        echo $cat['name']."<br />\n";
    } 
    */
    if ($ctgs != NULL)
    include ("application/views/index.php");

?>