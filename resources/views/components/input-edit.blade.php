@props(['id', 'name', 'value', 'type' => 'text'])

<div class="mb-2">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm" value="{{ $value }}">
</div>
