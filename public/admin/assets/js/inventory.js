var Inventory = function() {
    var add = function() {
     
        $('body').on('click', '.delete', function() {
            // $('#deleteModel').modal('show');
            var id = $(this).data('id');
            setTimeout(function() {
                $('.yes-sure:visible').attr('data-id', id);
            }, 500);
        })

        $('body').on('click', '.yes-sure', function() {
            var id = $(this).attr('data-id');
            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "inventory-ajax-action",
                data: {'action': 'deleteInventory', 'data': data},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
        
       
        var form = $('#addform');
        var rules = {
            firstname: {required: true, minlength: 2},
            lastname: {required: true},
            email: {required: true, email: true},
            mobile: {required: true, maxlength: 10, minlength: 10},
            city: {required: true},
            address: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
       var dataArr = {};
       var columnWidth = {"width": "10%", "targets": 0};
       
//        var arrList = {
//            'tableID': '#dataTables-example',
//            'ajaxURL': baseurl + "admin/demo-ajaxAction",
//            'ajaxAction': 'getdatatable',
//            'postData': dataArr,
//            'hideColumnList': [],
//            'noSearchApply': [0],
//            'noSortingApply': [3,5],
//            'defaultSortColumn': 0,
//            'defaultSortOrder': 'desc',
//            'setColumnWidth': columnWidth
//        };
//        getDataTable(arrList);
    }
    return {
        init: function() {
            add();
        }
    }
}();