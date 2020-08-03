<?
    include ("includes/lib.php");
    $pdo = getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    getheader();
?>
    <main class="inside-content">
        <nav class="bread-crumbs-container product__bread-crumbs">
            <ul class="bread-crumbs">
                <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li> 
                <li class="bread-crumb bread-crumb_current">О нас</li>
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
    getfooter();
?>