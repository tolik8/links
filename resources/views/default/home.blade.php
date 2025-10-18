@extends($theme.'.layouts.app')

@section('title', 'Links')

@section('content')
<div class="container">

    @include($theme.'.layouts.success')

    <a href="{{ route('groups.create') }}" class="btn btn-primary">@lang('groups.create_new_group')</a>

    <hr>

    @foreach ($groups as $group)
        <button class="btn btn-success group">{!! $group->icon !!} {{ $group->name }}</button>
    @endforeach

</div>
@endsection
