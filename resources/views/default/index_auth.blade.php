@extends($theme.'.layouts.app')

@section('title', 'Links')

@section('content')
<div class="container">

    @include($theme.'.layouts.breadcrumb')
    @include($theme.'.layouts.success')

    <div class="groups mb-3">
        @foreach ($groups as $item)
            <a href="{{ route('group', ['group' => $item->id]) }}" class="btn btn-success mr-1">{!! $item->icon !!} {{ $item->name }}</a>
        @endforeach
    </div>

    <div class="links">
        @foreach ($links as $item)
            <a href="{{ $item->link }}" class="btn btn-success ml-1">{{ $item->name }}</a>
            <a href="{{ route('links.edit', ['link' => $item->id]) }}" class="edit-elements mr-2 {{ $d_none }}"><i class="far fa-edit"></i></a>
        @endforeach
        <a href="{{ route('links.create', ['group' => $group]) }}" class="btn btn-primary edit-elements {{ $d_none }}"><i class="fas fa-plus-square mr-2"></i> {{ __('links.add_link') }}</a>
    </div>



</div>
@endsection