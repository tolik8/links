@foreach (Config::get('app.locales') as $key => $locale)
    @if ($key === Lang::getLocale())
        <span id="language_active" class="mr-1">{{ $locale }}</span>
    @else
        <span class="mr-1"><a href="{{ route('setlocale', ['lang' => $key]) }}">{{ $locale }}</a></span>
    @endif
@endforeach