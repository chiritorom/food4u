$(".table-plate .group-action a:last-child").on("click", function(e) {
	e.preventDefault();

	var $me = $(this);
	var form_login = $me.serialize();

	$me.parent().parent().find(".group-action").fadeOut(function() {
		$(".table-plate .group-delete a:last-child").on("click", function(e) {
			e.preventDefault();
			var $me = $(this);
			$me.parent().parent().find(".group-action").fadeIn();
		});
	});
});

$(".table-plate .group-action a:first-child").on("click", function(e) {
	e.preventDefault();
	var $me = $(this);
	var $id = $me.attr("data-id");
	
	$.ajax({
		url: $me.attr("data-action"),
		method: "post",
		data: {
			id: $id
		},
		beforeSend: function(resp) {
			$("#modal-plate").toggle();
			$("#modal-plate").html('<div class="loading"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>');
			
		},
		success: function(resp) {
			$("#modal-plate").html(resp);
			
			$("#modal-plate .form-plate .button-close a, #modal-plate .form-plate .content-form button:last-child").on("click", function(e) {
				e.preventDefault();
				$("#modal-plate").toggle();
			});
		}
	});
});

$(".add-plate button").on("click", function() {
	$.ajax({
		url: $(this).attr("data-action"),
		method: "post",
		success: function(resp) {
			$("#modal-plate").html(resp);
				$("#modal-plate").toggle();
			
			$("#modal-plate .form-plate .button-close a, #modal-plate .form-plate .content-form button:last-child").on("click", function(e) {
				e.preventDefault();
				$("#modal-plate").toggle();
			});
		}
	});
});




















