$(function () {
    // 1. Get map name from URL
    const urlParams = new URLSearchParams(window.location.search);
    const mapNameParam = urlParams.get('name'); // e.g. "abyss"

    // Set hidden input for page_id (for comment form)
    $('#page_id').val(mapNameParam);

    // Helper to reload comments
    function loadComments() {
        $.get('../php/display_comments.php', { page_id: mapNameParam }, function(data) {
            $('#comments-list').html(data);
        });
    }

    // Initial load of comments
    loadComments();

    // Add comment functionality (AJAX)
    $('#add-comment-form').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submit (no refresh)

        var comment = $('#comment').val();

        $.ajax({
            url: '../php/submit_comment.php',
            type: 'POST',
            data: {
                comment: comment,
                page_id: mapNameParam,
                submit_comment: true
            },
            success: function (response) {
                if (response.trim() === "success") {
                    $('#comment').val(''); // Clear textarea
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

    // Fetch map data from API and update page
    $.ajax({
        type: 'GET',
        url: 'https://valorant-api.com/v1/maps',
        success: function (maps) {
            // Find the correct map
            const map = maps.data.find(m => m.displayName.toLowerCase().replace(/\s/g, '') === mapNameParam);
            if (!map) return;

            $('#page-title').text('Maps');
            $('#breadcrumb').html(
                `<a href="../index.php">Home</a> > <a href="../maps.php">Maps</a> > ${map.displayName}`
            );

            // Set main image to splash
            $('#main-image').attr('src', map.splash);

            // Set thumbnails
            $('.thumbnail-container').html(`
                <img src="${map.splash}" alt="Thumbnail 1" onclick="changeImage('${map.splash}')" />
                <img style="object-fit: contain;" src="${map.displayIcon}" alt="Thumbnail 2" onclick="changeImage('${map.displayIcon}')" />
            `);

            // Set map name
            $('.agent-name h2').text(map.displayName);

            // Set map description
            $('.agent-desc p').text(map.narrativeDescription || map.coordinates || "No description available.");
            
            // Build callouts list (regionNames)
            let calloutsText = '';
            if (Array.isArray(map.callouts) && map.callouts.length > 0) {
                calloutsText = map.callouts
                    .filter(callout => callout.regionName)
                    .map(callout => `• ${callout.regionName}`)
                    .join('<br>');
            }
            $('#map-callouts').html(calloutsText);
            // Update breadcrumb
            $('.breadcrumb').html(`<a href="../index.php">Home</a> > <a href="../maps.php">Maps</a> > ${map.displayName}`);
        }
    });
});

// Helper function for changing the main image
function changeImage(src) {
    $('#main-image').attr('src', src);
}