var Demo = function () {

    var deleteinventory = function () {

        $('body').on('click', '.delete', function () {
            var id = $(this).data('id');
            $('.yes-sure').attr("data-id", id);
        });

        $('body').on('click', '.yes-sure', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                url: 'deleteinventory', // This is what I have updated
                data: {id: id},
                success: function (data) {

                    var output = JSON.parse(data);

                    if (output.status == "success") {
                        $("#deletemodal").hide();
                        window.location.href = output.redirect;
                    } else {
                        $("#deletemodal").hide();
                        alert("Something goes to wrong");
                    }
                },
                error: function (err) {
                    alert("error" + JSON.stringify(err));
                }
            });

        });
    }
    var demo = function () {
        $('#addform').validate({
            rules: {
                firstname: {required: true, minlength: 2},
                lastname: {required: true},
                email: {required: true, email: true},
                mobile: {required: true, maxlength: 10, minlength: 10},
                city: {required: true},
                address: {required: true},
            },
            highlight: function (element) {
                $(element).parent().addClass('error')
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    }
    return {
        init: function () {
            demo();
        },
        add: function () {
            deleteinventory();
        }
    }
}();