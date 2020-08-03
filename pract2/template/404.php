<?
    require_once ("includes/lib.php");
    $pdo = getDBConnection();
    getheader();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
?>
    <main class="inside-content">
        Упс, страница не найдена<br>
        Вы можете выбрать подходящую вам категорию товаров в меню слева, или перейти в нужный вам раздел сайта в меню выше
    </main>
        
<?
    getfooter();
?>