@extends('templates/template')
@section('title', 'atEvent - Transaction')
@section('content')

    <section class="paymentform">


        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Booking Form</p>



        <div>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-between align-items-center mb-5">
            <button class="btn dashboard" onclick="history.back()">Cancel and return to previous page</button>
        </div>

        <div class="row">
            <div class="col-md-7 col-lg-7 col-xl-6 mb-4 mb-md-0">
                <h5 class="mb-0 text-success">Name of Property:<b> {{ $property->title }}<b></h5>
                <p class="card-header" data-price="{{ $property->price }}">Price: {{ $property->price }} € / day<b></p>

                <div>
                    <!-- date picker -->
                    <div class="calendar-dis">
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Credit card form -->
    <section class="paymentform">
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h3 class="mb-0">Payment</h3>


                    </div>
                    <div class="card-body">

                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                Invoice details
                                <table>
                                    <tr>
                                        <td>Name:</td>
                                        <td> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                        <td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td>{{ Auth::user()->address1 }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            L-{{ Auth::user()->address2 }}
                                        <td>
                                    </tr>
                                    <tr>
                                        <td>Telephone n°:</td>
                                        <td>{{ Auth::user()->contact }}
                                        <td>
                                    </tr>
                                    <tr>
                                        <td>E-mail:</td>
                                        <td>{{ Auth::user()->email }}
                                        <td>
                                    </tr>

                                </table>
                                <form action="" method="post">
                                    @method('PUT')
                                    @csrf

                                    <p>Number of days chosen : <span class="card-days"></span></p>
                                    <p>TOTAL PRICE : <span class="card-text"></span></p>


                                    <input id="total_price" type="hidden" name="total_price" value="1000">
                                    <input type="hidden" name="properties_id" value="{{ $property->id }}">
                                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                            </div>


                            <hr class="my-4" />

                            Payment type


                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" class="form-control" name="cardname">
                                        <label class="form-label">Name on card</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" class="form-control" name=cardnumber>
                                        <label class="form-label">Credit card number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-3">
                                    <div class="form-outline">
                                        <input type="text" name="cardexp" class="form-control">
                                        <label class="form-label">Expiration</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-outline">
                                        <input type="text" name="cardcvv" class="form-control">
                                        <label class="form-label">CVV</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div>
                                        <input type="radio" name="cardtype" value="visa" id="visa">
                                        <label for="visa">
                                            Visa
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" name="cardtype" value="mastercard" id="mastercard">
                                        <label for="mastercard">
                                            MasterCard
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success btn-lg btn-block" type="submit">
                                Proceed to payment
                            </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
    </section>
    <!-- Credit card form -->











@endsection
