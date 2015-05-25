<div class="text-center" id="user-type-selector">
	<h1 class="text-center" style="margin-top:100px">Ты кто?</h1>
	<button data-type="0">Я - повар</button>
	<button data-type="1">Я хочу есть!</button>
</div>
<div class="text-center" id="waiting" style="display:none; margin-top:120px">
	<h2 class="text-center">ща, погодь...</h2>
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
				auth_key: auth_key,
				type: type
			},
			success: function() {
				location.reload();
			}
		});
	});

</script>