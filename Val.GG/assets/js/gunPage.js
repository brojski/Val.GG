$(function () {
    // Get gun name from URL
    const urlParams = new URLSearchParams(window.location.search);
    const gunNameParam = urlParams.get('name'); // e.g. "spectre"

    // Fetch weapon data from API
    $.ajax({
        type: 'GET',
        url: 'https://valorant-api.com/v1/weapons',
        success: function (data) {
            // ...your existing code for displaying gun info...
        }
    });

    // Set hidden input for page_id (for comment form)
    $('#page_id').val(gunNameParam);

    // Helper to reload comments
    function loadComments() {
        $.get('../php/display_comments.php', { page_id: gunNameParam }, function(data) {
            $('#comments-list').html(data);
        });
    }

    // Initial load of comments
    loadComments();

    // Add comment functionality (AJAX)
    $('#add-comment-form').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submit (no refresh)
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

    // Fetch weapon data from API
    $.ajax({
        type: 'GET',
        url: 'https://valorant-api.com/v1/weapons',
        success: function (data) {
            // Find the correct weapon
            const weapon = data.data.find(w => w.displayName.toLowerCase().replace(/\s/g, '') === gunNameParam);
            if (!weapon) return;

            // Set main image to displayIcon
            $('#main-image').attr('src', weapon.displayIcon);

            // Set gun name
            $('#gun-name').text(weapon.displayName);

            // Dynamically set page heading and breadcrumb
            $('.page-heading.header-text h3').text('Arsenal');
            $('.page-heading.header-text .breadcrumb').html(
                `<a href="../index.php">Home</a> > <a href="../arsenal.php">Arsenal</a> > ${weapon.displayName}`
            );

            // Prepare stats
            const stats = weapon.weaponStats || {};
            const shop = weapon.shopData || {};

            // Wall penetration mapping
            const wallPenMap = {
                "EWallPenetrationDisplayType::Low": "Low",
                "EWallPenetrationDisplayType::Medium": "Medium",
                "EWallPenetrationDisplayType::High": "High"
            };

            // Build stats list
            let statsList = '';
            if (stats.fireRate !== undefined) statsList += `<li class="list-group-item"><b>Fire Rate:</b> ${stats.fireRate}</li>`;
            if (stats.magazineSize !== undefined) statsList += `<li class="list-group-item"><b>Magazine Size:</b> ${stats.magazineSize}</li>`;
            if (stats.runSpeedMultiplier !== undefined) statsList += `<li class="list-group-item"><b>Run Speed Multiplier:</b> ${stats.runSpeedMultiplier}</li>`;
            if (stats.equipTimeSeconds !== undefined) statsList += `<li class="list-group-item"><b>Equip Time (s):</b> ${stats.equipTimeSeconds}</li>`;
            if (stats.reloadTimeSeconds !== undefined) statsList += `<li class="list-group-item"><b>Reload Time (s):</b> ${stats.reloadTimeSeconds}</li>`;
            if (stats.firstBulletAccuracy !== undefined) statsList += `<li class="list-group-item"><b>First Bullet Accuracy:</b> ${stats.firstBulletAccuracy}</li>`;
            if (stats.shotgunPelletCount !== undefined) statsList += `<li class="list-group-item"><b>Shotgun Pellet Count:</b> ${stats.shotgunPelletCount}</li>`;
            if (stats.wallPenetration !== undefined) statsList += `<li class="list-group-item"><b>Wall Penetration:</b> ${wallPenMap[stats.wallPenetration] || stats.wallPenetration}</li>`;
            if (shop.cost !== undefined) statsList += `<li class="list-group-item"><b>Cost:</b> ${shop.cost}</li>`;

            $('#gun-stats').html(statsList);

            // Optionally: Show skins as thumbnails
            let skinsHtml = '';
            if (weapon.skins && weapon.skins.length > 0) {
                weapon.skins.forEach(skin => {
                    if (skin.displayIcon) {
                        skinsHtml += `<img src="${skin.displayIcon}" alt="${skin.displayName}" title="${skin.displayName}" style="height:60px;margin:4px;border-radius:6px;">`;
                    }
                });
            }
            $('#skin-thumbnails').html(skinsHtml);
        }
    });
});