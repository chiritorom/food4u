$('aside ul > li a ').filter(function() {
        return this.href.split('/')[6] == location.href.split('/')[6];
    }).addClass('active');

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

			$('.img-plate input').change(function(e) {
		      addImage(e); 
		     });

		     function addImage(e){
		      var file = e.target.files[0],
		      imageType = /image.*/;
		    
		      if (!file.type.match(imageType))
		       return;
		  
		      var reader = new FileReader();
		      reader.onload = fileOnload;
		      reader.readAsDataURL(file);
		     }
		  
		     function fileOnload(e) {
		      var result=e.target.result;
		      $('.img-plate img').attr("src",result);
		     }
			
			$("#modal-plate .form-plate .button-close a, #modal-plate .form-plate .content-form button:last-child").on("click", function(e) {
				e.preventDefault();
				$("#modal-plate").toggle();
			});
		}
	});
});

$(".table-plate .group-delete a:first-child").on("click", function(e) {
	e.preventDefault();

	var $me = $(this);
	var $id = $me.attr("data-id");

	$.ajax({
		url: $me.attr("data-action"),
		method: "post",
		data: {
			id: $id
		},
		success: function(resp) {
			alert("eliminado");
			location.reload();
		}
	});
});






















