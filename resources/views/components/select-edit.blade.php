@props(['id', 'label', 'options', 'selected' => null])

<div class="mb-2">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>

    <select id="{{ $id }}" name="{{ $id }}" class="block w-full mt-1 mb-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        @foreach ($options as $option)
            <option value="{{ $option->id }}" @if($option->id == $selected) selected @endif>
                {{ $option->name }}
            </option>
        @endforeach
    </select>
</div>
