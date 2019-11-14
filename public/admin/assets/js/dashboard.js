var Dashboard = function () {

    var list = function () {

        var dataArr = {};
        var columnWidth = {"targets": 0};
        var arrList = {
            'tableID': '#dashboarddatatable',
            'ajaxURL': baseurl + "dashboard-ajaxAction",
            'ajaxAction': 'getdatatable',
            'postData': dataArr,
            'hideColumnList': [],
            'noSearchApply': [0],
            'noSortingApply': [3, 5],
            'defaultSortColumn': 0,
            'defaultSortOrder': 'desc',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);

        $('body').on('click', '.share', function () {
            var hoardingid = $('input[name="hoardingid[]"]:checked').length;
            if (!hoardingid) {
                alert('Please select any hoarding for share...');
            } else {
                var hoarding = [];
                $.each($("input[name='hoardingid[]']:checked"), function () {
                    hoarding.push($(this).val());
                });
                var data = {id: hoarding, _token: $('#_token').val()};
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                    },
                    url: baseurl + "booking-ajaxAction",
                    data: {'action': 'getdata', 'data': data},
                    success: function (data) {
                        handleAjaxResponse(data);
                    }
                });
            }
        });

        $('body').on("click", ".deletehoarding", function () {
            var val = $(this).attr("data-id");
            setTimeout(function () {
                $('.yes-sure:visible').attr('data-id', val);
            }, 500);
        });

        $('body').on('click', '.yes-sure', function () {
            var id = $(this).attr('data-id');
            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "booking-ajaxAction",
                data: {'action': 'deletebooking', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });
    }

    return {
        init: function () {
            list();
        }
    }
}();