@extends('master')

@section('title')
    Update Student
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <h1>Update: {{$student->name}}</h1>

    <div class="container">
        <form method="POST" action="{{ route('students.update', $student) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="mb-3 row">
                <label for="name" class="col-4 col-form-label">Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="name" id="name" value="{{$student->name}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="code" class="col-4 col-form-label">Code</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="code" id="code" value="{{$student->code}}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="email" id="email" value="{{$student->email}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="phone" class="col-4 col-form-label">Phone</label>
                <div class="col-8">
                    <input type="tel" class="form-control" name="phone" id="phone" value=" {{$student->phone}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="image" class="col-4 col-form-label">Image</label>
                <div class="col-8">
                    <input type="file" class="form-control" name="image" id="image" value="" />
                <img src="{{ \Illuminate\Support\Facades\Storage::url($student->image)}}" width="50px" alt="">
                </div>
                <input type="hidden"  name="image_url" />
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">
                        Action
                    </button>

                </div>
            </div>
        </form>
    </div>
@endsection
