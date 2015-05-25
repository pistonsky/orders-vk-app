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

	VK.init(function() {

		var id = <?php echo $_GET['viewer_id'];?>; // id vkontakte
		var auth_key = "<?php echo $_GET['auth_key'];?>";

		var Router = Backbone.Router.extend({
			routes: {
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
							$('#menu-table').dataTable({
								// aaSorting: [[3, "desc"]],
								data: data.menu,
								columns: [
									{title:"ID"},
									{title:"Название блюда"},
									{title:"Описание, состав"},
									{title:"Цена"},
									{title:"В наличии/нет"}
								],
								oLanguage: {
									"sProcessing":   "Подождите...",
									"sLengthMenu":   "Показать _MENU_ записей",
									"sZeroRecords":  "Записи отсутствуют.",
									"sInfo":         "Записи с _START_ до _END_ из _TOTAL_ записей",
									"sInfoEmpty":    "Записи с 0 до 0 из 0 записей",
									"sInfoFiltered": "(отфильтровано из _MAX_ записей)",
									"sInfoPostFix":  "",
									"sSearch":       "Поиск:",
									"sUrl":          "",
									"oPaginate": {
										"sFirst": "Первая",
										"sPrevious": "Предыдущая",
										"sNext": "Следующая",
										"sLast": "Последняя"
									},
									"oAria": {
										"sSortAscending":  ": активировать для сортировки столбца по возрастанию",
										"sSortDescending": ": активировать для сортировки столбцов по убыванию"
									}
								}
							});
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
		});

		Backbone.history.start();

	}, function() {
		// API initialization failed 
		// Can reload page here 
	}, '5.21');

</script>