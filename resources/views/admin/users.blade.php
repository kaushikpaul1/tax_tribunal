@extends('layout/layout')

@section('space-work')
    <h2 class="mb-4">Users</h2>
    @php
        $sn = 1;
    @endphp
    <table class="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>

        @foreach ($users as $user)
            <tr>
                {{-- <td>{{ $user->id }}</td> --}}
                <td>{{ $sn }}</td>

                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->roles == null)
                        User
                    @else
                        {{ $user->roles->name }}
                    @endif
                </td>
            </tr>
            @php
                $sn++;
            @endphp
        @endforeach
    </table>
@endsection
