@extends('index')
@section('seccion')
    <div class="container">
        <div id="carouselCard" class="card" style="width: 18rem;">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-10" src="{{asset('img/logoC.png')}}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-10" src="{{asset('img/logoC2.png')}}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-10" src="{{asset('img/logoC2.png')}}" alt="Third slide">
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselCard" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="carousel-control-next" href="#carouselCard" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
    </div>
  
@endsection