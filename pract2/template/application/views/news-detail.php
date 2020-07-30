<?
    getheader();
    $n = $newsById[0];
?>  
<main class="inside-content">
    <nav class="bread-crumbs-container product__bread-crumbs">
        <ul class="bread-crumbs">
            <li class="bread-crumb"><a class="bread-crumb__link" href="index.html">Главная</a></li>
            <li class="bread-crumb"><a class="bread-crumb__link" href="catalog.html">Каталог</a></li>
            <li class="bread-crumb"><a class="bread-crumb__link" href="#">Электронные сигареты</a></li>
            <li class="bread-crumb bread-crumb_current">Электронная сигарета «Такая-то»</li>
        </ul>
    </nav>
    <section class="product">
        <h1 class="product__info-block-part product__headline"><?=$n['title']?></h1>
        <small class="good-price__currency"><?=$n['date']?></small>
        <article class="product__description">
            <?=$n['description']?>
        </article>
    </section>
</main>
            
<?
    getfooter();
?>