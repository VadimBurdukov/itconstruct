<?
    require("application/views/includes/template_header.php");
?>  
<main class="inside-content">
    <nav class="bread-crumbs-container product__bread-crumbs">
        <ul class="bread-crumbs">
            <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
            <li class="bread-crumb"><a class="bread-crumb__link" href="news.php">Новости</a></li>
            <li class="bread-crumb bread-crumb_current"><?=$newsTitle?></li>
        </ul>
    </nav>
    <section class="product">
        <h1 class="product__info-block-part product__headline"><?=$newsTitle?></h1>
        <small class="good-price__currency"><?=$date?></small>
        <article class="product__description">
            <?=$desc?>
        </article>
    </section>
</main>
            
<?
    require("application/views/includes/template_footer.php");
?>