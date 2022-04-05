@extends('welcome')
@section('content')
    @include('sections.section_one')
    <section class="section_two">
        <div class="left_part">
            <form class="checkBoxForm" action="{{route('front-home')}}" method="GET" >
                <div class="container">
                    <div class="row">
                        <div class="form-check">
                            <input type="checkbox" name="category_id_female" class="form-check-input" value="female"
                                   id="checkFemale"
                                   @if(request()->category_id_female == 'female' ) checked= 1 @endif >
                            <label class="form-check-label" for="checkFemale">
                                Female
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="category_id_male" class="form-check-input" value="male"
                                   id="checkMale"
                                   @if(request()->category_id_male == 'male') checked= 1  @endif >
                            <label class="form-check-label" for="checkMale">
                                Male
                            </label>
                        </div>
                    </div>
                </div>
            </form>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Available Puppies
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Nursery
                </label>
            </div>
            <div class="btn btn-success">Price from UP &uArr;</div>
            <div class="btn btn-danger" style="margin-top: 10px">Price from DOWN &dArr;</div>
        </div>
        <div class="right_part">
            @if($dogs->count() > 0)
                <div class="box-content">
                    @foreach($dogs as $dog)
                        <div class="box-container">
                            <div class="img-box"
                                 style="background: url('/storage/images/dogs/thumbnail/{{$dog->image}}') center/auto no-repeat;"></div>
                            <a class="dogname" href="{{ route ('slider',$dog) }}">{{ $dog->name }}</a>
                        </div>
                    @endforeach
                </div>
            @else
                <h4>По вашему запросу ничего не найдено</h4>
            @endif
            {{ $dogs->withQueryString()->links('pagination::bootstrap-4') }}
        </div>
    </section>
    <section class="section_form">
        <div class="container col-md-4">

            <!-- Bootstrap 5 starter form -->
            <form  method="post" action="{{ route('contact') }}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
                    <!-- Error -->
                    @if ($errors->has('name'))
                        <div class="error">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
                    @if ($errors->has('email'))
                        <div class="error">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone">
                    @if ($errors->has('phone'))
                        <div class="error">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                           id="subject">
                    @if ($errors->has('subject'))
                        <div class="error">
                            {{ $errors->first('subject') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                              rows="4"></textarea>
                    @if ($errors->has('message'))
                        <div class="error">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                </div>
                <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
            </form>

        </div>
    </section>
    <section class="reviews"></section>
@endsection
