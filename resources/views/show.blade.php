@extends('layouts.main')
@push('title')
    <title>Show Data</title>
@endpush
@section('main')

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr >
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td class="d-flex">
                            <form action="crud/{{$user->id}}/edit" method="get">
                                <input type="submit" class="btn btn-primary mr-3" value="Update">
                            </form>
                            <form action="crud/{{$user->id}}" method="POST">
                                {!! method_field('delete') !!}
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
