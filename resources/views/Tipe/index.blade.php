@include('Layout/header')

<style>
    .custom-card {
        height: 400px; /* Sesuaikan tinggi card sesuai kebutuhan */
    }
    .custom-card .card-body {
        padding: 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .custom-card img {
        max-width: 100%;
        align-self: flex-end;
    }
    .custom-card .card-body {
        font-size: 40px; /* Ubah ukuran font sesuai kebutuhan */
    }
</style>
<div class="m-4 bebas-neue-regular">
    <h1 class="text-center mb-4 text-bold" style="font-size: 80px;"> Tipe Kepribadian </h1>
    <div class="row">
        @foreach ($listmbti as $index => $item)
        <div class="col-6 col-md-3 mb-4">
            <a href="{{route('detail-mbti', ['id' => $item->id])}}">
                <div class="card custom-card" style="background-color: #6F676C;">
                    <div class="card-body text-center text-white font-bold">
                        <span style="font-size: 80px;">{{$item->nama}}</span>
                        
                        <img src="{{$arrayGambar[$index]}}" alt="">
                    </div>
                </div>
            </a>
            
        </div>
        @endforeach
    </div>
</div>
@include('Layout/footer')














































@include('Layout/footer')