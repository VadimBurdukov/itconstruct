   
	</main>   		
		<div class="sidebar">   
			<?if(count($ctgs)):?>			
				<section class="catalog">
					<h2 class="sidebar__headline">Каталог</h2>
					<ul class="catalog-list">				
						<?foreach ($ctgs as $cat):	
							$outputFilt['catId'] = $cat['id'];
							$paramString = http_build_query($outputFilt);?>		
							<li class="catalog-list__item">
								<a class="catalog-list__link" href="catalog.php?<?=$paramString?>">
									<?=$cat['name']?>
								</a>
							</li>
						<?endforeach;?>						
					</ul>
				</section>
			<?endif;
			if(count($news)):?>
				<section class="news">
					<h2 class="sidebar__headline news__headline">Новости</h2>				
						<ul class="news-list">			
							<?foreach ($news as $n):?>
								<li class="news-item">
									<a class="news-item__link" href="news-detail.php?id=<?=$n['id']?>">
										<?=$n['announcement'];?>
									</a>
									<span class="news-item__date"><?=$n['date'];?></span>
								</li>
							<?endforeach;?>					
						</ul>					
					<span class="archive"><a class="archive__link" href="news.php">Архив новостей</a></span>
				</section>	
			<?endif;?>
		</div>
		<?if (isset($seo_article)):
			require($seo_article);
		endif?> 
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
				<?foreach ($topMenuItems as $href => $item) :?>				
					<li class="footer-nav__list-item">	
						<?if(!empty($item['items'])):
							if($href==(basename($_SERVER['SCRIPT_FILENAME']))):?>
								<span class="footer-nav__link">
									<?=$item['name']?>
								</span>
							<?else:?>
								<a class="footer-nav__link" href="<?=$href?>">
									<?=$item['name']?>
								</a>
							<?endif;?>					
						<? elseif($href==(basename($_SERVER['SCRIPT_FILENAME']))):?>
						<span>
							<span class="footer-nav__link">
								<?=$item['name']?>
							</span>
						<?else:?>
						<a class="footer-nav__link" href="<?=$href?>">
							<?=$item['name']?>
						</a>
						<?endif;?>
						</span>
					</li>
				<?endforeach?>
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