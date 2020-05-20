(function ($) {
    "use strict"; // Start of use strict
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('.required').append(' <span class="red">(*)</span>');
    //close flash alert
    setTimeout(remove_alert, 5000);
    
    $('#' + mn_selected).addClass('active').parents(".treeview").addClass('active');
    $(".content-wrapper").attr("style", "min-height: none;");
    $("#checkAll").change(function () {
        $("input.checkItem:checkbox").prop('checked', $(this).prop("checked"));
    });
    
    $(".onlyEnterNumber").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    
    
    $("#btn-delete-all").on("click", function(){
       var routes = $(this).data("routes"); 
       $('#form_modal_delete').attr('action', root + routes);
       var idArr = [];
       $("#table-main tbody tr td .checkItem").each(function (){
           if($(this).is(':checked')){
               idArr.push($(this).val());
           }
       });
       $('#del_modal_id').val(idArr.join(","));
       $('#deleteModal').modal('show');
    });
    
})(jQuery);
/**
 * 
 * @returns {undefined}
 */
function remove_alert() {
    $('#flash_message').fadeOut();
}
/**
 * Modal delete 
 * 
 * @param {type} id
 * @param {type} routes
 * @returns {undefined}
 */
function deleteModal(id, routes) {
    $('#form_modal_delete').attr('action', root + routes);
    $('#del_modal_id').val(id);
    $('#deleteModal').modal('show');
}

function convertDate(date){
    if(date){
        return date.substr(6,4) + '/' + date.substr(3,2) + '/' + date.substr(0,2);
    }else{
        return false;
    }
    
}

function updateCartInfo(url){
    $.ajax({
        url: url,
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(response){
            $('#itemValue').text(response.total + 'đ');
            $('#itemCount').text(response.cartLists.length);
            alert(response.cartLists.length);
            
            for(var i = 0; i <= response.cartLists.length; i++)
            {
                alert(response.cartLists.name);
                $('#nameProduct').text(response.cartLists.name);
            }
        } 
    });
}



 