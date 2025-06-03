$(function () {
  const urlParams = new URLSearchParams(window.location.search);
  const filter = urlParams.get("filter");

  $('.isotope-container').each(function () {
    let $container = $(this);
    let isInitialized = false;

    function initializeIsotope() {
      if (isInitialized) return;
      $container.isotope({
        itemSelector: '.trending-items',
        layoutMode: 'fitRows',
        transitionDuration: '0.4s'
      });
      isInitialized = true;

      if (filter) {
        applyFilter(filter);
        updateActiveFilter(filter);
      }
    }

    function applyFilter(filterValue) {
      let filterSelector = filterValue;
      if (!filterValue || filterValue === "*") {
        filterSelector = "*";
      } else if (!filterValue.startsWith(".")) {
        filterSelector = "." + filterValue;
      }
      $container.isotope({ filter: filterSelector });
    }

    function updateActiveFilter(filterValue) {
      $(".trending-filter a").removeClass("is_active");
      if (!filterValue || filterValue === "*") {
        $('[data-filter="*"]').addClass("is_active");
      } else {
        const selector = filterValue.startsWith(".") ? filterValue : "." + filterValue;
        $(`[data-filter="${selector}"]`).addClass("is_active");
      }
    }

    // Wait for items to load then initialize
    const checkInterval = setInterval(() => {
      if ($container.find('.trending-items').length > 0) {
        clearInterval(checkInterval);
        setTimeout(() => {
          initializeIsotope();
        }, 200);
      }
    }, 100);

    // Filter button click
    $(".trending-filter").on("click", "a", function(event) {
      event.preventDefault();
      if (!isInitialized) return;
      var filterValue = $(this).attr('data-filter');
      $container.isotope({ filter: filterValue });
      $(".trending-filter a").removeClass("is_active");
      $(this).addClass("is_active");
      // Update URL
      const filterParam = filterValue === "*" ? "" : filterValue.replace(".", "");
      const newUrl = filterParam ?
        `${window.location.pathname}?filter=${filterParam}` :
        window.location.pathname;
      history.pushState(null, null, newUrl);
    });

    // Handle browser back/forward
    window.addEventListener('popstate', function() {
      const urlParams = new URLSearchParams(window.location.search);
      const currentFilter = urlParams.get("filter");
      if (currentFilter) {
        applyFilter(currentFilter);
        updateActiveFilter(currentFilter);
      } else {
        applyFilter("*");
        updateActiveFilter("*");
      }
    });
  });
});