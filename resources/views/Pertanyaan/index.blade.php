@include('Layout/header')

<div class="vh-100" style="background-image: url('{{asset('img/bg-pertanyaan.jpg')}}'); background-size: cover; background-position: center;">
    
    <div class="container d-flex flex-column vh-100 justify-content-center align-items-center">
        <div class="">
            <p class="text-center fs-1 fw-bold">{{$pertanyaan->pertanyaan}}
            </p>
          </div>
          <div class="card">
            <a style="text-decoration: none;" href="{{route('jawab',['id'=>$pertanyaan->id,'idJawab' => $jawaban[0]->id])}}" class="card-body hover">
              A.{{$jawaban[0]->jawaban}}
            </a>
          </div>
          <div class="card mt-2">
            <a style="text-decoration: none;" href="{{route('jawab',['id'=>$pertanyaan->id,'idJawab' => $jawaban[1]->id])}}" class="card-body hover">
              B.{{$jawaban[1]->jawaban}}
            </a>
          </div>
      </div>
    @include('Layout/footer')
</div>