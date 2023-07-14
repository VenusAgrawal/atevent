@extends('templates/template')
@section('title', 'atEvent Registration')

@section('content')




    <section class="vh-50" style="padding-top: 50px; padding-bottom: 50px;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registration</p>

                                    <form class="mx-1 mx-md-4" action="{{ route('register') }}" method="post"
                                        id="myForm">
                                        @csrf

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="first_name" id="form3Example1c"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example1c">Firstname</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="last_name" id="form3Example3c"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example3c">Lastname</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" name="email" id="form3Example3c"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example3c">Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="address1" id="form3Example3c"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example3c">House n° & Street</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lg me-3 fa-map-marker-alt fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="address2" id="form3Example4c"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example4c">Postcode & Locality</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lg  me-3 fa-phone fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="contact" id="form3Example4cd"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example4cd">Phone Number</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="password" id="form3Example4cd"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example4cd">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="password_confirmation" id="form3Example4cd"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example4cd">Confirm password</label>
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            By registering you agree to the terms of service.</a>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-success btn-lg">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
