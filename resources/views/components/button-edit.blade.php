@props(['route', 'id', 'param'])

<a href="{{ route($route, [$param => $id]) }}" class="text-green-500 hover:text-green-700 p-2">
    <i class="fas fa-edit text-xl"></i>
</a>
