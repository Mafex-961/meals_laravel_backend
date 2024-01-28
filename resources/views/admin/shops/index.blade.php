@extends('admin.layouts.master')

@section('content')

<div class="main-content overflow-hidden">

    <div class="page-content">
        <div class="container-fluid">

            <div class="table-responsive table-card">
                <table class="table table-nowrap table-striped-columns mb-0">

                                <thead class="text-muted">

                                    <tr class="small text-uppercase">
                                        <th scope="col">Id</th>
                                        <th scope="col">Shop</th>
                                        <th scope="col" width="150">Image</th>
                                        <th scope="col" >Owner</th>
                                        <th scope="col" >Address</th>
                                        <th scope="col" >Phone Number</th>
                                        <th scope="col" class="text-right d-none d-md-block" width="200">Action</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ( $shops as $shop )



                                    <tr>
                                        <td>{{$shop->id}}</td>

                                        <td>{{$shop->name}}</td>

                                        <td>
                                            <figure class="itemside align-items-center">
                                                {{-- <div class="aside"><img src="https://i.imgur.com/1eq5kmC.png" class="img-sm"></div>
                                                <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true">Tshirt with round nect</a>
                                                    <p class="text-muted small">SIZE: L <br> Brand: MAXTRA</p>
                                                </figcaption> --}}
                                                @if (isset($shop->image))
                                                <img src="{{ asset('images/' . $shop->image) }}" alt="{{ $shop->name }}" height="50">
                                                @else
                                                No Image
                                                @endif

                                            </figure>
                                        </td>

                                        <td>
                                            {{$shop->owner? $shop->owner->name:'kk'}}
                                        </td>

                                        <td>
                                            {{$shop->address}}
                                        </td>

                                        <td>
                                           {{$shop->phone_number}}
                                        </td>

                                        <td class="text-right d-none d-md-block">

                                            <a href="{{url('admin/shop/'.$shop->id.'/edit')}}">
                                                <button type="button" class="btn btn-sm btn-primary">Edit</button>
                                            </a>

                                        </td>
                                        <td class="text-right d-none d-md-block">
                                            <form action="{{url('admin/shop/'.$shop->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>

                                            </form>
                                        </td>
                                    </tr>

                                    @endforeach

                               </tbody>

                               <a href="{{url('admin/shop/create')}}">
                                <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i> Add</button>
                                </a>
                </table>


            </div>

        </div>
    </div>
</div>
@endsection
