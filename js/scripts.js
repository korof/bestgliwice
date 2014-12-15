window.onload = function () {
  aload();

  var imgLoad = imagesLoaded('#newsy');
  imgLoad.on( 'progress', function( instance, image ) {
    var result = image.isLoaded ? 'loaded' : 'broken';
    if(image.isLoaded) {
  	  setTimeout(function() {
  	  	var p = image.img.parentNode;
  	  	image.img.classList.add('fadeIn');
  	  	p.nextElementSibling.classList.add('fadeInUp');
  	  },10);
  	}
  });
};


(function($) {

	var $window = $(window);

	var Mobile = {

		menu: null,
		hasChildren: null,

		init: function() {
			this.menu = $('#menu');
			this.hasChildren = $('.menu-item-has-children');
			this.rwdMenu();
		},

		rwdMenu: function() {
			var _self = this;

			$('.js-rwd_menu').on('click', function(e) {
				e.preventDefault();
				// e.stopPropagation();
				_self.menu.toggleClass('open');
				_self.hasChildren.removeClass('open-submenu');
			});

			$('.menu-item-has-children').on('click', function(e) {
				e.preventDefault();
				_self.hasChildren.not(this).removeClass('open-submenu');
				$(this).toggleClass('open-submenu');
			});


			$('.menu_item__logo_best').insertAfter( $('#menu_first') );
		}
	};

	var Desktop = {

		init: function() {
			this.stickyMenu();
		},

		stickyMenu: function() {

			var nav = $('.navigation')[0];
			  
			var stickyNav = function(){  
				var scrollTop = $window.scrollTop();  
				         
				// $('.navigation').toggleClass('sticky', scrollTop > 56 );   
				nav.classList.toggle('sticky', scrollTop > 56 );   

			};  
			  
			stickyNav();  
			  
			$window.scroll(function() {  
			    stickyNav();  
			});  
		}

	};

	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		Mobile.init();
	} else {
		Desktop.init();
	}

	$(".owl-carousel").owlCarousel({
		items: 1,
		// lazyLoad: true,
		autoplay: true,
		nav: true,
		loop: true,
		navText: ['<span class="icon-next"></span>', '<span class="icon-next"></span>']
	});

	$('textarea').autosize();

	$('.js-alink').on('click', function() {
		window.location = $(this).data('url');
	});
	

  	$('input, textarea')
	  .focus(function() {
	  	var elem = $(this).parent();

	  	elem.addClass('used');
	  })
	 .blur(function() {
	 	var elem = $(this).parent();

	    if (!$(this).val()) {
	      elem.removeClass('used');
	    }
	      
	  });

})(jQuery);