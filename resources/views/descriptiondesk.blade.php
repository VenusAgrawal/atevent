<link rel="stylesheet" href="{{ asset('css/styledescriptionDesk.css') }}">

@extends('templates/template')
@section('title', 'atEvent')
@section('content')

    <div>

        <!-- floating elements -->
        <div class="card-dis">
            <div class="card">
                <h5 class="card-header" data-price="{{ $property->price }}">{{ number_format($property->price) }} €/day
                </h5>

                <!-- only users can access this info -->

                <!-- calendar items -->
                {{-- <div class="calendar-dis">
                        <div class="calendar-dis">
                            <div class='column'>
                                <label for='linkedPickers1Input' class='form-label'>From</label>
                                <div class='input-group log-event' id='linkedPickers1' data-td-target-input='nearest'
                                    data-td-target-toggle='nearest'>
                                    <input id='linkedPickers1Input' type='text' class='form-control'
                                        data-td-target='#linkedPickers1' />
                                    <span class='input-group-text' data-td-target='#linkedPickers1'
                                        data-td-toggle='datetimepicker'>
                                        <span class='fa-solid fa-calendar'></span>
                                    </span>
                                </div>
                                <label for='linkedPickers2Input' class='form-label'>To</label>
                                <div class='input-group log-event' id='linkedPickers2' data-td-target-input='nearest'
                                    data-td-target-toggle='nearest'>
                                    <input id='linkedPickers2Input' type='text' class='form-control'
                                        data-td-target='#linkedPickers2' />
                                    <span class='input-group-text' data-td-target='#linkedPickers2'
                                        data-td-toggle='datetimepicker'>
                                        <span class='fa-solid fa-calendar'></span>
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div> --}}

                <!-- price element -->
                <div class="card-body">
                    @guest
                        @guest('provider')
                            <p class="card-title">Please login to book</p>
                        @endguest
                    @endguest
                    @auth('web')
                        <p class="card-title">Continue choosing your dates:</p>
                        <p class="card-text"></p>
                        <br>
                        <a href="{{ route('transaction', $property->id) }}" class="btn btn-primary">BOOK NOW</a>
                    @endauth
                </div>

            </div>
            <!-- map -->
            <div class="map-dis">
                <div id="map" style="width: 250px; height: 250px"></div>
            </div>
        </div>


        <!-- photos grid -->
        <div class="container-dis">
            <div class="name-dis"> {{ $property->title }} </div>
            <div class="img-dis">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach (File::allFiles(public_path() . '/assets/propertypics/' . $property->id) as $file)
                            <div class="carousel-item {{ $file->getFilename() == basename($property->coverphoto) ? 'active' : '' }}"
                                ata-bs-interval="3000">
                                <img class="d-block w-100"
                                    src="{{ '/assets/propertypics/' . $property->id . '/' . $file->getFilename() }}"
                                    id="map" />
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="place-des"></div>
        </div>

        <!-- Grid icons -->
        <div class="container2-dis">
            <div class="dancing-dis">
                <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_qrvqpgft.json" background="transparent"
                    speed="0.5" style="width: 50px; height: 50px;" autoplay></lottie-player>
                <p class="dancingp-dis">DANCE FLOOR</p>
            </div>
            <div class="church-dis">
                <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_1gtlkp5r.json" background="transparent"
                    speed="0.5" style="width: 50px; height: 50px;" autoplay></lottie-player>
                <p class="churchp-dis">CHURCH</p>
            </div>
            <div class="scenery-dis">
                <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_h9qzdfz8.json" background="transparent"
                    speed="0.5" style="width: 50px; height: 50px;" autoplay></lottie-player>
                <p class="sceneryp-dis">DECOR</p>
            </div>
            <div class="fireworks-dis">
                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_idbtqrtg.json" background="transparent"
                    speed="0.5" style="width: 50px; height: 50px;" autoplay></lottie-player>
                <p class="fireworksp-dis">FIREWORKS</p>
            </div>
            <div class="karaoke-dis">
                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_7rvfhjdu.json" background="transparent"
                    speed="0.5" style="width: 70px; height: 50px;" autoplay></lottie-player>
                <p class="karaokep-dis">DJ</p>
            </div>

            <div class="catering-dis">
                <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_7tduzoyu.json" background="transparent"
                    speed="0.5" style="width: 70px; height: 70px;" autoplay></lottie-player>
                <p class="cateringp-dis">CATERING</p>
            </div>
        </div>

        <!-- Property data -->
        <div class="main-dis">
            <h3 class="locality-des" data-locality="{{ $property->locality }}">
                {{ $property->locality }} &nbsp

                {{-- @auth('web') --}}
                    <!-- only users can access this info -->
                    <p class="houseno-des" data-houseno="{{ $property->houseno }}">
                        {{ $property->houseno }} &nbsp
                        <span class="street-des" data-street="{{ $property->street }}">
                            {{ $property->street }} &nbsp
                        </span>
                    </p>
                {{-- @endauth --}}
                

                <p class="postcode-des" data-postcode="{{ $property->postcode }}">L-{{ $property->postcode }} &nbsp
                    ({{ $property->size }} m<sup>2</sup> / {{ $property->nopersons }} persons)
                </p>




        </div>

        <div class="main-dis">
            <p class="main-dis-p">
                {{ $property->description }}
            </p>
        </div>

        {{-- date picker integrated in transaction page --}}
        <div class="container3-dis">
            {{-- <div class="calendar-dis">
                <div class="calendar-dis">
                    <div class='row'>
                        <div class='col-sm-6'>
                            <label for='linkedPickers1Input' class='form-label'>From</label>
                            <div class='input-group log-event' id='linkedPickers1' data-td-target-input='nearest'
                                data-td-target-toggle='nearest'>
                                <input id='linkedPickers1Input' type='text' class='form-control'
                                    data-td-target='#linkedPickers1' />
                                <span class='input-group-text' data-td-target='#linkedPickers1'
                                    data-td-toggle='datetimepicker'>
                                    <span class='fa-solid fa-calendar'></span>
                                </span>
                            </div>
                        </div>
                        <div class='col-sm-6'>
                            <label for='linkedPickers2Input' class='form-label'>To</label>
                            <div class='input-group log-event' id='linkedPickers2' data-td-target-input='nearest'
                                data-td-target-toggle='nearest'>
                                <input id='linkedPickers2Input' type='text' class='form-control'
                                    data-td-target='#linkedPickers2' />
                                <span class='input-group-text' data-td-target='#linkedPickers2'
                                    data-td-toggle='datetimepicker'>
                                    <span class='fa-solid fa-calendar'></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="namemap-dis"></div>

            <div class="reviews-dis">

                <section class=" gradient-custom">
                    <div class="col col-l-10">
                        <div class="card">
                            <div class="card-body py-5">

                                <!-- Carousel wrapper -->
                                <div id="carouselDarkVariant" class="carousel slide carousel-dark" data-mdb-ride="carousel">
                                    <!-- Indicators -->
                                    <div class="carousel-indicators mb-0">
                                        <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="0"
                                            class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="1"
                                            aria-label="Slide 1"></button>
                                        <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="2"
                                            aria-label="Slide 1"></button>
                                    </div>

                                    <!-- Inner -->
                                    <div class="carousel-inner pt-2 pb-5">
                                        <!-- Single item -->
                                        <div class="carousel-item active">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-md-8 col-lg-9 col-xl-8">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
                                                                class="rounded-circle mb-4 mb-lg-0 shadow-2"
                                                                alt="woman avatar" width="90" height="90">
                                                        </div>
                                                        <div class="flex-grow-1 ms-4 ps-3">
                                                            <figure>
                                                                <blockquote class="blockquote mb-4">
                                                                    <p>
                                                                        <i
                                                                            class="fas fa-quote-left fa-lg text-warning me-2"></i>
                                                                        <span class="font-italic">Lorem ipsum dolor sit
                                                                            amet consectetur adipisicing
                                                                            elit. Pariatur sint nesciunt ad itaque aperiam
                                                                            expedita officiis incidunt
                                                                            minus facere, molestias quisquam impedit
                                                                            inventore.</span>
                                                                    </p>
                                                                </blockquote>
                                                                <figcaption class="blockquote-footer">
                                                                    Miranda Smith in <cite title="Source Title">The
                                                                        Guardian</cite>
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
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                                                                class="rounded-circle mb-4 mb-lg-0 shadow-2"
                                                                alt="woman avatar" width="90" height="90">
                                                        </div>
                                                        <div class="flex-grow-1 ms-4 ps-3">
                                                            <figure>
                                                                <blockquote class="blockquote mb-4">
                                                                    <p>
                                                                        <i
                                                                            class="fas fa-quote-left fa-lg text-warning me-2"></i>
                                                                        <span class="font-italic">Sed ut perspiciatis unde
                                                                            omnis iste natus error sit
                                                                            voluptatem accusantium doloremque laudantium,
                                                                            totam rem aperiam, eaque ipsa
                                                                            quae ab illo inventore veritatis.</span>
                                                                    </p>
                                                                </blockquote>
                                                                <figcaption class="blockquote-footer">
                                                                    Annie Hall <cite title="Source Title">New York
                                                                        Times</cite>
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
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp"
                                                                class="rounded-circle mb-4 mb-lg-0 shadow-2"
                                                                alt="woman avatar" width="90" height="90">
                                                        </div>
                                                        <div class="flex-grow-1 ms-4 ps-3">
                                                            <figure>
                                                                <blockquote class="blockquote mb-4">
                                                                    <p>
                                                                        <i
                                                                            class="fas fa-quote-left fa-lg text-warning me-2"></i>
                                                                        <span class="font-italic">At vero eos et accusamus
                                                                            et iusto odio dignissimos
                                                                            qui blanditiis praesentium voluptatum deleniti
                                                                            atque corrupti quos dolores
                                                                            et quas molestias excepturi sint amet
                                                                            dolore.</span>
                                                                    </p>
                                                                </blockquote>
                                                                <figcaption class="blockquote-footer">
                                                                    Jason More in <cite title="Source Title">Smash
                                                                        Magazine</cite>
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
                                    <button class="carousel-control-prev" type="button"
                                        data-mdb-target="#carouselDarkVariant" data-mdb-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-mdb-target="#carouselDarkVariant" data-mdb-slide="next">
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
    </div>

@endsection
