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









$(function() {
    // Load comments
    function loadComments() {
        var page_id = window.page_id;
        $.ajax({
            type: 'GET',
            url: '../php/display_comments.php',
            data: { page_id: page_id },
            success: function(data) {
                console.log("Comments loaded:", data); // Add this line
                $('#comments-list').html(data);
            }
        });
    }

    // Initial load
    loadComments();

    // Add comment
$('#add-comment-form').on('submit', function (e) {
    e.preventDefault(); // Prevent page refresh

    var comment = $('#comment').val();
    var page_id = $('#page_id').val();

    $.ajax({
        url: '../php/submit_comment.php',
        type: 'POST',
        data: {
            comment: comment,
            page_id: page_id,
            submit_comment: true
        },
        success: function (response) {
            if (response.trim() === "success") {
                $('#comment').val(''); // Clear textarea
                // Reload comments
                $.get('../php/display_comments.php', { page_id: page_id }, function(data) {
                    $('#comments-list').html(data);
                });
            } else {
                $('#errorcomment').text(response);
            }
        },
        error: function () {
            $('#errorcomment').text('Error submitting comment.');
        }
    });
});

    // Edit comment
    $('#comments-list').on('click', '.edit-comment-btn', function() {
        var $commentDiv = $(this).closest('.comment');
        var commentId = $(this).data('id');
        var $commentText = $commentDiv.find('.comment-text');
        var originalText = $commentText.text();

        // Replace text with textarea
        $commentText.replaceWith('<textarea class="edit-comment-textarea form-control" rows="2">' + originalText + '</textarea>');
        $(this).hide();
        $commentDiv.find('.delete-comment-btn').hide();
        $commentDiv.append('<button class="save-edit-btn btn btn-sm btn-success" data-id="' + commentId + '">Save</button> <button class="cancel-edit-btn btn btn-sm btn-secondary">Cancel</button>');
    });

    // Save edited comment
    $('#comments-list').on('click', '.save-edit-btn', function() {
        var $commentDiv = $(this).closest('.comment');
        var commentId = $(this).data('id');
        var newComment = $commentDiv.find('.edit-comment-textarea').val();

        $.post('../php/edit_comment.php', { comment_id: commentId, comment: newComment }, function(response) {
            if (response.trim() === "success") {
                loadComments();
            } else {
                alert(response);
            }
        });
    });

    // Cancel edit
    $('#comments-list').on('click', '.cancel-edit-btn', function() {
        loadComments();
    });




    // Delete comment
    $('#comments-list').on('click', '.delete-comment-btn', function() {
        if (!confirm('Delete this comment?')) return;
        var commentId = $(this).data('id');
        $.post('../php/delete_comment.php', { comment_id: commentId }, function(response) {
            if (response.trim() === "success") {
                loadComments();
            } else {
                alert(response);
            }
        });
    });
});