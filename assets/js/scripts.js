(function( $ ) {
	$.fn.sliderPibaa = function(options) {

		var defaults = {
			data: [],
			classActive: 'slider__nav__item--active',
			classWrap: '.slider__wrap',
			classItemSlider: '.slider__item',
			interval: true,
			intervalSpeed: 5000,
			itemsPerPage: 1,
			navSlider: true,
			wrapNavClass: '.slider__nav',
			navItemSlider: '<a href="#"></a>',
			navItemClass: 'slider__nav__item',
			gutter: 0
		};

		var options = $.extend({}, defaults, options)

		var Slider = function (element, options) {

			this.el = element;
			this.$el = $(element);

			this.options = options;
			this.init();
		}

		Slider.prototype = {

			itemsPerPage: 1,
			totalItems: 0,
			active: 1,
			wBody: 0,
			runInterval: '',
			config: {
				item_width: 0,
				left_value: 0
			},

			init: function() {
				this.reset();
				this.bindEvents();
			},

			reset: function() {
				
				var $wrap = this.$el.find(this.options.classWrap),
					$itemSlider = this.$el.find(this.options.classItemSlider);
				
				// this.wBody = this.$el.width();
				this.wBody = this.$el.find('.slider__outer').width();
				this.itemsPerPage = this.options.itemsPerPage;
				this.totalItems = Math.ceil(this.$el.find(this.options.classItemSlider).length / this.itemsPerPage);


				$itemSlider.css('width', this.wBody / this.itemsPerPage + 'px');
				$wrap.css('width', this.totalItems * this.wBody + 'px');
				
				//grab the width and calculate left value
				this.config.item_width = $itemSlider.outerWidth(); 

				if(this.options.gutter > 0) {
					this.config.left_value = (this.config.item_width * (-1)) + (-this.options.gutter);
				} else {
					this.config.left_value = this.config.item_width * (-1);
				}

				//move the last item before first item, just in case user click prev button
				this.$el.find(this.options.classItemSlider).first().before(this.$el.find(this.options.classItemSlider).last());
				
				//set the default item to the correct position 
				$wrap.css({'left' : this.config.left_value});
			},

			createNav: function() {

				var $wrapNav = this.$el.find(this.options.wrapNavClass),
					itemNav = '';

				$wrapNav.empty();

				for(var i=1; i<=this.totalItems; i++ ){
					itemNav = $(this.options.navItemSlider);
					itemNav.addClass(this.options.navItemClass);
					itemNav.text(i);
					itemNav.data('item-slider', i);

					if(i==1) {
						itemNav.addClass(this.options.classActive);
					}

					$wrapNav.append(itemNav);
				}

			},

			bindEvents: function() {

				var self = this;

				this.$el.find('.slider__nav__item--left').click(function(){
					self.previous();

					return false;
				});

				this.$el.find('.slider__nav__item--right').click(function(){
					self.next();

					return false;
				});

				if(self.options.navSlider) {
					self.createNav();	
				}

				this.$el.find('.'+this.options.navItemClass).click(function(){
					
					var itemSlider = $(this).data('item-slider');
					
					if(itemSlider!=self.active) {

						if(itemSlider > self.active) {
							self.navSliderFoward(itemSlider);
						} else {
							self.navSliderBack(itemSlider);
						}

						self.$el.find('.' + self.options.classActive).removeClass(self.options.classActive);
						$(this).addClass(self.options.classActive);
					}

					return false;                        
				});

				if(this.options.interval) {

					$(this.$el).hover(
						function() {
							clearInterval(self.runInterval);
						}, 
						function() {
							self.runInterval = setInterval(function(){
								self.next();
							}, self.options.intervalSpeed);
						}
					); 

				
					this.runInterval = setInterval(function(){
						self.next();
					}, self.options.intervalSpeed);
				}
			},

			previous: function() {
				this.active--;
				
				if(this.active <= 1) {
					this.active = 1;
				}

				this.showSlider(false);
			},

			next: function() {                     
				
				this.active++;
				
				if(this.active > this.totalItems) {
					this.active = 1;
				}

				this.showSlider(true);
			},

			navSliderFoward: function(itemSlider) {

				var self = this,
					left = parseInt(itemSlider * this.$el.width()),
					$wrap = self.$el.find(self.options.classWrap),
					leftIndent = left + parseInt($wrap.css('left')),
					$firstItem = self.$el.find(self.options.classItemSlider).first(),
					$lastItem = self.$el.find(self.options.classItemSlider).last();					

				var diff = itemSlider - self.active;
				if(diff == 1) {
					leftIndent = parseInt($wrap.css('left')) - self.config.item_width;
				}

				$wrap.animate({left: leftIndent}, 'fast', function(){
					
					for(var i = self.active; i < itemSlider; i++ ) {

						$firstItem = self.$el.find(self.options.classItemSlider).first();
						$lastItem = self.$el.find(self.options.classItemSlider).last();
						
						$lastItem.after($firstItem);
					}

					self.active = itemSlider;
					$wrap.css({'left' : self.config.left_value});

					// console.log(self.$el.find(self.options.classItemSlider).first().html(), ' fisrt');
				});
			},

			navSliderBack: function(itemSlider) {
				
				var self = this,
					left = parseInt(itemSlider * this.$el.width()),
					$wrap = self.$el.find(self.options.classWrap),
					leftIndent = parseInt($wrap.css('left')) + left,
					$firstItem = self.$el.find(self.options.classItemSlider).first(),
					$lastItem = self.$el.find(self.options.classItemSlider).last();

				var diff = self.active - itemSlider;
				if(diff == 1) {
					leftIndent = parseInt($wrap.css('left')) + self.config.item_width;
				}

				$wrap.animate({left: leftIndent}, 'fast', function(){
					
					for(var i = self.active; i > itemSlider ; i-- ) {

						$firstItem = self.$el.find(self.options.classItemSlider).first();
						$lastItem = self.$el.find(self.options.classItemSlider).last();
						
						$firstItem.before($lastItem);
					}

					self.active = itemSlider;
					$wrap.css({'left' : self.config.left_value});
				});
			},

			showSlider: function(isNext) {
				//get the right position
				var self = this,
					$wrap = self.$el.find(self.options.classWrap),
					$firstItem = self.$el.find(self.options.classItemSlider).first(),
					$lastItem = self.$el.find(self.options.classItemSlider).last(),
					left_indent = 0;

				if(isNext) {
					left_indent = parseInt($wrap.css('left')) - self.config.item_width;	
				} else {
					left_indent = parseInt($wrap.css('left')) + self.config.item_width;
				}
				
				//slide the item
				$wrap.animate({'left' : left_indent}, 200, function () {
					
					//move the first item and put it as last item
					
					if(isNext) {
						$lastItem.after($firstItem);
					} else {
						$firstItem.before($lastItem);
					}
					
					//set the default item to correct position
					$wrap.css({'left' : self.config.left_value});
				});                

				var $wrapNav = this.$el.find(this.options.wrapNavClass),
					itemActive = $wrapNav.find('a').eq((this.active-1));
				
				$wrapNav.find('.' + this.options.classActive).removeClass(this.options.classActive);
				$(itemActive).addClass(this.options.classActive);
			}

		};

		$(this).each(function() {
			return new Slider($(this), options);
		});
	};

})( jQuery );
'use strict';
$(document).ready(function(){
	Pibaa.init();
});

var Pibaa = {

	config: {
		small: 767,
		medium: 939,
	},

	isMobile: function(){
		if($(window).width() > Pibaa.config.small) {
			return false;
		} else {
			return true;
		}
	},

	isTablet: function(){
		if($(window).width() > Pibaa.config.medium) {
			return false;
		} else {
			return true;
		}
	},
	
	init: function() {
		var self = this;
		
		var SPMaskBehavior = function (val) {
			return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
		};

		var spOptions = {
			onKeyPress: function(val, e, field, options) {
				field.mask(SPMaskBehavior.apply({}, arguments), options);
			}
		};

		$('.js-slider-intro').sliderPibaa({
			interval: true
		});

		$('.ultimos-eventos__item__date').each(function() {
			var newText = $(this).text().split(' - ');
			$(this).text(newText[0]);
		});

		if(Pibaa.isMobile()) {
			$('.js-slider-programacao').sliderPibaa({
				interval: true,
				navSlider: false,
				itemsPerPage: 1
			});

			$('.js-slider-ministerios').sliderPibaa({
				interval: true,
				navSlider: false,
				itemsPerPage: 1
			});

			$('.js-nav').css('height', $(window).height() - 77 + 'px');
		} else if(Pibaa.isTablet()) {
			$('.js-slider-programacao').sliderPibaa({
				interval: true,
				navSlider: false,
				itemsPerPage: 2,
				gutter: 20
			});

			$('.js-slider-ministerios').sliderPibaa({
				interval: true,
				navSlider: false,
				itemsPerPage: 3,
				gutter: 14
			});
		} else {
			$('.js-slider-programacao').sliderPibaa({
				interval: true,
				itemsPerPage: 4,
				navSlider: false,
				gutter: 20
			});

			$('.js-slider-ministerios').sliderPibaa({
				interval: true,
				navSlider: false,
				itemsPerPage: 5,
				gutter: 14
			});
		}

		$('.js-mask-birthday').mask('00/00/0000', {
			placeholder: '__/__/____'
		});

		$('.js-mask-tel').mask(SPMaskBehavior, spOptions);

		self.bindEvents();
		self.pgm();
		self.contato();
	},

	bindEvents: function() {

		$('.js-open-nav').click(function() {
			$('.js-nav').slideToggle('fast');
		});

		if(Pibaa.isTablet()) {

			if($('.js-nav ul li').has('.sub-menu')) {
				$('.sub-menu').show();
			}

			// $('.menu-item > a').click(function() {
			// 	return false;
			// });
		}
	},

	pgm: function() {
		$('.js-pgm-item').hide();
		$('.js-pgm-item').first().show();

		$('#faixa-etaria').change(function() {
			var $pgm = $('#' + $(this).val());
			$('.js-pgm-item').fadeOut('fast');
			setTimeout(function() {
				$pgm.fadeIn('fast');
			}, 200);
		});
	},

	contato: function() {
		var selectData = window.location.search.substr(1).split('=');

		if(selectData[2] === 'pgm') {
			$('#assunto option[value=' + selectData[2].toUpperCase() + ']').attr('selected', 'selected');
		}
	}
};