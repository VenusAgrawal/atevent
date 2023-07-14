@extends('templates/template')
@section('title', 'atEvent User Account')

@section('content')


    <div class="container py-5">

        <!-- for transaction messages -->
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



        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">

                        <h5 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">{{ Auth::guard('provider')->user()->first_name }}
                            {{ Auth::guard('provider')->user()->last_name }}</h5>

                        {{-- edit & logout buttons --}}
                        <div class="d-flex justify-content-center mb-2">
                            <button onclick="location.href='{{ route('provider.settings.profile.index') }}'" type="button"
                                class="btn btn-primary">Edit profile</button>
                            <button onclick="location.href='{{ route('logout') }}'"
                                class="btn btn-outline-primary ms-1">Logout</button>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body text-center">

                        {{-- property buttons --}}
                        <div class="d-flex justify-content-center mb-2">
                            <button onclick="location.href='{{ route('provider.register-property') }}'" type="button"
                                class="btn btn-primary">Add property</button>
                            <button onclick="location.href='{{ route('logout') }}'"
                                class="btn btn-outline-primary ms-1">Edit property</button>
                        </div>
                    </div>
                </div>





            </div>
            
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><strong>First Name</strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::guard('provider')->user()->first_name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><strong>Last Name</strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::guard('provider')->user()->last_name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><strong>Telephone n°</strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::guard('provider')->user()->contact }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><strong>Email</strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::guard('provider')->user()->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><strong>Address</strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::guard('provider')->user()->address1 }} <br>
                                    {{ Auth::guard('provider')->user()->address2 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mb-4"><strong>Current Bookings</strong></p>
                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"><strong>Booking #</strong></th>
                                    <th scope="col"><strong>Dates</strong></th>
                                    <th scope="col"><strong>Property Name</strong></th>
                                    <th scope="col"><strong>Booking date</strong></th>
                                    <th scope="col"><strong>Status<strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactionsCurrent as $transaction)
                                    <tr>
                                        <th scope="row">
                                            {{ $transaction->id }}</th>
                                        <td>{{ $transaction->title }}</td>
                                        <td>{{ date_format(new DateTime($transaction->startdate), 'd-m-Y') }} ->
                                            {{ date_format(new DateTime($transaction->enddate), 'd-m-Y') }}</td>
                                        <td>{{ date_format(new DateTime($transaction->created_at), 'd-m-Y') }}</td>
                                        <td>{{ $transaction->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <p class="mb-4"><strong>Previous Bookings</strong></p>
                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"><strong>Booking #</strong></th>
                                    <th scope="col"><strong>Dates</strong></th>
                                    <th scope="col"><strong>Property Name</strong></th>
                                    <th scope="col"><strong>Booking date</strong></th>
                                    <th scope="col"><strong>Status<strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactionsPrevious as $transaction)
                                    <tr>
                                        <th scope="row">
                                            {{ $transaction->id }}</th>
                                        <td>{{ $transaction->title }}</td>
                                        <td>{{ date_format(new DateTime($transaction->startdate), 'd-m-Y') }} ->
                                            {{ date_format(new DateTime($transaction->enddate), 'd-m-Y') }}</td>
                                        <td>{{ date_format(new DateTime($transaction->created_at), 'd-m-Y') }}</td>
                                        <td>{{ $transaction->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection