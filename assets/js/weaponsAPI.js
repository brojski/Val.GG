$(function () {
    // Map API categories to your filter classes
    const categoryMap = {
        "Sidearm": "sidearm",
        "SMG": "smg",
        "Rifle": "rifle",
        "Shotgun": "shotgun",
        "Sniper": "sniper",
        "Heavy": "heavy",
        "Melee": "melee"
    };

    $.ajax({
        type: 'GET',
        url: 'https://valorant-api.com/v1/weapons',
        success: function (data) {
            var $weaponsContainer = $('#weaponsContainer');
            $weaponsContainer.empty();

            let cloudName = 'dcjendb68';

            $.each(data.data, function (i, weapon) {
                // Get category from API and map to your class
                let apiCategory = weapon.category.split("::").pop().trim(); // e.g. "Rifle"
                let filterClass = categoryMap[apiCategory] || "";

                // Use Cloudinary fetch for compression/optimization
                let imgSrc = weapon.displayIcon
                    ? `https://res.cloudinary.com/${cloudName}/image/fetch/w_400,q_auto,f_auto/${encodeURIComponent(weapon.displayIcon)}`
                    : '';
                let name = weapon.displayName || '';
                let gunUrlName = name.toLowerCase().replace(/\s/g, '');

                // Build weapon box (structure matches your example)
                var weaponBox = `
                    <div class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items ${filterClass}">
                        <div class="item">
                            <div class="thumb">
                                <a href="arsenal/gunPage.php?name=${gunUrlName}">
                                    <img src="${imgSrc}" alt="${name}" />
                                </a>
                            </div>
                            <div class="down-content">
                                <h4>${name}</h4>
                            </div>
                        </div>
                    </div>
                `;
                $weaponsContainer.append(weaponBox);
            });
        }
    });
});