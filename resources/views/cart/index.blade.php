@extends('layouter.main')

@section('content')
<div class="row">
<h3>Cart Items</h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Size</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cartItems as $cartItem)
        <tr>
        <td>{{$cartItem->name}}</td>
        <td>{{$cartItem->price}}</td>
        <td width="50px">
                {!! Form::open(['route'=>['cart.update', $cartItem->rowId], 'method'=>'PATCH' ]) !!}
                <input type="text" name="qty" id="" value="{{$cartItem->qty}}">

        </td>

        <td>
            <div>{!! Form::select('size', ['small'=>'Small', 'medium'=>'Medium', 'large'=>'Large'] , $cartItem->options->has('size')?$cartItem->options->size:' ')!!}</td>
            </div>

        

        <td>
            <input type="submit" class="btn btn-sm btn-success float-left" value="Ok">
            {!! Form::close() !!}
        <form action="{{route('cart.destroy', $cartItem->rowId )}}" method="post">
                @csrf
                @method('DELETE')
                <div class="form-group">
                  <label for=""></label>
                  <input type="submit" value="delete" name="" id="" class="btn btn-sm btn-danger">
                </div>
            </form>
        </td>
        </tr>
        @endforeach
        <tr>
        <td></td>
        <td>Tax: ${{Cart::tax() }} <br>
            Grand Total: ${{Cart::total()}}</td>
        <td >Items: {{Cart::count()}}</td>
        <td></td>
        <td></td>

        </tr>

    </tbody>

</table>
{{-- <button type="submit" class="btn btn-primary">Checkout</button> --}}
<a href="{{route('checkout.shipping')}}" class="btn btn-primary">Checkout</a>
</div>


@endsection
