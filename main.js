function trackEvent(arr) {
  if(typeof _gaq === 'object' && typeof _gaq.push === 'function') {
    _gaq.push(['_trackEvent'].concat(arr));
  }
  else {
    //TODO something else
    console.log('no');
  }
}

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
