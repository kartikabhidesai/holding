var Booking = function() {
    var list = function() {
        
        var dataArr = {};
        var columnWidth = {"targets": 0};
        var arrList = {
            'tableID': '#bookingtable',
            'ajaxURL': baseurl + "booking-ajaxAction",
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
    var addhoarding = function(){
        
        var submitFrom = true;
        var customValid = true;
        var validateTrip = true;
        $('#addnewhoarding').validate({
            rules: {
                location: {required: true},
                startdate: {required: true},
                enddate: {required: true},
                status: {required: true},
                type: {required: true},
                
            },

            invalidHandler: function (event, validator) {
                validateTrip = false;
                customValid = customerInfoValid();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.c-input, .form-control').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) {
                $(element).closest('.c-input, .form-control').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                return false;
            },
            submitHandler: function (form) {
                customValid = customerInfoValid();
                if (submitFrom && customValid)
                {
                    var options = {
                        resetForm: false, // reset the form after successful submit
                        success: function (output) {
                            //   App.stopPageLoading();
                            handleAjaxResponse(output);
                        }
                    };
                    $(form).ajaxSubmit(options);
                }
            }
        });
        
        function customerInfoValid() {

            var customValid = true;

            $('.hoardingImageclass').each(function () {
                if ($(this).is(':visible')) {
                    if ($(this).val() == '') {
                        $(this).addClass('has-error');
                        customValid = false;
                    } else {
                        $(this).removeClass('has-error');
                    }
                }
            });

            return customValid;
        };
        

        
      $('body').on("click",".removediv",function(){
           $(this).closest('.removeimagediv').remove();
      });
      $('body').on("click",".addimages",function(){
          var imagediv ='<div class="form-group removeimagediv">'+
                        '<label class="control-label" >&nbsp;</label>'+
                        '<div class="row ">'+
                        '<div class="col-10">'+
                            '<input type="file"  class="form-control hoardingImageclass" name="hoarding[]" >'+
                        '</div>'+
                        '<div class="col-2">'+
                            '<a id="sample_editable_1_new" class="btn btn-danger removediv"><i class="fa fa-minus"></i> Remove Image</a>'+
                        '</div>'+
                    '</div></div>';
          
          $(".addimagesdiv").append(imagediv);
      });
    }
    var edithoarding = function(){
       
        var submitFrom = true;
        var customValid = true;
        var validateTrip = true;
        $('#editnewhoarding').validate({
            rules: {
                location: {required: true},
                startdate: {required: true},
                enddate: {required: true},
                status: {required: true},
                type: {required: true},
                
            },

            invalidHandler: function (event, validator) {
                validateTrip = false;
                customValid = customerInfoValid();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.c-input, .form-control').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) {
                $(element).closest('.c-input, .form-control').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                return false;
            },
            submitHandler: function (form) {
                customValid = customerInfoValid();
                if (submitFrom && customValid)
                {
                    var options = {
                        resetForm: false, // reset the form after successful submit
                        success: function (output) {
                            //   App.stopPageLoading();
                            handleAjaxResponse(output);
                        }
                    };
                    $(form).ajaxSubmit(options);
                }
            }
        });
        
        function customerInfoValid() {

            var customValid = true;

            $('.hoardingImageclass').each(function () {
                if ($(this).is(':visible')) {
                    if ($(this).val() == '') {
                        $(this).addClass('has-error');
                        customValid = false;
                    } else {
                        $(this).removeClass('has-error');
                    }
                }
            });

            return customValid;
        };
        

        
      $('body').on("click",".removediv",function(){
           $(this).closest('.removeimagediv').remove();
      });
      $('body').on("click",".addimages",function(){
          var imagediv ='<div class="form-group removeimagediv">'+
                        '<label class="control-label" >&nbsp;</label>'+
                        '<div class="row ">'+
                        '<div class="col-10">'+
                            '<input type="file"  class="form-control hoardingImageclass" name="hoarding[]" >'+
                        '</div>'+
                        '<div class="col-2">'+
                            '<a id="sample_editable_1_new" class="btn btn-danger removediv"><i class="fa fa-minus"></i> Remove Image</a>'+
                        '</div>'+
                    '</div></div>';
          
          $(".addimagesdiv").append(imagediv);
      });
    }
    return {
        init: function() {
            list();
        },
        add: function() {
            addhoarding();
        },
        edit: function() {
            edithoarding();
        },
    }
}();