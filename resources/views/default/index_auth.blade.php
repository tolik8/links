@extends($theme.'.layouts.app')

@section('title', 'Links')

@section('content')
<div class="container">

    @include($theme.'.layouts.breadcrumb')

    @include($theme.'.layouts.success')

    <a href="{{ route('groups.new', ['group_id' => $group_id]) }}" class="btn btn-primary">@lang('groups.create_new_group')</a>

    <hr>

    @foreach ($groups as $group)
        <a href="{{ route('group', ['group' => $group->id]) }}" class="btn btn-success group">{!! $group->icon !!} {{ $group->name }}</a>
    @endforeach

</div>
@endsection
