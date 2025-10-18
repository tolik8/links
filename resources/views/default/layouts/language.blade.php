@foreach (Config::get('app.locales') as $key => $locale)
    @if ($key === Lang::getLocale())
        <span class="active">{{ $locale }}</span>
    @else
        <span><a href="{{ route('setlocale', ['lang' => $key]) }}">{{ $locale }}</a></span>
    @endif
@endforeach