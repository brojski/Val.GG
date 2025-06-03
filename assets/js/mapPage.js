$(function () {
    // 1. Get map name from URL
    const urlParams = new URLSearchParams(window.location.search);
    const pageNameParam = urlParams.get('name'); // e.g. "abyss"

    // Set hidden input for page_id (for comment form)
    $('#page_id').val(pageNameParam);

    // Fetch map data from API and update page
    $.ajax({
        type: 'GET',
        url: 'https://valorant-api.com/v1/maps',
        success: function (maps) {
            // Find the correct map
            const map = maps.data.find(m => m.displayName.toLowerCase().replace(/\s/g, '') === pageNameParam);
            if (!map) return;

            $('#page-title').text('Maps');
            $('#breadcrumb').html(
                `<a href="../index.php">Home</a> > <a href="../maps.php">Maps</a> > ${map.displayName}`
            );

            // Use Cloudinary fetch for compression/optimization
            let cloudName = 'dcjendb68';
            let splashSrc = map.splash
                ? `https://res.cloudinary.com/${cloudName}/image/fetch/w_900,q_auto,f_auto/${encodeURIComponent(map.splash)}`
                : '';
            let displayIconSrc = map.displayIcon
                ? `https://res.cloudinary.com/${cloudName}/image/fetch/w_300,q_auto,f_auto/${encodeURIComponent(map.displayIcon)}`
                : '';

            // Set main image to splash
            $('#main-image').attr('src', splashSrc);

            // Set thumbnails
            $('.thumbnail-container').html(`
                <img src="${splashSrc}" alt="Thumbnail 1" onclick="changeImage('${splashSrc}')" />
                <img style="object-fit: contain;" src="${displayIconSrc}" alt="Thumbnail 2" onclick="changeImage('${displayIconSrc}')" />
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