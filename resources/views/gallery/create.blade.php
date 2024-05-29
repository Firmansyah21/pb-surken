@extends('layouts.admin')
@section('container')
    @include('components.breadcrumbs')
    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div id="dynamicForm" class="space-y-2">
            <div class="form-group space-y-2">
                <label for="title" class="block text-gray-700 ">Title</label>
                <input type="text" id="title" name="title[]" class="form-control w-full px-3 py-2 border rounded-md" >
                @error('title')
                    @if($message == 'The title field is required.')
                        <span class="text-red-500 text-xs mt-2">Judul tidak boleh kosong</span>
                    @else
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @endif
                @enderror

                <label for="foto" class="block text-gray-700 ">Gambar</label>
                <input type="file" id="foto" name="foto[]" class="form-control w-full px-3 py-2 border rounded-md" required>
                @error('foto')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror

                <button type="button" id="addButton" class="bg-blue-500 hover:bg-blue-700 text-white  py-2 px-4 rounded">Tambah Inputan</button>
            </div>
        </div>

        <div class="hidden lg:block">
            <div class="flex justify-between mt-6">
                <a href="{{ route('anggota.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white  py-2 px-4 rounded">Kembali</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white  py-2 px-4 rounded">Kirim</button>
            </div>
        </div>

        <div class="mt-6 lg:hidden block">
            <button type="submit" class="bg-primary text-white font-semibold w-full h-[46px] rounded">Kirim</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            var max_fields = 10; // Maximum input boxes allowed
            var wrapper = $("#dynamicForm"); // Fields wrapper
            var addButton = $("#addButton"); // Add button ID

            var x = 1; // Initial text box count
            $(addButton).click(function (e) { // On add input button click
                e.preventDefault();
                if (x < max_fields) { // Max input box allowed
                    x++; // Text box increment
                    var inputHtml = `
                        <div class="form-group space-y-2 pt-6">
                            <label for="title" class="block text-gray-700 ">Title</label>
                            <input type="text" name="title[]" class="form-control w-full px-3 py-2 border rounded-md" required>

                            <label for="foto" class="block text-gray-700 ">Gambar</label>
                            <input type="file" name="foto[]" class="form-control w-full px-3 py-2 border rounded-md" required>

                            <div class="pt-2">
                                <button type="button" class="remove_field bg-red-500 hover:bg-red-700 text-white  py-2 px-4 rounded">Hapus</button>
                            </div>
                        </div>
                    `;
                    wrapper.append(inputHtml); // Add input box
                }
            });

            wrapper.on("click", ".remove_field", function (e) { // User click on remove text
                e.preventDefault();
                $(this).closest('.form-group').remove();
                x--;
            });
        });
    </script>
@endpush
