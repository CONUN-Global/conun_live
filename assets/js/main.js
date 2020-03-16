/*
  Project Name : Extra Large Multipurpose HTML Template
  Author Company : dizzmarket
  Project Date: 01 Jan, 2017
  Author Email : dizzmarket@gmail.com
*/
/*
  Project Name : Extra Large Multipurpose HTML Template
  Author Company : dizzmarket
  Project Date: 01 Jan, 2017
  Author Email : dizzmarket@gmail.com
*/

// IIFE function start here
(function() {
/* page loder start here */
 $(window).on("load", function () {
        "use strict";
        $('.preloader-wrapper').fadeOut();
        $('#about .heding-wrapper').addClass('animated');
        var scrollEvent = new Event( 'scroll' );
        window.dispatchEvent( scrollEvent );
});
	jQuery( document ).ready( function( $ ) {
    "use strict";

    jQuery( '#portfolio-list' ).filterable( { useHash: false } );

    var body = $( 'body' ),
        win = $( window ),
        winWidth;

    win.on( 'load', function( ) {
        winWidth = win.width( );
    } );

    win.on( 'resize', function( ) {
        winWidth = win.width( );
    } );

    // Theme options bar
    if ( $( '#st-container' ).length ) {
        var patternsList = $( '.patterns-list' );

        $( '.toggle-panel, .st-pusher' ).on( 'click', function( ) {
            $( '.st-container' ).toggleClass( 'st-menu-open' );
        } );

        function buttonActive( item ) {
            item.parent( ).find( '.item' ).removeClass( 'active' );
            item.addClass( 'active' );
        }

        function itemActive( item ) {
            item.closest( '.items-switcher' ).find( '.item' ).removeClass( 'active' );
            item.addClass( 'active' );
        }

        // Wide/Boxed type
        $( '.wide-boxed-section' ).on( 'click', '.item', function( ) {
            buttonActive( $( this ) );
            body.removeClass( ).addClass( $( this ).attr( 'data-item' ) );
            body.attr( 'style', 'background-image: url(' + patternsList.find( '.active' ).data( 'path' ) + ');' )
                .attr( 'data-bg-type', 'pattern' );
            var resizeEvent = new Event( 'resize' );
            window.dispatchEvent( resizeEvent );
        } );

        // Colors switcher
        $( '.colors-list' ).on( 'click', '.item', function( event ) {
            var that = $( this ),
                colorPath = that.data( 'color-path' ),
                logoPath = that.data( 'logo-path' ),
                footerLogoPath = that.data( 'footer-logo-path' );
            itemActive( that );
            $( '#color-file' ).attr( 'href', colorPath );
            $( '.logo-container img' ).attr( 'src', logoPath );
            $( '.footer-logo img' ).attr( 'src', footerLogoPath );
        } );

        // Header positions switcher
        $( '.header-positions' ).on( 'click', '.item', function( ) {
            buttonActive( $( this ) );
            var header = $( '.slider-wrapper header' );
            header.attr( 'data-position', $( this ).attr( 'data-item' ) );
        } );

        // Patterns switcher
        patternsList.on( 'click', '.item', function( event ) {
            var that = $( this ),
                path = that.data( 'path' );
            itemActive( that );
            body.attr( 'data-bg-type', 'pattern' ).attr( 'style', 'background-image: url(' + path + ');' );
        } );

        // Backgrounds switcher
        $( '.backgrounds-list' ).on( 'click', '.item', function( event ) {
            var that = $( this ),
                path = that.data( 'path' );
            itemActive( that );
            body.attr( 'data-bg-type', 'background' ).attr( 'style', 'background-image: url(' + path + ');' );
        } );
    }

    // Function remove by timer for success or error AJAX finish
    function removeByTimer( selector, timeout ) {
        setTimeout( function( ) {
            selector.remove( );
        }, timeout );
    }

    // Function append alert for success or error AJAX finish
    function appendAllert( message ) {
        body.append( '<div class="form-alert c-table">' +
                        '<div class="c-row">' +
                            '<div class="c-cell">' +
                                '<div class="alert-content">' + message + '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>' );
        removeByTimer( body.find( '.form-alert' ), 1500 );
    }

    // Sub menu
    $( '.cd-primary-nav .has-sub > a' ).on( 'click', function( event ) {
        event.preventDefault( );
        $( this ).next( ).slideToggle( 300 );
    } );

    // Send form
    $( '#contact-form .submit' ).on( 'click', function( event ) {
        event.preventDefault( );
        var nameField = $( '#contact-form .name' ),
            emailField = $( '#contact-form .email' ),
            messageField = $( '#contact-form .message' ),
            nameData = nameField.val( ),
            emailData = emailField.val( ),
            messageData = messageField.val( ),
            successMessage = 'The message has been sent',
            errorMessage = 'The message hasn\'t been sent';
            nameField.add( emailField ).add( messageField ).val( '' );

        if ( !nameData || !emailData || !messageData ) {
            appendAllert( errorMessage );
            return;
        }

        $.post( '../assets/php/mail.php', {
                name: nameData,
                email: emailData,
                message: messageData,
            } ).done( function( data, textStatus ) {
                appendAllert( successMessage )
            } ).fail( function( xhr, status, error ) {
                appendAllert( errorMessage )
            } );
    } );

    //Responsive main navigation start here
    $('.mobile-show-btn').on( "click", function(){
      $('.slider-wrapper header nav.main-nav').slideToggle();
    });
	// start gallery and images view here
    $(".gallery:first a[class^='pretty']").prettyPhoto(
      {animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false,social_tools:false,deeplinking:false,}
      );
	// Navigation script here
    $('.cd-primary-nav li:not(.has-sub) a').on( "click", function(){
      $('.cd-primary-nav').removeClass('is-visible');
      $('.cd-menu-icon').removeClass('is-clicked');
    });
    // Adding active class for navigation here

    $('.main-nav a').on( "click", function(){
      $('.main-nav li').removeClass('active');
      $(this).parent().addClass('active');
    });
	// Start portfolio Filter here
    $('#portfolio-filter a').on( "click", function(){
      $('#portfolio-filter li').removeClass('active');
      $(this).parent().addClass('active');
    });
    // Start SCROLL TO FIX HEADER

    $(window).on("scroll", function(){
      if ($(window).scrollTop() >= 41) {
        $('header').addClass('sticky');
       }
       else {
        $('header').removeClass('sticky');
       }
    });

    // Show element on scroll

        var $elems = $('.animate-in'),
        winheight = $(window).height(),
        fullheight = $(document).height();

          $(window).on("scroll", function(){
            animate_elems();
          });

          function animate_elems() {
            var wintop = $(window).scrollTop(); // calculate distance from top of window
            // loop through each item to check when it animates
            $elems.each(function(){
              var $elm = $(this),
                  topcoords = $elm.offset().top; // element's distance from top of page in pixels

              if(wintop > (topcoords - (winheight*.90))) {
                // animate when top of the window is 3/4 above the element
                $elm.addClass('animated');

              }

            });
          } // end animate_elems()

  // SCROLL TO TARGET
  $(".scroll").on("click", function(event){
         event.preventDefault();
         //calculate destination place
         var dest=0;
         if($(this.hash).offset().top > $(document).height()-$(window).height()){
              dest=$(document).height()-$(window).height();
         }else{
              dest=$(this.hash).offset().top;
         }
         //go to destination
         $('html,body').animate({scrollTop:dest}, 600,'swing');
     });
    // Slider Start here
  $("#main-slider").owlCarousel({
        navigation : false, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        autoPlay:true ,
    });
    $("#testimonial-slide").owlCarousel({
        navigation : false, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        autoPlay:true,
    });
    $("#client-slider").owlCarousel({
        navigation : false, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        autoPlay:true,
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
    });
  //if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
  var MQL = 1170;

  //primary navigation slide-in effect
  if($(window).width() > MQL) {
    var headerHeight = $('.cd-header').height();
    $(window).on('scroll',
    {
          previousTop: 0
      },
      function () {
        var currentTop = $(window).scrollTop();
        //check if user is scrolling up
        if (currentTop < this.previousTop ) {
          //if scrolling up...
          if (currentTop > 0 && $('.cd-header').hasClass('is-fixed')) {
            $('.cd-header').addClass('is-visible');
          } else {
            $('.cd-header').removeClass('is-visible is-fixed');
          }
        } else {
          //if scrolling down...
          $('.cd-header').removeClass('is-visible');
          if( currentTop > headerHeight && !$('.cd-header').hasClass('is-fixed')) $('.cd-header').addClass('is-fixed');
        }
        this.previousTop = currentTop;
    });
  }



  // Fancybox start here

  $(".fancybox").fancybox();

  //open/close primary navigation
  $('.cd-primary-nav-trigger').on('click', function(){
    $('.cd-menu-icon').toggleClass('is-clicked');
    $('.cd-header').toggleClass('menu-is-open');

    //in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
    if( $('.cd-primary-nav').hasClass('is-visible') ) {
      $('.cd-primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
        $('body').removeClass('overflow-hidden');
      });
    } else {
      $('.cd-primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
        $('body').addClass('overflow-hidden');
      });
    }
  });


// Master Slider start here

//function createSliders( ) {
    var slider = new MasterSlider();
        slider.setup('masterslider' , {
    //$( '#masterslider' ).masterslider( {
          width:1170,
          height:770,
          autoplay:true,
          fullwidth:true,
          centerControls:false,
          speed:55,
          view:'flow',
          loop:true,
          /*controls : {
              arrows : {autohide:false},
          }*/
        });
        slider.control('arrows');
        var slider1 = new MasterSlider();
        slider1.setup('masterslider-about' , {
          width:568,
          height:333,
          autoplay:true,
          fullwidth:true,
          centerControls:false,
          speed:55,
          view:'basic',
          loop:true
        });
        slider1.control('arrows');
//}

//createSliders( );

    //Check to see if the window is top if not then display button
  $(window).on("scroll", function(){
    if ($(this).scrollTop() > 100) {
      $('.scrollToTop').fadeIn();
    } else {
      $('.scrollToTop').fadeOut();
    }
  });

  //Click event to scroll to top
  $('.scrollToTop').on( "click", function(){
    $('html, body').animate({scrollTop : 0},600);
    return false;
  });

// start tabs here
(function($) {

	var tabs =  $(".tabs li a");

	tabs.on( "click", function(){
		var panels = this.hash.replace('/','');
		tabs.removeClass("active");
		$(this).addClass("active");
    $("#panels").find('p').hide();
    $(panels).fadeIn(200);
	});

})(jQuery);


    $("#tabex a").on("click", function(e){

                e.preventDefault();

                $(this).tab('show');

    });

});
})()
