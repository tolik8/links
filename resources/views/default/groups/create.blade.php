@extends($theme.'.layouts.app')

@section('title', 'Links - ' . __('groups.create_new_group'))

@section('content')
<div class="container">

    @include($theme.'.layouts.breadcrumb')
    <h3>@lang('groups.create_new_group')</h3>
    @include($theme.'.layouts.alerts')

    <form action="{{ route('groups.store') }}" method="POST">
        @csrf
        <input type="hidden" name="group" value="{{ $group }}">
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="@lang('main.name')" value="{{ old('name') }}" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="TypeOfAccess">@lang('groups.type_access')</label>
            <select class="form-control" name="access_id" id="TypeOfAccess">
                @foreach ($types as $type)
                    @if (old('access_id') === null && $type_access === $type->id)
                        <option value="{{ $type_access }}" selected>{{ __($type->name) }}</option>
                    @elseif (old('access_id') === $type->id)
                        <option value="{{ $type->id }}" selected>{{ __($type->name) }}</option>
                    @else
                        <option value="{{ $type->id }}">{{ __($type->name) }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">@lang('main.create')</button>
    </form>

</div>
@endsection