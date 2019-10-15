var Inquiry = function() {
    var list = function() {
        
        var dataArr = {};
        var columnWidth = {"targets": 0};
        var arrList = {
            'tableID': '#inquireytable',
            'ajaxURL': baseurl + "inquirey-ajaxAction",
            'ajaxAction': 'getdatatable',
            'postData': dataArr,
            'hideColumnList': [],
            'noSearchApply': [0],
            'noSortingApply': [3,5],
            'defaultSortColumn': 0,
            'defaultSortOrder': 'desc',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);
        
        $('body').on("click",".closeinquirey",function(){
            var val = $(this).attr("data-id"); 
            setTimeout(function() {
                $('.yes-sure-close:visible').attr('data-id', val);
            }, 500);
        });
        
        $('body').on('click', '.yes-sure-close', function() {
            var id = $(this).attr('data-id');
            
            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "inquirey-ajaxAction",
                data: {'action': 'closeinquirey', 'data': data},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
        
        
        
        $('body').on("click",".openinquirey",function(){
             var val = $(this).attr("data-id");
              setTimeout(function() {
                $('.yes-sure-open:visible').attr('data-id', val);
            }, 500);
        });
        
        $('body').on('click', '.yes-sure-open', function() {
            var id = $(this).attr('data-id');
            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "inquirey-ajaxAction",
                data: {'action': 'openinquirey', 'data': data},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
        
        
        
        $('body').on("click",".deleteinquirey",function(){
             var val = $(this).attr("data-id");
              setTimeout(function() {
                $('.yes-sure:visible').attr('data-id', val);
            }, 500);
        });
        
        $('body').on('click', '.yes-sure', function() {
            var id = $(this).attr('data-id');
            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "inquirey-ajaxAction",
                data: {'action': 'deleteinquirey', 'data': data},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
        
        
    }
    var closelist = function() {
        
        var dataArr = {};
        var columnWidth = {"targets": 0};
        var arrList = {
            'tableID': '#inquireytable',
            'ajaxURL': baseurl + "inquirey-ajaxAction",
            'ajaxAction': 'getdatatableclose',
            'postData': dataArr,
            'hideColumnList': [],
            'noSearchApply': [0],
            'noSortingApply': [3,5],
            'defaultSortColumn': 0,
            'defaultSortOrder': 'desc',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);
        
        
        $('body').on("click",".closeinquirey",function(){
            var val = $(this).attr("data-id"); 
            setTimeout(function() {
                $('.yes-sure-close:visible').attr('data-id', val);
            }, 500);
        });
        
        $('body').on('click', '.yes-sure-close', function() {
            var id = $(this).attr('data-id');
            
            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "inquirey-ajaxAction",
                data: {'action': 'closeinquirey', 'data': data},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
        
        
        
        $('body').on("click",".openinquirey",function(){
             var val = $(this).attr("data-id");
              setTimeout(function() {
                $('.yes-sure-open:visible').attr('data-id', val);
            }, 500);
        });
        
        $('body').on('click', '.yes-sure-open', function() {
            var id = $(this).attr('data-id');
            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "inquirey-ajaxAction",
                data: {'action': 'openinquirey', 'data': data},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
        
        
        
        $('body').on("click",".deleteinquirey",function(){
             var val = $(this).attr("data-id");
              setTimeout(function() {
                $('.yes-sure:visible').attr('data-id', val);
            }, 500);
        });
        
        $('body').on('click', '.yes-sure', function() {
            var id = $(this).attr('data-id');
            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "inquirey-ajaxAction",
                data: {'action': 'deleteinquirey', 'data': data},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
    }
    
    var addinquirey = function(){
        var form = $('#addinquirey');
        var rules = {
            fname: {required: true},
            lname: {required: true},
            email: {required: true},
            email: {required: true,email:true},
            time: {required: true},
            idate: {required: true},
            isources: {required: true},
            companyname: {required: true},
            mono: {maxlength: 10,minlength: 10},
            
            
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }
    return {
        init: function() {
            list();
        },
        close: function() {
            closelist();
        },
        add: function() {
            addinquirey();
        },
    }
}();