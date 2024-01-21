@extends('admin.layouts.master')

@section('content')

<div class="main-content overflow-hidden">

    <div class="page-content">
        <div class="container-fluid">

            <form action="{{url('admin/admin/'.$admins->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input value="{{$admins->name}}" name="name"  type="name" class="form-control" id="exampleInputName" aria-describedby="NameHelp">
                    @error('name')
                    <span class="text-danger text-sm">
                        {{ $message }}
                    </span>
                    @enderror
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                  </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input value="{{$admins->email}}"  name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  @error('email')
                  <span class="text-danger text-sm">
                      {{ $message }}
                  </span>
                  @enderror
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input value="{{$admins->password}}"  name="password" type="password" class="form-control" id="exampleInputPassword1">
                  @error('password')
                  <span class="text-danger text-sm">
                      {{ $message }}
                  </span>
                  @enderror
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

        </div>
    </div>
</div>
