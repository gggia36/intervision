(function($) {
    "use strict";
    var PENCI = PENCI || {};

    /* General functions
     ---------------------------------------------------------------*/
    PENCI.general = function() {
        // Top search
        $('#top-search a.search-click').on('click', function() {
            $('.show-search').fadeToggle();
            $('.show-search input.search-input').focus();
        });

        // Go to top
        $('.go-to-top').on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 700);
            return false;
        });

        // Double Touch To Go
        if ($().doubleTouchToGo) {
            $('#navigation .menu li.menu-item-has-children, #navigation .menu li.penci-mega-menu').doubleTouchToGo();
        } // doubleTouchToGo
    }


    /* Sticky main navigation
     ---------------------------------------------------------------*/
    PENCI.main_sticky = function() {
        if ($().sticky && !$("nav#navigation").hasClass('penci-disable-sticky-nav')) {
            var spaceTop = 0;
            if ($('body').hasClass('admin-bar')) {
                spaceTop = 32;
            }
            $("nav#navigation").each(function() {
                $(this).sticky({ topSpacing: spaceTop });
            });
        } // sticky
    }

    /* Sticky sidebar
     ----------------------------------------------------------------*/
    PENCI.sticky_sidebar = function() {
        if ($().theiaStickySidebar) {
            var top_margin = 90;
            if ($('body').hasClass('admin-bar')) {
                top_margin = 122;
            }
            $('#main.penci-main-sticky-sidebar, #sidebar.penci-sticky-sidebar').theiaStickySidebar({
                // settings
                additionalMarginTop: top_margin
            });
        } // if sticky
    }

    /* Mega menu
     ----------------------------------------------------------------*/
    PENCI.mega_menu = function() {
        $('#navigation .penci-mega-child-categories a').mouseenter(function() {
            if (!$(this).hasClass('cat-active')) {
                var $this = $(this),
                    $row_active = $this.data('id'),
                    $parentA = $this.parent().children('a'),
                    $parent = $this.closest('.penci-megamenu'),
                    $rows = $this.closest('.penci-megamenu').find('.penci-mega-latest-posts').children('.penci-mega-row');
                $parentA.removeClass('cat-active');
                $this.addClass('cat-active');
                $rows.hide();
                $parent.find('.' + $row_active).fadeIn('normal').css('display', 'inline-block');
            }
        });
    }

    /* Mobile menu responsive
     ----------------------------------------------------------------*/
    PENCI.mobile_menu = function() {
        // Add indicator
        $('#sidebar-nav .menu li.menu-item-has-children > a').append('<u class="indicator"><i class="fa fa-caret-down"></i></u>');
        $('#sidebar-nav .penci-mega-child-categories').closest('li.penci-mega-menu').children('a').append('<u class="indicator"><i class="fa fa-caret-down"></i></u>');

        // Toggle menu when click show/hide menu
        $('#navigation .button-menu-mobile').on('click', function() {
            $('body').addClass('open-sidebar-nav');
        });

        // indicator click
        $('#sidebar-nav .menu li a .indicator').on('click', function(e) {
            var $this = $(this);
            e.preventDefault();
            $this.children().toggleClass('fa-caret-up');
            $this.parent().next().slideToggle('fast');
        });

        // Close sidebar nav
        $('#close-sidebar-nav').on('click', function() {
            $('body').removeClass('open-sidebar-nav');
        });
    }



    /* Init functions
     ---------------------------------------------------------------*/
    $(document).ready(function() {
        PENCI.general();
        PENCI.main_sticky();
        PENCI.sticky_sidebar();
        PENCI.mega_menu();
        PENCI.mobile_menu();

        $(window).resize(function() {
            PENCI.sticky_sidebar();
        });
    });

})(jQuery); // EOF