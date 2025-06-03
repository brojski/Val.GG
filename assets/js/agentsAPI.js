$(function () {
    var $agentsContainer = $('#agentsContainer');
    $.ajax({
        type: 'GET',
        url: 'https://valorant-api.com/v1/agents',
        success: function (agent) {
            $.each(agent.data, function(i, agent) {
                if (agent.isPlayableCharacter) {
                    // Use agent.php?name=agentname (lowercase, no spaces)
                    var agentName = agent.displayName.toLowerCase().replace(/\s/g, '');

                    // Optional: Use Cloudinary fetch for compression/optimization
                    let cloudName = 'dcjendb68';
                    let encodedUrl = encodeURIComponent(agent.displayIcon);
                    let imgSrc = `https://res.cloudinary.com/${cloudName}/image/fetch/w_400,q_auto,f_auto/${encodedUrl}`;
                    // For now, use direct API image:
                    // let imgSrc = agent.displayIcon;

                    var agentBox = `
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items ${agent.role ? agent.role.displayName.toLowerCase() : ''}">
                            <div class="item">
                                <div class="thumb">
                                    <a href="agents/agentPage.php?name=${agentName}">
                                        <img src="${imgSrc}" alt="${agent.displayName}" />
                                    </a>
                                </div>
                                <div class="down-content">
                                    <span class="category">${agent.role ? agent.role.displayName : ''}</span>
                                    <h4>${agent.displayName}</h4>
                                </div>
                            </div>
                        </div>
                    `;
                    $agentsContainer.append(agentBox);
                }
            });
        }
    });
});