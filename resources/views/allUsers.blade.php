@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header" style="text-align: center; color: blue">
        {{ __('Users') }}
    </div>
    <div style="margin: 10px">
    <a href="{{ route('user.form') }}" class="btn btn-primary">New User</a>
    </div>

    <div class="card-body">
        <div class="row mb-3" style="align-items: center; align-content: center">
            <table style="border-collapse: separate;
            border-spacing: 0;
            width: 80%; /* Adjust the width as needed */
            margin: 0 auto; /* Center the table */
            border-radius: 10px;">
                <thead>
                    <tr>
                        <th style="text-align: center; padding: 10px">Name</th>
                        <th style="text-align: center; padding: 10px">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td style="padding: 10px; border: 1px solid #ccc;">{{ $user->name }}</td>
                        <td style="padding: 10px; border: 1px solid #ccc;">{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection