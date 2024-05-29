@props(['id', 'name', 'rows', 'label', 'required' => false, 'value' => ''])

<div class="mb-2">
    <label for="{{ $id }}" class="block text-xs md:text-sm font-medium text-gray-700">
        {{ $label }} @if($required) <span class="text-red-600">*</span> @endif
    </label>
    <textarea {{ $attributes->merge(['class' => 'block w-full mt-1 bg-white rounded-md shadow-sm focus:outline-none text-xs md:text-sm']) }} id="{{ $id }}" name="{{ $name }}" rows="{{ $rows }}" @if($required) required @endif>{{ $value }}</textarea>
</div>
