@include('Layout/header')

<style>
    .header-section {
        background-color: #588157;
        color: white;
        padding: 2rem;
        border-radius: 15px;
        font-family: 'Comic Sans MS', cursive, sans-serif;
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .content-section {
        background-color: #f0f8ff;
        padding: 2rem;
        border-radius: 15px;
        font-family: 'Comic Sans MS', cursive, sans-serif;
        margin-bottom: 1.5rem;
    }

    h2, h3 {
        color: #588157;
    }

    .text-primary {
        color: #588157 !important;
    }

    p {
        font-size: 1.1rem;
        line-height: 1.5;
    }

    .container {
        max-width: 100%;
        padding-left: 2rem;
        padding-right: 2rem;
        text-align: center; /* Align content in the center */
    }

    .text-header {
        color: #f0f8ff;
    }

    .back-button {
        margin-top: 1rem;
        background: #588157;
        color: #f0f8ff;
        padding: 0.75rem 2rem; /* Adjust padding for button size */
        border-radius: 10px; /* Rounded corners */
        display: inline-block; /* Ensure inline display */
        text-decoration: none; /* Remove underline */
    }
</style>

<div class="container mt-5">
    <div class="header-section">
        <h2 class="text-header">{{ $listmbti->nama }}</h2>
    </div>
    <div class="content-section">
        <h3 class="text-primary">Deskripsi</h3>
        <p>{{ $listmbti->deskripsi }}</p>
    </div>
    <div class="content-section">
        <h3 class="text-primary">Ciri-Ciri</h3>
        <p>{!! nl2br(e($listmbti->ciri)) !!}</p>
    </div>
    <div class="content-section">
        <h3 class="text-primary">Kelebihan</h3>
        <p>{!! nl2br(e($listmbti->kelebihan)) !!}</p>
    </div>
    <div class="content-section">
        <h3 class="text-primary">Kelemahan</h3>
        <p>{!! nl2br(e($listmbti->kelemahan)) !!}</p>
    </div>

    <a href="{{ route('home') }}" class="btn btn-primary back-button">Back to Home</a>
</div>

@include('Layout/footer')
