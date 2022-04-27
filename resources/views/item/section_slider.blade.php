@extends('welcome')
@section('content')
    @include('sections.section_header')

    <section class="section_slider ">
        <div class="dog-container" style="position: relative">
            <a class="bkTohome" href="{{ route ('front-home') }}">Back to List</a>
            <div class="asd">
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
                        @include('sections.small_basket')
                        <ul><h1>Name: {{ $dog->name }}</h1>
                            <li><h3>Age : {{$dog->months}}(months)</h3></li>
                            <li><h3>Price : {{ $dog->price }}$ </h3></li>
                            <li><h3>Height : 1 in </h3></li>
                            <li><h3>Weight : 1 pound </h3></li>
                            <li><h3>Gender : {{ $dog->gender }} </h3></li>
                            <a href="{{ url('add-to-cart/'.$dog->id) }}" class="btn btn-warning btn-block text-center"
                               role="button">Add to cart</a>
                        </ul>
                    </div>
                </div>
                <span class="rev_line"></span>

                    @if(Auth::user() && Auth::user()->user_status_id === 1)
                    <form action="">
                        <div class="container d-flex justify-content-center mt-5">
                            <div class="card p-3" style="width: 100%">
                                <div class="form" id="form">
                                    <h5 class="mb-0">{{Auth::user()->name}}</h5>
                                    <div class="form mt-3">
                                        <textarea class="form-control mt-2 text-area" rows="4"
                                                  placeholder="Review"></textarea>
                                    </div>
                                    <div class="mt-2">
                                        <button  type="submit" class="btn btn-primary btn-block invoice-btn">Send
                                            Review
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="{{ Auth::user()->id }}">
                        <input type="hidden" value="{{ $dog->id }}">
                    </form>
                    @else
                        <div style=" display:block;width: 400px; margin: 15px auto;">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required autocomplete="email"
                                               autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required
                                               autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                <div class="review_field">
                    <div class="r_box">
                        <div class="usCont">
                            <div class="usName">Vasa</div>
                            <div class="usPhoto"></div>
                        </div>
                        <div class="user_text_cont">
                            <div class="us_text">Need some placeholder text in your code? Type lorem and press Tab. If needed, you can add the text together with a tag: just add a tag name and > before lorem. </div>
                            <div class="forms_cont">
                                <div class="us_delet">1</div>
                                <div class="us_edit">2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection
