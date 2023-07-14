@extends('templates/template')
@section('title', 'atEvent Provider')

@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">

                        {{-- edit & logout buttons --}}
                        <div class="d-flex justify-content-center mb-2">
                            <button onclick="location.href='{{ route('provider.register') }}'"
                                class="btn btn-outline-primary ms-1">Provider Register</button>
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                            <button onclick="location.href='{{ route('provider.login') }}'" type="button"
                                class="btn btn-primary">Provider Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
