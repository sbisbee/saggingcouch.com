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
  var toc = $('#toc');
  var tocBuffer = '<ul>';
  var inner = false;

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

  if(toc[0]) {
    $('h2, h3').each(function() {
      var link = encodeURIComponent($(this).text().toLowerCase());

      if(this.nodeName.toLowerCase() === 'h3' && !inner) {
        inner = true;

        tocBuffer += '<ul>';
      }
      else if(this.nodeName.toLowerCase() === 'h2' && inner) {
        inner = false;

        tocBuffer += '</ul>';
      }

      $(this).attr('id', link);
      tocBuffer += '<li><a href="#' + link + '">' + $(this).text() + '</a>';
    });

    $(toc).html(tocBuffer + '</ul>');
  }
});
