@extends($theme.'.layouts.app')

@section('title', 'Links - ' . Lang::get('main.settings'))

@section('content')
<div class="container">

    <h3>@lang('main.settings')</h3>

    <form action="{{ route('settings_save') }}" method="POST">
        @csrf
        <p><label for="TypeOfAccess">@lang('settings.select_type_of_access')</label>
        <select class="form-control" name="access_id" id="TypeOfAccess">
            @foreach ($types as $type)
                @if (session('access_id') == $type->id)
                    <option value="{{ $type->id }}" selected>{{ Lang::get($type->name) }}</option>
                @else
                    <option value="{{ $type->id }}">{{ Lang::get($type->name) }}</option>
                @endif
            @endforeach
        </select></p>
        <button type="submit" class="btn btn-primary">@lang('main.save')</button>
    </form>
</div>
@endsection
