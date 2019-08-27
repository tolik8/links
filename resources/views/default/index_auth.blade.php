@extends($theme.'.layouts.app')

@section('title', 'Links')

@section('content')
<div class="container">

    @include($theme.'.layouts.breadcrumb')
    @include($theme.'.layouts.success')

    @foreach ($groups as $item)
        <a href="{{ route('group', ['group' => $item->id]) }}" class="btn btn-success mr-1">{!! $item->icon !!} {{ $item->name }}</a>
    @endforeach

    <a href="{{ route('groups.create', ['group' => $group]) }}" class="btn btn-primary"><i class="fas fa-plus-square"></i></a>

    <hr>
    <a href="{{ route('links.create', ['group' => $group]) }}" class="btn btn-primary"><i class="fas fa-plus-square"></i></a>

</div>
@endsection