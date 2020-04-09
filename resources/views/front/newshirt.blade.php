@extends('layouter.main')

@section('content')

<strong>
    Hey! Welcome to MC- Mykey's Store of Gedoni
</strong>

    <!-- products listing -->
    <!-- Latest SHirts -->
    <div class="row">
        @forelse($shirts as $shirt)
            <div class="small-3 medium-3 large-3 columns">
                <product :shirt="{{$shirt}}"
                         shirtlink="{{route('newshirt',$shirt->id)}}"
                         shirtimagepath='{{asset("/images/$shirt->image")}}'
                >
                </product>
            </div>

        @empty
        <h3>No shirts</h3>
       @endforelse

        <compare></compare>
    </div>


@endsection
