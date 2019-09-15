<nav aria-label="breadcrumb">
    <ol class="breadcrumb d-flex align-items-center">
        @if(Route::currentRouteName() !== 'index')
            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></a></li>
        @else
            <li class="breadcrumb-item active"><i class="fas fa-home"></i></li>
        @endif
        @if(isset($breadcrumb))
            @foreach ($breadcrumb as $item)
                @if($loop->last)
                    {{--<li class="breadcrumb-item active"></li>
                    <li class="dropdown">
                        <span class="dropdown-toggle btn p-0" data-toggle="dropdown">{{ $item->name }}</span>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('groups.edit', ['group_edit' => $item->id]) }}">{{ __('main.edit') }}</a></li>
                            <li class="cursor-pointer"><a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">{{ __('main.delete') }}</a></li>
                        </ul>
                    </li>--}}
                    @if(Route::currentRouteName() === 'group')
                        <li class="breadcrumb-item active">{{ $item->name }}</li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ route('group', ['group' => $item->id]) }}">{{ $item->name }}</a></li>
                    @endif

                    @if(Route::currentRouteName() !== 'groups.edit')
                        <a href="{{ route('groups.edit', ['group' => $group->id]) }}" class="px-1 ml-1 edit-elements {{ $d_none }}"><i class="fas fa-edit"></i></a>
                    @endif

                    {{--<form id="delete-form" action="{{ route('groups.destroy', ['group' => $item->id]) }}" method="POST" style="display: none;">
                        @csrf @method('DELETE')
                    </form>--}}
                @else
                    <li class="breadcrumb-item"><a href="{{ route('group', ['group' => $item->id]) }}">{{ $item->name }}</a></li>
                @endif
            @endforeach
        @endif

        @if(Route::currentRouteName() !== 'groups.create')
            <a href="{{ route('groups.create', ['group' => $group->id ?? null]) }}" class="px-1 ml-3 edit-elements {{ $d_none }}"><i class="fas fa-plus-square"></i></a>
        @endif
    </ol>
</nav>