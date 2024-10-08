@extends('master');

@section('title')
    Danh sach
@endsection

@section('content')

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif

    <h1>LIST
    <a href="{{route('students.create')}}" class="btn btn-primary">Add Student</a>
    </h1>



    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">CODE</th>
            <th scope="col">NAME</th>
            <th scope="col">IMAGE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">PHONE</th>
            <th scope="col">CREATED AT</th>
            <th scope="col">UPDATED AT</th>
            <th scope="col">ACTION</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $student)

        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->code}}</td>
            <td>{{$student->name}}</td>
            <td>
                <img src="{{ \Illuminate\Support\Facades\Storage::url($student->image)}}" width="50px" alt="">
            </td>
            <td>{{$student->email}}</td>
            <td>{{$student->phone}}</td>
            <td>{{$student->created_at}}</td>
            <td>{{$student->updated_at}}</td>
            <td>
                <a href="{{route('students.show', $student)}}" class="btn btn-info mt-3">Show Student</a>
                <a href="{{route('students.edit', $student)}}" class="btn btn-warning mt-3">Edit Student</a>
            <form action="{{ route('students.destroy', $student) }}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit" onclick="return confirm('Are you sure???')" class="btn btn-danger mt-3">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
