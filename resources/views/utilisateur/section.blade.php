<link rel="stylesheet" href="{{ asset('home-resourcess/styles/home.css') }}">
<div class="cover-part">
    <h1>Welcome to <br /> Bookify</h1>
    <button><a href="">Book it</a></button>
</div>
<div class="type-part">
    <h2>Browse by type</h2>
    <div class="group-type-part">
        <div>
            <a href="#">
                <img src="/home-resourcess/img/Appartement.png" />
                <h3>Appartement</h3>
            </a>
        </div>
        <div>
            <a href="#">
                <img src="/home-resourcess/img/Villa.png" />
                <h3>Villas</h3>
            </a>
        </div>
        <div>
            <a href="#">
                <img src="/home-resourcess/img/Riad.png" />
                <h3>Riads</h3>
            </a>
        </div>
        <div>
            <a href="#">
                <img src="/home-resourcess/img/Maison.png" />
                <h3>Maisons</h3>
            </a>
        </div>
    </div>
</div>
<div class="trending-part">
    <h2>Trending Destinations</h2>
    <div class="group-trending-part">
        <div class="bigger-trending-img"><img src="/home-resourcess/img/Marrakech.png" width="550px" />
            <span>{{ $topCities[0]->ville }}</span>
        </div>
        <div class="bigger-trending-img"><img src="/home-resourcess/img/Tanger.png" width="550px" />
            <span>{{ $topCities[1]->ville }}</span>
        </div>
        <div class="div3"><img src="/home-resourcess/img/Agadir.png" style="margin-top: 50px;" />
            <span class="destination-name">{{ $topCities[2]->ville }}</span>
        </div>
        <div class="div4"><img src="/home-resourcess/img/Casablanca.png" style="margin-top: 50px;" />
            <span class="destination-name"></span>
        </div>
        <div class="div5"><img src="/home-resourcess/img/Rabat.png" style="margin-top: 50px;" />
            <span class="destination-name"></span>
        </div>
    </div>
</div>
<div class="arrivals-part">
    <h2>New Arrivals</h2>
    <div class="group-arrivals-part">
        @foreach ($latestImmobiliers as $immobilier)
            <div>
                <img src="{{ asset('storage/' . $immobilier->Image) }}" alt="">
                <h3>{{ $immobilier->ville }}</h3>
                <button class="read-more-button">Read More</button>
            </div>
        @endforeach
    </div>
</div>
