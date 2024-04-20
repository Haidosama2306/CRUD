@extends('dashboard')

@section('content')
<div class="view-card">
    <h3 class="title-header">Màn hình chi tiết</h3>
    <div class="info">
        <label>ID</label>
        <p>{{$user->id}}</p>
    </div>
    <div class="info">
        <label>Username</label>
        <p>{{$user->name}}</p>
    </div>
    <div class="info">
        <label>Email</label>
        <p>{{$user->email}}</p>
    </div>
    <div class="info">
        <label>Favorite</label>
        <p>{{$user->favorite}}</p>
    </div>
    <div class="submit">
        <button type="submit" class="btn btn-dark btn-block">Chỉnh sửa</button>
    </div>
</div>
@endsection
