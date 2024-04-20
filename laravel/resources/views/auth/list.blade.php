@extends('dashboard')

@section('content')
<div class="container">
    <div class="list-user">
        <h3 class="title-header">Danh sách Users</h3>
        <table>
            <thead>
                <tr class="title">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Favorite</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="body">
                    <th class="id">{{ $user->id }}</th>
                    <th class="name">{{ $user->name }}</th>
                    <th class="email">{{ $user->email }}</th>
                    <th class="favorite">{!! $user->favorite !!}</th>
                    <!-- <th class="favorite">{!! strip_tags($user->favorite) !!}</th> -->
                    <!-- <th class="favorite">{!! htmlspecialchars($user->favorite) !!}</th> -->
                    <th class="action">
                        <a href="{{ route('user.readUser', ['id' => $user->id]) }}">View</a> |
                        <a href="{{ route('user.updateUser', ['id' => $user->id]) }}">Edit</a> |
                        <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}">Delete</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginate">
        {{$users->links()}}
    </div>
</div>
@endsection
