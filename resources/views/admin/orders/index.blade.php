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
                            <th scope="col">Date</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $order)
                        {{-- {{dd($order->orderdetail)}} --}}
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="cardtableCheck01">
                                    <label class="form-check-label" for="cardtableCheck01"></label>
                                </div>
                            </td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->date}}</td>
                            <td>
                                @foreach ( $order->orderdetail as $orderdetail )
                                    {{$orderdetail?->name}} <hr>
                                @endforeach
                            </td>
                            <td>
                                @foreach ( $order->orderdetail as $orderdetail )
                                    {{$orderdetail?->quantity}} <hr>
                                @endforeach
                            </td>
                            <td>
                                @foreach ( $order->orderdetail as $orderdetail )
                                    @if (isset($orderdetail->image))
                                    <img src="{{ asset('images/' . $orderdetail->image) }}" alt="{{ $orderdetail->name }}" height="20" width="25">
                                    @else
                                    No Image
                                    @endif <hr>
                                @endforeach
                            </td>
                            <td>
                                @foreach ( $order->orderdetail as $orderdetail )
                                    {{$orderdetail?->price}} <hr>
                                @endforeach
                            </td>

                            <td>

                                <form action="{{url('admin/order/'.$order->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                                </form>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                    {{-- <a href="{{url('admin/product/create')}}">
                        <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i> Add</button>
                        </a> --}}

                </table>
            </div>

        </div>
    </div>
</div>
{{-- <div class="">
    {{ $orders }}
</div> --}}

@endsection
