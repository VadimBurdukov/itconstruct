<?
    include ("includes/lib.php");
    $pdo = getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    $title="О компании";
    $breadCrumbs = array("index.php" => "Главная", "" => $title); 
    $items = menu("catalog.php", $ctgs);
    require("application/views/includes/template_header.php");
?>
    <main class="inside-content">
        <nav class="bread-crumbs-container product__bread-crumbs">
            <ul class="bread-crumbs">
                 <?foreach ($breadCrumbs as $href => $b):
                    if($href):?>
                        <li class="bread-crumb"><a class="bread-crumb__link" href="<?=$href?>"><?=$b?></a></li>   
                    <?else:?>
                        <li class="bread-crumb bread-crumb_current"><?=$b?></li>
                    <?endif;?>
                <?endforeach;?>
            </ul>
        </nav>
        <article class="shipment-article">
            <h1><b>О нас</b></h1>
            <p>У нас в продаже только качесвтенные тобачные изделия, трубки и электронные сигареты! </p>
            <p>Классическая линейка "Standart" нашей компании – это огромный выбор ярких сочных ароматов, качественного тобака
                среди которых множество 
                чистых фруктовых, но есть и оригинальные вкусы и миксы. Линейка "Gold" – 
                это люксовая ограниченная серия, славится густым насыщенным вкусом. 
            </p>
            <p>Гарантия на трубки и электронные сигареты 1 год</p>
        </article>
    </main>
<?
    require("application/views/includes/template_footer.php");
?>