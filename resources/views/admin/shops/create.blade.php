@extends('admin.layouts.master')

@section('content')


<div class="main-content overflow-hidden">

    <div class="page-content">
        <div class="container-fluid">


            <form action="{{ url('admin/shop') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label" >Shop</label>
                    </div>
                    <div class="col-lg-9">
                        <input name="name" class="form-control" id="nameInput" placeholder="Enter your shop">

                        @error('address')
                        <span class="text-danger text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="imageInput" class="form-label" >Image</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="file" name="image" class="form-control" accept="image/*">

                            @error('image')
                            <span class="text-danger text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="ownerInput" class="form-label" >Owner</label>
                    </div>
                    <div class="col-lg-9">
                    <select name="owner_id" id="" class="form-select" aria-label="Default select example">
                            @forelse ( $owners as $owner)

                            <option value="{{$owner->id}}">{{$owner->name}}</option>

                            @empty

                            @endforelse
                    </select>

                    @error('owner_id')
                    <span class="text-danger text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="addressInput" class="form-label" >Address</label>
                    </div>
                    <div class="col-lg-9">
                        <input name="address" class="form-control" id="addressInput" placeholder="Enter your address">

                        @error('address')
                        <span class="text-danger text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="phone_numberInput" class="form-label" >Phone Number</label>
                    </div>
                    <div class="col-lg-9">
                        <input name="phone_number" class="form-control" id="phone_numberInput" placeholder="Enter your phonenumber">

                        @error('phone_number')
                        <span class="text-danger text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>






                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Add</button>

                    {{-- <a href="{{url('admin/shop')}}">
                        <button type="close" class="btn btn-secondary">Leave</button>
                    </a> --}}

                </div>



            </form>


        </div>
    </div>
</div>


@endsection

