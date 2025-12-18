@props([
    'type' => 'primary',  // Bootstrap style
    'href' => null,
])

@if($href)
    <a href="{{ $href }}" class="btn btn-{{ $type }}">
        {{ $slot }}
    </a>
@else
    <button type="submit" class="btn btn-{{ $type }}">
        {{ $slot }}
    </button>
@endif
