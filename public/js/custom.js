$(document).ready(function () {

    console.log(operators_list)

  // datatable
  $('[data-ride="datatables"]').each(function() {
    var oTable = $(this).dataTable( {
      "bProcessing": true,
      "aaData": operators_list,
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "sPaginationType": "full_numbers",
      "aoColumns": [
        { "mData": "id" },
        { "mData": "name" },
        { "mData": "phone" },
        { "mData": "last_call_time" },
        { "mData": "calls_count_6" },
        { "mData": "calls_count_24" },
        { "mData": "calls_count_48" }
      ]
    } );
  });
});