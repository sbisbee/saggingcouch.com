function trackEvent(arr) {
  if(typeof _gaq === 'object' && typeof _gaq.push === 'function') {
    _gaq.push(['_trackEvent'].concat(arr));
  }
  else {
    //TODO something else
    console.log('no');
  }
}

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-15812049-1']);
_gaq.push(['_trackPageview']);

(function() {
  var ga = document.createElement('script'); ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.come/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

(function (window, document) {
  var ref = document.getElementsByTagName('script')[0],
      script = document.createElement('script'),
      secure = window.location.protocol === 'https:';
  script.async = true;
  script.src = secure ? 'https://secure-platform.tiptheweb.org/tip/button.js'
                      : 'http://platform.tiptheweb.org/tip/button.js';
  ref.parentNode.insertBefore(script, ref);
}(this, this.document));

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
