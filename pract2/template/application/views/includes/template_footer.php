		<div class="sidebar">
			<section class="catalog">
				<h2 class="sidebar__headline">Каталог</h2>
				<ul class="catalog-list">
					<?
						global $ctgs;
						global $startPrice;
						global $finalPrice;
						if(isset($startPrice)&&isset($finalPrice))
								$output = array('cost-from' => $startPrice,
												'cost-to' => $finalPrice);
							else 
							{
								$output = array();
							}
						foreach ($ctgs as $cat) 
						{
							
							
							$output['catId'] = $cat['id'];
							$paramString = http_build_query($output);
						?>
							
							<li class="catalog-list__item">
								<a class="catalog-list__link" href="catalog.php?<?=$paramString?>">
									<?=$cat['name']?>
								</a>
							</li>
						<? 
						
						} 
						
					?>
				</ul>
			</section>
			<section class="news">
				<h2 class="sidebar__headline news__headline">Новости</h2>
				<ul class="news-list">
					<?
						global $news;
						foreach ($news as $n) 
						{?>
							<li class="news-item">
								<a class="news-item__link" href="#">
									<?=$n['announcement'];?>
								</a>
								<span class="news-item__date"><?=$n['date'];?></span>
							</li>
						<? 
						} 
					?>
				</ul>
				<span class="archive"><a class="archive__link" href="news.php">Архив новостей</a></span>
			</section>
		</div>
	</div>
</div>
<footer class="page-footer">
		<div class="wrapper page-footer__wrapper">
			<div class="copyright">
				<span class="copyright__part copyright__lifetime">Copyright ©2007-2010</span>
				<span class="copyright__part copyright__company-lifetime"><b>© "Company"</b>, 2010</span>
				<img class="copyright__image" src="layout/img/logo.png" alt="Company-logo">
				<span class="copyright__part copyrhigt__company-name">Company</span>
			</div>
			<nav class="footer-nav">
				<ul class="footer-nav__list">
					<li class="footer-nav__list-item"><span class="footer-nav__link">Главная</span></li>
					<li class="footer-nav__list-item"><a class="footer-nav__link" href="catalog.php">Каталог</a></li>
					<?foreach (topMenuItems as $item => $href) {?>
						<li class="footer-nav__list-item">
							<span>
								<a class="footer-nav__link" href="<?=$href?>">
									<?=$item?>
								</a>
							</span>
						</li>
					<?
					}?>
				</ul>
			</nav>
			<div class="developer">
				<span class="developer__ref">Разработка сайта - <a class="developer__link" href="https://itconstruct.ru/">ITConstruct</a></span>
				<img class="counter" src="layout/img/counter.png" alt="Page-counter">
			</div>
		</div>
	</footer>
</body>

</html>