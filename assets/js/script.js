var highestItem = function(div) {
	var highest = null;
	var hi = 0;
	$(div).each(function(){
	  var h = $(this).height();
	  if(h > hi){
	     hi = h;
	     highest = $(this);  
	  }    
	});
	if(highest != null)
		$(div).css("height", highest.height());
}
highestItem(".services h3");
highestItem(".options p");

$(document).ready(function(){
	$( "#tabs" ).tabs();
	$( "#tabs-plate" ).tabs();

	$(".plate .description-plate #tabs-plate ul li a").on("click", function() {
		$(".plate .description-plate #tabs-plate ul li a").removeClass("active")
		$(this).addClass("active")
	});

	var text_message = $("#message p");
	var id_message = $("#message");

	var messageFunction = function(msg) {
	  	text_message.text(msg);
	  	id_message.fadeIn("slow");
		setTimeout(function(){
		id_message.fadeOut("slow");
		}, 3000);
	}

	$.datepicker.regional['es'] = {
		closeText: "Cerrar",
		prevText: "&#x3C;Ant",
		nextText: "Sig&#x3E;",
		currentText: "Hoy",
		monthNames: [ "enero","febrero","marzo","abril","mayo","junio",
		"julio","agosto","septiembre","octubre","noviembre","diciembre" ],
		monthNamesShort: [ "ene","feb","mar","abr","may","jun",
		"jul","ago","sep","oct","nov","dic" ],
		dayNames: [ "domingo","lunes","martes","miércoles","jueves","viernes","sábado" ],
		dayNamesShort: [ "dom","lun","mar","mié","jue","vie","sáb" ],
		dayNamesMin: [ "D","L","M","X","J","V","S" ],
		weekHeader: "Sm",
		dateFormat: "dd/mm/yy",
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: "" 
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);

	var date = new Date();

	$(".datepick").datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: (date.getFullYear() - 100) + ':' + (date.getFullYear() - 18)
	});

	$(".datepick").keydown(function() {
		return false;
	});

  $('.slides').slick({
    infinite: true,
  	slidesToShow: 3,
  	slidesToScroll: 3,
  	arrows: true,
  	prevArrow: '<i class="fa fa-angle-left slick-f4u-left"></i>',
  	nextArrow: '<i class="fa fa-angle-right slick-f4u-right"></i>',
  	responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 800,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 500,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	]

  });

$('body').click(function() {
 	$("#login").fadeOut();
 	$('body').removeClass('stop-scrolling');
 	$("#platos").fadeOut("slow");
});

$("body").on("click", "#login .form-login, .menu a#inicia-sesion, #mis-platos, #platos", function(e) {
	e.stopPropagation();
});


  $(".menu a#inicia-sesion").on("click", function(e) {
  	e.preventDefault();
  	$("#login").fadeIn();
  	$('body').addClass('stop-scrolling');
  });

  $("#login .form-login .close a").on("click", function(e) {
  	e.preventDefault();
  	$("#login").fadeOut();
  	$('body').removeClass('stop-scrolling');
  });

  $(".registro form").on("submit", function(e) {
  	e.preventDefault();
  	var $me = $(this);
  	var data_form = $me.serialize();

  	$.ajax({
		url: $me.attr("action"),
		method: "post",
		data: data_form,
		success: function(resp) {
			if(resp == "true") {
				alert("Registrado correctamente");
				window.location.replace("perfil");
			} else {
				alert("Correo ya existe");
			}
		}
	});
  });

  $(".inicio-sesion form").on("submit", function(e) {
  	e.preventDefault();
  	var $me = $(this);
  	var data_form = $me.serialize();

  	$.ajax({
		url: $me.attr("action"),
		method: "post",
		data: data_form,
		success: function(resp) {
			
			if(resp == "true") {
				messageFunction("Iniciando sesión...");
				setTimeout(function() {
					window.location.replace("perfil");
				}, 1500);
				
				
			} else {
				messageFunction("Usuario y/o contraseña incorrecto");
			}
		}
	});
  });

  $(".profile #tabs-1 form").on("submit", function(e) {
  	e.preventDefault();

  	var $me = $(this);
  	
  	$.ajax({
		url: $me.attr("action"),
		method: "post",
		data: $me.serialize(),
		success: function(resp) {
			
			alert(resp);
		}
	});
  });

  $(".plato-btn a:first-child").on("click", function(e) {
  	e.preventDefault();

  	var $me = $(this);

  	var data_plate = $me.attr("data-plate").split(",");

  	$.ajax({
		url: $me.attr("data-action"),
		method: "post",
		data: {
			id: data_plate[0],
			nombre: data_plate[1],
			precio: data_plate[2],
			cantidad: data_plate[3],
			imagen: data_plate[4]
		},
		success: function(resp) {
			
			$("#platos").load("#platos .platos-load");
			$("#mis-platos > span").load("#mis-platos span.count");

		}
	});
  });

  	$("body").on("click", "#platos table a.delete-item", function(e) {
  		e.preventDefault();

  		var id = $(this).attr("data-id");
		
		$.ajax({
			url: "processUser/eliminar_item",
			method: "post",
			data: {
				id: id
			},
			success: function() {
				$("#platos").load("#platos .platos-load");
				$("#mis-platos > span").load("#mis-platos span.count");
			}
		});
	});

  $("#mis-platos").on("click", function(e) {
  	e.preventDefault();
	$("#platos").fadeToggle("slow");
  });

  $("#select-menu").on("change", function() {
  	var id = $(this).val();

  	$.ajax({
		url: "processCalculator/food_item",
		method: "post",
		data: {
			id: id
		},
		success: function(resp) {
			$("#select-item").html(resp);
		}
	});
  });

  $("#select-item").on("change", function() {
  	var $me = $(this);
  	var id = $me.val();
  	var id_menu = $('#select-item option:selected').attr("data-menu");
  	var per = "";

  	$.ajax({
  		url: "processCalculator/food_title",
  		method: "post",
  		data: {
  			id: id,
  			id_menu: id_menu
  		},
  		success: function(resp) {
  			$("#title-content").html(resp);

  			var option = $("input:checked").map(function () {return this.value;}).get().join(",");
  			var array_option = option.split(",");
  			var array_option_length = $("input[type='checkbox']").length;

  			for (var i = 0 ;i<array_option_length; i++) {
  				for(var j = 0; j<array_option_length; j++) {
	  				if((i+1) == array_option[j]) {
	  					var name = $("input[name='option" + (i+1) + "'] + span").html();
	  					per += '<div class="content-option""><input type="number" value="1" min="1"><label for="">' + name + '</label><button class="delete-option" data-id="' + (i+1) + '">X</button></div><br>';
	  				}
	  			}
  			}

  			$("#personalize").html(per);

  			$(".delete-option").on("click", function() {
  				var data_id = $(this).attr("data-id");
  				$("input[name='option" + data_id + "']").attr("checked", false);
  				$(this).parent().remove();
  			});

  			$("#title-content input[type='checkbox']").mousedown(function() {
  				var id = $(this).val();
  				alert($(".content-option button[data-id='" + id + "']").attr("data-id"));

  				if($(".content-option button[data-id='" + id + "']").attr("data-id") == id) {
  					$(this).parent().remove();
  				} else {
  					$(".content-option:last-child").append("mi ultimo div");
  				}
  			});
  		}
  	});
  });

	$("body").on("submit", "form#countPlate", function(e) {
		e.preventDefault();

		var $me = $(this);

		$.ajax({
	  		url: $me.attr("action"),
	  		method: $me.attr("method"),
	  		data: $me.serialize(),
	  		success: function(resp) {
	  			alert(resp);
	  			$("#platos").load("#platos .platos-load");
				$("#mis-platos > span").load("#mis-platos span.count");
	  		}
	  	});

	})
});