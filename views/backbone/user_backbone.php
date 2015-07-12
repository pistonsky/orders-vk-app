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

	function showLoading(handler) {
		var template = _.template($("#loading-template").html(), {
			
		});
		$("#loading").html(template).attr("style","display:block");
		$("#alert div.alert").css("margin-top",30 + "%");
		$("#page-container").addClass("blurred");
		$("#cancel").click(handler);
		setTimeout(function(){
			$("#cancel").fadeIn();
		}, 5000);
		setTimeout(function(){
			$("#cancel")[0].disabled = false;
		}, 7000);
	}

	// VK.init(function() {

		var id = <?php echo $_GET['viewer_id'];?>; // id vkontakte
		var auth_key = "<?php echo $_GET['auth_key'];?>";

		var MenuPage = Backbone.View.extend({
			el: '#page',
			render: function () {

			},
			events: {
				'click .menu-item': 'select',
				'mouseenter .counter': 'menu_item_counter_mouse_enter',
				'mouseleave .counter': 'menu_item_counter_mouse_leave',
				'click .counter': 'remove',
				'click #order-button': 'order',
				'click #confirm': 'confirm'
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
			menu_item_counter_mouse_enter: function (ev) {
				$(ev.currentTarget).html('X');
			},
			menu_item_counter_mouse_leave: function (ev) {
				current_count = $(ev.currentTarget).parent().data('count');
				if (current_count == 0)
					$(ev.currentTarget).html('');
				else
					$(ev.currentTarget).html(current_count);
			},
			remove: function (ev) {
				$(ev.currentTarget).parent().removeClass('selected');
				$(ev.currentTarget).parent().data('count', 0);
				$(ev.currentTarget).html('');
				this.recalculate();
				return false;
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
			},
			order: function() {
				var template = _.template($("#order-confirm-template").html(), {
					title: 'Твой заказ на '+$('#status').html()+' бат',
					message: 'Всё, заказываем?'
				});
				$("#order-confirm").html(template).show();
				$("#alert div.alert").css("margin-top",30 + "%");
				$("#page-container").addClass("blurred");
			},
			confirm: function() {
				$("#order-confirm").hide();
				items = [];
				$(".menu-item.selected").each(function(){
					items.push({
						id: $(this).data('id'),
						count: $(this).data('count')
					});
				});
				$.ajax({
					method: "POST",
					url: "/order",
					dataType: "json",
					data: {
						viewer_id: id, auth_key: auth_key,
						items: items
					},
					success: function (data) {
						if (data.success)
						{
							$("#loading").hide();
							showMessage('Всё, готово.', 'Жди хавку!', function(){$("#alert").fadeOut(); $("#page-container").removeClass("blurred");}, 30);
							setTimeout(function(){$("#alert").fadeOut(); $("#page-container").removeClass("blurred");}, 3000);
						}
						else
						{
							showMessage("Что-то пошло не так.", "Пистонский лажает! Скажи ему, что он хреновый кодер.", function(){});
						}
					},
					error: function (x, t, m) {
						showMessage("Превышен таймаут запроса.", "Чё опять с интернетом?", function(){});
					}
				});
				showLoading(function(){
					$("#loading").hide();
				});
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
							showMessage("Что-то пошло не так.", "Пистонский лажает! Обновляй страницу.", function(){});
						}
					},
					error: function (x, t, m) {
						showMessage("Превышен таймаут запроса.", "Чё опять с интернетом?", function(){});
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
