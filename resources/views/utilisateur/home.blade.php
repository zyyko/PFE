@extends('partials_users.navbar')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<style>
    * {
        font-family: Montserrat;
    }
.cover-part {
    margin-top: 100px;
    background-image: url('/ressources/homecover.png');
    background-size: cover;
    background-position: center;
    height: 100vh;
    position: relative; /* Position relative for overlay */
}

.cover-part::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3); /* Adjust the opacity as needed */
    filter: brightness(70%);
}

.cover-part > h1 {
    font-size: 100px;
    margin-left: 100px; 
    padding-top: 100px;
    color: white;
    position: relative; /* Ensure z-index works */
    z-index: 1; /* Ensure the h1 appears above the overlay */
}

.cover-part > button {
    font-size: 20px;
    text-decoration: none;
    margin-left: 200px;
    margin-top: 10px;
    padding: 15px 30px; /* Increased padding for a smoother look */
    border-radius: 30px; /* Increased border-radius for a smoother look */
    position: relative;
    z-index: 1;
    border: none;
    cursor: pointer;
    color: white; /* Button text color */
    background-color: #4CAF50; /* Button background color */
    transition: background-color 0.3s ease; /* Smooth transition effect */
}

.cover-part > button:hover {
    background-color: #45a049; /* Darker background color on hover */
}

.cover-part > button > a {
    text-decoration: none;
    color: inherit; /* Inherit text color from parent */
}

.cover-part > button::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    filter: brightness(100%);
}

.type-part {
    padding: 40px 0px 0px 40px;
}

.group-type-part {
  display: flex;
  justify-content: space-around; 
  align-items: center; 
  flex-wrap: wrap;
}

.group-type-part > div {
  margin: 10px; /* Spacing */
}

.group-type-part > div > a > h3 {
    margin-left: 15px;
    margin-top:15px;
}



a {
    text-decoration: none;
    color: black;
}

.trending-part > h2 {
    padding: 20px 0px 15px 50px;
}
.group-trending-part {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.group-trending-part div {
  position: relative;
}

.group-trending-part span {
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px;
  color: white;
  font-weight: bolder;
}

.destination-name {
    margin-top: 55px;
    margin-left: 20px;
}

.group-arrivals-part {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.arrivals-part > h2 {
    padding: 20px 0px 15px 50px;
}
.group-arrivals-part > div > h3 {
    margin-left: 15px;
    margin-top:15px;
}

.group-arrivals-part > div {
    color: #5534DA;
}
.group-arrivals-part > div > button {
    width: 100%;
    padding: 15px;
    font-weight: bolder;
    margin-top: 15px;
    border: 1px solid;
    border-radius:10px;
    transition: background-color 0.5s ease;
}

.group-arrivals-part > div > button:hover {
    background-color: rgb(219, 219, 219);
}




</style>
@section('cover-part')
    <div class="cover-part">
        <h1>Welcome to <br/> Bookify</h1>
        <button><a href="">Book it</a></button>
    </div>
    <div class="type-part">
        <h2>Browse by type</h2>
        <div class="group-type-part">
            <div>
                <a href="#">
                    <img src="/ressources/home/Appartement.png"/>
                    <h3>Appartement</h3>
                </a>
            </div>
            <div>
                <a href="#">
                    <img src="/ressources/home/Villa.png"/>
                    <h3>Villas</h3>
                </a>
            </div>
            <div>
                <a href="#">
                    <img src="/ressources/home/Riad.png"/>
                    <h3>Riads</h3>
                </a>
            </div>
            <div>
                <a href="#">
                    <img src="/ressources/home/Maison.png"/>
                    <h3>Maisons</h3>
                </a>
            </div>
        </div>
    </div>
    <div class="trending-part">
        <h2>Trending Destinations</h2>
        <div class="group-trending-part">
            <div class="bigger-trending-img"><img src="/ressources/home/Marrakech.png" width="550px"/>
                <span>{{$topCities[0]->ville}}</span>
            </div>
            <div class="bigger-trending-img"><img src="/ressources/home/Tanger.png" width="550px"/>
                <span>{{$topCities[1]->ville}}</span>
            </div>
            <div class="div3"><img src="/ressources/home/Agadir.png" style="margin-top: 50px;"/>
                <span class="destination-name">{{$topCities[2]->ville}}</span>
            </div>
            <div class="div4"><img src="/ressources/home/Casablanca.png" style="margin-top: 50px;"/>
                <span class="destination-name"></span>
            </div>
            <div class="div5"><img src="/ressources/home/Rabat.png" style="margin-top: 50px;"/>
                <span class="destination-name"></span>
            </div>
        </div>  
    </div>
    <div class="arrivals-part">
        <h2>New Arrivals</h2>
        <div class="group-arrivals-part">
            @foreach ($latestImmobiliers as $immobilier)
            <div>
                <img src="{{ asset('storage/'.$immobilier->Image)}}" alt="">
                <h3>{{$immobilier->ville}}</h3>
                <button class="read-more-button">Read More</button>
            </div>
            @endforeach
        </div>
    </div>
    <x-signup-part />
    <x-footer-part />
@endsection


