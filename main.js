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

    return false;
  });

  $('#exTabs').tabs();
});
