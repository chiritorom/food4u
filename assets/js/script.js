$(document).ready(function(){
	$( "#tabs" ).tabs();
  $('.slides').slick({
    infinite: true,
  	slidesToShow: 3,
  	slidesToScroll: 3,
  	arrows: true,
  	prevArrow: '<button type="button" class="slick-prev">Previous</button>',
  	nextArrow: '<button type="button" class="slick-next">Next</button>',
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
				alert("Ha iniciado sesión correctamente");
				window.location.replace("perfil");
			} else {
				alert("Usuario y/o contraseña incorrecto");
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
});