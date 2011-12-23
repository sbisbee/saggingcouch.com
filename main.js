$(function() {
  var toc = $('#toc');
  var tocBuffer = '<ul>';
  var inner = false;

  $('#exTabs').tabs();
  $('#downloadTabs').tabs().css('border', 'none');

  if(toc[0]) {
    $('h2, h3').each(function(i) {
      if(this.nodeName.toLowerCase() === 'h3' && !inner) {
        inner = true;

        tocBuffer += '<ul>';
      }
      else if(this.nodeName.toLowerCase() === 'h2' && inner) {
        tocBuffer += '</ul>';
      }

      $(this).attr('id', 'title' + i);
      tocBuffer += '<li><a href="#title' + i + '">' + $(this).text() + '</a>';
    });

    $(toc).html(tocBuffer + '</ul>');
  }
});
