<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th style="width: 90px">Ảnh</th>
            <th>Tên</th>
            <th>Email</th>
            <th class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($users) && is_object($users))
        @php
            $stt = 0;   
        @endphp
        @foreach($users as $user)
        @php
            $stt++;   
        @endphp
        <tr class="">
            <td class="text-center">{{ $stt }}</td>
            <td>
                <span class="imageUser img-cover"><img
                    src="{{ old('image', $user->image) ?? asset('Backend/img/not-found.png') }}" alt="">
                </span>
            </td>
            <td>
                <div class="info-item name">{{ $user->name }}</div>
            </td>
            <td>
                <div class="info-item email">{{ $user->email }}</div>
            </td>
            <td class="text-center">
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                <a href="{{ route('user.read', $user->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
{{ $users->links('pagination::bootstrap-4') }}