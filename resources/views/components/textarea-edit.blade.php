@props(['id', 'name', 'rows', 'value'])

<div class="mb-2">
    <textarea {{ $attributes->merge(['class' => 'block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) }} id="{{ $id }}" name="{{ $name }}" rows="{{ $rows }}">{{ $value ?? old($name) }}</textarea>
</div>
