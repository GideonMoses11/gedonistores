@extends('admin.layout.admin')
@section('content')

<h3>Products</h3>

<ul>
    @forelse ($products as $product)
    <li>
        <h4>Name of Product: {{$product->name}} </h4>
        {{-- <h4>Category: {{count($product->category)?$product->category->name:"Not available"}} </h4>
         --}}
         <h4>Category: {{$product->category->name}} </h4>

         <form action="{{route('product.destroy', $product->id )}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
              <label for=""></label>
              <input type="submit" value="delete" name="" id="" class="btn btn-sm btn-danger">
            </div>
        </form>

    </li>
    @empty

    <h3>No products...</h3>

    @endforelse
</ul>

@endsection
