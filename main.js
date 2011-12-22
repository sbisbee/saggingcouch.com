$(function() {
  var downloadDialog = $('#downloadDialog').dialog({
    height: 200,
    autoOpen: false,
    draggable: false,
    resizable: false,
    modal: true
  });

  $(downloadDialog).find('li>a').click(function() {
    $(downloadDialog).dialog('close');
  });

  $('#download').click(function(e) {
    e.preventDefault();

    $(downloadDialog).dialog('open');

    $('.ui-widget-overlay').click(function() {
      $(downloadDialog).dialog('close');
    });

    return false;
  });

  $('#exTabs').tabs();
  $('#downloadTabs').tabs().css('border', 'none');
});
