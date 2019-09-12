<nav aria-label="breadcrumb">
    <ol class="breadcrumb d-flex align-items-center">
        @if (isset($breadcrumb))
            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></a></li>
        @else
            <li class="breadcrumb-item active"><i class="fas fa-home"></i></li>
        @endif
        @if (isset($breadcrumb))
            @foreach ($breadcrumb as $item)
                @if($loop->last)
                    <li class="breadcrumb-item active"></li>
                    <li class="dropdown">
                        <span class="dropdown-toggle btn p-0" data-toggle="dropdown">{{ $item->name }}</span>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('groups.edit', ['group_edit' => $item->id]) }}">{{ __('main.edit') }}</a></li>
                            <li class="cursor-pointer"><a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">{{ __('main.delete') }}</a></li>
                        </ul>
                    </li>

                    <form id="delete-form" action="{{ route('groups.destroy', ['group' => $item->id]) }}" method="POST" style="display: none;">
                        @csrf @method('DELETE')
                    </form>
                @else
                    <li class="breadcrumb-item"><a href="{{ route('group', ['group' => $item->id]) }}">{{ $item->name }}</a></li>
                @endif
            @endforeach
        @endif

        <a href="{{ route('groups.create', $group ? compact('group') : []) }}" class="px-1 ml-3 edit-elements {{ $d_none }}"><i class="fas fa-plus-square"></i></a>
    </ol>
</nav>