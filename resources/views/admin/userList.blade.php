@extends('admin.master')

@section('title', 'User List')

@section('content')
    <div class="table-container">
        <h1 class="userlist">User List</h1>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:30%; margin: 0 auto;">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('admin.userList') }}" method="GET">
            @csrf
            <div class="search-box">
                <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
                <button type="submit">
                    <i class="fa-solid fa-magnifying-glass" style="color: #74C0FC;"></i>
                </button>
            </div>
        </form>
    </div>
    <table class="table table-bordered border-secondary">
        <thead>
            <tr>
                <th class="text-center">User ID</th>
                <th class="text-center">User Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td class="text-center">{{ $data->id }}</td>
                    <td class="text-center">{{ $data->name }}</td>
                    <td class="text-center">{{ $data->email }}</td>
                    {{-- {{\Log::info($admin);}} --}}
                    {{-- @can('delete-user', $admin) --}}
                    <td class="text-center">
                        <a href="{{ route('admin.user.account.delete', $data->id) }}">
                            <button class="delete-btn">Delete</button>
                        </a>
                    </td>
                    {{-- @endcan --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="">
        {{ $datas->links() }}
    </div>
@endsection
