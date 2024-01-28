@extends('admin.layouts.master')

@section('content')


<div class="main-content overflow-hidden">

    <div class="page-content">
        <div class="container-fluid">

        <form action="{{url('admin/sub_category')}}" method="POST">
            @csrf

            <div class="form-floating mb-3">
                <div class="col-lg-4">
                    <label for="floatingInput">Name</label>
                </div>

                <div class="col-lg-4">
                    <input name="name" type="name" class="form-control" id="floatingInput" placeholder="name@example">
                </div>
                @error('name')
                <span class="text-danger text-sm">
                    {{ $message }}
                </span>
                @enderror

            </div>
            <div class="col-lg-4">
                <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
         </form>

        </div>
    </div>
</div>
@endsection
