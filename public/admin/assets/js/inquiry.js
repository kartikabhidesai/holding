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