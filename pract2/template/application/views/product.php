<?
    getheader();
    global $catId;
    global $id; 
    global $prod;

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
        <h1 class="product__info-block-part product__headline"><?=$prod['name']?></h1>
        <img class="product__image" src="<?=$prod['img']?>" alt="Упс! Здесь было фото, но теперь его нет :(">
        <span class="good-price good_price product__info-block-part product__info-price"><?=$prod['price']?> <small class="good-price__currency">руб.</small></span>
        <article class="product__description">
            <?=$prod['description']?>
        </article>
    </section>
</main>
<?
    getfooter();
?>