    <script src="{{ url('admin/assets/plugins/jquery/jquery.min.js') }}" ></script>
    <script src="{{ url('admin/assets/plugins/popper/popper.min.js') }}" ></script>
    <script src="{{ url('admin/assets/plugins/jquery-blockui/jquery.blockui.min.js') }}" ></script>
    <script src="{{ url('admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ url('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script src="{{ url('admin/assets/plugins/sparkline/jquery.sparkline.min.js') }}" ></script>
    <script src="{{ url('admin/assets/js/pages/sparkline/sparkline-data.js') }}" ></script>
    <!-- Common js-->
    <script src="{{ url('admin/assets/js/app.js') }}" ></script>
    <script src="{{ url('admin/assets/js/layout.js') }}" ></script>
    <script src="{{ url('admin/assets/js/theme-color.js') }}" ></script>
    <!-- material -->
    <script src="{{ url('admin/assets/plugins/material/material.min.js') }}"></script>
    <!-- animation -->
    <script src="{{ url('admin/assets/js/pages/ui/animations.js') }}" ></script>
    <!-- morris chart -->
    <script src="{{ url('admin/assets/plugins/morris/morris.min.js') }}" ></script>
    <script src="{{ url('admin/assets/plugins/morris/raphael-min.js') }}" ></script>
    <script src="{{ url('admin/assets/js/pages/chart/morris/morris_home_data.js') }}" ></script>
    
    <!-- end js include path -->    
    @if (!empty($js)) 
    @foreach ($js as $value) 
    <script src="{{ url('admin/assets/js/'.$value) }}" type="text/javascript"></script>
    @endforeach
    @endif
    @if (!empty($pluginjs)) 
    @foreach ($pluginjs as $value) 
    <script src="{{ url('admin/assets/js/'.$value) }}" type="text/javascript"></script>
    @endforeach
    @endif
    <script>
        jQuery(document).ready(function() {
        @if (!empty($funinit))
                @foreach ($funinit as $value)
        {{  $value }}
        @endforeach
                @endif
        });
    </script>