@props(['route', 'id'])
@include('alert.success')

<div x-data="{ open: false }">

    <script>
       function deleteConfirmation{{ $id }}() {
    Swal.fire({
        title: 'Konfirmasi Hapus',
        text: "Apakah Anda Yakin?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ $route }}';
            form.innerHTML = '<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_method" value="DELETE">';
            document.body.appendChild(form);
            form.submit();
        }
    })
}
    </script>

    <button onclick="deleteConfirmation{{ $id }}()" style="border: none; background: none;">
        <i class="fas fa-trash text-xl text-red-600"></i>
    </button>
</div>
