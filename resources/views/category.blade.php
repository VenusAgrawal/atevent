@extends('templates/template')
@section('title', 'Homepage')
@section('content')

    <!-- category banner -->
    <section class="bodycontent">
        <div class="text">
            <div class="iconscontainer">
                {{-- wedding logo --}}
                <div class="categoryicons">
                    <a href="{{route('category','wedding')}}">
                        <i class="fas fa-2x fa-glass-cheers"></i>
                        <p>Wedding Venues</p>
                    </a>
                </div>
                {{-- birthday logo --}}
                <div class="categoryicons">
                    <a href="{{ route('category','birthday') }}">
                        <i class="fas fa-2x fa-birthday-cake"></i>
                        <p>Birthday Venues</p>
                    </a>
                </div>
                {{-- photoshoot logo --}}
                <div class="categoryicons">
                    <a href="{{ route('category','photoshoot') }}">
                        <i class="fas fa-2x fa-video"></i>
                        <p>Photoshoot Venues</p>
                    </a>
                </div>
                {{-- photography logo --}}
                <div class="categoryicons">
                    <a href="{{ route('category','photography') }}">
                        <i class="fas fa-2x fa-camera"></i>
                        <p>Photography Studios</p>
                    </a>
                </div>
                {{-- music logo --}}
                <div class="categoryicons">
                    <a href="{{ route('category','music') }}">
                        <i class="fas fa-2x fa-guitar"></i>
                        <p>Music Events</p>
                    </a>
                </div>
            </div>

            <div class="pictureheadings">
                <p class="text-center h2 fw-bold mb-5 mx-1 mx-md-4 mt-4">{{ucfirst($event_name->event_name)}} Venues</p>
            </div>

            <div class="picturecontainerbody">
                @foreach ($properties as $property)
                    <div class="pictureboxes">
                        <a href="{{route('description',$property->id)}}"><object data={{ asset("$property->coverphoto") }} width=100% height=100%
                            class="proppics"></object></a><br>
                        <p class="proptext"><strong>Place:</strong>{{ $property->title }}<br>
                        <p class="proptext"><strong>{{ $property->address }}</strong>
                            <strong>{{ number_format($property->price) }}</strong> € / day <br>
                            <strong>{{ $property->locality }}</strong><br>
                        </p>
                    </div>
                @endforeach
            </div>
    </section>
@endsection
