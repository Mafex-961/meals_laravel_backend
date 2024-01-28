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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                            <th scope="col">Button</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($owners as $owner)

                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="cardtableCheck01">
                                    <label class="form-check-label" for="cardtableCheck01"></label>
                                </div>
                            </td>
                            <td>{{$owner->id}}</td>
                            <td>{{$owner->name}}</td>
                            <td>{{$owner->email}}</td>
                            <td>{{$owner->password}}</td>

                            <td >
                                <a href="{{url('admin/owner/'.$owner->id.'/edit')}}">
                                <button type="button" class="btn btn-sm btn-primary">Edit</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{url('admin/owner/'.$owner->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                                </form>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>

                    <a href="{{url('admin/owner/create')}}">
                        <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i> Add</button>
                        </a>

                </table>
            </div>

        </div>
    </div>
</div>
@endsection
