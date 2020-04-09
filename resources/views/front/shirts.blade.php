@extends('layouter.main')

@section('title','Shirts')
@section('content')
    <!-- products listing -->
    <!-- Latest SHirts -->
    <div class="row">
        @forelse($shirts as $shirt)
        <div class="small-3 medium-3 large-3 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a class="button expanded add-to-cart" href="{{route('cart.addItem',$shirt->id)}}">
                             Add to Cart
                        </a>
                            <a href="#">
                                {{-- <img src="{{$shirt->image}}"/> --}}
                                <img src="{{$shirt->image }}">
                            </a>
                        </div>
                        <a href="{{ route('shirt', $shirt->id) }}">
                            <h3>
                                {{ $shirt->name }}
                            </h3>
                        </a>
                        <h5>
                            ${{ $shirt->price }}
                        </h5>
                        <p>
                            {{ $shirt->description }}
                        </p>
                    </div>
        </div>

        @empty
        <h3>No shirts</h3>
       @endforelse

        <compare></compare>
    </div>
    </div>
</div>
@endsection
