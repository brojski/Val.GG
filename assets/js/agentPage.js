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
    const pageNameParam = urlParams.get('name');
    $('#page_id').val(pageNameParam);

    // Load agent info and abilities
    $.ajax({
        type: 'GET',
        url: 'https://valorant-api.com/v1/agents',
        success: function (response) {
            const agent = response.data.find(a => a.displayName.toLowerCase().replace(/\s/g, '') === pageNameParam);
            if (!agent) return;

            $breadcrumb.html(`<a href="../index.php">Home</a> > <a href="../agents.php">Agents</a> > ${agent.displayName}`);
            $agentName.text(agent.displayName);
            $agentDesc.text(agent.description || 'No description available.');
            $agentRole.text(agent.role ? agent.role.displayName : 'Unknown Role');

            // Use Cloudinary fetch for role icon and agent image
            let cloudName = 'dcjendb68';
            let roleIconSrc = agent.role && agent.role.displayIcon
                ? `https://res.cloudinary.com/${cloudName}/image/fetch/w_40,q_auto,f_auto/${encodeURIComponent(agent.role.displayIcon)}`
                : 'default-role-icon.png';
            let agentImgSrc = agent.fullPortrait
                ? `https://res.cloudinary.com/${cloudName}/image/fetch/w_400,q_auto,f_auto/${encodeURIComponent(agent.fullPortrait)}`
                : `https://res.cloudinary.com/${cloudName}/image/fetch/w_400,q_auto,f_auto/${encodeURIComponent(agent.displayIcon)}`;

            $roleIcon.attr('src', roleIconSrc);
            $agentImage.attr('src', agentImgSrc);
            $agentImage.attr('alt', agent.displayName);

            // Filter abilities with icons
            const abilities = agent.abilities.filter(a => a.displayIcon);

            // Render ability buttons (compressed)
            $videoButtons.empty();
            abilities.forEach((ability, i) => {
                const abilityIconSrc = `https://res.cloudinary.com/${cloudName}/image/fetch/w_40,q_auto,f_auto/${encodeURIComponent(ability.displayIcon)}`;
                const button = $(`
                    <img
                        src="${abilityIconSrc}"
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
                if (pageNameParam === 'kay/o') {
                    const videoPath = '../assets/images/agentabilitiesvids/kayo' + (idx+1)+ '.mp4';
                    $('#video-placeholder source').attr('src', videoPath);
                    $('#video-placeholder')[0].load();
                }
                else {
                    // Build the video path: /assets/images/agentabilitiesvids/agentname1.mp4, agentname2.mp4, etc.
                    const videoPath = '../assets/images/agentabilitiesvids/' + pageNameParam + (idx + 1) + '.mp4';
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