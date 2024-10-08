@extends('master');

@section('title')
    Chi tiet: {{$customer->name}}
@endsection

@section('content')

    @if(session()->has('success'))
        <div class="alert alert-danger">
            {{session()->get('success')}}
        </div>
    @endif

    <h1>SHOW:{{$customer->name}}</h1>



    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">FIELD</th>
            <th scope="col">VALUE</th>

        </tr>
        </thead>
        <tbody>
        @foreach($customer->toArray() as $field => $value)

            <tr>
                <td class="text-uppercase">{{$field}}</td>

                <td>
                    @php
                    switch($field) {
                        case 'is_active':
                            echo $value
                              ? ' <span class="badge bg-primary">YES</span>'
                              :  '<span class="badge bg-danger">NO</span>';
                            break;
                        default: echo $value;
                    }

                    @endphp

                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('customers.index') }}" class="btn btn-danger">BACK TO LIST</a>
@endsection
