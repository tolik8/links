@extends($theme.'.layouts.app')

@section('title', 'Links - ' . __('groups.edit_group'))

@section('content')
<div class="container">

    @include($theme.'.layouts.breadcrumb')
    <h3>@lang('groups.edit_group')</h3>
    @include($theme.'.layouts.errors')

    <form action="{{ route('groups.update', $group->id) }}" method="POST">
        @csrf @method('PUT')
        <input type="hidden" name="group" value="{{ $group->id }}">
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="@lang('main.name')" value="{{ old('name') ?? $group->name }}" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="TypeOfAccess">@lang('groups.type_access')</label>
            <select class="form-control" name="access_id" id="TypeOfAccess">
                @foreach ($types as $type)
                    @if (old('access_id') !== null && old('access_id') === $type->id)
                        <option value="{{ old('access_id') }}" selected>{{ __($type->name) }}</option>
                    @elseif ($group->id === $type->id)
                        <option value="{{ $type->id }}" selected>{{ __($type->name) }}</option>
                    @else
                        <option value="{{ $type->id }}">{{ __($type->name) }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">@lang('main.edit')</button>
    </form>

</div>
@endsection