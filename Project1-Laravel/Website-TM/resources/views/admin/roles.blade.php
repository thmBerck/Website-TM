@extends('layout')

@section('content')
    <div class="container">
        <h1>Users</h1>
        <a href="{{route('admin.adduser')}}" class="btn btn-success btn-sm mb-3">Create a User</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        @php
                        $userrole = $user->roles->first()
                        @endphp
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $userrole->name }}</td>
                        <td>
                            <form action="{{ route('admin.change-role', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <select name="role" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ $userrole->name === $role->name ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                
                                <button type="submit" class="btn btn-primary">Change Role</button>
                            </form>
                            <a href="{{ route('admin.delete', $user->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
