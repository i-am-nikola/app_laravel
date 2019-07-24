// Common.js
$(document).ready(() => {
  $('#example1').DataTable()
  $('#example2').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
  })
})

$(document).ready(() => {
  $('.alert').delay(2000).fadeOut(2000);
})

$(document).ready(() => {
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' /* optional */
  });
})

$(document).ready(() => {
  $('#delete').on('shown.bs.modal', (event) => {
    var button = $(event.relatedTarget);
    var userid = button.data('userid');
    $('#user-id').val(userid);    
  })
})