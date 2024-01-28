@extends('admin.layouts.master')

@section('content')

<div class="main-content overflow-hidden">

    <div class="page-content">
        <div class="container-fluid">

            <div class="table-responsive table-card">
                <table class="table table-nowrap table-striped-columns mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="cardtableCheck">
                                    <label class="form-check-label" for="cardtableCheck"></label>
                                </div>
                            </th>
                            <th scope="col">Id</th>
                            <th scope="col">Owner</th>
                            <th scope="col">Category</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)

                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="cardtableCheck01">
                                    <label class="form-check-label" for="cardtableCheck01"></label>
                                </div>
                            </td>
                            <td>{{$product->id}}</td>
                            <td>{{$product->shop? $product->shop->name:'hi'}}</td>
                            <td>{{$product->category? $product->category->name:'hi'}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                 @if (isset($product->image))
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" height="50">
                                @else
                                No Image
                                @endif
                            </td>
                            <td>{{$product->price}}</td>

                            <td class="text-right d-none d-md-block">

                                <a href="{{url('admin/product/'.$product->id.'/edit')}}">
                                <button type="button" class="btn btn-sm btn btn-primary">Edit</button>
                                </a>

                            </td>

                            <td class="text-right d-none d-md-block">
                                <form action="{{url('admin/product/'.$product->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                                </form>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                    <a href="{{url('admin/product/create')}}">
                        <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i> Add</button>
                        </a>

                </table>
            </div>

        </div>
    </div>
</div>

@endsection
