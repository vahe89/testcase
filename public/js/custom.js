$(document).ready(function () {
 base_url = $("#base_url").val();


  // datatable

    var oTable = $("#example").DataTable( {
      "bProcessing": true,
        "ajax": base_url+'dashboard/dataList',
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "sPaginationType": "full_numbers",
      "aoColumns": [
        { "mData": "id" },
        { "mData": "name" },
        { "mData": "phone" },
        { "mData": "last_call_time" },
        { "mData": "calls_count_6" },
        { "mData": "calls_count_24" },
        { "mData": "calls_count_48" },
          { "mData": "last_call_time" }

      ]
    } );

    var oTable1 = $("#example_2").DataTable( {
        "bProcessing": true,
        "ajax": base_url+'dashboard/dataLogsList',
        "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
        "sPaginationType": "full_numbers",
        "aoColumns": [
            { "mData": "id" },
            { "mData": "name" },
            { "mData": "inbound_number" },
            { "mData": "outbound_number" },
            { "mData": "duration" },
            { "mData": "call_time" }

        ]
    } );

      $('#example tbody').on('click', 'tr', function () {

          var data = oTable.row( this ).data();
          $.ajax({
              url:  base_url+"dashboard/edit",
              dataType:'html',
              type:'post',
              data:{id:data.id}

          }).done(function(msg) {
              $( "#form-body" ).html( msg);
              $("#myModal").modal();
          });

      } );

$(document).on('click',"#save_operator",function(){
    var id = $("#op_id").val();
    var name = $("#op_name").val();
    var phone = $("#op_phone").val();
    $.ajax({
        url:  base_url+"dashboard/update",
        dataType:'html',
        type:'post',
        data:{
            id:id,
            name:name,
            phone:phone}
    }).done(function(msg) {
        //update jquery provider
        $("#myModal").modal('toggle');
        oTable.ajax.reload();
    });

})
    $("#select2_operators").chosen();

$("#show_message").on('click',function(){
   var data = $("#new_message").serialize();
   if($("#select2_operators").val() == 0){
       alert ('Please select operator');
       return false;
   }
    $.ajax({
        url:  base_url+"message/popup",
        dataType:'html',
        type:'post',
        data:data
    }).done(function(msg) {

            $( "#form-body" ).html( msg);
            $("#myModal").modal();


    });
})
});