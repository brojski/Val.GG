$(function () {
  $.ajax({
    type: 'GET',
    url: 'https://valorant-api.com/v1/maps',
    success: function (maps) {
      var $mapsContainer = $('#mapsContainer');
      $.each(maps.data, function(i, map) {
        // Add .current class if map is in current rotation
        var currentClass = map.isInCurrentRotation ? 'current' : '';
        var mapBox = `
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items ${currentClass}">
            <div class="item">
              <div class="thumb">
                <a href="maps/mapPage.php?name=${map.displayName.toLowerCase().replace(/\s/g, '')}">
                  <img src="${map.splash}" alt="${map.displayName}" />
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