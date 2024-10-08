@extends('master');

@section('title')
    Chi tiet: {{$student->name}}
@endsection

@section('content')

    @if(session()->has('success'))
        <div class="alert alert-danger">
            {{session()->get('success')}}
        </div>
    @endif

    <h1>SHOW:{{$student->name}}</h1>



    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">FIELD</th>
            <th scope="col">VALUE</th>

        </tr>
        </thead>
        <tbody>
        @foreach($student->toArray() as $field => $value)

            <tr>
                <td class="text-uppercase">{{$field}}</td>

                <td>
                    @php
                    switch($field) {
                        case 'image':
                            $url =  \Storage::url($student->image);
                            echo  " <img src='$url' width='50px' alt=''>";
                            break;
                        default: echo $value;
                    }

                    @endphp

                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
