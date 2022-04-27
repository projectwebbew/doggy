<div class="right_part">
    @if($dogs->count() > 0)
        <div class="box-content">
            @foreach($dogs as $dog)
                <div class="box-container">
                    <div class="img-box"
                         style="background: url('/storage/images/dogs/thumbnail/{{$dog->image}}') center/contain no-repeat;"></div>
                    <div class="cart-container">
                    <a class="dogname" href="{{ route ('slider',$dog) }}">{{ $dog->name }}</a>
                    <a href="{{ url('add-to-cart/'.$dog->id) }}" class="btn btn-warning btn-block text-center"
                       role="button">Add to cart</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h4>По вашему запросу ничего не найдено</h4>
    @endif
    {{ $dogs->withQueryString()->links('pagination::bootstrap-4') }}
</div>
