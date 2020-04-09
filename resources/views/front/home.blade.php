@extends('layouter.main')

@section('content')
    <section class="hero text-center">
        <br/>
        <br/>
        <br/>
        <br/>
        <h2>
            <strong>
                Hey! Welcome to GEDONI Stores
            </strong>
        </h2>
        <br>
        <a href="{{url('/shirts')}}">
            <button class="button large">Check out our collections</button>
        </a>
    </section>
    <br/>
    <div class="subheader text-center">
        <h2>
            GEDONI&rsquo;s latest arrivals
        </h2>
    </div>

    <!-- Latest SHirts -->
<div class="row">
@forelse($shirts->chunk(4) as $chunk)
@foreach($chunk as $shirt)

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
            @endforeach
        @empty
            <h3>No shirts</h3>
        @endforelse
        <compare></compare>
    </div>
</div>
</div>

    <!-- Footer -->
    <br>

@endsection

