<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">{{ $header['title'] }}</div>
        </div>
         <ol class="breadcrumb page-breadcrumb pull-right">

            
                @php 
                    $count = count($header['breadcrumb']); 
                    $temp = 1;
                @endphp 
                
                @foreach($header['breadcrumb'] as $key => $value)

                @php $value = (empty($value)) ? 'javascript:;' : $value; @endphp
                @if($temp!=$count)
                    <li>
                        <a href="{{ route($value) }}" class=""> @if($temp == 1)<i class="fa fa-home"></i>@endif {{ $key }} {{ "/"}} </a>
                    </li>
                @else
                <li class="active">
                    {{ $key }} 
                </li>
                @endif

                @php $temp = $temp+1; @endphp
                @endforeach
            
         </ol>
    </div>
</div>

<!--<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Tabs &amp; Accordions</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li><a class="parent-item" href="#">UI Elements</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Tabs &amp; Accordions</li>
        </ol>
    </div>
</div>-->