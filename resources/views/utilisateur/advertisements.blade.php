@extends('utilisateur.layout')

@section('navbar')
    @include('partials.nav')
@endsection

@section('section')
<style>
:root {
    --primary: #06BBCC;
    --light: #F0FBFC;
    --dark: #181d38;
}

.fw-semi-bold {
    font-weight: 700 !important;
}

body {
    font-family: 'Nunito', sans-serif;
    background-color: var(--light);
}

header {
    background-color: var(--dark);
}

.card {
    transition: transform 0.2s;
}

.card:hover {
    transform: scale(1.05);
}

.card-title {
    color: var(--dark);
}

.card-text {
    color: var(--primary);
}

.btn-primary {
    background-color: var(--primary);
    border-color: var(--primary);
}

.btn-primary:hover {
    background-color: var(--dark);
    border-color: var(--dark);
}

.card-img-top {
    width: 100%;
    height: 200px; /* Set a fixed height for the images */
    object-fit: cover; /* Ensure images are properly scaled and cropped */
}
</style>
<main class="container my-5">
    <div class="row">
        @foreach ($immobiliers as $immobilier)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $immobilier->Image) }}" class="card-img-top" alt="House">
                <div class="card-body">
                    <h5 class="card-title">{{ $immobilier->title }}</h5>
                    <p class="card-text fw-semi-bold">{{ $immobilier->price }}</p>
                    <p class="card-text">{{ $immobilier->Description }}</p>
                    <a href="#" class="btn btn-primary">More details</a>
                </div>
            </div>
        </div>
        @endforeach
        {{ $immobiliers->links() }}
    </div>
</main>
@endsection
