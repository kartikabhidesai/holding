var Login = function () {
    var register = function () {
        var form = $('#addagenciesform');
        var rules = {
            fname: {required: true, minlength: 2},
            lname: {required: true},
            email: {required: true, email: true},
            mobile: {required: true, maxlength: 10, minlength: 10},
            password: {required: true, maxlength: 10},
            confirmpassword: {equalTo: "#password"},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form);
        });
        $('#loginform').validate({
            rules: {
                email: {required: true, email: true},
                password: {required: true},
            },
            messages: {
                email: {required: "Please Enter your Email"},  
                password: {required: "Please Enter your Password"}
                },
            submitHandler: function (form) {
                handleAjaxFormSubmit(form);
            }
        });
    }
    return {
        init: function () {
            register();
        }
    }
}();