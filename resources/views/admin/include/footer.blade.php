    <script src="{{ url('public/admin/assets/plugins/jquery/jquery.min.js') }}" ></script>
    <script src="{{ url('public/admin/assets/plugins/popper/popper.min.js') }}" ></script>
    <script src="{{ url('public/admin/assets/plugins/jquery-blockui/jquery.blockui.min.js') }}" ></script>
    <script src="{{ url('public/admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ url('public/admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script src="{{ url('public/admin/assets/plugins/sparkline/jquery.sparkline.min.js') }}" ></script>
    <script src="{{ url('public/admin/assets/js/pages/sparkline/sparkline-data.js') }}" ></script>
    <!-- Common js-->
    <script src="{{ url('public/admin/assets/js/app.js') }}" ></script>
    <script src="{{ url('public/admin/assets/js/layout.js') }}" ></script>
    <script src="{{ url('public/admin/assets/js/theme-color.js') }}" ></script>
    <!-- material -->
    <script src="{{ url('public/admin/assets/plugins/material/material.min.js') }}"></script>
    <!-- animation -->
    <script src="{{ url('public/admin/assets/js/pages/ui/animations.js') }}" ></script>
    <!-- morris chart -->
    
    <script src="{{ url('public/admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" ></script>
    
    
    
    
    <!-- end js include path -->    
    
    @if (!empty($pluginjs)) 
    @foreach ($pluginjs as $value) 
    <script src="{{ url('public/admin/assets/js/'.$value) }}" type="text/javascript"></script>
    @endforeach
    @endif
    @if (!empty($js)) 
    @foreach ($js as $value) 
    <script src="{{ url('public/admin/assets/js/'.$value) }}" type="text/javascript"></script>
    @endforeach
    @endif
    
    <script src="{{ url('public/admin/assets/js/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('public/admin/assets/js/comman_function.js') }}" ></script>
    
    <script>
        jQuery(document).ready(function() {
        @if (!empty($funinit))
                @foreach ($funinit as $value)
        {{  $value }}
        @endforeach
                @endif
        });
    </script>