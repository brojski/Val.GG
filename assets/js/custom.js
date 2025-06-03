(function ($) {
    "use strict";

    // Page loading animation
    $(window).on('load', function() {
        $('#js-preloader').addClass('loaded');

        $("#preloader").animate({
            'opacity': '0'
        }, 600, function(){
            setTimeout(function(){
                $("#preloader").css("visibility", "hidden").fadeOut();
            }, 300);
        });
    });

    // Header background toggle on scroll
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var box = $('.header-text').height();
        var header = $('header').height();

        if (scroll >= box - header) {
            $("header").addClass("background-header");
        } else {
            $("header").removeClass("background-header");
        }
    });

    // Menu Dropdown Toggle
    if ($('.menu-trigger').length) {
        $(".menu-trigger").on('click', function() {    
            $(this).toggleClass('active');
            $('.header-area .nav').slideToggle(200);
        });
    }

    // Menu elevator animation
    $('.scroll-to-section a[href*=\\#]:not([href=\\#])').on('click', function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                var width = $(window).width();
                if (width < 991) {
                    $('.menu-trigger').removeClass('active');
                    $('.header-area .nav').slideUp(200);    
                }                
                $('html,body').animate({
                    scrollTop: (target.offset().top) - 80
                }, 700);
                return false;
            }
        }
    });
})(window.jQuery);


// Login and Register and Edit

$(function() {
    $('#login-form').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'php/ajax_login.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#login-message').html(
                        "<div class='message' id='success'><p>Login Successful</p></div>"
                    );
                    setTimeout(function() {
                        window.location.href = 'index.php'; // or your dashboard/home page
                    }, 1500); // 1.5 seconds delay
                } else {
                    $('#login-message').html(
                        "<div class='message' id='error'><p>" + response.message + "</p></div>"
                    );
                }
            },
            error: function() {
                $('#login-message').html(
                    "<div class='message' id='error'><p>Server error. Please try again.</p></div>"
                );
            }
        });
    });
});



$(function() {
    $('#signup-form').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'php/ajax_signup.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#signup-message').html(
                        "<div class='message' id='success'><p>" + response.message + "</p></div>"
                    );
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 1500);
                } else {
                    $('#signup-message').html(
                        "<div class='message' id='error'><p>" + response.message + "</p></div>"
                    );
                }
            },
            error: function() {
                $('#signup-message').html(
                    "<div class='message' id='error'><p>Server error. Please try again.</p></div>"
                );
            }
        });
    });
});

$(function() {
    $('#edit-form').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'php/ajax_edit_profile.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#edit-message').html(
                        "<div class='message' id='success'><p>" + response.message + "</p></div>"
                    );
                } else {
                    $('#edit-message').html(
                        "<div class='message' id='error'><p>" + response.message + "</p></div>"
                    );
                }
            },
            error: function() {
                $('#edit-message').html(
                    "<div class='message' id='error'><p>Server error. Please try again.</p></div>"
                );
            }
        });
    });
});