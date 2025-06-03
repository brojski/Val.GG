$(function () {
    // Try to get page_id from hidden input, or from URL if not set
    let pageId = $('#page_id').val();
    if (!pageId) {
        const urlParams = new URLSearchParams(window.location.search);
        pageId = urlParams.get('name') || urlParams.get('id') || '';
        $('#page_id').val(pageId);
    }

    function loadComments() {
        if (!pageId) return;
        $.get('../php/display_comments.php', { page_id: pageId }, function(data) {
            $('#comments-list').html(data);
        });
    }

    if ($('#add-comment-form').length) {
        // Initial load of comments
        loadComments();

        // Add comment functionality (AJAX)
        $('#add-comment-form').on('submit', function (e) {
            e.preventDefault();
            var comment = $('#comment').val();

            $.ajax({
                url: '../php/submit_comment.php',
                type: 'POST',
                data: {
                    comment: comment,
                    page_id: pageId,
                    submit_comment: true
                },
                success: function (response) {
                    if (response.trim() === "success") {
                        $('#comment').val('');
                        loadComments();
                    } else {
                        $('#errorcomment').text(response);
                    }
                },
                error: function () {
                    $('#errorcomment').text('Error submitting comment.');
                }
            });
        });
    }
});