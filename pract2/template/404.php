<?
    require_once ("includes/lib.php");
    $pdo = getDBConnection();
    require("application/views/includes/template_header.php");
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
?>
    <main class="inside-content">
        Упс, страница не найдена<br>
        Вы можете выбрать подходящую вам категорию товаров в меню слева, или перейти в нужный вам раздел сайта в меню выше
        <?if  ((isset($catId)) || isset( $startPrice) || isset($finalPrice)):?>
            <input class="form-submit search-filter__drop" type="button" value="или сбросить фильтры">
        <?endif;?>
    </main>
<?
    require("application/views/includes/template_footer.php");
?>