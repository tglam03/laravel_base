@extends('master')

@section('title')
    Add new Users
@endsection

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-danger">
            {{session()->get('success')}}
        </div>
    @endif

{{--   error validate--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Create</h1>

    <div class="container">

        <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 row">
                <label for="name" class="col-4 col-form-label">Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="address" class="col-4 col-form-label">Address</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="phone" class="col-4 col-form-label">Phone</label>
                <div class="col-8">
                    <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone')}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="is_active" class="col-4 col-form-label">Is Active</label>
                <div class="col-8">
                    <input type="checkbox" class="" name="is_active" id="is_active" value="1" />
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">
                        Add New
                    </button>
                <a href="{{ route('customers.index') }}" class="btn btn-danger">BACK TO LIST</a>
                </div>
            </div>
        </form>
    </div>
@endsection
