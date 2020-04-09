@extends('admin.layout.admin')
@section('content')
<h3>Orders</h3>
<ul>
    @foreach ($orders as $order)
    <li>
    <h4>Order by: {{$order->user->name}}<br> Total Price {{$order->total}}</h4>

    <form action="{{route('toggle.deliver', $order->id)}}" method="post" class="pull-right">
        @csrf
        <label for="delivered">Delivered</label>
    <input type="checkbox" name="delivered" id="" value="1" {{ $order->delivered==1?"Checked":"" }}>
    <input type="submit" value="submit">
    </form>

    <div class="clearfix"></div>
    <hr>
    <h5>Items</h5>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
        </tr>
        @foreach ($order->orderItems as $item)
        <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->pivot->qty}}</td>
        <td>{{$item->pivot->total}}</td>
        </tr>
            
        @endforeach

    </table>
    </li>
        
    @endforeach
</ul>

@endsection