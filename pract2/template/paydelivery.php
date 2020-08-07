<?
    include ("includes/lib.php");
	$pdo = getDBConnection();
    $ctgs = getAllCtgrs($pdo);
	$news = getAllNews($pdo);
	$title="Доставка и оплата";
	$breadCrumbs = array("index.php" => "Главная",  "" => $title); 
    require("application/views/includes/template_header.php");
?>
    <main class="inside-content">
		<nav class="bread-crumbs-container product__bread-crumbs">
            <ul class="bread-crumbs">
                <?foreach ($breadCrumbs as $href => $b):
                    if($href!=""):?>
                        <li class="bread-crumb"><a class="bread-crumb__link" href="<?=$href?>"><?=$b?></a></li>   
                    <?else:?>
                        <li class="bread-crumb bread-crumb_current"><?=$b?></li>
                    <?endif;?>
                <?endforeach;?>
            </ul>
        </nav>
		<article class="shipment-article">
			<h1>Доставка</h1>
			<p><b>Уважаемые покупатели!</b></p>
			<p>
				Оплатить свой заказ Вы можете любым из следующих способов:
			</p>
			<ol>
				<li>Оплата наличными курьеру (в Москве в пределах МКАД)</li>
				<li>Оплата с помощью Яндекс.Деньги</li>
				<li>Оплата по безналичному расчету</li>
				<li>Оплата по квитанции Сбербанка РФ или другого коммерческого банка.</li>
			</ol>
			<p>В двух последних случаях мы выписываем Вам счет, который Вы получаете по электронной почте после подтверждения
				Вашего заказа. После получения денег, мы в течение 2-3 рабочих дней доставляем Вам товар с помощью транспортных
				компаний "СПСР" и "Грузовозофф" (по РФ), а так же по желанию "Почтой РФ". Стоимость доставки по РФ
				согласовывается с Вами и включается в стоимость счета.</p>
			<p>Доставка по Москве осуществляется на следующий день после согласования заказа.</p>
			<p>Стоимость курьерской доставки по Москве составляет <b>250 р.</b></p>
			<p>Доставка по Москве крупногабаритных товаров (от 5 кг) - <b>300 р.</b></p>
			<p>Доставка за пределы МКАД - по договоренности</p>
			<p><i>Также, Вы имеете возможность приобрести товары в нашем шоу-руме на м.Сходненская</i></p>
		</article>
	</main>
<?
	require("application/views/includes/template_footer.php");
?>