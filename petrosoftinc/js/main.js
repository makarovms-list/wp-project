/** 
 * Forward port jQuery.live()
 * Wrapper for newer jQuery.on()
 * Uses optimized selector context 
 * Only add if live() not already existing.
*/
if (typeof jQuery.fn.live == 'undefined' || !(jQuery.isFunction(jQuery.fn.live))) {
  jQuery.fn.extend({
      live: function (event, callback) {
         if (this.selector) {
              jQuery(document).on(event, this.selector, callback);
          }
      }
  });
}
/**
 * Returns the Popup class.
 *
 * Unfortunately, the Popup class can only be defined after
 * google.maps.OverlayView is defined, when the Maps API is loaded.
 * This function should be called by initMap.
 */
function petrosoftCreateMapPopupClass() {
  /**
   * A customized popup on the map.
   * @param {!google.maps.LatLng} position
   * @param {!Element} content The bubble div.
   * @constructor
   * @extends {google.maps.OverlayView}
   */
  function Popup(position, content) {
    this.position = position;

    content.classList.add('popup-bubble');

    // This zero-height div is positioned at the bottom of the bubble.
    var bubbleAnchor = document.createElement('div');
    bubbleAnchor.classList.add('popup-bubble-anchor');
    bubbleAnchor.appendChild(content);

    // This zero-height div is positioned at the bottom of the tip.
    this.containerDiv = document.createElement('div');
    this.containerDiv.classList.add('popup-container');
    this.containerDiv.appendChild(bubbleAnchor);

    // Optionally stop clicks, etc., from bubbling up to the map.
    google.maps.OverlayView.preventMapHitsAndGesturesFrom(this.containerDiv);
  }
  // ES5 magic to extend google.maps.OverlayView.
  Popup.prototype = Object.create(google.maps.OverlayView.prototype);

  /** Called when the popup is added to the map. */
  Popup.prototype.onAdd = function() {
    this.getPanes().floatPane.appendChild(this.containerDiv);
  };

  /** Called when the popup is removed from the map. */
  Popup.prototype.onRemove = function() {
    if (this.containerDiv.parentElement) {
      this.containerDiv.parentElement.removeChild(this.containerDiv);
    }
  };

  /** Called each frame when the popup needs to draw itself. */
  Popup.prototype.draw = function() {
    var divPosition = this.getProjection().fromLatLngToDivPixel(this.position);

    // Hide the popup when it is far out of view.
    var display =
        Math.abs(divPosition.x) < 4000 && Math.abs(divPosition.y) < 4000 ?
        'block' :
        'none';

    if (display === 'block') {
      this.containerDiv.style.left = divPosition.x + 'px';
      this.containerDiv.style.top = divPosition.y + 'px';
    }
    if (this.containerDiv.style.display !== display) {
      this.containerDiv.style.display = display;
    }
  };

  return Popup;
}

/**
 * Send GTM Event
 * @param string eventName
 */
function petrosoftSendGtmEvent(eventName) {
  dataLayer.push({'event': eventName});
  console.log('sended event ' +  eventName);
} 

(function ($) {
  
     var headerHeightHandler = {
      setHeaderWrapperHeight : function(eventName) {
        if (typeof eventName === 'undefined') {
          var eventName = 'none';
        }
        var height = 0;
        if ($(window).width() > 992) {
          var height = $('#header_container_block').outerHeight(true);
        } else {
          var height = $('.header_conteiner_fixed2.mobile').outerHeight(true);
        }
        $('.header-wrapper').css('height',height +'px');
        $('.theme-panel-mobile-menu').css('top',height + 'px');
        if ($('.blog-menu-wrapper').length > 0) {
          $('.blog-menu-wrapper').css('top',height + 'px');
        }
        
        if ($('.main-page-banner-block').length > 0) {
          $('.main-page-banner-block .mb-btn-wrapper .btn').css('top',height + 'px');
        }
        
        for (var i = 0; i < headerHeightHandler.listeners.length; i++) {
          headerHeightHandler.listeners[i](height, eventName);
        }
      },
      listeners : [],
      onChange : function(func) {
        headerHeightHandler.listeners.push(func);
      }
    }
  
  $(document).ready(function(){
    //Change form with pipes class text & values
    $('.wpcf7-pipes .wpcf7-form .wpcf7-select option').each(function(index,element) {
      //split element text by "|" divider
      var data = element.text.split('|');

      //replace text and value of option
      $(this).val(data[1]);
      $(this).text(data[0]);
    });
    // header
    
 

    headerHeightHandler.setHeaderWrapperHeight('init');
    if (jQuery('#map-block').length < 1) {
      window.scrollTo(0,0);
    }
    $(window).resize(function() {
      headerHeightHandler.setHeaderWrapperHeight('resize');
    });
    // messages widgets
    $(".petrosoft-message-widget" ).each(function( index ) {
      var messageWidget = this;
      var meessageId = $(this).data("message-id");
      var delay = $(this).data("show-delay");
      if (delay == 0) {
        if (jQuery.cookie('hide-message-' + meessageId) != 'true') {
          $(messageWidget).slideDown({progress: function(){headerHeightHandler.setHeaderWrapperHeight('messageWiget');}});
        }
      } else {
        setTimeout(function(){
          if (jQuery.cookie('hide-message-' + meessageId) != 'true') {
            $(messageWidget).slideDown({progress: function(){headerHeightHandler.setHeaderWrapperHeight('messageWiget');}});
          }
        }, delay * 1000);
      }
      var closeMessage = function() {
        $(messageWidget).slideUp({progress: function(){headerHeightHandler.setHeaderWrapperHeight('messageWiget');}});
        $.cookie('hide-message-' + meessageId, 'true', {expires: 365});
      };
      $(this).find('.w-close').click(function(){
        closeMessage();
      });
      if ($(this).find('.w-buttons').length > 0) {
        $(this).find('.btn').each(function( btnIndex ) {
          var href = $(this).attr('href');
          if (href == '') {
            $(this).click(function(e){
              e.preventDefault();
              closeMessage();
            });
          }
        });
      }
    });
    
    jQuery(window).on("scroll", function() {
      if (jQuery(window).scrollTop() > 150) {
        jQuery('#header_container_block').addClass('header_conteiner_fixed2');
        if (jQuery(window).scrollTop() > 190) {
          headerHeightHandler.setHeaderWrapperHeight('scroll');
          setTimeout(function(){
            headerHeightHandler.setHeaderWrapperHeight('scroll');
          }, 500);
        }
      } else {
        jQuery('#header_container_block').removeClass('header_conteiner_fixed2');
        if (jQuery(window).scrollTop() < 120) {
          headerHeightHandler.setHeaderWrapperHeight('scroll');
          setTimeout(function(){
            headerHeightHandler.setHeaderWrapperHeight('scroll');
          }, 500);
        }
      }
    });
    
    /**
     * Open popup
     * @param jquery object link
     */
    var petrosoftPopupOpen = function(link) {
      var id = $(link).attr('href');
      if ($(id).hasClass('petrosoft-popup-block')) {
        $(id).addClass('open');
      } else {
        $(link).modal({
          fadeDuration: 250
        });
        $(id).on($.modal.BEFORE_CLOSE, function(event, modal) {
          $(id).find('video').trigger('pause');
          $(id).find('iframe').each(function(){
            $(id).find('iframe')[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
          });
        });
        $(id).find('.m-video-wrapper').removeClass('hidden');
        $(id).find('.m-data-container').removeClass('hidden');
        $(id).find('.schedule-demo-popup').addClass('hidden');
        $(id).find('.result-select-date').addClass('hidden');
        $(id).find('.result-scheduled').addClass('hidden');
        $(id).find('.thankyou').addClass('hidden');
      }
    }

    // open pop up from link
    $('a.open-modal').click(function(event) {
      petrosoftPopupOpen(this);
      return false;
    });
        
    // petrosoft popup
    if ($('.petrosoft-popup-block').length > 0) {
      $('.petrosoft-popup-block').each(function( index ) {
        var popup = this;
        $(popup).find('.p-close').click(function(){
          $(popup).removeClass('open');
        });
      });
    }
        
    // Replace all SVG images with inline SVG
    jQuery('img.svg').each(function(){
      var $img = jQuery(this);
      var imgID = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL = $img.attr('src');

      jQuery.get(imgURL, function(data) {
          // Get the SVG tag, ignore the rest
          var $svg = jQuery(data).find('svg');

          // Add replaced image's ID to the new SVG
          if(typeof imgID !== 'undefined') {
              $svg = $svg.attr('id', imgID);
          }
          // Add replaced image's classes to the new SVG
          if(typeof imgClass !== 'undefined') {
              $svg = $svg.attr('class', imgClass+' replaced-svg');
          }

          // Remove any invalid XML tags as per http://validator.w3.org
          $svg = $svg.removeAttr('xmlns:a');

          // Replace image with new SVG
          $img.replaceWith($svg);

      }, 'xml');

    });
    
    // Run auto play when you scroll to slider
    var runAutoplaySlider = function(slider) {
      $(window).scroll(function() {
        if (!slider.slick('slickGetOption', 'autoplay')) {
          var windowHeight = $(window).scrollTop();
          var sliderOffset = $(slider).offset();
          if (windowHeight > sliderOffset.top - (window.screen.height/2)) {
             setTimeout(function(){
              slider.slick('slickSetOption', {
                autoplay: true,
              }, true);
             }, 1000);
          }
        }
      });
    }
    
    // Main page banner
    if ($('.main-page-banner-block').length > 0) {
      var bannerButtons = $('.main-page-banner-block .mb-btn-wrapper .btn');
      if (bannerButtons.length > 0 ) {
        var buttonOffset = $(bannerButtons[0]).offset();
      }
      var headerHeight = 0;
      headerHeightHandler.onChange(function(height, eventName) {
        if ($(window).width() > 1139) {
          if (eventName !== 'scroll') {
            //Set main banner height for desktop
            var bottomFixedBlockHeight = $('.fixed-screen-bottom').outerHeight();
            $('.main-page-banner-block').css('height', 'calc(100vh - ' + (height+bottomFixedBlockHeight) + 'px)');
          }
        }
        // button update offset
        if (bannerButtons.length > 0 ) {
          if (!($(bannerButtons[0]).hasClass('fixed'))) {
            buttonOffset = $(bannerButtons[0]).offset();
          }
        }
        headerHeight = height;
      });
      if(!$('body').hasClass('front-page')) {
        if (bannerButtons.length > 0 && $(bannerButtons[0]).hasClass('can-be-fixed')) {
          $( window ).scroll(function() {
            if (bannerButtons.length > 0 ) {
              if (($(window).scrollTop() + headerHeight) >= buttonOffset.top) {
                $(bannerButtons[0]).addClass('fixed');          
              } else {
                $(bannerButtons[0]).removeClass('fixed');       
              }
            }
          });

          // fixed button animation
          setInterval(function(){ 
            $(bannerButtons[0]).addClass('fixed-animated');  
            setTimeout(function(){$(bannerButtons[0]).removeClass('fixed-animated');}, 1500);
          } , 7000);
        }
      }
      
      $('.main-page-banner-block .mb-go-down').click(function() {
        $([document.documentElement, document.body]).animate({
          scrollTop: $(".main-page-banner-block").offset().top + $(".main-page-banner-block").outerHeight() - 50,
        }, 2000);
      });
      $('.main-page-banner-link').click(function(){
        var href = $(this).attr('href');
        var firstCharacter = href.charAt(0);
        if (firstCharacter === '#') {
          $([document.documentElement, document.body]).animate({
            scrollTop: $(href).offset().top - 70,
          }, 2000);
          return false;
        }
      });      
    } 
    
    // blog menu mobile
    if ($('.blog-menu .icon-arrow-1').length > 0) {
      $('.blog-menu .icon-arrow-1').click(function(event){
        event.preventDefault();
        $('.blog-menu').toggleClass('opened');
      });
    }
    //fixed blog category menu
    if ($('.blog-category').length > 0) {
      var st = $(window).scrollTop();
      var blogScroll = function() {
        var newSt = $(this).scrollTop();
        if (st > newSt) {
          var scrollUp = true;
        } else {
          var scrollUp = false;
        }
        st = newSt;
        if (jQuery(window).scrollTop() >= 100) {
          if (scrollUp) {
            if (!$('.blog-menu-area').hasClass('scroll-up')) { 
               $('.blog-menu-area').addClass('scroll-up'); 
            }
          } else {
            if ($('.blog-menu-area').hasClass('scroll-up')) { 
               $('.blog-menu-area').removeClass('scroll-up'); 
            }
          }
          if (!$('.blog-menu-area').hasClass('fixed-blog')) {
            $('.blog-menu-area').addClass('fixed-blog'); 
          }
        } else {
          if ($('.blog-menu-area').hasClass('fixed-blog')) {
            $('.blog-menu-area').removeClass('fixed-blog'); 
          }
        }
      }
      blogScroll();
      jQuery(window).on("scroll", function() {
        blogScroll();
      });
    }
    
    //solutions list
    if ($('.solution-header-block').length > 0 && $('.solution-list-block').length > 0) {
      $( ".solution-header-block .sh-solution" ).each(function(index) {
        $(this).on("click", function(){
          var solutions = $(".solution-list-block .solution");
          $([document.documentElement, document.body]).animate({
            scrollTop: $(solutions[index]).offset().top - 70,
          }, 2000);
        });
      });
    }
    
    // clients slider
    if ($('.clients-slider').length > 0) {
      $('.clients-slider').on('click', 'a.open-modal', function(event) {
        event.stopPropagation();
        petrosoftPopupOpen(this);
        return false;      
      });
      var arrows = true;
      if ($('.clients-slider .c-slide').length < 2) {
        arrows = false;
        $('.clients-slider .c-slider-arrow').hide();
      }
      var clientsSlider = $('.clients-slider').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        adaptiveHeight: true,
        nextArrow: '.c-slider-nav-container .slider-next',
        prevArrow: '.c-slider-nav-container .slider-prev',
        dots: true,
        appendDots: '.c-bullets.desktop-bullets',
        arrows: arrows,
        infinite: true,
        fade: true,
        cssEase: 'linear',
          responsive: [
           {
              breakpoint: 1365,
              settings: {
                arrows: false,
                dots: true,
                adaptiveHeight: true,
                appendDots: '.c-bullets',
              }
           }
        ]
      });
      document.addEventListener('lazybeforeunveil', function(e){
        if ($(e.target).hasClass('cs-photo')) {
          setTimeout(function(){
            $('.clients-slider')[0].slick.refresh();
          }, 1000);
          
        }
      });
    }
    
    // hr managers slider
    if ($('.hr-managers-slider').length > 0) {
      var arrows = true;
      if ($('.hr-managers-slider .hr-slide').length < 2) {
        arrows = false;
        $('.hr-managers-slider .hr-slider-arrow').hide();
      }
      var clientsSlider = $('.hr-managers-slider').slick({
        autoplay: false,
        slidesToShow: 1,
        adaptiveHeight: true,
        nextArrow: '.hr-slider-nav-container .slider-next',
        prevArrow: '.hr-slider-nav-container .slider-prev',
        dots: false,
        arrows: arrows,
        infinite: true,
        fade: true,
        cssEase: 'linear',
          responsive: [
           {
              breakpoint: 1365,
              settings: {
                arrows: false,
                dots: true,
                adaptiveHeight: true,
                appendDots: '.hr-bullets',
              }
           }
        ]
      });
      document.addEventListener('lazybeforeunveil', function(e){
        if ($(e.target).hasClass('hr-photo')) {
          $('.hr-managers-slider')[0].slick.refresh();
        }
      });
    }
    
    // product data sliders
    if ($('.product-description-block').length > 0) {
      $( ".product-description-block .product-description-slider-block" ).each(function() {
        var navigation = $(this).find('.ps-nav-link');
        var arrows = true;
        if ($(this).find('.p-slider .p-slide').length < 2) {
          arrows = false;
          $(this).find('.p-slider-arrow').hide();
        }
        var slider = $(this).find('.p-slider').slick({
          autoplay: false,
          slidesToShow: 1,
          adaptiveHeight: true,
          nextArrow: $(this).find('.p-slider-nav-container .slider-next'),
          prevArrow: $(this).find('.p-slider-nav-container .slider-prev'),
          arrows: arrows,
          infinite: true,
          fade: true,
          cssEase: 'linear',
          dots: true,
          draggable: false,
          appendDots: $(this).find('.p-bullets'),
          unslick: false,
            responsive: [
             {
                breakpoint: 1365,
                settings: "unslick"
             }
          ]
        });
        var slides = $(slider).find('.p-slide');
        $(slides[0]).find('.ps-background-image').addClass('show');
        if (navigation.length > 1) {
          $(slider).on('beforeChange', function(event, slick, currentSlide, nextSlide){
            $(navigation).removeClass('active');
            $(navigation[nextSlide]).addClass('active');
            $(slides[currentSlide]).find('.ps-background-image').hide();
            $(slides[currentSlide]).find('.ps-background-image').removeClass('show');
            setTimeout(function(){
              $(slides[currentSlide]).find('.ps-background-image').show();
              $(slides[nextSlide]).find('.ps-background-image').addClass('show');
            }, 500);
          });
          $(navigation).each(function(index) { 
            $(this).click(function(){
              $(slider).slick('slickGoTo', index, false);
            });
          });
        }
      });
    }
    
    // Front page resources slider
    
    if ($('.resources-slider').length > 0) {
      var arrows = true;
      if ($('.resources-slider .r-slide').length < 2) {
        arrows = false;
        $('.resources-slider .r-slider-arrow').hide();
      }
      var resourcesSlider = $('.resources-slider').slick({
        autoplay: false,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        adaptiveHeight: true,
        nextArrow: '.r-slider-nav-container .slider-next',
        prevArrow: '.r-slider-nav-container .slider-prev',
        dots: true,
        appendDots: '.r-bullets',
        arrows: arrows,
        infinite: true,
        fade: true,
        cssEase: 'linear',
          responsive: [
           {
              breakpoint: 1365,
              settings: {
                arrows: false,
                dots: true,
                adaptiveHeight: true,
                appendDots: '.r-bullets',
              }
           }
        ]
      });
    }
    
    if ($('.materials-slider').length > 0) {
      var arrows = true;
      if ($('.materials-slider .m-slide').length < 2) {
        arrows = false;
        $('.materials-slider .m-slider-arrow').hide();
      }
      var resourcesSlider = $('.materials-slider').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        adaptiveHeight: true,
        nextArrow: '.m-slider-nav-container .slider-next',
        prevArrow: '.m-slider-nav-container .slider-prev',
        dots: true,
        appendDots: '.m-bullets',
        arrows: arrows,
        infinite: true,
        fade: true,
        cssEase: 'linear',
          responsive: [
           {
              breakpoint: 1365,
              settings: {
                arrows: false,
                dots: true,
                adaptiveHeight: true,
                appendDots: '.m-bullets',
              }
           }
        ]
      });
    }
    
    //Product banner text slides
    if($('.product-banner .product-banner-slides').length > 0) {
      $('.product-banner .product-banner-slides').on('init', function(event, slick){
        $('.product-banner .product-banner-slides').css('visibility', 'visible');
      });
      var productBannerSlider = $('.product-banner .product-banner-slides').slick({
         autoplay: true,
         autoplaySpeed: 2000,
         slidesToShow: 1,
         adaptiveHeight: true,
         dots: false,
         arrows: false,
         fade: true,
         cssEase: 'linear',
         infinite: true,
         pauseOnHover:false,
         responsive: [
           {
              breakpoint: 768,
              settings: {
                adaptiveHeight: false,
              }
           }
        ]
       });

    }

    // product descriptions list
    if ($('.product-features-block').length > 0 && $('.product-description-block').length > 0) {
      $( ".product-features-block .feature" ).each(function(index) {
        $(this).on("click", function(){
          var descriptions = $(".product-description-block .product-description-slider-block");
          if ($(descriptions[index]).length > 0) {
            $([document.documentElement, document.body]).animate({
              scrollTop: $(descriptions[index]).offset().top - 70,
            }, 2000);
          }
        });
      });
    }
    
    // product descriptions list for product features v2
    if ($('.product-features-v2-block').length > 0 && $('.product-description-block').length > 0) {
      $( ".product-features-v2-block .feature" ).each(function(index) {
        $(this).on("click", function(){
          var descriptions = $(".product-description-block .product-description-slider-block");
          if ($(descriptions[index]).length > 0) {
            $([document.documentElement, document.body]).animate({
              scrollTop: $(descriptions[index]).offset().top - 70,
            }, 2000);
          }
        });
      });
    }
    
    // company history 
    if ($('.history-block .history').length > 0) {
      $('.history-block .history .history-moment').each(function(index ) {
        var historyMoment = this;
        $(this).find('.h-icon').mouseenter(function(){
          $('.history-block .history .history-moment .h-block').removeClass('opened');
          $(historyMoment).find('.h-block').addClass('opened');
        });
      });
    }
    
    // wpcf7 fileinput
    $('.wpcf7-form input[type="file"]').change(function() {
      var label = $("label[for='"+$(this).attr('id')+"']");
      var file = $(this)[0].files[0].name;
      $(label).find('.file-name').html(file);
    });
    
    // products block slider for front page
    if ($('.products-block').length > 0) {
      var productSlider = $('.products-slider').slick({
        slidesToShow: 4,    
        slidesToScroll: 1,
        dots: false,
        infinite: true,
        speed: 1000,
        fade: false,
        cssEase: 'linear',
        autoplay: false,
        autoplaySpeed: 3000,
        adaptiveHeight: true,
        variableWidth: true,
        lazyLoad: 'ondemand',
        nextArrow: $('.p-slider-nav-container').find('.slider-next'),
        prevArrow: $('.p-slider-nav-container').find('.slider-prev'),
        responsive: [
        {
           breakpoint: 1160,
           settings: "unslick"
        }],
      });

      runAutoplaySlider(productSlider);
    }
    
    if ($('.stories-slider').length > 0) {
      $('.stories-slider').on('click', 'a.open-modal', function(event) {
        event.stopPropagation();
        petrosoftPopupOpen(this);
        return false;      
      });
      var storiesSlider = $('.stories-slider').slick({
          autoplay: true,
          autoplaySpeed: 5000,
          slidesToShow: 1,
          adaptiveHeight: true,
          dots: true,
          appendDots: '.s-bullets',
          infinite: true,
          fade: true,
          cssEase: 'linear',
          arrows: false,
            responsive: [
             {
                breakpoint: 991,
                settings: {
                  arrows: false,
                  dots: true,
                  adaptiveHeight: true,
                  appendDots: '.s-bullets',
                }
             }
          ]
        });
    }
    
    //alm hide load more wrapper if empty
    var almDone = function() {
      setTimeout(function(){
        $('.alm-load-more-btn').each(function() {
          if ($(this).hasClass('done')) {
            $(this).parents('.alm-btn-wrap').addClass('done');
          }
        });
      }, 500);
    }

    window.almDone = function(alm){
      almDone();
    };
    window.almEmpty = function(alm){
      almDone();
    };
    
    // Configure solutions block
    if ($('.configure-solution-block').length > 0) {
      $('.configure-solution-block .btn').click(function(){
        var href = $(this).attr('href');
        var firstCharacter = href.charAt(0);
        if (firstCharacter === '#' && href.length > 1) {
          $([document.documentElement, document.body]).animate({
            scrollTop: $(href).offset().top - 70,
          }, 2000);
          return false;
        }
      });
    }
    
    //Live chat link
    $('.live-chat').click(function(){
      LC_API.open_chat_window();
      return false;
    });
    
    //sitemap
    if ($('.sitemap-page').length > 0) {
      $(document).on('click', '.sitemap-list .dropdown-arrow', function () {
        $(this).toggleClass('down');
        var dropdown = $(this).parent('.drop-wrap').parent('.dropdown');
        $(dropdown).toggleClass('opened');
        if($(dropdown).hasClass('opened')) {
          $(dropdown).find('ul:first').slideDown("slow");
        } else {
          $(dropdown).find('ul:first').slideUp("slow");
        }
      });
    }
    // popup group
    if ($('.popup-group-block').length > 0) {
      // Get cookie name of pop up from group
      var getPopupGroupCookieName = function(popup) {
        var currentPath = window.location.pathname;
        currentPath = currentPath.replace(/\//g, '-');
        return currentPath + '-' + $(popup).attr('id');
      }
      // Set cookie for pop up from group
      var addPopupGroupCookie = function(popup) {
        if ($.cookie(getPopupGroupCookieName(popup)) != 'hide') {
          var expires = new Date();
          expires.setTime(expires.getTime() + (6*60*60*1000)); 
          $.cookie(getPopupGroupCookieName(popup), 'hide', {expires: expires});
        } 
      }
      // Process pop ups from group
      var processPopupGroup = function() {
        $( ".popup-group-block .petrosoft-popup-block").each(function( index, element ) {
          var seconds = $(this).data("seconds");
          var popup = $(this);
          processPopupForm($(this));
          if (index === 0) {
            // Open popup by page scroll percent
            var percents = $(this).data("percents");
            if (parseInt(percents) >= 0) {
              $(window).scroll(function() {
                var scrollPercent = 100 * $(window).scrollTop() / ($(document).height() - $(window).height());
                if (scrollPercent >= percents && $.cookie(getPopupGroupCookieName(popup)) != 'hide') {
                  $(popup).addClass('open');
                  addPopupGroupCookie(popup);
                }
              });
            } else {
              setTimeout(function(){
                $(popup).addClass('open');
                addPopupGroupCookie(popup);
              }, seconds+'000');
            }
          } else {
            var popups = $( ".popup-group-block .petrosoft-popup-block");
            $(popups[index-1]).find('.p-close').click(function(){
              setTimeout(function(){
                $(popup).addClass('open');
                addPopupGroupCookie(popup);
              }, seconds+'000');
            });
          }
        });
      }
      // If popup has file, process download form
      var processPopupForm = function(popup) {
       var btn = (popup).find('.p-content .btn');
       if ($(btn).hasClass('download')) {
          $(btn).click(function(event){
            event.preventDefault();
            $(popup).find('.p-content').hide();
            $(popup).find('.p-step-2').css('display', 'flex');
            $(popup).addClass('step-2');
          });
          $(popup).find(".p-step-2 form").submit(function(event) {
            event.preventDefault();
            var mail = $(this).find('.p-email').val();
            var file = $(this).find('.p-file-url').val();
            var leadsource = $(this).find('.p-leadsource').val();
            var dataObject = {
              '004' : mail,
              '013' : leadsource,
              '015' : file,
              'source' : 'campaign',
            }
            jQuery.ajax({
              type: 'POST',
              url: 'https://analytics.clickdimensions.com/forms/h/aIDBEWlE36EaHCyU3u6zda',
              data: jQuery.param(dataObject),
              dataType: 'json',
              success: function (result) {
              },
              error: function (result) {
                $(popup).find('.p-step-2').hide();
                $(popup).removeClass('step-2');
                $(popup).find('.p-step-3').show();
                $(popup).addClass('step-3');
              }
            });
          });
        }
      }
      var groupPopupsCount = $( ".popup-group-block .petrosoft-popup-block").length;
      $( ".popup-group-block .petrosoft-popup-block").each(function( index, element ) {
        // Remove showed pop ups
        if ($.cookie(getPopupGroupCookieName(this)) == 'hide') {
          $(this).remove();
        }  
        //run pop ups after removing
        if (index+1 === groupPopupsCount) {
          processPopupGroup();
        }
      });
    }
    
    // schudule a demo selct element 
    $('#schedule-demo-block select').selectric();
    $('.crm-entity-lead select').selectric();
    $('.crm-select').selectric();
    $('#schedule-a-demo select').selectric();
    
    jQuery('.theme-panel .widget-list-content .theme-list div.close').on('click', function(e) {
      e.preventDefault();
      var targetElm = '.theme-panel';
      var targetClass = 'active';
      if (jQuery(targetElm).hasClass(targetClass)) {
        jQuery(targetElm).removeClass(targetClass);
        jQuery('body').removeClass("active-panel");
      } else {
        jQuery(targetElm).addClass(targetClass);
        jQuery('body').addClass("active-panel");
      }
    });
    
    // mobile menu
    jQuery('div.mobile_menu').on('click', function (e) {
      e.preventDefault();
      var targetElm = '.theme-panel-mobile-menu';
      var targetClass = 'active';
      this.classList.toggle('open');
      jQuery('body').toggleClass('mobile-menu-open');
      if (jQuery(targetElm).hasClass(targetClass)) {
        jQuery(targetElm).removeClass(targetClass);
      } else {
        jQuery(targetElm).addClass(targetClass);
      }
    });
    jQuery('.theme-panel-mobile-menu .mobile-top-menu-container-right-panel ul.menu li .open-submenu').on('click', function (e) {
      var menu = $(this).parents(".menu-item-has-children");
      if (jQuery(menu).hasClass('open')) {
        jQuery(menu).removeClass('open');
      } else {
        jQuery(menu).addClass('open');
      }
      jQuery(menu).children('ul.sub-menu').slideToggle();
      return false;
    });
    
    jQuery('.theme-panel-mobile-menu .mobile-top-menu-container-right-panel ul.menu li.h-m-main-link-customer-login').click(function(){
      $( ".theme-panel-mobile-menu .mobile-top-menu-container-right-panel ul.menu li.h-m-main-link-customer-login .open-submenu" ).trigger( "click" );
      return false;
    });
    
    // partners block
    if ($('.partners-block').length > 0) {
      (function() {
        var partnersBlock = $('.partners-block');
        var navigation = $(partnersBlock).find('.ps-nav-link');
        var arrows = true;
        if ($(partnersBlock).find('.p-slider .p-slide').length < 2) {
          arrows = false;
          $(partnersBlock).find('.p-slider-arrow').hide();
        }
        var slider = $(partnersBlock).find('.p-slider').slick({
          slidesToShow: 1,
          adaptiveHeight: true,
          nextArrow: $(partnersBlock).find('.p-slider-nav-container .slider-next'),
          prevArrow: $(partnersBlock).find('.p-slider-nav-container .slider-prev'),
          arrows: arrows,
          infinite: true,
          fade: true,
          cssEase: 'linear',
          dots: false,
          unslick: false,
          autoplay: true,
          autoplaySpeed: 4000,
            responsive: [
             {
                breakpoint: 1365,
                settings: "unslick",
             }
          ]
        });
        var slides = $(slider).find('.p-slide');
        if (navigation.length > 1) {
          $(slider).on('beforeChange', function(event, slick, currentSlide, nextSlide){
            $(navigation).removeClass('active');
            $(navigation[nextSlide]).addClass('active');
          });
          $(navigation).each(function(index) { 
            $(this).click(function(){
              $(slider).slick('slickGoTo', index, false);
            });
          });
        }
      })();
    }
    
    //404 redirect
    if ($('.error404').length > 0) {
      setTimeout(function(){window.location = '/'}, 15000);
    }
    // trademark to sup
    var trademarksToSup = function() {
      $('body :not(script,sup)').contents().filter(function() {
        return this.nodeType === 3;
      }).replaceWith(function() {
        return this.nodeValue.replace(/[™®©]/g, '<sup>$&</sup>');
      });
    }
    trademarksToSup();
    window.almComplete = function(alm){
      trademarksToSup();
    };
    
    
    if ($('.header-search-form').length > 0) {
      $('.top_right_additional_menu .icon-search').click(function(){
        $('.header-search-form').fadeIn();
      });
      $('.header-search-form .icon-circle-close').click(function(){
        $('.header-search-form').fadeOut();
      });
    }
    
   if ($('footer .f-menu').length > 0) {
     $('footer .f-menu .f-m-open-menu').click(function() {
       var submenu = $(this).parents('.f-m-submenu');
       if ($(submenu).hasClass('opened')) {
          $(submenu).find('.f-m-children').slideUp("fast", function() {
            $(submenu).removeClass('opened');
          });
       } else {
          $('footer .f-menu .f-m-submenu.opened').each(function( index ) {
            var submenu = this;
            $(submenu).find('.f-m-children').slideUp("fast", function() {
              $(submenu).removeClass('opened');
            });
          });
          $(submenu).find('.f-m-children').slideDown("fast", function() {
            $(submenu).addClass('opened');
          });
       }
     });
   }
   
    var petrosoftRunCategoryFilters = function(filters) {
      var categories = $(filters).find('.category-filter');
      var categoriesFilterData = [];
      var currentUrl = location.protocol + '//' + location.host + location.pathname;
      $(categories).each(function() {
        var category = {
          'id' : $(this).data( "category" ),
          'terms' : [],
        }
        $($(this).find('.filter-term')).each(function() {
          if ($(this).is(":checked")) {
            category.terms.push($(this).data( "term" ))
          }
        });
        if (category.terms.length > 0) {
          categoriesFilterData.push(category);
        }
      });
      if (categoriesFilterData.length > 0) {
        var queryString = '';
        var taxonomy = '';
        var taxonomy_terms = '';
        var taxonomy_operator = '';
        $(categoriesFilterData).each(function(cIndex){
          taxonomy+= this.id;
          taxonomy_operator+='IN';
          var termsString = '';
          var terms = this.terms; 
          $(terms).each(function(tIndex) {
            termsString+=this;
            if (terms.length > tIndex + 1) {
              termsString+=',';
            }
          });
          taxonomy_terms+= termsString;
          if (categoriesFilterData.length > cIndex+1) {
            taxonomy+=':';
            taxonomy_terms+=':';
            taxonomy_operator+=':';
          }
        });
        queryString = '?taxonomy='+taxonomy+'&taxonomy_terms='+taxonomy_terms+'&taxonomy_operator='+taxonomy_operator;
        window.location = currentUrl+queryString;
      } else {
        window.location = currentUrl;
      }
    }
   
    $('.category-filter .filter-term').change(function(){
      petrosoftRunCategoryFilters($(this).parents('.petrosoft-category-filters'));
    });
    
    if ($('.mobile-side-block-toggle').length > 0 ) {
      if ($('.side-block .side-menu').length > 0) {
        if ($('.side-block .side-menu .opened').length > 0) {
          $('.mobile-side-block-toggle .t-title').html($('.side-block .side-menu .opened').html());
        } else {
          $('.mobile-side-block-toggle .t-title').html($('.side-block .side-menu .active').html());
        }
      }
      $('.mobile-side-block-toggle .t-closed').click(function(){
        $('.side-block').slideDown();
        $('.mobile-side-block-toggle').addClass('opened');
      });
      $('.mobile-side-block-toggle .t-opened').click(function(){
        $('.side-block').slideUp();
        $('.mobile-side-block-toggle').removeClass('opened');
      });
    }
    if ($('.v-video-wrapper').length > 0) {
      $( ".v-video-wrapper" ).each(function() {
        var videoWrapper = this;
        $(this).find('.v-video-overlay').click(function() {
          $(videoWrapper).find('video').trigger('play');
          $(videoWrapper).find('.v-video-overlay').fadeOut('slow');
        });
      });
    }
   if ($('.p-main-video-wrapper').length > 0) {
      $('.p-main-video-wrapper .p-video-overlay').click(function() {
        $('.p-main-video-wrapper video').trigger('play');
        $('.p-main-video-wrapper .p-video-overlay').fadeOut('slow');
      });
      if ($('.video-duration').length > 0) {
        var mainVideo = document.getElementById("main-video");
        mainVideo.onloadedmetadata = function() {
            var hours = Math.floor(document.getElementById('main-video').duration / 3600);
            var minutes = Math.round(parseInt(document.getElementById('main-video').duration / 60, 10));
            if (hours < 10) {
              hours = '0' + hours;
            }
            if(minutes < 10) {
              minutes = '0' + minutes;
            } 
            $('.video-duration').text(hours + ' : ' + minutes);
        };
      }
   }
   
   if ($('.content .vc_row .vc_row ol').length > 0) {
     $('.content .vc_row .vc_row ol').each(function( index ) {
        var start = $(this).attr( "start" );
        if (typeof start !== 'undefined') {
          $(this).css({'counter-reset':'myCounter '+ (parseInt(start) - 1)});
        }
     });
   }
    
  });
 
  $(window).load(function(){
    // resource category tags filter
    if ($('.resources-category .tags-container .petrosoft-select').length > 0) {
      $('.resources-category .tags-container .petrosoft-select').selectric({ disableOnMobile: false, nativeOnMobile: false }).on('change', function() {
        var categoryLink = $('.resources-category .category-link').val();
        if ($(this).val() != 'all') {
          window.location.replace(categoryLink + '?tag='+ $(this).val());
        } else {
          window.location.replace(categoryLink);
        }
      });
    }
    
    if ($('.csm-category-select-container .petrosoft-select').length > 0) {
      $('.csm-category-select-container .petrosoft-select').selectric({ disableOnMobile: false, nativeOnMobile: false }).on('change', function() {
        window.location.replace($(this).val());
      });
    }
    // benefits block mobile select
    if ($('.benefits-block').length > 0) {
      var benefitsNavBlock = $('.benefits-block .b-tabs-header .b-nav');
      $('.benefits-block .petrosoft-select').selectric({ disableOnMobile: false, nativeOnMobile: false }).on('change', function() {
        var links = $(benefitsNavBlock).find('.b-nav-link');
        $(links[$(this).val()]).find('a').trigger( "click" );
      });
    }
    $('.wpcf7 .wpcf7-select').selectric({ disableOnMobile: false, nativeOnMobile: false })
            
    document.addEventListener('aos:in:main', function(ev) { 
      //Fixed position of blog sharing
      if ($('.p-fixed-sharing').length > 0) {
        if ($('.news-subscribe-form').length > 0) {
          petrosoftFixDesktopElement('.p-fixed-sharing','.news-subscribe-form');
        } else {
          petrosoftFixDesktopElement('.p-fixed-sharing','.b-social-networks');
        }
      }
    });

    document.addEventListener('aos:in:category-menu',function(ev) { 
      //News filter 
      if ($('.news-year-filter').length > 0) {
        $('.news-year-filter').selectric().on('change', function() {
          var categoryLink = jQuery('.category-link').val();
          var year = $(this).val();
          var yearFilter = '';
          if (year != 'all') {
            yearFilter = '?filter-year='+year;
          }
          window.location.replace(categoryLink+yearFilter);
        });
      }
      // jobs filter
      if ($('.job-category-filter').length > 0) {
        $('.job-category-filter').selectric().on('change', function() {
          var categoryLink = jQuery('.category-link').val();
          var id = $(this).val();
          var idFilter = '';
          if (idFilter != 'all') {
            idFilter = '?job-category='+id;
          }
          window.location.replace(categoryLink+idFilter);
        });
      }
    });

    /**
     * fix element by scroll
     * @param string element - fixed element selector
     * @param string stopElement - stop fixing element selector
     * @returns {undefined}
     */
    function petrosoftFixDesktopElement(element, stopElement) {
      if (typeof stopElement === 'undefined') {
        var stopElement = false;
      }
      var element = $(element);
      var elementPosition = element.offset();
      var cssLeft = element.css("left");
      var update = function() {
        if (elementPosition) {
          if ($(window).width() > 1200) {
              if ($(window).scrollTop() > elementPosition.top - 208) {
                  if(!element.hasClass('fixed')) {
                    element.addClass('fixed');
                    element.css('left', elementPosition.left);
                  }
                  if (stopElement !== false && $(stopElement).length > 0) {
                    var stopPosition = $(stopElement).offset();
                    var currentElementPosition = element.offset();
                    if((currentElementPosition.top > stopPosition.top - element.outerHeight() * 2) || ($(window).scrollTop() > stopPosition.top - element.outerHeight() * 2)) {
                      element.addClass('hidden');
                    } else {
                      element.removeClass('hidden');
                    }
                  }
              } else {
                  element.removeClass('fixed');
                  element.css('left', cssLeft);
              }
          } else {
              element.removeClass('fixed');
              element.css('left', cssLeft);
          }
        }
      }
      $(window).resize(function(){
        elementPosition = element.offset();
        update();
      });
      update();
      $(window).scroll(function(){
        update();
      });
    }
    
    var wpcf7Elm = document.querySelector( '.wpcf7' );

    // send news subscribtion to clickdimensions
    wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) {
     if (event.detail.contactFormId == "6411") {
       var mail = event.detail.inputs[0].value;
       var dataObject = {
         '004' : mail,
         'source' : 'campaign',
       }
       jQuery.ajax({
        type: 'POST',
        url: 'https://analytics.clickdimensions.com/forms/h/aNtQMv3Rj70y2HGa2PltCg',
        data: jQuery.param(dataObject),
        dataType: 'json',
        success: function (result) {
          petrosoftSendGtmEvent('subscribe-submit');
        },
        error: function (result) {
          petrosoftSendGtmEvent('subscribe-submit');
        }
      });
     }
     // resources form
     if (event.detail.contactFormId == "6862") {
        var firstName = event.detail.inputs[0].value;
        var lastName = event.detail.inputs[1].value;
        var phone = event.detail.inputs[2].value;
        var mail = event.detail.inputs[3].value;
        var company = event.detail.inputs[4].value;
        var leadsource = event.detail.inputs[6].value;
        var fileUrl = event.detail.inputs[7].value;
        var dataObject = {
          '001' : firstName,
          '002' : lastName,
          '004' : mail,
          '501' : phone,
          '005' : company,
          '013' : leadsource,
          '015' : fileUrl,
          'source' : 'campaign',
        }
        jQuery.ajax({
          type: 'POST',
          url: 'https://analytics.clickdimensions.com/forms/h/aJRJhwSyIcUS0jSvHdg0o8',
          data: jQuery.param(dataObject),
          dataType: 'json',
          success: function (result) {
            petrosoftSendGtmEvent('download-whitepaper-submit');
          },
          error: function (result) {
            petrosoftSendGtmEvent('download-whitepaper-submit');
          }
        });
     }
      // contacts form
      if (event.detail.contactFormId == "6864") {
        var firstName = event.detail.inputs[0].value;
        var lastName = event.detail.inputs[1].value;
        var phone = event.detail.inputs[2].value;
        var mail = event.detail.inputs[3].value;
        var company = event.detail.inputs[4].value;
        var product = event.detail.inputs[5].value;
        var question = event.detail.inputs[6].value;
        var dataObject = {
          '001' : firstName,
          '002' : lastName,
          '004' : mail,
          '501' : phone,
          '005' : company,
          '012' : product,
          '007' : question,
          'source' : 'campaign',
        }
        jQuery.ajax({
          type: 'POST',
          url: 'https://analytics.clickdimensions.com/forms/h/a2ylg9fhHUm8F4t5G2GtA',
          data: jQuery.param(dataObject),
          dataType: 'json',
          success: function (result) {

          },
          error: function (result) {

          }
        });
     }
     
    }, false );
    
    // send events
    var petrosoftStringComparison = function(str1, str2) {
      var res = str1.toUpperCase() === str2.toUpperCase();
      return res;
    }
    var petrosoftSendEvents = function() {
      // Clients slider button
      if ($('.clients-slider-block .btn.open-modal').length > 0) {
        $( ".clients-slider-block .btn.open-modal" ).each(function( index ) {
          $(this).click(function() {
            petrosoftSendGtmEvent('clients-slider-popup-click');
          });
        });
      }
      // schedule-demo-popup
      if ($('.schedule-demo-popup').length > 0) {
        $(".schedule-demo-popup").each(function( index ) {
          $(this).find('.schedule-demo-popup-show-form').click(function(){
            petrosoftSendGtmEvent('schedule-demo-popup-click');
          });
        });
      }
      // mobile-app
      if ($('.mobile-app-block').length > 0) {
        if ($('.mobile-app-block .m-a-apple-button').length > 0) {
          $('.mobile-app-block .m-a-apple-button').click(function(){
            petrosoftSendGtmEvent('download-apple-add-click');
          });
        }
        if ($('.mobile-app-block .m-a-android-button').length > 0) {
          $('.mobile-app-block .m-a-android-button').click(function(){
            petrosoftSendGtmEvent('download-android-add-click');
          });
        }
      }
      if ($('#buy-now-smartpos-apexa-prime').length > 0) {
        $('#buy-now-smartpos-apexa-prime .btn').click(function(){
          petrosoftSendGtmEvent('buy-now-click-2');
        });
      }
      if ($('#configure-solution-block').length > 0) {
        $('#configure-solution-block .btn').click(function(){
          if (petrosoftStringComparison($(this).text(),'buy now')) {
            petrosoftSendGtmEvent('buy-now-click');
          }
        });
      }
      if ($('.request-a-call-block').length > 0) {
        $('.request-a-call-block .btn').click(function(){
          petrosoftSendGtmEvent('request-call-click');
        });
      }
      if ($('.how-it-works-block').length > 0) {
        $('.how-it-works-block .btn.open-modal').click(function(){
          petrosoftSendGtmEvent('start-money-click');
        });
      }
    }
    petrosoftSendEvents();
    
    var liveChatInit = false;
    $(window).scroll(function() {
      if (!liveChatInit) {
        var scrollPercent = 100 * $(window).scrollTop() / ($(document).height() - $(window).height());
        if (scrollPercent >= 10) {
          liveChatInit = true;
          window.__lc = window.__lc || {};
          window.__lc.license = 10776987;
          (function() {
            var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
            lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
          })();
        }
      }
    });
    
    //side menu
    if ($('.side-block .side-block-content').length > 0)  {
      var offset = $('.side-block .side-block-content').offset();
      //$('.side-block-wrapper').css('min-height', $('.products-menu').outerHeight(true)+40+'px');
      var sideBlockOffset = $('.side-block').offset();
      var sideBlockBottom = $('.with-side-block-wrapper').offset().top + $('.with-side-block-wrapper').outerHeight(true);
      var headerHeight = 90;
      headerHeightHandler.onChange(function(height, eventName) {
        headerHeight = height;
      });
      
      $(window).scroll(function() {
         sideBlockBottom = $('.with-side-block-wrapper').offset().top + $('.with-side-block-wrapper').outerHeight(true);
         if ($(window).scrollTop() > offset.top - 60) {
           $('.side-block .side-block-content').addClass('fixed');
            var bottom = $(window).scrollTop() + $('.side-block .side-block-content').outerHeight(true);
           console.log('side - ' +  sideBlockBottom);
           console.log('mnu - ' +  bottom);
           if (sideBlockBottom <= (bottom + 100)) {
              $('.side-block').addClass('content-bottom-fixed');
              console.log('fix');
           } else {
              $('.side-block').removeClass('content-bottom-fixed');
           }
         } else {
            $('.side-block .side-block-content').removeClass('fixed');
         }
   
      });
    }





 	$(".single-post .p-form-placeholder form.ff-form").on('submit', function(e) {
    var formFieldData = $(this).serializeArray();
    var url = $(this).attr('data-action');
    var result_url = $(this).attr('data-result');
    var pattern  = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,6}\.)?[a-z]{2,6}$/i;
    var valid = pattern.test(String($(this).find('#email').val()).toLowerCase());
    
		if ($('input#agree').is(':checked')) {
			$('.field-container.agree').removeClass('error');
		} else {
			$('.field-container.agree').addClass('error');
		}
		if (valid == true ) {
			$(this).find('.field-container.email').removeClass('error');
		} else {
			$(this).find('.field-container.email').addClass('error');
		}
		if ($(this).find('#firstname').val() != '' ) {
			$(this).find('.field-container.firstname').removeClass('error');
		} else {
			$(this).find('.field-container.firstname').addClass('error');
		}
		if ($(this).find('#lastname').val() != '' ) {
			$(this).find('.field-container.lastname').removeClass('error');
		} else {
			$(this).find('.field-container.lastname').addClass('error');
		}
		if ($(this).find('#phone').val() != '' ) {
			$(this).find('.field-container.phone').removeClass('error');
		} else {
			$(this).find('.field-container.phone').addClass('error');
		}

		if (valid == true && $(this).find('#firstname').val() != '' && $(this).find('#phone').val() != '' && $(this).find('#lastname').val() != '' && $('input#agree').is(':checked')) { 
			$(this).find('.field-container.email').removeClass('error');
			$(this).find('.field-container.company').removeClass('error');
			$(this).find('.field-container.firstname').removeClass('error');
			$(this).find('.field-container.lastname').removeClass('error');
			$(this).find('input[type=text]').val('');
			$(this).find('input[type=email]').val('');
			$(this).find('input[type=tel]').val('');
      var source = $(this).find('#source').val();
      var file = $(this).find('#file').val();
			jQuery.ajax({
				type: 'POST',
				url: url,
				data: formFieldData,
				dataType: 'json',
				success: function (result) {},
				error: function (result) {
						window.dataLayer = window.dataLayer || [];
						dataLayer.push({ 
						'event': 'custom-form-submit',
						'gtm-form-product': 'brochure-and-flyers',
						'gtm-form-name': source,
						'gtm-form-category': 'content'
						});
						var link = document.createElement('a');
						link.setAttribute('href', file);
						link.setAttribute('download', source+'.pdf');
						link.click();
						//window.location.replace(result_url);
				}
			});
		}
		//}
		e.preventDefault();
	});



  });
  
})(jQuery);