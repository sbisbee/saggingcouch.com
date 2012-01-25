function trackEvent(arr) {
  if(typeof _gaq === 'object' && typeof _gaq.push === 'function') {
    _gaq.push(['_trackEvent'].concat(arr));
  }
  else if(console && console.log) {
    //TODO something else
    console.log('no');
  }
}

$(function() {
  $('#exTabs').tabs({
    select: function(e, ui) {
      trackEvent([
        'Home Example Tabs',
        'Select - Tab',
        $(ui.tab).text()
      ]);
    }
  });

  $('#downloadTabs').tabs({
    select: function(e, ui) {
      trackEvent([
        'Download Tabs',
        'Select - Tab',
        $(ui.tab).text()
      ]);
    }
  })
  .css('border', 'none');

  $(window).hashchange(function(e) {
    if(location.hash) {
      trackEvent([
        'JS Docs',
        'Hash Change',
        decodeURIComponent(location.hash.substr(1))
      ]);
    }
  });

  $(window).hashchange();
});
