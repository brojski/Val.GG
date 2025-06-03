$(function () {
  $.ajax({
    type: 'GET',
    url: 'https://valorant-api.com/v1/maps',
    success: function (maps) {
      var $mapsContainer = $('#mapsContainer');
      let cloudName = 'dcjendb68';
      // List of maps to mark as current
      const currentMaps = [
        "Ascent", "Icebox", "Haven", "Lotus", "Pearl", "Split", "Sunset"
      ];
      $.each(maps.data, function(i, map) {
        // Skip Basic Training and The Range
        if (map.displayName === "The Range" || map.displayName === "Basic Training") return;

        // Add 'current' class only to specified maps
        var currentClass = currentMaps.includes(map.displayName) ? 'current' : '';
        let encodedUrl = encodeURIComponent(map.splash);
        let imgSrc = `https://res.cloudinary.com/${cloudName}/image/fetch/w_600,q_auto,f_auto/${encodedUrl}`;
        var mapBox = `
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items ${currentClass}">
            <div class="item">
              <div class="thumb">
                <a href="maps/mapPage.php?name=${map.displayName.toLowerCase().replace(/\s/g, '')}">
                  <img src="${imgSrc}" alt="${map.displayName}" />
                </a>
              </div>
              <div class="down-content">
                <h4>${map.displayName}</h4>
              </div>
            </div>
          </div>
        `;
        $mapsContainer.append(mapBox);
      });
    }
  });
});