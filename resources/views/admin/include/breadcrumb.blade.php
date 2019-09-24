<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">{{ $header['title'] }}</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">

            <div class="breadcrumb-title center">
                @php 
            $count = count($header['breadcrumb']); 
            $temp = 1;
            @endphp 
            @foreach($header['breadcrumb'] as $key => $value)

            @php $value = (empty($value)) ? 'javascript:;' : $value; @endphp
            @if($temp!=$count)
            <li><a href="{{ route($value) }}" class=""> @if($temp == 1)<i class="fa fa-home"></i>@endif {{ $key }} {{ "/"}} </a>
            @else
            <b class="active"> {{ $key }} </b></li>
            @endif

            @php $temp = $temp+1; @endphp
            @endforeach
            </div>
        </ol>
    </div>
</div>