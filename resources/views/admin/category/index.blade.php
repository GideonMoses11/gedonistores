@extends('admin.layout.admin')

@section('content')

<div class="navbar">
    <a class="navbar-brand" href="#">Categories=></a>
    <ul class="nav navbar-nav">
        @if(!empty($categories))
        @forelse ($categories as $category)
        <li>
        <a href="{{route('category.show', $category->id)}}">{{$category->name}}</a>

        </li>
        {{ $category->name }}
        @empty
        <li>No data found....</li>
        @endforelse

        @endif


    </ul>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
    Add Category
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open(['route'=>'category.store', 'method'=>'post']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, array('class'=>'form-control')) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

</div>

@if (!empty($products))
<section>
    <h3>Products</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Products</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
            <td>{{$product->name}}</td>
            </tr>
            @empty
            <tr>
                <td>No data found....</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</section>
@endif

@endsection

