<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalLabel">Konfimasi Hapus</h5>

            </div>
            <div class="modal-body text-center">
               Apakah Kamu Yakin Ingin Menghapus Data Ini?
            </div>
            <div class="modal-footer d-flex justify-content-around">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('post')
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


