<link rel="stylesheet" href="{{ asset('css/styledescriptionMobi.css') }}">
@extends('templates/template')


@section('title', 'Homepage')


@section('content')

<div class="description-contenner">
    <div class="img-des">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            @foreach (File::allFiles(public_path() . "/assets/propertypics/" . $property->id) as $file)
                    <div class="carousel-item {{ $file->getFilename() == basename($property->coverphoto) ? 'active' : '' }}" ata-bs-interval="3000">
                        <img class="d-block w-100" src="{{ '/assets/propertypics/' . $property->id . '/' . $file->getFilename() }}" id="map1"/>
                    </div>
                    @endforeach>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="icons-des">
        <div class="dancing-des">
            <lottie-player class="icon-des" src="https://assets10.lottiefiles.com/packages/lf20_qrvqpgft.json" background="transparent" speed="0.5" autoplay></lottie-player>
        </div>
        <div class="church-des">
            <lottie-player  class="icon-des" src="https://assets2.lottiefiles.com/packages/lf20_1gtlkp5r.json" background="transparent" speed="0.5"  autoplay></lottie-player>
        </div>
        <div class="scenery-des">
            <lottie-player  class="icon-des" src="https://assets2.lottiefiles.com/packages/lf20_h9qzdfz8.json" background="transparent" speed="0.5" autoplay></lottie-player>
        </div>
        <div class="fireworks-dis">
            <lottie-player  class="icon-des" src="https://assets4.lottiefiles.com/packages/lf20_idbtqrtg.json" background="transparent" speed="0.5"  autoplay></lottie-player>
        </div>
        <div class="karaoke-des">
            <lottie-player  class="icon-des" src="https://assets9.lottiefiles.com/packages/lf20_7rvfhjdu.json" background="transparent" speed="0.5"  autoplay></lottie-player>
        </div>
        <div class="catering-des">
            <lottie-player  class="icon-des" src="https://assets3.lottiefiles.com/packages/lf20_7tduzoyu.json" background="transparent" speed="0.5"  autoplay></lottie-player>
        </div>
        <div class="dancing-des-name">DANCE FLOOR</div>
        <div class="church-des-name">CHURCH</div>
        <div class="scenery-des-name">DECOR</div>
        <div class="fireworks-dis-name">FIREWORKS</div>
        <div class="karaoke-des-name">DJ</div>
        <div class="catering-des-name">CATERING</div>
        <div class="icons-des-name"></div>
    </div>
    <div class="general-des">
        <div class="name-des">{{$property->title}}</div>
        <div class="place-des">{{$property->locality}}</div>
    </div>
    <div class="---------main-des">
        <div class="main-des-about">
            <h3>
                About this space
            </h3>
        </div>
        <div class="main-des-main">  {{$property->houseno}} | {{$property->street}} | {{$property->postcode}}<br>{{$property->description}}</div>
    </div>
    <div class="map-des">
        <!-- <p>
                <input type="text" id="streetnumInput" placeholder="Street number:">
                <input type="text" id="streetInput" placeholder="Street:">
                <input type="text" id="postcodeInput" placeholder="Post code:">
                <input type="text" id="localityInput" placeholder="Locality:">
                <button type="button" id="searchBtn">Search</button>
            </p>
            <p>54, Avenue Gaston Diderich 1420 Luxembourg</p>
            <div id="addresscontainer"></div> -->
        <div id="map"></div>
    </div>

    <div class="card-prise-des">
        <div class="card prise-des">
            <h5 class="card-header">{{number_format($property->price)}} €/day</h5>
            @auth('web')
                <div class="card-body">
                <h5 class="card-title">Total price</h5>
                <p class="card-text"></p>
                <br>
                <a href="#" class="btn btn-primary">BOOK NOW</a>
                </div>
                @endauth
        </div>
    </div>
    <div class="calendar-dis">
        <div class='row '>
            <div class='col-sm-6'>
                <label for='linkedPickers1Input' class='form-label'>From</label>
                <div class='input-group log-event' id='linkedPickers1' data-td-target-input='nearest' data-td-target-toggle='nearest'>
                    <input id='linkedPickers1Input' type='text' class='form-control' data-td-target='#linkedPickers1' />
                    <span class='input-group-text' data-td-target='#linkedPickers1' data-td-toggle='datetimepicker'>
                        <span class='fa-solid fa-calendar'></span>
                    </span>
                </div>
            </div>
            <div class='col-sm-6 '>
                <label for='linkedPickers2Input' class='form-label'>To</label>
                <div class='input-group log-event' id='linkedPickers2' data-td-target-input='nearest' data-td-target-toggle='nearest'>
                    <input id='linkedPickers2Input' type='text' class='form-control' data-td-target='#linkedPickers2' />
                    <span class='input-group-text' data-td-target='#linkedPickers2' data-td-toggle='datetimepicker'>
                        <span class='fa-solid fa-calendar'></span>
                    </span>
                </div>
            </div>
            </form>
        </div>

    </div>
    <div class="reviews-dis">
        <section class=" gradient-custom">

            <div class="col col-l-10">
                <div class="card">
                    <div class="card-body py-5">

                        <!-- Carousel wrapper -->
                        <div id="carouselDarkVariant" class="carousel slide carousel-dark" data-mdb-ride="carousel">
                            <!-- Indicators -->
                            <div class="carousel-indicators mb-0">
                                <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="1" aria-label="Slide 1"></button>
                                <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="2" aria-label="Slide 1"></button>
                            </div>

                            <!-- Inner -->
                            <div class="carousel-inner pt-2 pb-5">
                                <!-- Single item -->
                                <div class="carousel-item active">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-8 col-lg-9 col-xl-8">
                                            <div class="d-flex row">
                                                <div class="flex-shrink-0">
                                                   
                                                </div>
                                                <div class="flex-grow-1  ps-3">
                                                    <figure>
                                                        <blockquote class="blockquote mb-4">
                                                            <p>
                                                                <i class="fas fa-quote-left fa-lg text-warning me-2"></i>
                                                                <span class="font-italic fs-6">Be ready for a magical experience in a very unique place that you will remember forever!

- RTLspan>
                                                            </p>
                                                        </blockquote>
                                                        <figcaption class="blockquote-footer">
                                                            Miranda Smith in <cite title="Source Title">The Guardian</cite>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single item -->
                                <div class="carousel-item">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-8 col-lg-9 col-xl-8">
                                            <div class="d-flex row">
                                                <div class="flex-shrink-0">
                                                    
                                                </div>
                                                <div class="flex-grow-1 ps-3">
                                                    <figure>
                                                        <blockquote class="blockquote mb-4">
                                                            <p>
                                                                <i class="fas fa-quote-left fa-lg text-warning me-2"></i>
                                                                <span class="font-italic fs-6">If you are looking for a unique and unforgettable experience- look no further! This is the place for you.

-Lux Times</span>
                                                            </p>
                                                        </blockquote>
                                                        <figcaption class="blockquote-footer">
                                                            Annie Hall <cite title="Source Title">New York Times</cite>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single item -->
                                <div class="carousel-item">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-8 col-lg-9 col-xl-8">
                                            <div class="d-flex row">
                                                <div class="flex-shrink-0">
                                                    
                                                </div>
                                                <div class="flex-grow-1  ps-3">
                                                    <figure>
                                                        <blockquote class="blockquote mb-4">
                                                            <p>
                                                                <i class="fas fa-quote-left fa-lg text-warning me-2"></i>
                                                                <span class="font-italic fs-6">Had a wonderful experience with the venue and the hosts! They were very cooperative and were there to help out if needed.

- Luxemburger Wort</span>
                                                            </p>
                                                        </blockquote>
                                                        <figcaption class="blockquote-footer">
                                                            Jason More in <cite title="Source Title">Smash Magazine</cite>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Inner -->

                            <!-- Controls -->
                            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselDarkVariant" data-mdb-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-mdb-target="#carouselDarkVariant" data-mdb-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!-- Carousel wrapper -->

                    </div>
                </div>
            </div>

        </section>
    </div>
</div>


@endsection