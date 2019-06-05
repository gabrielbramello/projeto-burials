$(document).ready(function() {
  $('#todos').hide();
  $('#janelas').hide();
  $('#camadas').hide();
  $('#opcoes').change(function() {
    if ($('#opcoes').val() == '1') {
      $('#todos').show();
      $('#janelas').hide();
      $('#camadas').hide();
    } else if ($('#opcoes').val() == '2') {
      $('#janelas').show();
      $('#todos').hide();
      $('#camadas').hide();
    } else if ($('#opcoes').val() == '3') {
        $('#camadas').show();
        $('#todos').hide();
        $('#janelas').hide();
    }else{
        $('#todos').hide();
        $('#janelas').hide();
        $('#camadas').hide();
    }
  });
});
