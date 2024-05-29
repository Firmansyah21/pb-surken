@props(['route', 'id', 'param'])

<a href="{{ route($route, [$param => $id]) }}" class="text-blue-600 hover:text-blue-700 p-2">
    <i class="fas fa-eye text-xl"></i>
</a>
