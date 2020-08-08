<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="layout/css/stylesheet.css">
	<link rel="shortcut icon" href="layout/img/favicon.png" type="image/png">
	<link rel="alternate" href="https://allfont.ru/allfont.css?fonts=arial-narrow">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="layout/js/script.js"></script>
	<title><?=$title?></title>
</head>

<body>
	<header class="page-header">
		<div class="wrapper">
			<aside class="header-top">
				<div class="header-logo">
					<img class="header-logo__image" src="layout/img/logo.png" alt="Логотип" width="95" height="75">
					<span class="header-logo__caption">Company</span>
				</div>
				<div class="company-info">
					<b class="company-info__tagline">Нанотехнологии здоровья</b>
					<div class="contacts">
						<a class="contacts__link-mail" href="mailto:info@company.ru">info@company.ru</a>
						<a class="contacts__link-phone" href="tel:+73833491849">+7 (383) 349-18-49</a>
					</div>
				</div>
			</aside>
			<div class="user-info">
				
			</div>
		</div>
		<nav class="header-nav">
			<div class="wrapper">
				<span class="menu-toggler">Меню</span>
				<ul class="menu-togglable">
					<?foreach ($topMenuItems as $href => $item) :?>				
						<li class="header-nav-item">	
							<?if(!empty($item['items'])):
								if($href==(basename($_SERVER['SCRIPT_FILENAME']))):?>
									<span class="header-nav-item__link header-nav-item__link_current">
										<?=$item['name']?>
									</span>
								<?else:?>
									<span class="header-nav-item__container-for-link">
										<a class="header-nav-item__link" href="<?=$href?>">
											<?=$item['name']?>
										</a>
									</span>
								<?endif;?>
								<ul class="sub-menu">
									<? foreach ($item['items'] as $h => $n) : ?>
										<li class="sub-menu__list-item">
											<a class="sub-menu__link" href="<?=$h?>">
												<?=$n?>
											</a>
										</li>
									<?endforeach ?>
								</ul>						
							<? elseif($href==(basename($_SERVER['SCRIPT_FILENAME']))):?>
							<span>
								<span class="header-nav-item__link header-nav-item__link_current">
									<?=$item['name']?>
								</span>
							<?else:?>
							<a class="header-nav-item__link" href="<?=$href?>">
								<?=$item['name']?>
							</a>
							<?endif;?>
							</span>
						</li>
					<? endforeach ?>
				</ul>
			</div>
		</nav>
	</header>

	<div class="content">
		<div class="wrapper content__wrapper">
			<?if($href=="index.php"):?>
			    <main class="categories"> 
			<?else:?>
				<main class="inside-content"> 
			<?endif;?>
		