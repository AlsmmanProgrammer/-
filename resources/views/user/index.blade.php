@extends('dashboard')


@section('title')
    User_Index
@endsection



@section('cot')
    <table class="table caption-top">
        <caption class="fs-3 text-center ">List of users</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">USER TYPE</th>
                <th scope="col">
                    <a href="/user/create">
                        <button class="btn btn-dark">create user </button>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->User_Type }}</td>
                    <td>
                        <form action="/user/{{ $user->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
