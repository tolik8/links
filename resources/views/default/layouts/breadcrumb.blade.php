@if (isset($breadcrumb))
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></a></li>
@foreach ($breadcrumb as $item)
    @if($loop->last)
        <li class="breadcrumb-item active" aria-current="page"></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">{{ $item->name }}</a>
            <ul class="dropdown-menu">
                <li><a href="#" class="dropdown-item">Edit</a></li>
                <li><a href="#" class="dropdown-item">Delete</a></li>
            </ul>
        </li>
    @else
        <li class="breadcrumb-item"><a href="{{ route('group', ['group' => $item->id]) }}">{{ $item->name }}</a></li>
    @endif
@endforeach
    </ol>
</nav>
@endif