$(function () {
    // Get gun name from URL
    const urlParams = new URLSearchParams(window.location.search);
    const pageNameParam = urlParams.get('name'); // e.g. "spectre"

    // Set hidden input for page_id (for comment form)
    $('#page_id').val(pageNameParam);

    // Fetch weapon data from API
    $.ajax({
        type: 'GET',
        url: 'https://valorant-api.com/v1/weapons',
        success: function (data) {
            // Find the correct weapon
            const weapon = data.data.find(w => w.displayName.toLowerCase().replace(/\s/g, '') === pageNameParam);
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
            let statsArr = [];
            if (stats.fireRate !== undefined) statsArr.push(`- Fire Rate: ${stats.fireRate}`);
            if (stats.magazineSize !== undefined) statsArr.push(`- Magazine Size: ${stats.magazineSize}`);
            if (stats.runSpeedMultiplier !== undefined) statsArr.push(`- Run Speed Multiplier: ${stats.runSpeedMultiplier}`);
            if (stats.equipTimeSeconds !== undefined) statsArr.push(`- Equip Time (s): ${stats.equipTimeSeconds}`);
            if (stats.reloadTimeSeconds !== undefined) statsArr.push(`- Reload Time (s): ${stats.reloadTimeSeconds}`);
            if (stats.firstBulletAccuracy !== undefined) statsArr.push(`- First Bullet Accuracy: ${stats.firstBulletAccuracy}`);
            if (stats.shotgunPelletCount !== undefined) statsArr.push(`- Shotgun Pellet Count: ${stats.shotgunPelletCount}`);
            if (stats.wallPenetration !== undefined) statsArr.push(`- Wall Penetration: ${wallPenMap[stats.wallPenetration] || stats.wallPenetration}`);
            if (shop.cost !== undefined) statsArr.push(`- Cost: ${shop.cost}`);

            $('#gun-stats').html(statsArr.join('<br>'));

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