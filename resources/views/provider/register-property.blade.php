@extends('templates/template')
@section('title', 'Registration')
@section('content')


    <section class="vh-50" style="padding-top: 50px; padding-bottom: 50px;">
        <div class="container h-50">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register a new Property</p>

                                    <form class="mx-1 mx-md-4" action="" method="post" id="myForm">


                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-house-user fa-lg me-3 fa-fw"></i>

                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="price" id="form3Example1c"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example1c">Title</label>
                                            </div>
                                        </div>


                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-pen fa-lg me-3 fa-fw"></i>

                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="price" id="form3Example1c"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example1c">Small description</label>
                                            </div>
                                        </div>


                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-arrows fa-lg me-3 fa-fw"></i>

                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="size" id="form3Example1c"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example1c">Size</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-users fa-lg me-3 fa-fw"></i>

                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="nopersons" id="form3Example1c"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example1c">Number of persons</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-euro-sign fa-lg me-3 fa-fw"></i>

                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="price" id="form3Example1c"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example1c">Price / day</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-home fa-lg me-3 fa-fw"></i>

                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="houseno" id="form3Example4c"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example4c">House Number</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-road fa-lg  me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="street" id="form3Example4cd"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example4cd">Street Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-map-pin fa-lg me-3 fa-fw"></i>

                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="postcode" id="form3Example4cd"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example4cd">Postal Code</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-city fa-lg me-3 fa-fw"></i>

                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="locality" id="form3Example4cd"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example4cd">Locality</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-file-photo-o fa-lg me-3 fa-fw"></i>

                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="coverphoto" id="form3Example4cd"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example4cd">Coverphoto</label>
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            By submitting you agree to the terms of service.</a>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" value="Submit"
                                                class="btn btn-success btn-lg">Register</button>
                                        </div>
                                        
                                    </form>
                                </div>

                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="{{ asset('assets/house.jpg') }}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
