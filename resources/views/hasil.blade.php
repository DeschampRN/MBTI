@include('Layout/header')

<div class="container mt-5">
    <h1 class="text-center mb-4">Kesimpulan</h1>
    <div class="card shadow-lg">
        <div class="card-body text-center">
            <h2 class="display-4 mb-4">Kepribadian Anda</h2>
            <a href="{{route('detail-mbti',['id' => $detailId->id])}}" class="h1 text-primary font-weight-bold">{{ $finalKepribadian }}</a>
            <p class="h3 mt-4">Nama Responden: {{ $user->nama }}</p> <!-- Menampilkan nama responden -->
            <hr class="my-4">
            <p class="lead">Berdasarkan jawaban Anda, berikut adalah ringkasan tipe kepribadian MBTI Anda.</p>
        </div>
    </div>
    <a href="{{ route('home') }}" class="btn btn-primary back-button">Back to Home</a>

</div>

@include('Layout/footer')
