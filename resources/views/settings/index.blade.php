@extends('templates/template')
@section('title', 'atEvent Profile Update')

@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            {{-- first_name & last_name --}}
                            @include('settings.update-profile-form')
                        </div>
                        <hr>
                        <div class="row">
                        </div>
                        <hr>
                        <div class="row">
                            {{-- e-mail --}}
                            @include('settings.update-email-form', [
                                'showVerificationMessage' => $showVerificationMessage,
                                'emailToVerify' => $emailToVerify,
                            ])
                        </div>
                        <hr>
                        <div class="row">
                            {{-- contact --}}
                            @include('settings.update-contact-form')
                        </div>
                        <hr>
                        <div class="row">
                            {{-- address --}}
                            @include('settings.update-address-form')
                        </div>
                        <hr>
                        <div class="row">
                            @include('settings.update-password-form')
                        </div>
                        <hr>
                        <div class="row">
                            @include('settings.delete-account-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
