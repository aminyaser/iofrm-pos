/*global $, document*/
$(document).ready(function () {
    
    'use strict';
    
    var rtl = false;
    
    if ($("html").attr("lang") === 'ar') {
        rtl = true;
    }

    $('.cIn-remove').click(function () {
        $(this).parent().remove();
    });

    
    
    $(document).on('click', '.dropdown.filter_pro', function (e) {
        e.stopPropagation();
    });
    $(".btn_filter_action").click(function () {
        $(this).parent().parent().removeClass('open');
    });
    
    $(".hamburger").click(function () {
        $("body,html").addClass('menu-toggle');
        $(".hamburger").addClass('active');
    });
    $(".m-overlay").click(function () {
        $("body,html").removeClass('menu-toggle');
        $(".hamburger").removeClass('active');
    });
	
	
	$(".hamburger1").click(function () {
        $("body,html").addClass('menu-toggle1');
        $(".hamburger1").addClass('active');
    });
    $(".m-overlay1").click(function () {
        $("body,html").removeClass('menu-toggle1');
        $(".hamburger1").removeClass('active');
    });
    
    
    
    
    $("#homeSlider").owlCarousel({
        items:  4,
        loop: true,
        rtl: true,
        margin: 30,
        responsiveClass: true,
        nav: true,
        dots: true,
        smartSpeed: 500,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        navText: ['<span><img src="images/fixed_Img/arrow-right.svg"></span>', '<span><img src="images/fixed_Img/arrow-right.svg"></span>']
    });
        

    
    $("#popular_slide").owlCarousel({
 
        loop: true,
        margin: 30,
        rtl: rtl,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 1
            },
            767: {
                items: 1
            },
            991: {
                items: 1
            },
            1199: {
                items: 1
            }
        },
        dots: false,
        nav: true,
        navText: ['<i class="ti-angle-left"></i>',
                 '<i class="ti-angle-right"></i>'],
        autoplay: false
    });
    
    
    $("#popular_slide_news").owlCarousel({
        items: 4,
        loop: false,
        margin: 30,
        rtl: rtl,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2
            },
            500: {
                items: 3
            },
            767: {
                items: 3
            },
            991: {
                items: 3
            },
            1199: {
                items: 3
            }
        },
        dots: false,
        nav: true,
        navText: ['<i class="ti-angle-left"></i>',
                 '<i class="ti-angle-right"></i>'],
		smartSpeed: 1000,
        autoplay: true,
        autoplayTimeout: 500,
    });
	
	
	
	
	
	    $("#popular_slide_news2").owlCarousel({
 
        loop: true,
        margin: 30,
        rtl: rtl,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 1
            },
            767: {
                items: 1
            },
            991: {
                items: 1
            },
            1199: {
                items: 1
            }
        },
        dots: false,
        nav: true,
        navText: ['<i class="ti-angle-left"></i>',
                 '<i class="ti-angle-right"></i>'],
		smartSpeed: 1000,
        autoplay: true,
        autoplayTimeout: 1200,
    });
    
    
    (function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
            });
        };

            $.fn.countTo.defaults = {
                from: 0,              
                to: 0,                
                speed: 1000,          
                refreshInterval: 100,  
                decimals: 0,          
                formatter: formatter,  
                onUpdate: null,        
                onComplete: null       
            };

            function formatter(value, settings) {
                return value.toFixed(settings.decimals);
            }
        }(jQuery));

        jQuery(function ($) {
          $('.count-number').data('countToOptions', {
            formatter: function (value, options) {
              return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
          });

          // start all the timers
          $('.timer').each(count);  

          function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
          }

		$("#toTop").click(function () {
        	$("html, body").animate({scrollTop: 0}, 1000);
    	});
		$(".hamburger2").click(function(){
			$(".contact-page").toggle(1000);
		});		
		});
		
		
		
		
		
    
});



