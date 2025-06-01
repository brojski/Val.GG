$(function () {
    const $breadcrumb = $('#breadcrumb');
    const $agentName = $('#agent-name');
    const $agentRole = $('#agent-role');
    const $roleIcon = $('#role-icon');
    const $agentImage = $('#agent-image');
    const $agentDesc = $('#agent-desc');
    const $videoButtons = $('#video-buttons');
    const $abilityName = $('#ability-name');
    const $abilityDesc = $('#ability-desc');

    const urlParams = new URLSearchParams(window.location.search);
    const agentNameParam = urlParams.get('name');
    $('#page_id').val(agentNameParam);

    // Helper to reload comments
    function loadComments() {
        $.get('../php/display_comments.php', { page_id: agentNameParam }, function(data) {
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

    // Load agent info and abilities
    $.ajax({
        type: 'GET',
        url: 'https://valorant-api.com/v1/agents',
        success: function (response) {
            const agent = response.data.find(a => a.displayName.toLowerCase().replace(/\s/g, '') === agentNameParam);
            if (!agent) return;

            $breadcrumb.html(`<a href="../index.php">Home</a> > <a href="../agents.php">Agents</a> > ${agent.displayName}`);
            $agentName.text(agent.displayName);
            $agentDesc.text(agent.description || 'No description available.');
            $agentRole.text(agent.role ? agent.role.displayName : 'Unknown Role');
            $roleIcon.attr('src', agent.role ? agent.role.displayIcon : 'default-role-icon.png');
            $agentImage.attr('src', agent.fullPortrait || agent.displayIcon);
            $agentImage.attr('alt', agent.displayName);

            // Filter abilities with icons
            const abilities = agent.abilities.filter(a => a.displayIcon);

            // Render ability buttons
            $videoButtons.empty();
            abilities.forEach((ability, i) => {
                const button = $(`
                    <img
                        src="${ability.displayIcon}"
                        alt="${ability.displayName}"
                        title="${ability.displayName}"
                    />
                `);
                button.on('click', function () {
                    showAbility(i);
                });
                $videoButtons.append(button);
            });

            // Function to change video and ability info
            function showAbility(idx) {
                if (agentNameParam === 'kay/o') {
                    const videoPath = '../assets/images/agentabilitiesvids/kayo' + (idx+1)+ '.mp4';
                $('#video-placeholder source').attr('src', videoPath);
                $('#video-placeholder')[0].load();
                }
                else {
                // Build the video path: /assets/images/agentabilitiesvids/agentname1.mp4, agentname2.mp4, etc.
                const videoPath = '../assets/images/agentabilitiesvids/' + agentNameParam + (idx + 1) + '.mp4';
                $('#video-placeholder source').attr('src', videoPath);
                $('#video-placeholder')[0].load();
                }

                $abilityName.text(abilities[idx].displayName);
                $abilityDesc.text(abilities[idx].description || 'No description available.');
            }

            // Show the first ability by default
            showAbility(0);
        }
    });
});