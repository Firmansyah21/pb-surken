@props(['id', 'label', 'type' => '', 'required' => false, 'value' => '', 'disabled' => false])

<div class="mb-2">
    <label for="{{ $id }}" class="block text-xs md:text-sm font-medium text-gray-700">
        {{ $label }} @if($required) <span class="text-red-600">*</span> @endif
    </label>
    <input type="{{ $type }}" name="{{ $id }}" id="{{ $id }}"
           class="mt-1 block w-full py-2 px-3 border border-gray-500 rounded-md shadow-sm focus:outline-none sm:text-sm @error($id) border-red-500 @enderror"
           @if($required) required @endif
           @if($disabled) disabled @endif
           value="{{ $value }}">
    @error($id)
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
