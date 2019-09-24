@extends($theme.'.layouts.app')

@section('title', 'Links - ' . __('links.create_new_link'))

@section('content')
<div class="container">

    @include($theme.'.layouts.breadcrumb')
    <h3>@lang('links.edit_link')</h3>
    @include($theme.'.layouts.alerts')

    <form action="{{ route('links.update', ['link' => $link->id]) }}" method="POST">
        @csrf @method('PUT')
        <input type="hidden" name="group" value="{{ $link->group_id }}">
        <div class="form-group">
            <input type="text" name="link" class="form-control" placeholder="@lang('main.link')" value="{{ old('link') ?? $link->link }}" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="@lang('main.name')" value="{{ old('name') ?? $link->name }}" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name="tags" class="form-control" placeholder="@lang('main.tags_placeholder')" value="{{ old('tags') ?? $link->tags }}" autocomplete="off">
        </div>
        <div class="form-group">
            <textarea name="description" class="form-control" rows="3" maxlength="500" id="description-id" placeholder="@lang('main.description')">{{ old('description') ?? $link->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="TypeOfAccess">@lang('groups.type_access')</label>
            <select class="form-control" name="access_id" id="TypeOfAccess">
                @foreach ($types as $type)
                    @if (old('access_id') !== null && old('access_id') === $type->id)
                        <option value="{{ old('access_id') }}" selected>{{ __($type->name) }}</option>
                    @elseif ($link->group_id === $type->id)
                        <option value="{{ $type->id }}" selected>{{ __($type->name) }}</option>
                    @else
                        <option value="{{ $type->id }}">{{ __($type->name) }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">@lang('main.edit')</button>
    </form>

    <form id="delete-form" action="{{ route('links.destroy', ['link' => $link->id]) }}" method="POST" class="mt-5">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-danger">@lang('main.delete')</button>
    </form>
</div>
@endsection