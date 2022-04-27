@extends('welcome')
@section('content')

    @include('sections.section_header')
    <div class="container col-md-8" style="position: relative;height: 400px">
        <table id="cart" class="table table-bordered">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)

                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs">
                                    <img src="/storage/images/dogs/thumbnail/{{$details['image']}}" width="100"
                                         height="100" class="img-responsive"/>
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name']}}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price']}}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity"/>
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">

                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i
                                    class="fa fa-refresh"></i></button>
                            <input type="hidden" value="{{$details['id']}}" class="idofProd">
                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i
                                    class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ url('/') }}" class="btn btn-group-lg btn-warning">Continue Shopping</a>
            <div>
                <a href="{{route('stripe',['total'=>$total])}}" class="btn btn-primary">Pay</a>
                <strong>Total ${{ $total }}</strong>
            </div>
        </div>
    </div>
@endsection
