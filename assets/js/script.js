$(document).ready(function(){
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
/*
  $("#login").on("click", function(e) {
  	e.preventDefault();
  	$("#form-login").fadeIn();
  });

  $(".close-form-login a").on("click", function(e) {
  	e.preventDefault();
  	$("#form-login").fadeOut();
  });*/
});