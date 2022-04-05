@extends('welcome')
@section('content')
    @include('sections.section_one')
    <section class="section_slider ">
        <div class="dog-container" style="position: relative">
            <a class="bkTohome" href="{{ route ('front-home') }}">Back to List</a>
            <div class="dog_position">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $dogarray= json_decode ($dog->gallery);
                        @endphp
                        @if($dogarray ==! null)
                            <div class="carousel-item active">
                                <img src="{{asset ('storage/images/dogs/slider/'.$dogarray[0])}}"
                                     alt="...">
                            </div>
                            @for($i=1; count ($dogarray)>$i; $i++)
                                <div class="carousel-item">
                                    <img src="{{asset ('storage/images/dogs/slider/'.$dogarray[$i])}}"
                                         alt="...">
                                </div>
                            @endfor

                        @else <h1 style="margin-left: 34%"> No photo </h1>
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="dog_info">
                    <ul><h1>Name: {{ $dog->name }}</h1>
                        <li><h3>Age : {{$dog->months}}(months)</h3></li>
                        <li><h3>Price : {{ $dog->price }}$ </h3></li>
                        <li><h3>Height : 1 in </h3></li>
                        <li><h3>Weight : 1 pound </h3></li>
                        <li><h3>Gender : {{ $dog->gender }} </h3></li>
                    </ul>

                </div>
            </div>
        </div>
    </section>

@endsection
