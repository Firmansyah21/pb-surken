@props(['route', 'label'])

<a href="{{ route($route) }}" class="bg-primary  gap-1 hover:bg-secondary text-white py-2 px-4 rounded flex items-center">
    <i class="fas fa-plus-circle ml-1"></i>
    {{ $label }}
</a>
