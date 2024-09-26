jQuery(document).ready(() => {
    initCarousel();
    initParticles();
    showScrollTopBtn();

    console.log('scrollingggggg')

    jQuery(window).scroll(() => {
        jQuery(".core-img-wrapper").each((i, el) => {
            inVisible(jQuery(el));
        });
    });

    AOS.init();
});

function openMobileSubmenu(el) {
    let $submenu = jQuery('.mobile-submenu#'+jQuery(el).attr('data-submenu'));

    if($submenu.is(':visible')) {
        $submenu.slideUp();
    }
    else {
        $submenu.slideDown();
    }
}

function initCarousel() {
    jQuery(".owl-carousel").on('initialized.owl.carousel', function (event) {
        var el = event.target;
        carouselAnimation(el);
    });


    let owl = jQuery(".owl-carousel:not(.owl-partner)").owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false
    });

    owl.on('change.owl.carousel', function (event) {
        var el = event.target;
        carouselAnimation(el);
    });

    if(jQuery('.owl-carousel.owl-partner').length) {
        jQuery('.owl-carousel.owl-partner').owlCarousel({
            responsive: {
                0: {
                    items: 3,
                    loop: true,
                    nav: true,
                    margin: 20,
                    navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                    autoplay: true,
                    autoplayTimeout: 3500,
                    autoplayHoverPause: false
                },
                1080: {
                    items: 6,
                    loop: true,
                    nav: true,
                    margin: 20,
                    navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                    autoplay: true,
                    autoplayTimeout: 3500,
                    autoplayHoverPause: false
                }
            }
        });
    }

}

function carouselAnimation(el) {
    setTimeout(function () {
        var $h1 = jQuery('h1, h2, p', el);

        $h1.removeClass('zoomIn animated');
        $h1.css('opacity', 1);

        $h1.addClass('zoomIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            jQuery('.owl-item').not('.active').not('.cloned').find('h1').css('opacity', 0);
            jQuery('.owl-item').not('.active').not('.cloned').find('p').css('opacity', 0);

            $h1.removeClass('zoomIn animated');
        });
    }, 500);
}

function initParticles() {
    var e = jQuery('#particles-js');
    
    particlesJS("particles-js", {
        particles: {
                number: {
                    value: e.attr("data-particles-number-value") ? e.attr("data-particles-number-value") : "80",
                    density: {
                        enable: 1,
                        value_area: e.attr("data-particles-density-value") ? e.attr("data-particles-density-value") : "800"
                    }
                },
                color: {
                    value: e.attr("data-particles-color") ? e.attr("data-particles-color") : "#000000"
                },
                shape: {
                    type: e.attr("data-particles-shape-type") ? e.attr("data-particles-shape-type").toLowerCase() : "circle",
                    stroke: {
                        width: e.attr("data-particles-shape-stroke-width") ? e.attr("data-particles-shape-stroke-width") : "0",
                        color: e.attr("data-particles-shape-stroke-color") ? e.attr("data-particles-shape-stroke-color") : "#000000"
                    },
                    polygon: {
                        nb_sides: e.attr("data-particles-shape-polygon-nb-sides") ? e.attr("data-particles-shape-polygon-nb-sides") : "5"
                    },
                    image: {
                        src: e.attr("data-particles-shape-image-src") ? e.attr("data-particles-shape-image-src") : !1,
                        width: e.attr("data-particles-shape-image-width") ? e.attr("data-particles-shape-image-width") : !1,
                        height: e.attr("data-particles-shape-image-height") ? e.attr("data-particles-shape-image-height") : !1
                    }
                },
                opacity: {
                    value: e.attr("data-particles-opacity-value") ? e.attr("data-particles-opacity-value") : "0.5",
                    random: "true" == e.attr("data-particles-opacity-random"),
                    anim: {
                        enable: "true" == e.attr("data-particles-opacity-anim-enable"),
                        speed: e.attr("data-particles-opacity-anim-speed") ? e.attr("data-particles-opacity-anim-speed") : "1",
                        opacity_min: e.attr("data-particles-opacity-anim-opacity-min") ? e.attr("data-particles-opacity-anim-opacity-min") : "0.1",
                        sync: "true" == e.attr("data-particles-opacity-anim-sync")
                    }
                },
                size: {
                    value: e.attr("data-particles-size-value") ? e.attr("data-particles-size-value") : "5",
                    random: "true" == e.attr("data-particles-size-random"),
                    anim: {
                        enable: "true" == e.attr("data-particles-size-anim-enable"),
                        speed: e.attr("data-particles-size-anim-speed") ? e.attr("data-particles-size-anim-speed") : "40",
                        size_min: e.attr("data-particles-size-anim-size-min") ? e.attr("data-particles-size-anim-size-min") : "0.1",
                        sync: "true" == e.attr("data-particles-size-anim-sync")
                    }
                },
                line_linked: {
                    enable: "true" == e.attr("data-particles-line-linked-enable-auto"),
                    distance: e.attr("data-particles-line-linked-distance") ? e.attr("data-particles-line-linked-distance") : "150",
                    color: e.attr("data-particles-line-linked-color") ? e.attr("data-particles-line-linked-color") : "#000000",
                    opacity: e.attr("data-particles-line-linked-opacity") ? e.attr("data-particles-line-linked-opacity") : "0.4",
                    width: e.attr("data-particles-line-linked-width") ? e.attr("data-particles-line-linked-width") : "1"
                },
                move: {
                    enable: "true" == e.attr("data-particles-move-enabled"),
                    speed: e.attr("data-particles-move-speed") ? e.attr("data-particles-move-speed") : "6",
                    direction: e.attr("data-particles-move-direction") ? e.attr("data-particles-move-direction") : "none",
                    random: "true" == e.attr("data-particles-move-random"),
                    straight: "true" == e.attr("data-particles-move-straight"),
                    out_mode: e.attr("data-particles-move-out-mode") ? e.attr("data-particles-move-out-mode") : "bounce",
                    attract: {
                        enable: !1,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: "window", /*anvas*/
                events: {
                    onhover: {
                        enable: "true" == e.attr("data-particles-interactivity-onhover-enable"),
                        mode: e.attr("data-particles-interactivity-onhover-mode") ? e.attr("data-particles-interactivity-onhover-mode") : "grab"
                    },
                    onclick: {
                        enable: !1,
                        mode: "push"
                    },
                    resize: !0
                },
                modes: {
                    grab: {
                        distance: e.attr("data-particles-interactivity-modes-grab-distance") ? e.attr("data-particles-interactivity-modes-grab-distance") : "312",
                        line_linked: {
                            opacity: e.attr("data-particles-interactivity-modes-grab-line-linked-opacity") ? e.attr("data-particles-interactivity-modes-grab-line-linked-opacity") : "0.7"
                        }
                    },
                    bubble: {
                        distance: 400,
                        size: 40,
                        duration: 2,
                        opacity: 8,
                        speed: 3
                    },
                    repulse: {
                        distance: e.attr("data-particles-interactivity-modes-repulse-distance") ? e.attr("data-particles-interactivity-modes-repulse-distance") : "312"
                    },
                    push: {
                        particles_nb: 4
                    },
                    remove: {
                        particles_nb: 2
                    }
                }
            },
            retina_detect: !0
    });
}

function openTopnavDropdown() {
    let topnav = jQuery('.topnav');
    let icon = topnav.find('.icon-topnav');
    let dropdown = topnav.find('.dropdown-mobile');

    icon.removeClass('clip-show').addClass('clip-hide').hide(500, () => {
        if (icon.hasClass('fa-bars')) {
            icon.removeClass('fa-bars');
            icon.addClass('fa-xmark').show();

            topnav.animate({ backgroundColor: "#192f4f" });

            dropdown.slideDown();

        } else {
            icon.removeClass('fa-xmark');
            icon.addClass('fa-bars').show();

            dropdown.slideUp(() => {
                topnav.animate({ backgroundColor: "transparent" });
            });
        }

        icon.removeClass('clip-hide').addClass('clip-show');
    });
 
}

function showScrollTopBtn() {
    jQuery(window).on('scroll', () => {
        if(jQuery(window).scrollTop() > 80) {
            jQuery('#scrollTop').fadeIn();
        }
        else {
            jQuery('#scrollTop').fadeOut();
        }

        let aos = [
            jQuery('div[data-aos-core="1"]'),
            jQuery('div[data-aos-core="2"]'),
            jQuery('div[data-aos-core="3"]'),
            jQuery('div[data-aos-core="4"]'),
            jQuery('div[data-aos-core="5"]'),
            jQuery('div[data-aos-core="6"]')
        ];

        // if(jQuery(window).scrollTop() > 1200) {
        //     aos[0].fadeIn(250, () => {
        //         aos[1].fadeIn(250, () => {
        //             aos[2].fadeIn(250, () => {
        //                 aos[3].fadeIn(250, () => {
        //                     aos[4].fadeIn(250, () => {
        //                         aos[5].fadeIn(250, () => {
        //                             aos[0].fadeIn(250);
        //                         });
        //                     });
        //                 });
        //             });
        //         });
        //     });
        // }
    })
}

function inVisible(element) {
    var WindowTop = jQuery(window).scrollTop();
    var WindowBottom = WindowTop + jQuery(window).height();
    var ElementTop = element.offset().top;
    var ElementBottom = ElementTop + element.height();

    if(!element.hasClass('showed') && ElementTop < WindowBottom) {
        element.addClass('showed');

        setTimeout(function() {
            element.find('a').addClass('showed');
    
            setTimeout(function() {
                element.find('img').addClass('showed');

                setTimeout(function() {
                    element.find('span').addClass('showed');
                }, 500);
            }, 500);
        }, 500);
        
    }
}

function goToStep(n) {
    let thistep = n - 1;

    if(n > 3) {
        jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: args_bi.ajax_url,
            data: {
                action: 'check-level',
                todo: thistep,
                res: jQuery('div[data-step='+thistep+']').find('input').val()
            },
            success: function (response) {
                if(response.status == 'success') {
                    if(response.result == 'go') {
                        jQuery('section.base').append(response.html);
                        
                        Swal.fire({
                            title: 'Yup!',
                            text: 'Risposta esatta :)',
                            icon: 'success',
                            confirmButtonColor: '#198754',
                            confirmButtonText: 'Prossimo'
                        }).then((result) => {
                            if(result.isConfirmed) {
                                jQuery('div[data-step='+thistep+']').hide("slide", { direction: "left" }, 250, () => {
                                    jQuery('div[data-step='+n+']').show("slide", { direction: "right" }, 250, () => {
                            
                                    });
                                });
                            }
                        });
                    }
                    else {
                        Swal.fire({
                            title: 'Ops!',
                            text: 'Risposta sbagliata :)',
                            icon: 'error',
                            confirmButtonColor: '#d83443',
                            confirmButtonText: 'Riprova'
                        });
                    }
                }
                else {
                    Swal.fire({
                        title: 'Ops!',
                        text: 'Non ci provare :)',
                        icon: 'error',
                        confirmButtonColor: '#d83443',
                        confirmButtonText: 'Riprova'
                    });
                }         
            }
        });
    }
    else {
        jQuery('div[data-step='+thistep+']').hide("slide", { direction: "left" }, 250, () => {
            jQuery('div[data-step='+n+']').show("slide", { direction: "right" }, 250, () => {
    
            });
        });
    }
}