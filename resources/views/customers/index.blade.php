@extends('master')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <h1>Customer

        <a class="btn btn-primary" href="{{ route('customers.create') }}">Create</a>

    </h1>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">IS ACTIVE</th>
                    <th scope="col">CREATED AT</th>
                    <th scope="col">UPDATED AT</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $customer)
                    <tr class="">
                        <td scope="row">{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>

                        <td>
                            @if ($customer->is_active)
                                <span class="badge bg-primary">YES</span>
                            @else
                                <span class="badge bg-danger">NO</span>
                            @endif
                        </td>

                        <td>{{ $customer->created_at }}</td>
                        <td>{{ $customer->updated_at }}</td>
                        <td>

                            <a class="btn btn-primary mt-2" href="{{ route('customers.show', $customer) }}">Show</a>
                            <a class="btn btn-info mt-2" href="{{ route('customers.edit', $customer) }}">Edit</a>
                            {{-- Vẫn lưu trong DB nhưng không hiển thị --}}
                            <form action="{{ route('customers.destroy', $customer) }}" method="post" class="mt-2">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm( 'Chac chan muon xoa khong??' )">DELETE</button>
                            </form>
                            {{-- xóa cứng, xóa hẳn trong DB --}}
                            <form action="{{ route('customers.forceDestroy', $customer) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-dark mt-2" type="submit"
                                    onclick="return confirm('Chac chan muon xoa khong??')">Xoá cứng</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection
