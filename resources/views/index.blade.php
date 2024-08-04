@include('Layout/header')

<style>
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6); /* Adjust the opacity here */
        z-index: 1; /* Ensure the overlay is above the background image */
    }

    .content {
        position: relative;
        z-index: 2; /* Ensure content is above the overlay */
    }
</style>

<div style="position: relative; background-image: url('{{ asset('img/background.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
    <div class="overlay"></div> <!-- Overlay div -->
    <div class="container w-fit vh-100 d-flex mt-auto flex-column justify-content-center align-items-center content">
        <div>
            <p class="text-center  p-4 fs-1 fw-bold mb-0 text-white">MBTI<br> Tes Kepribadian Seperti GPS Pribadi untuk Hidup Anda</p>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <button type="button" class="btn btn-primary mb-3 fw-bold text-center justify-content-center" data-bs-toggle="modal" data-bs-target="#myModal">Mulai Sekarang!</button>
            <a type="button" href="{{ route('list-mbti') }}" class="btn btn-warning fw-bold text-center">Info Kepribadian</a>
        </div>
    </div>
</div>

<div id="myModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Masukkan Nama Anda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('save') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nama</span>
                        <input type="text" class="form-control" name="name" placeholder="Nama Kamu" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script>

@include('Layout/footer')
