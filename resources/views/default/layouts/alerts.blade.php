@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@foreach(['danger', 'warning', 'success', 'info'] as $message)
    @if(Session::has('alert-' . $message))
        <div class="flash-message">
            <p class="alert alert-{{ $message }}">{{ Session::get('alert-' . $message) }}</p>
        </div>
    @endif
@endforeach