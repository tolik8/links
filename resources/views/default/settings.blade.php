@extends($theme.'.layouts.app')

@section('title', 'Links - ' . __('main.settings'))

@section('content')
<div class="container">

    <h3>@lang('main.settings')</h3>

    @include($theme.'.layouts.alerts')

    <form action="{{ route('settings_save') }}" method="POST">
        @csrf
        <p><label for="TypeOfAccess">@lang('settings.select_type_of_access')</label>
        <select class="form-control" name="type_access_id" id="TypeOfAccess">
            @foreach ($types as $type)
                @if ($type_access === $type->id)
                    <option value="{{ $type->id }}" selected>{{ __($type->name) }}</option>
                @else
                    <option value="{{ $type->id }}">{{ __($type->name) }}</option>
                @endif
            @endforeach
        </select></p>
        <button type="submit" class="btn btn-primary">@lang('main.save')</button>
    </form>
</div>
@endsection
