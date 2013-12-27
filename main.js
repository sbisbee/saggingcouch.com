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

(function (window, document) {
  var ref = document.getElementsByTagName('script')[0],
      script = document.createElement('script'),
      secure = window.location.protocol === 'https:';
  script.async = true;
  script.src = secure ? 'https://secure-platform.tiptheweb.org/tip/button.js'
                      : 'http://platform.tiptheweb.org/tip/button.js';
  ref.parentNode.insertBefore(script, ref);
}(this, this.document));
