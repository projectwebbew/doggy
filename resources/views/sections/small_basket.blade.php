<div class="dropdown" >
    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
            id="dropdownMenuButton1" aria-expanded="false"
            style='
                display: block;
                position: relative;
                width: 50px;
                height: 50px;
                background: url("{{asset('svg/basket.svg')}}") center/contain no-repeat;
                '>
                    <span class="badge badge-pill badge-danger"
                          style="
                            display: block;
                            position: absolute;
                            font-size: 18px;
                            top: 25px;
                            right: 7px;
                     ">{{ count((array) session('cart')) }}</span>
    </button>
    <div class="dropdown-menu">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-6">
                <span>My Basket</span>
            </div>
            @php
                $total = 0;
            @endphp

            @foreach((array) session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
            @endforeach
            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                <p>Total: <span class="text-info">$ {{ $total }}</span></p>
            </div>
        </div>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <div class="row cart-detail">
                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                        <img src='/storage/images/dogs/thumbnail/{{ $details['image'] }}'/>
                    </div>
                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                        <p>{{ $details['name'] }}</p>
                        <span class="price text-info"> ${{ $details['price'] }}</span> <span
                            class="count"> Quantity:{{ $details['quantity'] }}</span>
                    </div>
                </div>
            @endforeach

        @endif
        <div class="d-grid gap-2 d-md-block mx-auto">
            <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
        </div>

    </div>
</div>



