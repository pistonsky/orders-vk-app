<h1 class="center">Ты кто?</h1>
<div class="center" id="user-type-selector">
	<button data-type="0">Я - работодатель</button>
	<button data-type="1">Я ищу работу</button>
</div>
<div class="center" id="waiting" style="display:none">
	<h2 class="center">подождите...</h2>
</div>

<script>

	var viewer_id = "<?= $_GET['viewer_id'] ?>";
	var auth_key = "<?= $_GET['auth_key'] ?>";

	$('button').click(function(){
		$('#user-type-selector').hide();
		$('#waiting').show();
		var type = $(this).data('type');
		$.ajax({
			url: "/typechange",
			type: "GET",
			data: {
				viewer_id: viewer_id,
				auth_key: auth_key
				type: type
			},
			success: function() {
				location.reload();
			}
		});
	});

</script>