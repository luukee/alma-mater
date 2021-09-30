"use strict";
// Subscribe
function subscribe_block() {
    "use strict";
    jQuery('.shortcode_subscribe form').not('.global_count_wrapper .shortcode_subscribe form').css({'padding-right': jQuery('.shortcode_subscribe .subscribe_btn').width() + 20 + 'px'});
    jQuery('.global_count_wrapper .shortcode_subscribe form input').css({'padding-right': jQuery('.shortcode_subscribe .subscribe_btn').width() + 20 + 'px'});
}

// Fullwidth Block
function fw_block() {
    "use strict";
    if (jQuery('div').hasClass('right-sidebar') || jQuery('div').hasClass('left-sidebar')) {
    } else {
        var fw_block = jQuery('.fw_block');
        var fw_block_parent = fw_block.parent().width();
        var fw_site_width = fw_block.parents('.wrapper').width();
        var fw_contentarea_site_width_diff = fw_site_width - fw_block_parent;
        fw_block.css('margin-left', '-' + fw_contentarea_site_width_diff / 2 + 'px').css('width', fw_site_width + 'px').children('.fw_wrapinner').css('padding-left', '0px').css('padding-right', '0px');
    }
}

// Colored Info List
function colored_section() {
    "use strict";
    var maxHeight = 0;
    jQuery(".colored_section").css({'height': 'auto'});
    jQuery(".colored_section").each(function () {
        if (jQuery(this).height() > maxHeight) {
            maxHeight = jQuery(this).height();
        }
    });
    jQuery(".colored_section").height(maxHeight);
}

//	Boxed container
function gt3_boxed_container() {
    "use strict";
    var wrap_404 = jQuery('.wrapper_404');
    if (jQuery('.gt3_boxed').size() > 0 && jQuery(window).width() > 850) {
        if (wrap_404.size() > 0) {
            jQuery('.gt3_boxed #page_container, .gt3_boxed .fixed-menu').width(jQuery('.wrapper_404 .container').width() + 60 + 'px');
        } else {
            jQuery('.gt3_boxed #page_container, .gt3_boxed .fixed-menu').width(jQuery('.wrapper .container').width() + 60 + 'px');
        }
        if (jQuery('.page_with_abs_header').size() > 0) {
            if (wrap_404.size() > 0) {
                jQuery('.gt3_boxed .main_header').width(jQuery('.wrapper_404 .container').width() + 60 + 'px');
            } else {
                jQuery('.gt3_boxed .main_header').width(jQuery('.wrapper .container').width() + 60 + 'px');
            }
        }
    } else {
        jQuery('.gt3_boxed #page_container, .gt3_boxed .fixed-menu').width(100 + '%');
        if (jQuery('.page_with_abs_header').size() > 0) {
            jQuery('.gt3_boxed .main_header').width(100 + '%');
        }
    }
    var page_container = jQuery('#page_container');
    if (page_container.size() > 0) {
        page_container.css({'min-height': jQuery(window).height() + 'px'});
    }
}

jQuery(document).ready(function () {
    "use strict";

    // Content FadeIn
    var bodytimer = setTimeout(function () {
        jQuery('body').animate({'opacity': '1'}, 500);
        clearTimeout(bodytimer);
    }, 500);

    // Custom Bg
    if (jQuery('.img_bg').size() > 0 || jQuery('.pattern_bg').size() > 0) {
        jQuery('body').addClass('gt3_boxed');
    }
    if (jQuery('.clean_bg').size() > 0) {
        jQuery('body').addClass('gt3_clean');
    }

    // Fixed Menu
    if (jQuery('.true_fixed_menu').size() > 0) {
        jQuery('.fixed-menu').append(jQuery('.header_parent_wrap').html());
        jQuery(window).on('scroll', function () {
            if (jQuery('.fullscreenbanner').size() > 0 && !jQuery('.custom_page_slider').size() > 0 || jQuery('.fullwidthbanner').size() > 0 && !jQuery('.custom_page_slider').size() > 0) {
                var header_offset = jQuery(window).height() - 80;
            }
            else if (jQuery('.gt3_clean .main_header').hasClass('type2') || jQuery('.gt3_clean .main_header').hasClass('type3')) {
                var header_offset = jQuery('.header_parent_wrap').offset().top + jQuery('.header_parent_wrap').height();
            }
            else {
                var header_offset = jQuery('.header_parent_wrap').offset().top;
            }
            if (jQuery(window).scrollTop() > header_offset) {
                jQuery('.fixed-menu').addClass('fixed_show');
            } else {
                jQuery('.fixed-menu').removeClass('fixed_show');
            }
        });
    }

    // Menu Collapse
    jQuery('.menu_collapse').on("click", function () {
        jQuery('.main_header.type3 header .fright').slideToggle(300);
        jQuery(this).parents('.header_parent_wrap').toggleClass("menu_open");
    });

    // Menu Type1 & Fixed Menu
    if (jQuery('.ubermenu').size() > 0) {
        jQuery('.main_header.type1 li.ubermenu-item-level-0 > a span, .fixed-menu li.ubermenu-item-level-0 > a span').css({'line-height': jQuery('.logo_sect').height() - 4 + 'px'});
        jQuery('.main_header.type1 .top_search, .fixed-menu header .top_search').css({'margin-top': (jQuery('.logo_sect').height() + 55 - jQuery('.top_search').height())/2 + 'px'});
    }
    else if (jQuery('.main_header.type1').size() > 0) {
        jQuery('.main_header.type1 header nav ul.menu > li > .sub-nav, .fixed-menu header nav ul.menu > li > .sub-nav').css({'margin-top': jQuery('.logo_sect').height() + 55 + 'px'});
        jQuery('.main_header.type1 header nav ul.menu > li > a, .fixed-menu header nav ul.menu > li > a').css({'line-height': jQuery('.logo_sect').height() - 4 + 'px'});
        jQuery('.main_header.type1 .top_search, .fixed-menu header .top_search').css({'margin-top': (jQuery('.logo_sect').height() + 55 - jQuery('.top_search').height())/2 + 'px'});
    } else {
        jQuery('.fixed-menu header nav ul.menu > li > .sub-nav').css({'margin-top': jQuery('.logo_sect').height() + 55 + 'px'});
        jQuery('.fixed-menu header nav ul.menu > li > a').css({'line-height': jQuery('.logo_sect').height() - 4 + 'px'});
        jQuery('.fixed-menu header .top_search').css({'margin-top': (jQuery('.logo_sect').height() + 55 - jQuery('.fixed-menu header .top_search').height())/2 + 'px'});
    }


    // MobileMenu
    if (jQuery('.ubermenu').size() < 1) {
        jQuery('.main_header header').append('<a href="javascript:void(0)" class="menu_toggler"></a><div class="mobile_menu_wrapper"><ul class="mobile_menu container"/></div>');
        if (jQuery('.mega-menu-wrap').size() > 0) {
            jQuery('.mobile_menu').html(jQuery('header').find('.mega-menu').html());
        } else if (jQuery('.ubermenu').size() > 0) {
            jQuery('.mobile_menu').html(jQuery('header').find('.ubermenu-nav').html());
        } else {
            jQuery('.mobile_menu').html(jQuery('header').find('.menu').html());
        }
        jQuery('.mobile_menu_wrapper').hide();
        jQuery('.menu_toggler').on("click", function () {
            jQuery('.mobile_menu_wrapper').slideToggle(300);
            jQuery(this).toggleClass("close_toggler");
        });
        jQuery('.mobile_menu a').each(function () {
            jQuery(this).addClass("mob_link");
        });
        if (jQuery('.megamenu').size() > 0) {
            jQuery('.megamenu').each(function () {
                if (jQuery(this).hasClass('mega_submenu')) {
                } else {
                    jQuery(this).find('.megamenu_wrap a').removeClass("mob_link");
                }
            });
        }
        jQuery('.mobile_menu li').find('a').on("click", function () {
            jQuery(this).parent().toggleClass("showsub");
        });
        jQuery('body').addClass("without_mega_menu");
    } else {
        jQuery('body').addClass("with_mega_menu");
        jQuery('a.ubermenu-responsive-toggle').on("click", function () {
            jQuery(this).toggleClass("close_toggler");
        });
    }

    // Top Search focus
    if (jQuery('.top_search').size() > 0) {
        jQuery('.top_search').each(function () {
            var $ctsearch = jQuery(this),
                $ctsearchinput = $ctsearch.find('input.ct-search-input'),
                $menu_nav = jQuery(this).parents('header').find('nav'),
                $cart_btn = jQuery(this).parents('header').find('.shopping_cart_btn'),
                $body = jQuery('html,body'),
                openSearch = function () {
                    $ctsearch.data('open', true).addClass('ct-search-open');
                    $menu_nav.hide();
                    $cart_btn.hide();
                    $ctsearchinput.focus();
                    return false;
                },
                closeSearch = function () {
                    $ctsearch.data('open', false).removeClass('ct-search-open');
                    $menu_nav.css({'display': 'inline-block'});
                    $cart_btn.css({'display': 'block'});
                };
            $ctsearchinput.on('click', function (e) {
                e.stopPropagation();
                $ctsearch.data('open', true);
            });
            $ctsearch.on('click', function (e) {
                e.stopPropagation();
                if (!$ctsearch.data('open')) {
                    openSearch();
                    $body.off('click').on('click', function (e) {
                        closeSearch();
                    });
                }
                else {
                    if ($ctsearchinput.val() === '') {
                        closeSearch();
                        return false;
                    }
                }
            });
        });
    }

    // Flickr
    if (jQuery('.flickr_widget_wrapper').size() > 0) {
        jQuery('.flickr_badge_image a').each(function () {
            jQuery(this).append('<div class="flickr_fadder"></div>');
        });
    }

    // Post Social Icons
    if (jQuery('.post_social_icons').size() > 0) {
        jQuery('.share_btn').on("click", function () {
            jQuery('.post_social_icons').toggleClass("on");
        });
    }

    // Prev-Next Links
    if (jQuery('.prev_next_links .fright').size() > 0) {
        jQuery('.prev_next_links .fright a').addClass("shortcode_button btn_small btn_type4");
    }

    // Form Allowed Tags
    if (jQuery('.form-allowed-tags').size() > 0) {
        jQuery('.form-allowed-tags').width(jQuery('#commentform').width() - jQuery('.form-submit').width() - 20);
        jQuery('.comment-reply-link').on("click", function () {
            jQuery('.form-allowed-tags').width(jQuery('#commentform').width() - jQuery('.form-submit').width() - 20);
        });
    }

    // Subscribe
    if (jQuery('.contentarea .mc_form_inside').size() > 0) {
        jQuery('.contentarea .mc_form_inside').parents('form').wrap('<div class="shortcode_subscribe" />');
        jQuery('.shortcode_subscribe').find('.mc_signup_submit').addClass('subscribe_btn');
        jQuery('#mc_mv_EMAIL').attr("placeholder", "Your Email Address");
        subscribe_block();
    }
    if (jQuery('.count_container_wrapper .shortcode_subscribe .wpcf7-submit').size() > 0) {
        jQuery('.shortcode_subscribe').find('.wpcf7-submit').wrap('<div class="subscribe_btn" />');
        subscribe_block();
    }

    if (jQuery('.fw_block').size() > 0) {
        fw_block();
    }

    if (jQuery('.fullscreenbanner').size() > 0 || jQuery('.fullwidthbanner').size() > 0) {
        jQuery('.main_header').addClass('mb0');
    }

    if (jQuery('.fullscreenbanner').size() > 0) {
        jQuery('.fullscreenbanner').parent().append('<div class="mouse_icon">Scroll Down</div>');
    }

    // Ultimate Button
    if (jQuery('.ubtn').size() > 0) {
        jQuery('.ubtn').each(function () {
            var $this = jQuery(this);
            $this.mouseenter(function () {
                $this.find(".ubtn-data.ubtn-icon i").removeAttr('style').css("color", $this.data('hover'));
            }).mouseleave(function () {
                    var $this = jQuery(this);
                    $this.find(".ubtn-data.ubtn-icon i").removeAttr('style');
                }
            );
        });
    }

    // Progress Bar
    if (jQuery('.vc_progress_bar').size() > 0) {
        jQuery('.vc_single_bar').each(function () {
            jQuery(this).find('.vc_bar').wrap('<div class="skill_wrap" />');
        });
    }

    // Colored Info List
    if (jQuery('.colored_sections').size() > 0) {
        colored_section();
    }

    gt3_boxed_container();

});

jQuery(window).resize(function () {
    "use strict";
    // Form Allowed Tags
    if (jQuery('.form-allowed-tags').size() > 0) {
        jQuery('.form-allowed-tags').width(jQuery('#commentform').width() - jQuery('.form-submit').width() - 20);
    }
    if (jQuery('.contentarea .mc_form_inside').size() > 0 || jQuery('.shortcode_subscribe').size() > 0) {
        subscribe_block();
    }
    if (jQuery('.fw_block').size() > 0) {
        fw_block();
    }

    // Colored Info List
    if (jQuery('.colored_sections').size() > 0) {
        colored_section();
    }

    gt3_boxed_container();

});

jQuery(window).load(function () {
    "use strict";
    if (jQuery('.fullscreenbanner').size() > 0) {
        var loadedtimer = setTimeout(function () {
            jQuery('.fullscreenbanner').parent().addClass('loaded');
            clearTimeout(loadedtimer);
        }, 3000);
    }
});
