@props(['options', 'selected' => null, 'id', 'label', 'required' => false])

<div class="mb-2">
    <label for="{{ $id }}" class="block text-xs md:text-sm font-medium text-gray-700">
        {{ $label }} @if($required) <span class="text-red-600">*</span> @endif
    </label>

    <select {{ $attributes->merge(['id' => $id, 'class' => 'block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm select2', 'required' => $required]) }} @if($required) required @endif>
        <option value="" disabled selected>Pilih Salah Satu</option>
        @foreach ($options as $option)
            <option value="{{ $option['id'] }}" {{ $selected == $option['id'] ? 'selected' : '' }}>
                {{ $option['name'] }}
            </option>
        @endforeach
    </select>

    @if($required)
        <script>
            document.getElementById('{{ $id }}').addEventListener('change', function () {
                var selectedValue = this.value;
                if (!selectedValue) {
                    alert('{{$label}} harus diisi!');
                }
            });
        </script>
    @endif
</div>

@push('scripts')
    <script>
        // Inisialisasi Select2
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
