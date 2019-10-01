var Vender = function () {
    var list = function () {

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
                url: baseurl + "vender-ajaxaction",
                data: {'action': 'deleteVender', 'data': data},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
    }

    var editCategory = function () {
        
        var form = $('#editvenderform');
        var rules = {
             fname: {required: true},
                lname: {required: true},
                email: {required: true, email: true},
                mobile: {required: true},
                password: {required: true},
                confirmpassword: {equalTo: "#password",required: true},
                country: {required: true},
                state: {required: true},
                city: {required: true},
                address: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
        
        $("body").on("change", ".state", function () {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "vender-ajaxaction",
                data: {'action': 'changestate','id': id},
                success: function (data) {
                    var output = JSON.parse(data);
                    var cityhtml = '<option value="">Select City</option>';
                    for (var i = 0; i < output.length; i++) {
                        var temp_html = "";
                        temp_html = '<option value="' + output[i].id + '">' + output[i].name + '</option>';
                        cityhtml = cityhtml + temp_html;
                    }

                    $(".city").html(cityhtml);
//                        handleAjaxResponse(data);
                }
            });
        });
    }
    var addVender = function () {
        var form = $('#addvenderform');
        var rules = {
             fname: {required: true},
                lname: {required: true},
                email: {required: true, email: true},
                mobile: {required: true},
                password: {required: true},
                confirmpassword: {equalTo: "#password",required: true},
                country: {required: true},
                state: {required: true},
                city: {required: true},
                address: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
        
        $("body").on("change", ".state", function () {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "vender-ajaxaction",
                data: {'action': 'changestate','id': id},
                success: function (data) {
                    var output = JSON.parse(data);
                    var cityhtml = '<option value="">Select City</option>';
                    for (var i = 0; i < output.length; i++) {
                        var temp_html = "";
                        temp_html = '<option value="' + output[i].id + '">' + output[i].name + '</option>';
                        cityhtml = cityhtml + temp_html;
                    }

                    $(".city").html(cityhtml);
//                        handleAjaxResponse(data);
                }
            });
        });
    }
    return {
        init: function () {
            list();
        },
        add: function () {
            addVender();
        },
        edit: function() {
            editCategory();
        }
    }
}();