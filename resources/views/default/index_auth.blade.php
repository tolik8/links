@extends($theme.'.layouts.app')

@section('title', 'Links')

@section('content')
<div class="container">

    @include($theme.'.layouts.success')

    <h3>{{ $group_name }}</h3>

    <a href="{{ route('group_create', ['group' => $group]) }}" class="btn btn-primary">@lang('groups.create_new_group')</a>

    <hr>

    @foreach ($groups as $group)
        <a href="{{ route('group', ['group' => $group->id]) }}" class="btn btn-success group">{!! $group->icon !!} {{ $group->name }}</a>
    @endforeach

</div>
@endsection
