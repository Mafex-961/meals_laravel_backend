@extends('admin.layouts.master')

@section('content')


<div class="main-content overflow-hidden">

    <div class="page-content">
        <div class="container-fluid">


            <form action="{{ url('product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">

                    <div class="col-lg-3">
                        <label for="category_id_Input" class="form-label" >Category_id</label>
                    </div>

                    <div class="col-lg-9">

                        <select name="category_id" id="" class="form-control">
                            @forelse ($categories as $category)

                            <option
                            {{$category->id == $products->category?->id  ? 'selected'  :  ''}}
                            value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                            @empty

                            @endforelse
                           </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label" >Name</label>
                    </div>
                    <div class="col-lg-9">
                        <input value="{{$products->name}}" name="name" class="form-control" id="nameInput" placeholder="Enter your name">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="descriptionInput" class="form-label" >Description</label>
                    </div>
                    <div class="col-lg-9">
                        <input value="{{$products->description}}" name="description" class="form-control" id="descriptionInput" placeholder="Enter your description">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="imageInput" class="form-label" >Image</label>
                    </div>
                    <div class="col-lg-9">
                    <input  type="file" name="images" class="form-control" accept="image/*">
                    @if (isset($products->image))
                        <img src="{{ asset('images/' . $products->image) }}" alt="Current Image" class="mt-2" height="50">
                    @endif
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="priceInput" class="form-label" >Price</label>
                    </div>
                    <div class="col-lg-9">
                        <div class="input-group">
                            <input value="{{$products->price}}" name="price" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="Enter your price amount">
                            <span class="input-group-text">$</span>
                            <span class="input-group-text">0.00</span>
                        </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Add Leave</button>
                </div>
            </form>


        </div>
    </div>
</div>


@endsection

