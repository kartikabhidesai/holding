<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">{{ $header['title'] }}</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
           
            <ul class="breadcrumb-title center">
                    @php 
                    $count = count($header['breadcrumb']); 
                    $temp = 1;
                    @endphp 
                    @foreach($header['breadcrumb'] as $key => $value)

                   @php $value = (empty($value)) ? 'javascript:;' : $value; @endphp
                    @if($temp!=$count)
                    <li class="fa fa-angle-right"><a href="{{ $value }}">{{ $key }}</a>
                    </li>
                    @else
                    <li class="fa fa-angle-right">{{ $key }}
                    </li>
                    @endif
                    @php $temp = $temp+1; @endphp
                    @endforeach
                </ul>
        </ol>
    </div>
</div>