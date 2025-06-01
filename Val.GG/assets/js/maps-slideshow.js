$(function () {
    // 1. Get map name from URL
    const urlParams = new URLSearchParams(window.location.search);
    const mapNameParam = urlParams.get('name'); // e.g. "abyss"

    // 2. Fetch map data from API
    $.ajax({
        type: 'GET',
        url: 'https://valorant-api.com/v1/maps',
        success: function (maps) {
            // 3. Find the correct map
            const map = maps.data.find(m => m.displayName.toLowerCase().replace(/\s/g, '') === mapNameParam);
            if (!map) return;

            // 4. Set main image to splash
            $('#main-image').attr('src', map.splash);

            // 5. Set thumbnails
            $('.thumbnail-container').html(`
                <img src="${map.splash}" alt="Thumbnail 1" onclick="changeImage('${map.splash}')" />
                <img style="object-fit: contain;" src="${map.displayIcon}" alt="Thumbnail 2" onclick="changeImage('${map.displayIcon}')" />
            `);

            // 6. Set map name
            $('.agent-name h2').text(map.displayName);

            // 7. Set map description
            $('.agent-desc p').text(map.narrativeDescription || map.coordinates || "No description available.");

            // 8. Update breadcrumb
            $('.breadcrumb').html(`<a href="../index.php">Home</a> > <a href="../maps.php">Maps</a> > ${map.displayName}`);
        }
    });
});

// Helper function for changing the main image
function changeImage(src) {
    $('#main-image').attr('src', src);
}