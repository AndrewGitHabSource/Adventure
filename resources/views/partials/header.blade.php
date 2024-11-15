<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Adventure</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>

                <li class="nav-item"><a href="{{ route('page', ['slug' => 'about']) }}" class="nav-link">About</a></li>

                <li class="nav-item"><a href="{{ route('places') }}" class="nav-link">Places</a></li>

                <li class="nav-item"><a href="{{ route('hotels') }}" class="nav-link">Hotels</a></li>

                <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>

                <li class="nav-item"><a href="{{ route('contacts') }}" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="hero-wrap js-fullheight" style="background-image: url({{ asset('images/bg_1.jpg') }})">
    <div class="overlay"></div>

    <div class="container">
         <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
             <div class="col-md-9 ftco-animate mb-5 pb-5 text-center text-md-left" data-scrollax=" properties: { translateY: '70%' }">
                 <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Discover <br>A new Place</h1>

                 <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                     Find great places to stay, eat, shop, or visit from local experts
                 </p>
             </div>
         </div>
    </div>
</div>

