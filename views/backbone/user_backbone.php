<script type="text/javascript">

	function showMessage(title, message, handler, top) {
		var template = _.template($("#alert-template").html(), {
			title: title,
			message: message
		});
		$("#alert").html(template).attr("style","display:block");
		if (typeof(top) == "number") {
			$("#alert div.alert").css("margin-top",top + "%");
		}
		$("#page-container").addClass("blurred");
		$("button#close-alert").click(handler);
	}

	// VK.init(function() {

		var id = <?php echo $_GET['viewer_id'];?>; // id vkontakte
		var auth_key = "<?php echo $_GET['auth_key'];?>";

		var MenuPage = Backbone.View.extend({
			el: '#page',
			render: function () {

			},
			events: {
				'click .menu-item': 'select'
			},
			select: function (ev) {
				$(ev.currentTarget).addClass('selected');
				current_count = $(ev.currentTarget).data('count');
				console.info(current_count);
				current_count++;
				$(ev.currentTarget).data('count', current_count);
				$(ev.currentTarget).find('.counter').html(current_count);
				this.recalculate();
			},
			recalculate: function() {
				// recalculate total price
				total_price = 0;
				$('.menu-item').each(function(i,e){
					total_price += $(this).data('price') * $(this).data('count');
				});
				if (total_price == 0) {
					$('#status').addClass('empty');
					$('#order-button')[0].disabled = true;
				} else {
					$('#status').removeClass('empty');
					$('#order-button')[0].disabled = false;
				}
				$('#status').html(total_price);
			}
		});

		var menuPage = new MenuPage();

		var Router = Backbone.Router.extend({
			routes: {
				'': 'menu',
				'menu': 'menu'
			}
		});

		var router = new Router();

		router.on('route:menu', function() {
			$('nav a, .tab-container').removeClass('active');
			$('#tab-menu').addClass('active');
			// fetch content only if it is not already there
			if ($('#tab-menu').hasClass('empty')) {

				// fetch the menu
				$.ajax({
					method: "GET",
					url: "/menu",
					dataType: "json",
					data: {
						viewer_id: id, auth_key: auth_key
					},
					success: function (data) {
						if (data.menu)
						{
							template = _.template($("#tab-menu-template").html(), {
								menu: data.menu
							});
							$('#tab-menu').html(template).removeClass('empty');
						}
						else
						{
							showMessage("Что-то пошло не так.", "Попробуйте просто обновить страницу.", function(){});
						}
					},
					error: function (x, t, m) {
						showMessage("Превышен таймаут запроса.", "Попробуйте просто обновить страницу.", function(){});
					}
				});

			}
			menuPage.render();
		});

		Backbone.history.start();

	// }, function() {
	// 	// API initialization failed 
	// 	// Can reload page here 
	// }, '5.21');

</script>
