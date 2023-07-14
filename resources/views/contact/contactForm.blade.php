@extends('templates/template')
@section('title', 'Contact Us')

@section('content')

    <section class="vh-50" style="background-color: #eee; padding-top: 50px; padding-bottom: 50px;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Contact Us</p>



                                    <!-- TO ADD CSS> -->
                                    <div>
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">
                                                {{ Session::get('success') }}
                                                @php
                                                    Session::forget('success');
                                                @endphp
                                            </div>
                                    </div>
                                    @endif
                                    <!-- END TO ADD CSS> -->



                                    <form class="mx-1 mx-md-4" action="{{ route('contact.contact-form.store') }}" method="post">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="name" id="form3Example1c"
                                                    class="form-control" value="{{ old('name') }}" />
                                                <label class="form-label" for="form3Example1c">Name</label>
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="email" id="form3Example4cd"
                                                    class="form-control" value="{{ old('email') }}" />
                                                <label class="form-label" for="form3Example4cd">Email</label>
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lg  me-3 fa-phone fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="phone" id="form3Example4cd"
                                                    class="form-control" value="{{ old('phone') }}" />
                                                @if ($errors->has('phone'))
                                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                @endif
                                                <label class="form-label" for="form3Example4cd">Telephone n°</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lg  me-3 fa-phone fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="subject" id="form3Example4cd"
                                                    class="form-control" value="{{ old('subject') }}" />
                                                <label class="form-label" for="form3Example4cd">Subject</label>
                                                @if ($errors->has('subject'))
                                                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-fw fa-lg  me-3 fa-comment-alt"></i>
                                            <div class="form-outline flex-fill mb-0" style="height: 200px;">
                                                <textarea name="content" rows="3" id="form3Example4cd" class="form-control" />{{ old('content') }}</textarea>
                                                <label class="form-label" for="form3Example4cd">Your Message</label>
                                                @if ($errors->has('content'))
                                                    <span class="text-danger">{{ $errors->first('content') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit"
                                                class="btn btn-success btn-lg">Send</button>
                                        </div>

                                    </form>


                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="{{ asset('assets/contactus.jpg') }}" class="img-fluid">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
