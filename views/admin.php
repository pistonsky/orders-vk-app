	<div class="modal fade in" id="alert" tabindex="-1" role="dialog">

	</div> 

	<!-- BEGIN PAGE MARKUP -->     
	<div class="page" id="page-container">
		<!-- BEGIN HEADER -->
		<header class="navbar">
			<!-- logo is in the background css property -->
			<div class="container">

				<nav>
					<a href="#/menu" class="btn btn-link">Меню</a>
					<a href="#/orders" class="btn btn-link active">Заказы</a>
				</nav>
				<span id="status-hint" style="display: none;"></span>
				<span id="birthday-reminder" style="display: none;">У вашего друга сегодня день рождения!<br>Подарите ему что-нибудь вкусненькое!</span>
				<span id="status-wrap" title="обновить">Заказов: <strong><span id="status">14</span></strong></span>

			</div>
		</header>
		<!-- END HEADER -->
		<!-- BEGIN PAGE CONTAINER -->
		<div class="page-container">
			<!-- BEGIN CONTAINER -->
			<div id="container">
				<div class="empty tab-container" id="tab-menu">
					<h1>Загружается...</h1>
				</div>
				<div class="empty tab-container active" id="tab-orders">
					<h1>Загружается...</h1>
				</div>
			</div>
			<!-- END CONTAINER -->
		</div>
		<!-- END PAGE CONTAINER -->
		<!-- BEGIN FOOTER -->
		<footer>
			<a href="#/about">О сервисе</a>
			<a href="//vk.com/fancy.john" target="_blank">Помощь</a>
			<a href="#/support">Техническая поддержка</a>
		</footer>
		<!-- END FOOTER -->
	</div>
<!-- END PAGE MARKUP -->

<?php include(dirname(__FILE__) . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "admin_templates.php"); ?>
<?php include(dirname(__FILE__) . DIRECTORY_SEPARATOR . "backbone" . DIRECTORY_SEPARATOR . "admin_backbone.php"); ?>
