@extends('layouter.main')

@section('title','shirt')

@section('content')

    <!-- products listing -->
    <!-- Latest SHirts -->

    <div class="row">
        <div class="small-5 small-offset-1 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="#">
                        <img src="{{$product->image}}"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="small-6 columns">
            <div class="item-wrapper">
                <h3 class="subheader">
                    <span class="price-tag">${{$product->price}}</span> GEDONI Stores
                </h3>
                <div class="row">
                    <div class="large-12 columns">
                        <p>
                            {!! $product->description !!}
                        </p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="large-12 columns">
                        <label>
                            Select Size
                            <select>
                                <option value="small">
                                    Small
                                </option>
                                <option value="medium">
                                    Medium
                                </option>
                                <option value="large">
                                    Large
                                </option>

                            </select>
                        </label>
                        <a href="#" class="button  expanded">Add to Cart</a>
                    </div>
                </div>
                <p class="text-left subheader">
                    <small>* Designed by <a href="https://twitter.com/Gideon_Moses_">Gideon Moses</a></small>
                </p>

            </div>


            <div class="item-wrapper">

                <star-rating :rating="{{$product->getStarRating()}}"></star-rating>
                <br>

                @if(auth()->check())
                <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
        Write a review
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('review.store') }}" method="POST">
                    @csrf
                    {{-- @method('POST') --}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><legend>Rate our product</legend></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Rate It</label>

                            <star-rating :star-size="20" name="rating"></star-rating>
                        </div>

                        <div class="form-group">
                            <label for="">Headline</label>
                            <input type="text" class="form-control" name="headline" id="" placeholder="Input...">
                        </div>

                        <div class="form-group">
                            <label for="">Tell us more</label>
                            <input type="text" class="form-control" name="description"  placeholder="Input...">
                        </div>

                        <input type="hidden" name="product_id" value="{{ $product->id }}">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </div>

    </div>

               {{-- @include('admin.product.partials.review_form') --}}
                @else
                    <a href="/login" class="button" >Write a review</a>

                @endif
            </div>

            <div class="list-group">
                @forelse($product->reviews as $review)

                <div class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge badge-primary">
                        <br>
                            <hr>
                           &emsp;<small class="headline">Headline: {{$review->headline}}</small>

                           <small class="description">Comment: {{$review->description}}</small>
                        </span>

                        </div>
                    </div>


                    @empty
                        No reviews yet...
                @endforelse
                    </div>

            </div>
        </div>
    </div>

@endsection

<style>
    .badge-primary{
    border-radius: 0px !important;
    border: 1px;
    height: 20px !important;
    font-size: 11px !important;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
/* .description{
    margin-top: 40px !important;
    margin-left: 10px !important;
} */
</style>
