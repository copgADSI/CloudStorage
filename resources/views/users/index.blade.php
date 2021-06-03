@extends('layouts.app')
@section('content')

    <table class="table">
        <thead>
            <tr>
                <th class="text-center" scope="col">Name</th>
                <th class="text-center" scope="col">Email</th>
                <th class="text-center" scope="col">Role</th>
                <th class="text-center" scope="col">created_at</th>
                <th class="text-center" scope="col">updated_at</th>
                <th class="text-center" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $data)
                <tr>
                    <th class="text-center"> {{ $data->name }} </th>
                    <td class="text-center">{{ $data->email }}</td>
                    <td class="text-center">{{ $data->role }}</td>
                    <td class="text-center">{{ $data->created_at }}</td>
                    <td class="text-center">{{ $data->updated_at }}</td>
                    <td class="text-center">
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-info">
                                Update
                            </button>
                            <a href="" class="btn btn-danger">
                                Delete
                            </a>
                        </form>

                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
