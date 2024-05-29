<script>
document.addEventListener('DOMContentLoaded', function() {
    var messageModal = document.getElementById('messageModal');
    if (messageModal && !sessionStorage.getItem('messageModalShown')) {
        var bsModal = new bootstrap.Modal(messageModal, {keyboard: false});
        bsModal.show();
        setTimeout(function(){
            $(messageModal).fadeOut(1000, function(){
                bsModal.hide();
            });
        }, 1100); // <-- time in milliseconds, 1000ms = 1s

        // Set the flag in session storage
        sessionStorage.setItem('messageModalShown', 'true');
    }
});
</script>
