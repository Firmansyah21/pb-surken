@php
// Ambil segmen-segmen dari URL saat ini
$segments = Request::segments();
@endphp

<nav class="flex pb-4 mt-[17px] md:mt-0 lg:pb-2 justify-end" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">

        @foreach($segments as $index => $segment)
        @if(is_numeric($segment)) @continue @endif <!-- Skip numeric segments -->
        <li>
            <div class="flex items-center">
                <span class=" text-neutral-400">/</span>
                @if($index < count($segments) - 1)
                <a href="{{ url(implode('/', array_slice($segments, 0, $index + 1))) }}" class=" text-xs md:text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">{{ $segment }}</a>
                @else
                @if(strtolower($segment) === 'create')
                <span class=" text-xs md:text-sm font-medium text-gray-700 md:ms-2">tambah data</span>
                @else
                <span class=" text-xs md:text-sm font-medium text-gray-700 md:ms-2">{{ $segment }}</span>
                @endif
                @endif
            </div>
        </li>
        @endforeach
    </ol>
</nav>
